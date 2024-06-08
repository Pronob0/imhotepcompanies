<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\GenesisController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ManageRoleController;
use App\Http\Controllers\Admin\ManageStaffController;
use App\Http\Controllers\Admin\ManageTestimonialController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// ************************** ADMIN SECTION START ***************************//

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/forgot-password', [LoginController::class, 'forgotPasswordForm'])->name('forgot.password');
    Route::post('/forgot-password', [LoginController::class, 'forgotPasswordSubmit']);
    Route::get('forgot-password/verify-code', [LoginController::class, 'verifyCode'])->name('verify.code');
    Route::post('forgot-password/verify-code', [LoginController::class, 'verifyCodeSubmit']);


    Route::middleware('auth:admin')->group(function () {

        // Admin Dashboard Controller @s
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('reset-password', [LoginController::class, 'resetPassword'])->name('reset.password');
        Route::post('reset-password', [LoginController::class, 'resetPasswordSubmit']);


        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        Route::get('/password', [AdminController::class, 'passwordreset'])->name('password');
        Route::post('/password/update', [AdminController::class, 'changepass'])->name('password.update');

        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [AdminController::class, 'profileupdate'])->name('profile.update');

        // cookie  section
        Route::get('/manage-cookie', [AdminController::class, 'cookie'])->name('cookie');
        Route::post('/manage-cookie', [AdminController::class, 'updateCookie'])->name('update.cookie');

        // Language section 

        Route::get('/manage-language', [AdminController::class, 'language'])->name('language');
        Route::post('/language/update', [AdminController::class, 'languageUpdate'])->name('language.update');

        Route::put('page/update/{page}', [PageController::class, 'update'])->name('page.update');
        Route::post('page/remove', [PageController::class, 'destroy'])->name('page.remove');
        Route::post('page/store', [PageController::class, 'store'])->name('page.store');





        // Portfolio Controller @s
        Route::get('project', [PortfolioController::class, 'index'])->name('project.index');
        Route::get('project/create', [PortfolioController::class, 'create'])->name('project.create');
        Route::post('project/store', [PortfolioController::class, 'store'])->name('project.store');
        Route::get('project/edit/{project}', [PortfolioController::class, 'edit'])->name('project.edit');
        Route::put('project/update/{project}', [PortfolioController::class, 'update'])->name('project.update');
        Route::delete('project-delete/{project}', [PortfolioController::class, 'destroy'])->name('project.destroy');


        // service controller @s 
        Route::get('service', [ServiceController::class, 'index'])->name('service.index');
        Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('service/store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('service/edit/{service}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::put('service/update/{service}', [ServiceController::class, 'update'])->name('service.update');
        Route::delete('service-delete/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');


        // Team Controller @s 
        Route::get('/manage-team', [TeamController::class, 'index'])->name('team.index');
        Route::get('/create-team', [TeamController::class, 'create'])->name('team.create');
        Route::post('/store-team', [TeamController::class, 'store'])->name('team.store');
        Route::get('/edit-team/{id}', [TeamController::class, 'edit'])->name('team.edit');
        Route::put('/update-team/{id}', [TeamController::class, 'update'])->name('team.update');
        Route::delete('/delete-team', [TeamController::class, 'destroy'])->name('team.destroy');

        // Team Controller ends






        // Social Controller @s
        Route::get('social/link', [SocialController::class, 'index'])->name('social.manage');
        Route::post('add/social/link', [SocialController::class, 'store'])->name('social.store');
        Route::put('update/social/link/{id}', [SocialController::class, 'update'])->name('social.update');
        Route::delete('destroy/social/link', [SocialController::class, 'destroy'])->name('social.destroy');
        // Social Controller ends



        // General Setting Controller @s
        Route::get('/general-settings/status/update/{value}', [GeneralSettingController::class, 'StatusUpdate'])->name('gs.status');
        Route::post('/general-settings/update', [GeneralSettingController::class, 'update'])->name('gs.update');




        // Contact Controller @s 
        Route::get('/contact/page/setting', [ContactController::class, 'index'])->name('contact.setting.index');
        Route::get('/contact/message', [ContactController::class, 'contactMessage'])->name('contact.message');
        Route::get('/getintouch/message', [ContactController::class, 'getintouch'])->name('contact.getintouch.message');
        Route::delete('/contact/message/delete', [ContactController::class, 'contactMessageDelete'])->name('contact.message.delete');
        Route::put('/contact/page/setting/update', [ContactController::class, 'update'])->name('contact.setting.update');



        Route::get('page', [PageController::class, 'index'])->name('page.index');
        Route::get('page/create', [PageController::class, 'create'])->name('page.create');
        Route::get('page/edit/{page}', [PageController::class, 'edit'])->name('page.edit');





        Route::get('/clear-cache', function () {
            Artisan::call('optimize:clear');
            return back()->with('success', 'Cache cleared successfully');
        })->name('clear.cache');
    });
});



Route::middleware(['maintenance'])->group(function () {
    // =========================================== FRONTEND ROUTES ===========================================//

    Route::get('/', [FrontendController::class, 'index'])->name('homepage');


    Route::get('/services', [FrontendController::class, 'service'])->name('services');
    Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
    Route::get('/future-projects', [FrontendController::class, 'FutureProject'])->name('future.project');
    Route::get('/successfull-exists', [FrontendController::class, 'SuccessfullExist'])->name('successfully.exist');
    Route::get('/partners', [FrontendController::class, 'partner'])->name('partners');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
});
