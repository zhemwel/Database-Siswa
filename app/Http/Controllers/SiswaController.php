<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Telepon;
use App\Kelas;
use App\Hobi;
use App\Http\Requests\SiswaRequest;
use Storage;
use Session;


class SiswaController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'index', 'show', 'cari'
        ]]);
    }

    /*
    | -------------------------------------------------------------------------------------------------------
    | INDEX
    | -------------------------------------------------------------------------------------------------------
    */
    public function index() {
        $siswa_list = Siswa::paginate(5);
        $jumlah_siswa = Siswa::count();
        return view('siswa.index', compact('siswa_list', 'jumlah_siswa'));
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | SHOW DETAIL
    | -------------------------------------------------------------------------------------------------------
    */
    public function show(Siswa $siswa) {
        return view('siswa.show', compact('siswa'));
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | CREATE
    | -------------------------------------------------------------------------------------------------------
    */
    public function create() {
        return view('siswa.create');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | EDIT
    | -------------------------------------------------------------------------------------------------------
    */
    public function edit(Siswa $siswa) {
        if (!empty($siswa->telepon->nomor_telepon)) {
            $siswa->nomor_telepon = $siswa->telepon->nomor_telepon;
        }

        return view('siswa.edit', compact('siswa'));
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | CREATE
    | -------------------------------------------------------------------------------------------------------
    */
    public function store(SiswaRequest $request) {
        $input = $request->all();

        // Upload foto.
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }

        // Insert Siswa.
        $siswa = Siswa::create($input);

        // Insert Telepon.
        if ($request->filled('nomor_telepon')) {
            $this->insertTelepon($siswa, $request);
        }

        // Insert Hobi.
        $siswa->hobi()->attach($request->input('hobi_siswa'));

        // Flass message.
        Session::flash('flash_message', 'Data siswa berhasil disimpan.');

        return redirect('siswa');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | UPDATE
    | -------------------------------------------------------------------------------------------------------
    */
    public function update(Siswa $siswa, SiswaRequest $request) {
        $input = $request->all();

        // Update foto.
        if ($request->hasFile('foto')) {
            $input['foto'] = $this->updateFoto($siswa, $request);
        }

        // Update siswa.
        $siswa->update($input);

        // Update telepon.
        $this->updateTelepon($siswa, $request);

        // Update hobi.
        $siswa->hobi()->sync($request->input('hobi_siswa'));

        // Flash message.
        Session::flash('flash_message', 'Data siswa berhasil diupdate.');

        return redirect('siswa');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | DESTROY / DELETE
    | -------------------------------------------------------------------------------------------------------
    */
    public function destroy(Siswa $siswa) {
        // Hapus foto kalau ada.
        $this->hapusFoto($siswa);

        $siswa->delete();

        // Flash message.
        Session::flash('flash_message', 'Data siswa berhasil dihapus.');
        Session::flash('penting', true);

        return redirect('siswa');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | CARI
    | -------------------------------------------------------------------------------------------------------
    */
    public function cari(Request $request) {
        $kata_kunci = trim($request->input('kata_kunci'));

        if (! empty($kata_kunci)) {
            $jenis_kelamin = $request->input('jenis_kelamin');
            $id_kelas = $request->input('id_kelas');

            // Query
            $query = Siswa::where('nama_siswa', 'LIKE', '%' . $kata_kunci . '%');
            (! empty($jenis_kelamin)) ? $query->JenisKelamin($jenis_kelamin) : '';
            (! empty($id_kelas)) ? $query->Kelas($id_kelas) : '';

            $siswa_list = $query->paginate(2);

            // URL Links pagination
            $pagination = (! empty($jenis_kelamin)) ? $siswa_list->appends(['jenis_kelamin' => $jenis_kelamin]) : '';
            $pagination = (! empty($id_kelas)) ? $pagination = $siswa_list->appends(['id_kelas' => $id_kelas]) : '';
            $pagination = $siswa_list->appends(['kata_kunci' => $kata_kunci]);

            $jumlah_siswa = $siswa_list->total();
            return view('siswa.index', compact('siswa_list', 'kata_kunci', 'pagination', 'jumlah_siswa', 'id_kelas', 'jenis_kelamin'));
        }

        return redirect('siswa');
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | INSERT TELEPON
    | -------------------------------------------------------------------------------------------------------
    */
    private function insertTelepon(Siswa $siswa, SiswaRequest $request) {
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | UPDATE TELEPON
    | -------------------------------------------------------------------------------------------------------
    */
    private function updateTelepon(Siswa $siswa, SiswaRequest $request) {
        if ($siswa->telepon) {
            // Jika telp diisi, update.
            if ($request->filled('nomor_telepon')) {
                $telepon = $siswa->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
            // Jika telp tidak diisi, hapus.
            else {
                $siswa->telepon()->delete();
            }
        }
        // Buat entry baru, jika sebelumnya tidak ada no telp.
        else {
            if ($request->filled('nomor_telepon')) {
                $telepon = new Telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $siswa->telepon()->save($telepon);
            }
        }
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | UPLOAD FOTO
    | -------------------------------------------------------------------------------------------------------
    */
    private function uploadFoto(SiswaRequest $request) {
        $foto = $request->file('foto');
        $ext  = $foto->getClientOriginalExtension();

        if ($request->file('foto')->isValid()) {
            $foto_name   = date('YmdHis'). ".$ext";
            $request->file('foto')->move('fotoupload', $foto_name);
            return $foto_name;
        }
        return false;
    }

    /*
    | -------------------------------------------------------------------------------------------------------
    | UPDATE FOTO
    | -------------------------------------------------------------------------------------------------------
    */
    private function updateFoto(Siswa $siswa, SiswaRequest $request) {
        // Jika user mengisi foto.
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada foto baru.
            $exist = Storage::disk('foto')->exists($siswa->foto);
            if (isset($siswa->foto) && $exist) {
                $delete = Storage::disk('foto')->delete($siswa->foto);
            }

            // Upload foto baru.
            $foto = $request->file('foto');
            $ext  = $foto->getClientOriginalExtension();
            if ($request->file('foto')->isValid()) {
                $foto_name   = date('YmdHis'). ".$ext";
                $upload_path = 'fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                return $foto_name;
            }
        }
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | HAPUS FOTO
    | -------------------------------------------------------------------------------------------------------
    */
    private function hapusFoto(Siswa $siswa) {
        $is_foto_exist = Storage::disk('foto')->exists($siswa->foto);

        if ($is_foto_exist) {
            Storage::disk('foto')->delete($siswa->foto);
        }
    }


    /*
    | -------------------------------------------------------------------------------------------------------
    | DATE MUTATOR
    | -------------------------------------------------------------------------------------------------------
    */
    public function dateMutator() {
        $siswa = Siswa::findOrFail(1);
        $nama = $siswa->nama_siswa;
        $tanggal_lahir = $siswa->tanggal_lahir->format('d-m-Y');
        $ulang_tahun = $siswa->tanggal_lahir->addYears(30)->format('d-m-Y');
        return "Siswa <strong>{$nama}</strong> lahir pada <strong>{$tanggal_lahir}</strong>.<br>
                Ulang tahun ke-30 akan jatuh pada <strong>{$ulang_tahun}</strong>.";
    }

}