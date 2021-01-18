<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/upload', function () {
        return view('upload');
    })->name('upload');
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('FilterMasterlist', [UploadsController::class, 'searchandfilter']);
    Route::post('Upload', [UploadsController::class, 'upload'])->name('upload.post');

    Route::get('/storage/{userId}/{filename}', [UploadsController::class, 'preview'])->where(['filename' => '.*']);
});

// Route::get('/storage/{userId}/{filename}', [UploadsController::class, 'preview'])->where(['filename' => '.*']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/storage/files_uploaded/{userId}/{filename}', function (Request $request, $id) { {

//         if (Auth::user()->id == $id) {
//             return Storage::download($request->f);
//         } else {
//             Session::flash('error', 'Access  deny');
//             return back();
//         }
//     }
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [UploadsController::class, 'index']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/upload', function () {
//     return view('upload');
// })->name('upload');
// Route::middleware(['auth:sanctum', 'verified'])->get('FilterMasterlist', [UploadsController::class, 'searchandfilter']);
// Route::middleware(['auth:sanctum', 'verified'])->post('Upload', [UploadsController::class, 'upload'])->name('upload.post');