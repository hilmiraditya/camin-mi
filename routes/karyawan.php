<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('karyawan')->user();

    //dd($users);

    return view('karyawan.home');
})->name('home');

