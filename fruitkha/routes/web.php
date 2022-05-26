<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [\App\Http\Controllers\HomeController::class, "index"])->name("home");
Route::get('/news', [\App\Http\Controllers\NewsController::class, "index"])->name("news");
Route::get('/news/{news}', [\App\Http\Controllers\NewsController::class, "show"])->name("single-news");
//Route::get('/news/search', [\App\Http\Controllers\NewsController::class, "searchNews"])->name("searchNews");

Route::get('/about', function (){
   return view('client.about');
})->name('about');


Route::get('/contact', [\App\Http\Controllers\ContactController::class, "index"])->name("contact");
Route::post('/contact', [\App\Http\Controllers\ContactController::class, "sendMessage"])->name("sendMessage");


Route::middleware('isGuest')->group(function (){
    Route::get('/login', [\App\Http\Controllers\LoginController::class, "index"])->name("login");
    Route::post('/login', [\App\Http\Controllers\LoginController::class, "doLogin"])->name("doLogin");
    Route::get('/register', [\App\Http\Controllers\RegisterController::class, "index"])->name("register");
    Route::post('/register', [\App\Http\Controllers\RegisterController::class, "doRegister"])->name("doRegister");
});

Route::middleware('isLogged')->group(function (){
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, "doLogout"])->name("doLogout");

    Route::resource('comment', \App\Http\Controllers\CommentController::class)->names([
        'store' => 'comment.store',
        'destroy' => 'comment.destroy'
    ]);

    Route::middleware('isAdmin')->group(function (){
        Route::get('/admin', [\App\Http\Controllers\AdminController::class, "index"])->name("admin");
        Route::post('/review', [\App\Http\Controllers\AdminController::class, 'storeReview'])->name("storeReview");
        //users section
        Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, "showUsers"])->name("users");
        Route::post('/admin/users', [\App\Http\Controllers\AdminController::class, "storeUser"])->name("storeUser");
        Route::post('/admin/users/{user}', [\App\Http\Controllers\AdminController::class, "changeStatus"])->name("changeStatus");
        Route::post('/admin/users/{user}/comment', [\App\Http\Controllers\AdminController::class, "commentStatus"])->name("commentStatus");
        //reviews section
        Route::get('admin/reviews', [\App\Http\Controllers\AdminController::class, 'showReviews'])->name('reviews');
        Route::post('admin/reviews', [\App\Http\Controllers\AdminController::class, 'changeReview'])->name('changeReview');
        Route::post('admin/reviews/store', [\App\Http\Controllers\AdminController::class, 'storeReview'])->name('storeReview');
        //news section
        Route::get('admin/news', [\App\Http\Controllers\AdminNewsController::class, 'index'])->name('adminNews');
        Route::post('/admin/news', [\App\Http\Controllers\AdminController::class, "changeNewsStatus"])->name("changeNewsStatus");
        Route::get('/admin/news/{news}/edit', [\App\Http\Controllers\AdminNewsController::class, 'edit'])->name("editNews");
        Route::post('admin/news/{id}', [\App\Http\Controllers\AdminNewsController::class, 'update'])->name('updateNews');
        Route::get('admin/news/create', [\App\Http\Controllers\AdminNewsController::class, 'create'])->name('createNews');
        Route::post('admin/news', [\App\Http\Controllers\AdminNewsController::class, 'store'])->name('storeNews');

    });
});



//Route::get('/email', function (){
//    Mail::to('djordjeminic2000@gmail.com')->send(new \App\Mail\ContactMail());
//   return new \App\Mail\ContactMail();
//});


//-------------------------------------------------
//Route::get("/test", function (){
//    $users = \App\Models\Role::find(2);
//    return response()->json($users);
//});

Route::get('/proba', [\App\Http\Controllers\TestController::class, "proba"])->name("proba");
//Route::post('/test', [\App\Http\Controllers\TestController::class, "doTest"])->name("doTest");
