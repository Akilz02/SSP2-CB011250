<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Gallary;
use App\Models\RoomBooking;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});


Route::get('/', [AdminController::class, 'index'])->name('home');

Route::post('/post-test', function (Request $request) {
    dd(request()->get('name'), request()->get('email'));
});

Route::get('hello', function () {
    return view('hello', [
        'name' => 'Taylor',
        'age' => 30,
        'address' => 'Hà Nội'
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {


    Route::get('/dashboard', function () {

        $usertype = Auth::user()->role->value;

            if (!$usertype == 1) {
                $rooms = Room::all();
                $gallarys = Gallary::all();

                return redirect()->route('home');

            } else if ($usertype == 1) {
                // return view('dashboard');
                return redirect('admin-dashboard');

            } else {
                $rooms = Room::all();

                $gallarys = Gallary::all();

                return redirect()->route('home');

            }



        // return view('dashboard');
    })->name('dashboard');

    Route::resource(
        'user',
        \App\Http\Controllers\UserController::class
    );


    Route::resource(
        'room-booking',
        \App\Http\Controllers\RoomBookingController::class
    );

    Route::resource(
        'room',
        \App\Http\Controllers\RoomController::class
    );

});



Route::get('/rooms', function () {
    return view('admin.rooms', [
        'rooms' => Room::all(),
    ]);
})->name('rooms');

Route::get('/room_details/{id}', function ($id) {
    return view('admin.room_details', [
        'room' => Room::find($id),
    ]);
})->name('room-details');


Route::post('/room_booking/{id}', [HomeController::class, 'room_booking'])->name('room.booking');

Route::get('/view_gallary',[HomeController::class, 'view_gallary'])->name('view_gallary');

Route::post('/upload_gallary',[HomeController::class, 'upload_gallary'])->name('upload_gallary');

Route::get('/delete_gallary/{id}',[HomeController::class, 'delete_gallary'])->name('delete_gallary');

Route::get('/contact', function () {
    return view('admin.contact');
})->name('contact');

// Route::post('/contact',[HomeController::class, 'contact']);

Route::get('/contact-submit', [HomeController::class, 'contact'])->name('contact-submit');

Route::get('/hotel_gallary',[HomeController::class, 'hotel_gallary'])->name('hotel_gallary');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/approve_book/{id}', [HomeController::class, 'approve_book'])->name('approve_book.get');

Route::get('/reject_book/{id}', [HomeController::class, 'reject_book'])->name('reject_book.get');

Route::get('/admin-dashboard', [HomeController::class, 'showDashboard']);
