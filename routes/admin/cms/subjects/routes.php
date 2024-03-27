<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\admin\cms\subjects\IndexController;
use App\Http\Controllers\admin\cms\subjects\CreateController;
use App\Http\Controllers\admin\cms\subjects\StoreController;
use App\Http\Controllers\admin\cms\subjects\EditController;
use App\Http\Controllers\admin\cms\subjects\UpdateController;
use App\Http\Controllers\admin\cms\subjects\ReorderController;
use App\Http\Controllers\admin\cms\subjects\UpdateOrderController;
use App\Http\Controllers\admin\cms\subjects\DeleteController;
use App\Http\Controllers\admin\cms\subjects\exams\ExamIndexController;
use App\Http\Controllers\admin\cms\subjects\exams\ExamCreateController;
use App\Http\Controllers\admin\cms\subjects\exams\ExamStoreController;
use App\Http\Controllers\admin\cms\subjects\exams\ExamEditController;
use App\Http\Controllers\admin\cms\subjects\exams\ExamUpdateController;
use App\Http\Controllers\admin\cms\subjects\exams\ExamDeleteController;

Route::group(['prefix' => 'subjects'], function ($router) {

    Route::get('/', IndexController::class)->name('subject-list');

    // Create
    Route::get('/create', CreateController::class)->name('create-subject');
    Route::post('/create', StoreController::class);

    // Edit
    Route::get('/{unique_id}/edit', EditController::class)->name('edit-subject');
    Route::put('/{unique_id}/edit', UpdateController::class);

    // Reorder
    Route::get('/reorder', ReorderController::class)->name('reorder-subject');
    Route::post('/reorder', UpdateOrderController::class);

    // Delete
    Route::delete('/{unique_id}', DeleteController::class)->name('delete-subject');

    //Exam-Paper List
    Route::get('{unique_id}/exam-paper/', ExamIndexController::class)->name('exam-list');

    // Create
    Route::get('{subject_id}/exam-paper/create', ExamCreateController::class)->name('create-exam');
    Route::post('/{subject_id}/exam-paper/create', ExamStoreController::class);

    // Edit
    Route::get('/{subject_id}/exam-paper/{unique_id}/edit', ExamEditController::class)->name('edit-exam');
   Route::put('/{subject_id}/exam-paper/{unique_id}/edit', ExamUpdateController::class);

    // Delete
    Route::delete('{subject_id}/exam-paper/{unique_id}', ExamDeleteController::class)->name('delete-exam');
});
