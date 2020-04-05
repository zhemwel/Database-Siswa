<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('halo', function() {
//     return 'Halo, Selamat Belajar Laravel!';
// });

// Route::get('halaman-rahasia', function() {
//     return 'Anda sedang melihat <strong>Halaman Rahasia.</strong>';
// })->name('secret');


// Route::get('halaman-rahasia', ['as' => 'secret', function() {
//     return 'Anda sedang melihat <strong>Halaman Rahasia.</strong>';
// }]);

// Route::get('showme-secret', function() {
//     return redirect()->route('secret');
// });


// Route::get('/', function () {
//     return view('pages.homepage');
// });

// Route::get('about', function() {
//     $halaman = 'about';
//     return view('pages.about', compact('halaman'));
// });

// Route::get('siswa', function() {
//     $halaman = 'siswa';
//     $siswa = ['Rasmus Lerdorf',
//         'Taylor Otwell',
//         'Brendan Eich',
//         'John Resig'
//     ];
//     return view('siswa.index', compact('halaman', 'siswa'));
// });

// Route::get('halaman-rahasia', [
//     'as' => 'secret',
//     'uses' => 'RahasiaController@halamanRahasia'
// ]);

// NAMED ROUTE
// Route::get('halaman-rahasia', 'RahasiaController@halamanRahasia')->name('secret');
// Route::get('showme-secret', 'RahasiaController@showMeSecret');


// Route::get('sampledata', function() {
//     DB::table('siswa')->insert([
//         [
//             'nisn'          => '1001',
//             'nama_siswa'    => 'Agus Yulianto',
//             'tanggal_lahir' => '1990-02-12',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nisn'          => '1002',
//             'nama_siswa'    => 'Agustina Anggraeni',
//             'tanggal_lahir' => '1990-03-01',
//             'jenis_kelamin' => 'P',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nisn'          => '1003',
//             'nama_siswa'    => 'Bayu Firmansyah',
//             'tanggal_lahir' => '1990-06-17',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nisn'          => '1004',
//             'nama_siswa'    => 'Citra Rahmawati',
//             'tanggal_lahir' => '1991-12-12',
//             'jenis_kelamin' => 'P',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nisn'          => '1005',
//             'nama_siswa'    => 'Dirgantara Laksana',
//             'tanggal_lahir' => '1990-10-10',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nisn'          => '1006',
//             'nama_siswa'    => 'Eko Satrio',
//             'tanggal_lahir' => '1990-07-14',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nisn'          => '1007',
//             'nama_siswa'    => 'Firda Ayu Larasati',
//             'tanggal_lahir' => '1992-02-02',
//             'jenis_kelamin' => 'P',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nisn'          => '1008',
//             'nama_siswa'    => 'Galang Rambu Anarki',
//             'tanggal_lahir' => '1991-05-11',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nisn'          => '1009',
//             'nama_siswa'    => 'Haris Purnomo',
//             'tanggal_lahir' => '1991-10-10',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//         [
//             'nisn'          => '1010',
//             'nama_siswa'    => 'Indra Birowo',
//             'tanggal_lahir' => '1991-12-04',
//             'jenis_kelamin' => 'L',
//             'created_at'    => '2016-03-10 19:10:15',
//             'updated_at'    => '2016-03-10 19:10:15'
//         ],
//     ]);
// });

// Iki ISO
// Route::get('/', 'PagesController@homepage');
// Route::get('about', 'PagesController@about');

// Route::get('siswa', 'SiswaController@index');
// Route::get('siswa/create', 'SiswaController@create');
// Route::get('siswa/{siswa}', 'SiswaController@show');
// Route::get('siswa/{siswa}/edit', 'SiswaController@edit');
// Route::patch('siswa/{siswa}', 'SiswaController@update');
// Route::post('siswa', 'SiswaController@store');
// Route::delete('siswa/{siswa}', 'SiswaController@destroy');


// Route::get('date-mutator', 'SiswaController@dateMutator');


// Bekerja sebelum 29.5
// Route::get('/', 'PagesController@homepage');
// Route::get('about', 'PagesController@about');
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('siswa/cari', 'SiswaController@cari');
// Route::resource('siswa', 'SiswaController');
// Route::resource('kelas', 'KelasController')->parameters([
//     'kelas' => 'kelas'
// ]);
// Route::resource('hobi', 'HobiController');


Route::get('/', 'PagesController@homepage');
Route::get('about', 'PagesController@about');
Auth::routes(['register' => false]);
Route::get('siswa/cari', 'SiswaController@cari');
Route::resource('siswa', 'SiswaController');
Route::resource('kelas', 'KelasController')->parameters([
    'kelas' => 'kelas'
]);
Route::resource('hobi', 'HobiController');
Route::resource('user', 'UserController');