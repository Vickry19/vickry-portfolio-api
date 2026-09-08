<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\HeroRoleController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutStatisticController;
use App\Http\Controllers\Admin\SkillCategoryController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectImageController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ExploringItemController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ContactSettingController;


Route::get('/', function () {
    return response()->json([
        'message' => 'Vickry Portfolio API',
    ]);
});

Route::prefix('admin')->group(function () {

    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('admin.login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('admin.login.submit');

    // Protected Admin
    Route::middleware('auth')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('admin.logout');
        
        Route::get('/site-settings', [SiteSettingController::class, 'edit'])
            ->name('admin.site-settings.edit');
        
        Route::put('/site-settings', [SiteSettingController::class, 'update'])
            ->name('admin.site-settings.update');
        
        Route::resource('sections', SectionController::class)
            ->except(['show'])
            ->names('admin.sections');
        
        Route::get('/hero', [HeroController::class, 'edit'])
            ->name('admin.hero.edit');
        
        Route::put('/hero', [HeroController::class, 'update'])
            ->name('admin.hero.update');
        
        Route::resource('hero-roles', HeroRoleController::class)
            ->except(['show'])
            ->names('admin.hero-roles');
        
        Route::get('/about', [AboutController::class, 'edit'])
            ->name('admin.about.edit');
        
        Route::put('/about', [AboutController::class, 'update'])
            ->name('admin.about.update');
        
        Route::resource('about-statistics', AboutStatisticController::class)
            ->except(['show'])
            ->names('admin.about-statistics');
        
        Route::resource('skill-categories', SkillCategoryController::class)
            ->except(['show'])
            ->names('admin.skill-categories');
        
        Route::resource('skills', SkillController::class)
            ->except(['show'])
            ->names('admin.skills');
        
        Route::resource('experiences', ExperienceController::class)
            ->except(['show'])
            ->names('admin.experiences');
        
        Route::resource('educations', EducationController::class)
            ->except(['show'])
            ->names('admin.educations');
        
        Route::resource('projects', ProjectController::class)
            ->except(['show'])
            ->names('admin.projects');
        
        Route::delete('/project-images/{projectImage}', [
            ProjectImageController::class,
            'destroy',
        ])->name('admin.project-images.destroy');

        Route::resource(
            'certificates',
            CertificateController::class
        )->names('admin.certificates');

        Route::resource(
            'exploring',
            ExploringItemController::class
        )->names('admin.exploring');

        Route::resource(
            'contact-messages',
            ContactMessageController::class
        )->only([
            'index',
            'show',
            'update',
            'destroy',
        ])->names('admin.contact-messages');

        Route::get('/contact-settings', [ContactSettingController::class, 'edit'])
        ->name('admin.contact-settings.edit');

        Route::put('/contact-settings', [ContactSettingController::class, 'update'])
        ->name('admin.contact-settings.update');
    });
});