<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SiswakuAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';

        if (request()->segment(1) == 'siswa') {
            $halaman = 'siswa';
        }

        if (request()->segment(1) == 'about') {
            $halaman = 'about';
        }

        if (request()->segment(1) == 'kelas') {
            $halaman = 'kelas';
        }

        if (request()->segment(1) == 'hobi') {
            $halaman = 'hobi';
        }

        if (request()->segment(1) == 'user') {
            $halaman = 'user';
        }

        view()->share('halaman', $halaman);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
