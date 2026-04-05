<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students-data', [StudentController::class, 'getStudents'])->name('students.data');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');


    Route::get('/staffs', [StaffController::class, 'index'])->name('staffs.index');
    Route::get('/staffs-data', [StaffController::class, 'getstaffs'])->name('staffs.data');
    Route::post('/staffs', [StaffController::class, 'store'])->name('staffs.store');

    Route::get('/programme', [ProgrammeController::class, 'getByDepartmentId'])->name('programme.get');



});

require __DIR__.'/auth.php';
