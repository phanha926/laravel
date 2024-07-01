<?php
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Studentcontroller;
use Illuminate\Support\Facades\Route;
use App\Models\Test;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MusicController;
use App\Models\music;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/test1', function () {
    return view('test1');
});
Route::get('/test2', function () {
    return view('test2');
});
Route::get('/testmodel',function(){
    $test = Test::findOrFail(1);
    dd($test);
});
Route::get('/testdb',function(){
    $test = DB::table('test')->where('id', 1)->first();
    dd($test);
}); Route::get('/testcontroller', [Studentcontroller::class,'list']);

 Route::get('/category', [CategoryController::class, 'index'])->name("category.list");
    
 Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");

 Route::post('/category', [CategoryController::class, 'store'])->name("category.store");

 Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');

 Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');

 Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');
 
 Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");

 //Route::resource('/product',ProductController::class);

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');
Route::delete('/product/{product}',[ProductController::class,'destroy'])->name('product.destroy');
Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{product}',[ProductController::class,'update'])->name('product.update');

 Route::get('/',[FrontendController::class,'index']);

 Route::get('/music',function(){
    $tbl_music = music::findOrFail(1);
    dd($tbl_music);
});

Route::get('/music', [MusicController::class, 'index'])->name("music.list");
    
    Route::get('/music/create', [MusicController::class, 'create'])->name("music.create");

    Route::post('/music', [MusicController::class, 'store'])->name("music.store");

    Route::get("/music/{musicId}/edit", [MusicController::class, 'edit'])->name('music.edit');

    Route::put("/music/{musicId}", [MusicController::class, 'update'])->name('music.update');

    Route::delete("/music/{musicId}", [MusicController::class, 'destroy'])->name('music.delete');
    
    Route::get('/music/{cateId}', [MusicController::class, 'show'])->name("music.show");


    Route::get('/list',[FrontendController::class,'list']);
    Route::get('/show/{id}',[FrontendController::class,'show']);
    Route::get('/frontend/{category?}', [FrontendController::class,'getByCategory']);
    Route::get('/search', [FrontendController::class,'getBySearch']);


    // login and register
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/registration', [AuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
