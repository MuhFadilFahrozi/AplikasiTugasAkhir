<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// ============================================
// PUBLIC ROUTES (TANPA LOGIN)
// ============================================
Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/contact', [HomeController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [HomeController::class, 'contact']);

// ============================================
// 🔐 ADMIN ROUTES (LOGIN + ADMIN)
// ============================================
Route::middleware(['auth', 'admin'])->group(function () {

    // ROOM MANAGEMENT
    Route::get('/create_room', [AdminController::class, 'create_room']);
    Route::post('/add_room', [AdminController::class, 'add_room'])->name('admin.add_room');
    Route::get('/view_room', [AdminController::class, 'view_room']);
    Route::get('/room_update/{id}', [AdminController::class, 'room_update']);
    Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);
    Route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);

    // BOOKING MANAGEMENT
    Route::get('/bookings', [AdminController::class, 'bookings']);
    Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);
    Route::match(['GET', 'POST'], '/reject_book/{id}', [AdminController::class, 'reject_book'])
        ->name('reject_book');
    Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);

    // MESSAGES
    Route::get('/all_messages', [AdminController::class, 'all_messages']);
});

// ============================================
// 🔐 USER ROUTES (LOGIN)
// ============================================
Route::middleware(['auth'])->group(function () {

    // DETAIL RUANGAN
    Route::get('/room_details/{id}', [HomeController::class, 'room_details']);

    // BOOKING
    Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);

    // USER BOOKINGS
    Route::get('/user/bookings', [HomeController::class, 'bookings'])
        ->name('user.bookings');

    // HISTORY
    Route::get('/history-peminjaman', [HomeController::class, 'bookings'])
        ->name('history.peminjaman');

    // BOOKING DETAIL (MODAL)
    Route::get('/booking/detail/{id}', [HomeController::class, 'getBookingDetail']);

    // CANCEL BOOKING
    Route::post('/booking/cancel/{id}', [HomeController::class, 'cancelBooking']);

    // AVAILABILITY & CALENDAR
    Route::get('/check-availability/{id}', [HomeController::class, 'checkAvailability']);
    Route::get('/room-bookings/{id}', [HomeController::class, 'getRoomBookings']);

    // EXPORT PDF
    Route::get('/export-jadwal/{id}', [HomeController::class, 'exportJadwalPDF'])
        ->name('export.jadwal.pdf');
});
