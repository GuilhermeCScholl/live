<?php

use App\Livewire\ShowTweets;
use App\Livewire\User\UploadPhoto;

use Illuminate\Support\Facades\Route;

Route::get('/upload', UploadPhoto::class)->middleware('auth')->name('upload.photo.user');
Route::get('/tweets', ShowTweets::class)->middleware('auth')->name('tweets.index');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
       return redirect()->route('tweets.index');
    })->name('dashboard');
});
