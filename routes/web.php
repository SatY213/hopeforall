<?php
use App\Http\Controllers\NeederController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\BoughtController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BenevoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\FeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

dynamics route
Route::get('/users/{id}/{name}', function($id, $name){
return 'This is user '.$name.' with id '.$id;
});


*/



/*
Route::get('/about', function(){
return view ('pages.about');
}); */





Route::post('/register/request', [RegisterController::class, 'submitRequest'])->name('register.request.submit');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::post('/participation/submit', [ParticipationController::class, 'store'])->name('participation.submit');



Route::get('/', [PagesController::class, 'index'])->name('pages.index');
Route::get('/services', [PagesController::class, 'services']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/blog', [PagesController::class, 'blog']);

Route::resource('posts', PostsController::class);
Route::resource('/fees', FeeController::class);

Route::resource('donation', DonationController::class);
Route::resource('needers', NeederController::class);
Route::resource('benevoles', BenevoleController::class);
Route::resource('boughts', BoughtController::class);
Route::resource('users', UserController::class);
Route::post('/users/{user}/print', [UserController::class, 'printCard'])->name('users.print');

Route::get('/benevoles/{benevole}', [BenevoleController::class, 'show'])->name('benevoles.show');

Route::resource('projects', ProjectController::class);

// Route::get('/projects/{project}/benevoles', [ProjectController::class, 'getBenevoles'])->name('projects.getBenevoles');
// Route::get('/projects/{project}/boughts', [ProjectController::class, 'getBoughts'])->name('projects.getBoughts');

Route::get('/benevoles/{benevole}/projects', [BenevoleController::class, 'getProjects'])->name('benevoles.getProjects');










/* Route::view('/index', 'pages.index');*/


/* Route::get('index', function () {
    return view('pages.index');
});
*/










Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');



Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
