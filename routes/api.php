<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestbookController;

Route::post('/guestbook', [GuestbookController::class, 'store']);
