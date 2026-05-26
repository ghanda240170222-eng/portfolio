<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Data ini akan dikirim ke view portfolio.blade.php
    $personalData = [
        'name' => 'Ghanda Ramadhan Siregar',
        'about' => 'Saya adalah mahasiswa aktif di Universitas Malikussaleh yang memiliki semangat belajar tinggi, disiplin, dan bertanggung jawab. Saya terbiasa bekerja sama dengan orang lain baik dalam lingkungan kampus maupun lingkungan kerja. Selain fokus pada pendidikan, saya juga aktif membantu usaha orang tua di Toko Rizghan.'
    ];

    return view('portfolio', compact('personalData'));
});