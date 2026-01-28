<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// ============================================
// PUBLIC ROUTES
// ============================================
Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/room_details/{id}', [HomeController::class, 'room_details']);
Route::get('/contact', [HomeController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [HomeController::class, 'contact']);

// ============================================
// ADMIN - ROOM MANAGEMENT
// ============================================
Route::get('/create_room', [AdminController::class, 'create_room']);
Route::post('/add_room', [AdminController::class, 'add_room'])->name('admin.add_room');
Route::get('/view_room', [AdminController::class, 'view_room']);
Route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);
Route::get('/room_update/{id}', [AdminController::class, 'room_update']);
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);

// ============================================
// ADMIN - BOOKING MANAGEMENT
// ============================================
Route::get('/bookings', [AdminController::class, 'bookings']);
Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);
Route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);

// REJECT BOOKING - Support both GET (old) and POST (new with notes)
Route::match(['GET', 'POST'], '/reject_book/{id}', [AdminController::class, 'reject_book'])
    ->name('reject_book');

// ============================================
// ADMIN - MESSAGES
// ============================================
Route::get('/all_messages', [AdminController::class, 'all_messages']);

// ============================================
// USER - BOOKING MANAGEMENT (Authenticated)
// ============================================
Route::middleware('auth')->group(function () {
    // Create booking
    Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);
    
    // User's booking list
    Route::get('/user/bookings', [HomeController::class, 'bookings'])->name('user.bookings');
    
    // Booking history with filters
    Route::get('/history-peminjaman', [HomeController::class, 'history'])->name('history.peminjaman');
    
    // Get booking detail (for modal)
    Route::get('/booking/detail/{id}', [HomeController::class, 'getBookingDetail']);
    
    // Cancel booking
    Route::post('/booking/cancel/{id}', [HomeController::class, 'cancelBooking']);
    
    // Check room availability
    Route::get('/check-availability/{id}', [HomeController::class, 'checkAvailability']);
    
    // Get room bookings
    Route::get('/room-bookings/{id}', [HomeController::class, 'getRoomBookings']);
    
    // Export jadwal PDF
    Route::get('/export-jadwal/{id}', [HomeController::class, 'exportJadwalPDF'])->name('export.jadwal.pdf');
});

// ============================================
// NOTES:
// ============================================
// - Route /reject_book/{id} sekarang support GET & POST
// - GET: untuk backward compatibility (reject langsung tanpa notes)
// - POST: untuk reject dengan catatan dari modal
// ============================================