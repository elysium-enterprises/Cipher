<?php

use App\Http\Controllers\App\AppLandingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Landing\IndexController;

use App\Http\Controllers\DownloadController;
use App\Http\Controllers\RentController;

use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\Auth\SignoutController;
use App\Http\Controllers\Auth\SignupController;

use App\Http\Controllers\SupportController;

use App\Http\Controllers\Legal\PrivacyPolicyController;
use App\Http\Controllers\Newsletter\NewsletterController;
use App\Http\Controllers\App\Members\AvatarController;

Route::domain(env('APP_URL'))->group(function() {

    Route::get('/', [IndexController::class, 'index'])->name('index');
    
    Route::name('newsletter.')->group(function() {
        Route::post('newsletter', [NewsletterController::class, 'store'])->name('subscribe.store');
        Route::get('newsletter', [NewsletterController::class, 'show'])->name('subscribe.show');
        Route::get('newsletter/subscribed', [NewsletterController::class, 'showSubscribed'])->name('subscribed.show');
        Route::get('newsletter/unsubscribed', [NewsletterController::class, 'showUnsibscribed'])->name('unsubscribed.show');
        Route::delete('newsletter/{subscriptionId}', [NewsletterController::class, 'destroy'])->name('subscribe.destroy');
    });

    Route::name('auth.')->group(function() {

        Route::get('signup', [SignupController::class, 'show'])->name('signup.show');
        Route::get('signin', [SigninController::class, 'show'])->name('signin.show');

        Route::get('auth/name', [SignupController::class, 'generateRandomDisplayName'])->name('signup.randomname.show');

        Route::post('auth/signin', [SigninController::class, 'index'])->name('signin.store');
        Route::post('auth/signup', [SignupController::class, 'store'])->name('signup.store');

        Route::get('auth/signout', [SignoutController::class, 'index'])->name('signout.index');
    });

    // Route::domain('app.' . env('APP_URL'))->group(function () {
    //     Route::name('app.')->group(function() {
    //         Route::get('/swarm', [SwarmController::class, 'index'])->name('swarm.discover');
    //         Route::get('/swarm/{hive}', [SwarmController::class, 'hive'])->name('swarm.hive');
    //         Route::get('/swarm/apply', [SwarmController::class, 'apply'])->name('swarm.apply');
    //         Route::post('/swarm/apply', [SwarmController::class, 'store'])->name('swarm.apply.store');

    //         Route::get('/members/@me', [AppHomepageController::class, 'dashboard'])->name('dashboard.dashboard');
    //     });
    // });

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

        Route::prefix('about/')->group(function() {
            Route::name('about.')->group(function() {
                Route::get('company', function() {
                    return 'about company';
                })->name('company');

                Route::get('app', function() {
                    return 'about app';
                })->name('app');
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
        
        Route::get('privacy', [PrivacyPolicyController::class, 'show'])->name('privacy');
        
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

Route::name('app.')->group(function () {
    Route::name('channels.')->group(function () {
        Route::get('/channels/@me', [AppLandingController::class, 'show'])->name('me');
    });

    Route::name('members.')->group(function () {
        Route::name('avatars.')->group(function () {
            Route::get('/members/@me/avatar', [AvatarController::class, 'showOwnAvatar'])->name('me');
            Route::get('/members/{id}/avatar', [AvatarController::class, 'show'])->name('id');
        });
    });
});


Route::domain('admin.' . env('APP_URL'))->group(function () {
    Route::name('admin.')->group(function () {
        Route::get('/', function() {
            return 'admin login';
        });    
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
