<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

route::get('/',[AdminController::class, 'home']);

route::post('/add_room',[AdminController::class, 'add_room'])->name('admin.add_room');


route::get('/home',[AdminController::class,'index'])->name('home');




route::get('/create_room',[AdminController::class, 'create_room']);

route::post('/add_room',[AdminController::class, 'add_room']);
route::get('/view_room',[AdminController::class, 'view_room']);

route::get('/room_delete/{id}',[AdminController::class, 'room_delete']);

route::get('/room_update/{id}',[AdminController::class, 'room_update']);

route::post('/edit_room/{id}',[AdminController::class, 'edit_room']);

route::get('/room_details/{id}',[HomeController::class, 'room_details']);

route::post('/add_booking/{id}',[HomeController::class, 'add_booking']);

route::get('/bookings',[AdminController::class, 'bookings']);


Route::get('/user/bookings', [HomeController::class, 'bookings'])->middleware('auth')->name('user.bookings');




route::get('/delete_booking/{id}',[AdminController::class, 'delete_booking']);

route::get('/approve_book/{id}',[AdminController::class, 'approve_book']);
route::get('/reject_book/{id}',[AdminController::class, 'reject_book']);

Route::get('/contact', [HomeController::class, 'showContactForm'])->name('contact');
route::post('/contact',[HomeController::class, 'contact']);

route::get('/all_messages',[AdminController::class, 'all_messages']);
Route::post('/contact_header', [HomeController::class, 'contact_header']);
Route::get('/contact_header', [HomeController::class, 'showContactForm'])->name('contact_header');
Route::get('/check-availability/{id}', [HomeController::class, 'checkAvailability']);
Route::get('/room-bookings/{id}', [HomeController::class, 'getRoomBookings']);
Route::get('/room-bookings/{roomId}', [AdminController::class, 'getRoomBookings']);
Route::get('/admin/export-booking-pdf', [HomeController::class, 'exportPDF'])->name('booking.exportPDF');
Route::get('/export-jadwal/{id}', [App\Http\Controllers\HomeController::class, 'exportJadwalPDF'])
    ->name('export.jadwal.pdf');