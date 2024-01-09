<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
        Route::get('respond', [FestivalController::class, 'respond'])->name('.respond');
        Route::post('respond', [FestivalController::class, 'postResponse'])->name('.respond.store');
    });
});


// LOGGED IN USERS
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // USER
    Route::prefix('user')->name('user')->group(function () {

        // USER/HOUSES
        Route::prefix('festivals')->name('.festivals')->group(function () {
            Route::get('', [FestivalController::class, 'index']);
            Route::get('create', [FestivalController::class, 'create'])->name('.create');
            Route::post('store', [FestivalController::class, 'store'])->name('.store');

            // HOUSE
            Route::prefix('{house}')->group(function () {
                Route::get('edit', [FestivalController::class, 'edit'])->name('.edit');
                Route::post('update', [FestivalController::class, 'update'])->name('.update');
                Route::get('info', [FestivalController::class, 'info'])->name('.info');
                Route::get('delete', [FestivalController::class, 'delete'])->name('.delete');

                // HOUSE IMAGES
                Route::prefix('images')->name('.images')->group(function () {
                    Route::get('', [FestivalImageController::class, 'show']);
                    Route::get('edit', [FestivalImageController::class, 'edit'])->name('.edit');
                    Route::post('store', [FestivalImageController::class, 'store'])->name('.store');
                    Route::get('{image}/delete', [FestivalImageController::class, 'delete'])->name('.delete');
                });

                // RESPONSES
                // Route::prefix('responses')->name('.responses')->group(function () {
                //     Route::get('', [UserResponseController::class, 'houseIndex']);
                //     Route::get('edit', [UserResponseController::class, 'edit'])->name('.edit');
                //     Route::post('store', [UserResponseController::class, 'store'])->name('.store');
                //     Route::get('{house_response}/delete', [UserResponseController::class, 'delete'])->name('.delete');

                //     // RESPONSE
                //     Route::prefix('{house_response}')->group(function () {
                //         Route::get('show', [UserResponseController::class, 'responseShow'])->name('.show');
                //         Route::get('accept', [UserResponseController::class, 'accept'])->name('.accept');
                //         Route::get('decline', [UserResponseController::class, 'decline'])->name('.decline');
                //     });
                // });
            });
        });

        // USER/RESPONSES
        // Route::prefix('responses')->name('.responses')->group(function () {
        //     Route::get('', [UserResponseController::class, 'index']);
        //     Route::get('create', [UserResponseController::class, 'create'])->name('.create');
        //     Route::post('store', [UserResponseController::class, 'store'])->name('.store');

        //     // RESPONSE
        //     Route::prefix('{house_response}')->group(function () {
        //         Route::get('show', [UserResponseController::class, 'show'])->name('.show');
        //         Route::get('edit', [UserResponseController::class, 'edit'])->name('.edit');
        //         Route::get('delete', [UserResponseController::class, 'delete'])->name('.delete');
        //     });
        // });
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
                    Route::get('', [FestivalImageController::class, 'show']);
                    Route::get('edit', [FestivalImageController::class, 'edit'])->name('.edit');
                    Route::post('store', [FestivalImageController::class, 'store'])->name('.store');
                    Route::get('{image}/delete', [FestivalImageController::class, 'delete'])->name('.delete');
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
        //     Route::prefix('{house_response}')->group(function () {
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
