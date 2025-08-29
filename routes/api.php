<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SyllabusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('students', StudentController::class);

Route::prefix('classrooms/{classroom}/syllabus')->group(function () {
    Route::patch('/', [SyllabusController::class, 'update']);
    Route::delete('/', [SyllabusController::class, 'destroy']);
});
Route::apiResource('classrooms.syllabus', SyllabusController::class);
Route::apiResource('classrooms', ClassroomController::class);
Route::apiResource('lectures', LectureController::class);
