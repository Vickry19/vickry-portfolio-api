<?php

use App\Http\Controllers\Api\ProjectApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SiteContentApiController;
use App\Http\Controllers\Api\HeroApiController;
use App\Http\Controllers\Api\AboutApiController;
use App\Http\Controllers\Api\SkillApiController;
use App\Http\Controllers\Api\ExperienceApiController;
use App\Http\Controllers\Api\EducationApiController;
use App\Http\Controllers\Api\CertificateApiController;
use App\Http\Controllers\Api\ExploringApiController;
use App\Http\Controllers\Api\ContactMessageApiController;
use App\Http\Controllers\Api\ContactSettingApiController;



Route::get('/projects', [
    ProjectApiController::class,
    'index',
]);

Route::get('/projects/{slug}', [
    ProjectApiController::class,
    'show',
]);

Route::get('/site-content', [
    SiteContentApiController::class,
    'index',
]);

Route::get('/hero', [
    HeroApiController::class,
    'index',
]);

Route::get('/about', [AboutApiController::class, 'index']);

Route::get('/skills', [SkillApiController::class, 'index']);

Route::get('/experience', [ExperienceApiController::class, 'index']);

Route::get('/education', [EducationApiController::class, 'index']);

Route::get('/certificates', [CertificateApiController::class, 'index']);

Route::get('/exploring',[ExploringApiController::class, 'index']);

Route::post(
    '/contact',
    [ContactMessageApiController::class, 'store']
);

Route::get('/contact-settings', [ContactSettingApiController::class, 'index']);