<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\SkillController;

Route::apiResource('skills', SkillController::class);
