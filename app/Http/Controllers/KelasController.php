<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KelasRequest;
use App\Kelas;
use Session;

class KelasController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $kelas_list = Kelas::all();
        return view('kelas/index', compact('kelas_list'));
    }

    public function create() {
        return view('kelas.create');
    }

    public function store(KelasRequest $request) {
        Kelas::create($request->all());
        Session::flash('flash_message', 'Data kelas berhasil disimpan.');
        return redirect('kelas');
    }

    public function edit(Kelas $kelas) {
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Kelas $kelas, KelasRequest $request) {
        $kelas->update($request->all());
        Session::flash('flash_message', 'Data kelas berhasil diupdate.');
        return redirect('kelas');
    }

    public function destroy(Kelas $kelas) {
        $kelas->delete();
        Session::flash('flash_message', 'Data kelas berhasil dihapus.');
        Session::flash('penting', true);
        return redirect('kelas');
    }
}
