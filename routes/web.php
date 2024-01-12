<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserFestivalController;
use App\Http\Controllers\UserResponseController;
use App\Http\Controllers\FestivalImageController;
use App\Http\Controllers\UserHouseImageController;

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

Route::get('/', [FestivalController::class, 'index'])->name('index');

// FESTIVALS
Route::prefix('festivals')->name('festivals')->group(function () {
    Route::get('', [FestivalController::class, 'index'])->name('.index');
    Route::prefix('{festival}')->group(function () {
        Route::get('show', [FestivalController::class, 'show'])->name('.show');
        Route::post('reserve', [TicketController::class, 'store'])->name('.reserve');
    });
});


// LOGGED IN USERS
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // USER
    Route::prefix('user')->name('user')->group(function () {

        Route::prefix('festivals')->name('.festivals')->group(function () {
            Route::get('', [FestivalController::class, 'own']);
            Route::get('create', [FestivalController::class, 'create'])->name('.create');
            Route::post('store', [FestivalController::class, 'store'])->name('.store');

            Route::prefix('{festival}')->group(function () {
                Route::get('edit', [FestivalController::class, 'edit'])->name('.edit');
                Route::post('update', [FestivalController::class, 'update'])->name('.update');
                Route::get('info', [FestivalController::class, 'info'])->name('.info');
                Route::get('delete', [FestivalController::class, 'delete'])->name('.delete');

                Route::prefix('images')->name('.images')->group(function () {
                    Route::get('', [FestivalController::class, 'images']);
                    Route::get('edit', [FestivalImageController::class, 'edit'])->name('.edit');
                    Route::post('store', [FestivalImageController::class, 'store'])->name('.store');
                    Route::get('{image}/delete', [FestivalImageController::class, 'delete'])->name('.delete');
                });

                Route::prefix('bookings')->name('.bookings')->group(function () {
                    Route::get('', [FestivalController::class, 'bookings']);
                    Route::get('edit', [BookingController::class, 'edit'])->name('.edit');
                    Route::post('store', [BookingController::class, 'store'])->name('.store');
                    Route::post('update', [BookingController::class, 'update'])->name('.update');
                    Route::get('delete', [BookingController::class, 'delete'])->name('.delete');
                });
            });
        });

        Route::prefix('bookings')->name('.bookings')->group(function () {
            Route::get('', [BookingController::class, 'own']);
            Route::post('store', [BookingController::class, 'store'])->name('.store');

            Route::prefix('{booking}')->group(function () {
                Route::get('accept', [BookingController::class, 'accept'])->name('.accept');
                Route::get('reject', [BookingController::class, 'reject'])->name('.reject');
                Route::get('delete', [BookingController::class, 'delete'])->name('.delete');
            });
        });

        // USER/TICKETS
        Route::prefix('tickets')->name('.tickets')->group(function () {
            Route::get('', [TicketController::class, 'own']);
            Route::get('edit', [TicketController::class, 'edit'])->name('.edit');
            Route::post('store', [TicketController::class, 'store'])->name('.store');
            Route::get('delete', [TicketController::class, 'delete'])->name('.delete');
        });
    });

    // ADMIN
    Route::prefix('dashboard')->name('dashboard')->middleware('admin')->group(function () {
        Route::get('', function () {
            return view('dashboard');
        });

        // FESTIVALS
        Route::prefix('festivals')->name('.festivals')->group(function () {
            Route::get('', [FestivalController::class, 'dashboard']);
            Route::get('create', [FestivalController::class, 'create'])->name('.create');
            Route::post('store', [FestivalController::class, 'store'])->name('.store');
            Route::prefix('{festival}')->group(function () {
                Route::get('edit', [FestivalController::class, 'edit'])->name('.edit');
                Route::post('update', [FestivalController::class, 'update'])->name('.update');
                Route::get('info', [FestivalController::class, 'info'])->name('.info');
                Route::get('delete', [FestivalController::class, 'delete'])->name('.delete');

                Route::prefix('images')->name('.images')->group(function () {
                    Route::get('', [FestivalController::class, 'images']);
                    Route::get('edit', [FestivalImageController::class, 'edit'])->name('.edit');
                    Route::post('store', [FestivalImageController::class, 'store'])->name('.store');
                    Route::get('{image}/delete', [FestivalImageController::class, 'delete'])->name('.delete');
                });

                Route::prefix('bookings')->name('.bookings')->group(function () {
                    Route::get('', [FestivalController::class, 'bookings']);
                    Route::get('edit', [BookingController::class, 'edit'])->name('.edit');
                    Route::post('store', [BookingController::class, 'store'])->name('.store');
                    Route::get('{booking}/delete', [BookingController::class, 'delete'])->name('.delete');
                });
            });
        });

        Route::prefix('roles')->name('.roles')->group(function () {
            Route::get('', [RoleController::class, 'dashboard']);
            Route::get('create', [RoleController::class, 'create'])->name('.create');
            Route::post('store', [RoleController::class, 'store'])->name('.store');
            Route::prefix('{role}')->group(function () {
                Route::get('edit', [RoleController::class, 'edit'])->name('.edit');
                Route::post('update', [RoleController::class, 'update'])->name('.update');
                Route::get('info', [RoleController::class, 'info'])->name('.info');
                Route::get('delete', [RoleController::class, 'delete'])->name('.delete');
            });
        });
        // RESPONSES
        // Route::prefix('responses')->name('.responses')->group(function () {
        //     Route::get('', [ResponseController::class, 'index']);
        //     Route::get('create', [ResponseController::class, 'create'])->name('.create');
        //     Route::post('store', [ResponseController::class, 'store'])->name('.store');
        //     Route::prefix('{festival_response}')->group(function () {
        //         Route::get('edit', [ResponseController::class, 'edit'])->name('.edit');
        //         Route::post('update', [ResponseController::class, 'update'])->name('.update');
        //         Route::get('delete', [ResponseController::class, 'delete'])->name('.delete');
        //     });
        // });

        // USERS
        Route::prefix('users')->name('.users')->group(function () {
            Route::get('', [UserController::class, 'dashboard']);
            Route::get('create', [UserController::class, 'create'])->name('.create');
            Route::post('store', [UserController::class, 'store'])->name('.store');

            // USER
            Route::prefix('{user}')->group(function () {
                Route::get('edit', [UserController::class, 'edit'])->name('.edit');
                Route::post('update', [UserController::class, 'update'])->name('.update');
                Route::get('delete', [UserController::class, 'delete'])->name('.delete');
            });
        });
    })->middleware('admin');
});

require __DIR__ . '/auth.php';
