<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\App\HiveController;
use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\App\PrivateController;
use App\Http\Controllers\App\SwarmController;
use App\Http\Controllers\AppHomepageController;
use App\Http\Controllers\Landing\IndexController;

use App\Http\Controllers\Download\DownloadController;
use App\Http\Controllers\Download\RentController;

use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\Auth\SignoutController;
use App\Http\Controllers\Auth\SignupController;

use App\Http\Controllers\Support\SupportController;

use App\Http\Controllers\Docs\DocsController;

Route::domain(env('APP_URL'))->group(function() {

    Route::get('/', [IndexController::class, 'index'])->name('index');
    
    Route::name('auth.')->group(function() {
        Route::get('signin', [SigninController::class, 'index'])->name('signin');
        Route::get('signout', [SignoutController::class, 'index'])->name('signout');
        Route::post('signup', [SignupController::class, 'store'])->name('signup');
    });

    Route::domain('app.' . env('APP_URL'))->group(function () {
        Route::name('app.')->group(function() {
            Route::get('/swarm', [SwarmController::class, 'index'])->name('swarm.discover');
            Route::get('/swarm/{hive}', [SwarmController::class, 'hive'])->name('swarm.hive');
            Route::get('/swarm/apply', [SwarmController::class, 'apply'])->name('swarm.apply');
            Route::post('/swarm/apply', [SwarmController::class, 'store'])->name('swarm.apply.store');

            Route::get('/members/@me', [AppHomepageController::class, 'dashboard'])->name('dashboard.dashboard');
        });
    });

    Route::name('landing.')->group(function() {
        Route::prefix('hive/')->group(function() {
            Route::name('hive.')->group(function() {
                Route::get('host', [RentController::class])->name('host');
            });
        });

        Route::get('download', [DownloadController::class, 'index'])->name('download');

        Route::prefix('support/')->group(function() {
            Route::name('support.')->group(function() {
                Route::get('/', [SupportController::class, 'index'])->name('index');
            });
        });

        Route::get('about', function() {
            return 'about';
        })->name('about');
        
        Route::get('branding', function() {
            return 'branding';
        })->name('branding');
        
        Route::get('feedback', function() {
            return 'feedback';
        })->name('feedback');
        
        
        Route::get('faq', function() {
            return 'faq';
        })->name('faq');
        
        Route::get('terms', function() {
            return 'terms';
        })->name('terms');
        
        Route::get('privacy', function() {
            return 'privacy';
        })->name('privacy');
        
        Route::get('cookies', function() {
            return 'cookies';
        })->name('cookies');
        
        Route::get('guidelines', function() {
            return 'guidelines';
        })->name('guidelines');
        
        Route::get('licenses', function() {
            return 'licenses';
        })->name('licenses');

        Route::get('disclosure', function() {
            return 'disclosure';
        })->name('disclosure');
    });
});



// Route::domain('blog.' . env('APP_URL'))->group(function () {
//     Route::name('blog.')->group(function () {
//         Route::get('/', [BlogController::class, 'index'])->name('index'); 
//     });
// });

// Route::domain('developers.' . env('APP_URL'))->group(function () {
//     Route::name('developers.')->group(function() {
//         Route::get('/', function() {
//             return redirect(route('developers.docs.index'));
//         })->name('index');

//         Route::name('docs.')->group(function() {
//             Route::prefix('docs')->group(function() {
//                 Route::get('/', function() {
//                     return 'docs';
//                 })->name('index');
//             });
//         });
//     });
// });

Route::domain('status.' . env('APP_URL'))->group(function () {
    Route::get('/', function () {
        return 'status';
    })->name('status');
});