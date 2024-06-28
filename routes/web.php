<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\GalleryController;


Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

//produit
Route::get('produit',[ProduitController::class,'index'])->name('produit');

//presentation
Route::get('presentation',[PresentationController::class,'index'])->name('presentation');


//partenaire
Route::get('partenaire',[PartenaireController::class,'index'])->name('partenaire');


//slide
Route::get('slide',[SlideController::class,'index'])->name('slide');


//galery
Route::get('gallery',[GalleryController::class,'index'])->name('gallery');
