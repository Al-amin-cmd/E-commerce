<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Models\Category;
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

Route::get('/', [WelcomeController::class, 'welcome']);
Route::get('/categories/{category}/product', [WelcomeController::class, 'productlist'])->name('frontend.products.index');
Route::get('/products/{product}', [WelcomeController::class, 'productDetails'])->name('frontend.products.show');

Route::post('add-to-cart/{product_id}', [CartController::class, 'addToCart'])->name('add/to-cart');
Route::get('cartpage', [CartController::class, 'cartPage'])->name('cartpage');
Route::get('cart/delete/{cart_id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('cart/update/{cart_id}', [CartController::class, 'quantityUpdate'])->name('cart.update');
Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');



require __DIR__ . '/auth.php';

Route::middleware('auth')->prefix('dashboard')->group(function () {

    Route::post('/products/{product}/comments', [CommentController::class, 'store'])->name('products.comments.store');

    Route::get('/', function () {
        return view('admin.index');
    });

    Route::get('/blkcreate', function () {
        return view('admin.blkcreate');
    });
    Route::get('/listindex', function () {
        return view('admin.listIndex');
    });


    Route::get('home', [WelcomeController::class, 'index'])->name('index');

    Route::get('home', [WelcomeController::class, 'index'])->name('home.index');
    Route::get('blog', [WelcomeController::class, 'blog'])->name('welcomes.blog');
    Route::get('blogdetails', [WelcomeController::class, 'blogDetails'])->name('blogdetails');
    Route::get('checkout', [WelcomeController::class, 'checkout'])->name('checkout');
    Route::get('shopcart', [WelcomeController::class, 'shopCart'])->name('shopcart');
    Route::get('shop', [WelcomeController::class, 'shop'])->name('shop');
    Route::get('shopdetails', [WelcomeController::class, 'shopDetails'])->name('shopdetails');
    Route::get('contact', [WelcomeController::class, 'contact'])->name('contact');

    Route::resource('banners', BannerController::class);
    Route::resource('posts', PostController::class);

    Route::get('/products/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');;
    Route::post('/products/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/products/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/products-trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::get('/products/{id}/restore', [ProductController::class, 'restore'])->name('product.restore');
    Route::delete('/products/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');


    Route::get('/categories-trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::get('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('/categories/{id}/delete', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::get('/categories-pdf', [CategoryController::class, 'pdf'])->name('categories.pdf');


    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::delete('/categories/{id}', [CategoryController::class, 'destory'])->name('categories.destory');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');


    Route::get('/colors-trash', [ColorController::class, 'trash'])->name('colors.trash');
    Route::get('/colors/{id}/restore', [ColorController::class, 'restore'])->name('colors.restore');
    Route::delete('/colors/{id}/delete', [ColorController::class, 'delete'])->name('colors.delete');


    Route::get('/colors', [ColorController::class, 'index'])->name('colors.index');
    Route::get('/colors/create', [ColorController::class, 'create'])->name('colors.create');
    Route::post('/colors/store', [ColorController::class, 'store'])->name('colors.store');
    Route::get('/colors/{id}', [ColorController::class, 'show'])->name('colors.show');
    Route::delete('/colors/{id}', [ColorController::class, 'destory'])->name('colors.destory');
    Route::get('/colors/{id}/edit', [ColorController::class, 'edit'])->name('colors.edit');
    Route::patch('/colors/{id}/update', [ColorController::class, 'update'])->name('colors.update');


    Route::get('/userlist', [ProfileController::class, 'index'])->name('user.index');
    Route::get('/user/destroy/{id}', [ProfileController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/user/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/user/role/{id}', [ProfileController::class, 'role'])->name('role.change');
    Route::patch('/user/role/{id}', [ProfileController::class, 'change'])->name('change.update');
    Route::get('/user-trash', [ProfileController::class, 'trash'])->name('user.trash');
    Route::get('/user/{id}/restore', [ProfileController::class, 'restore'])->name('user.restore');
    Route::delete('/user/{id}/delete', [ProfileController::class, 'delete'])->name('user.delete');
    Route::get('/user/{id}/show',[ProfileController::class, 'show'])->name('user.show');


    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/{id}', [RoleController::class, 'show'])->name('role.show');
    Route::delete('/role/{id}', [RoleController::class, 'destory'])->name('role.destroy');
    Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::patch('/role/{id}/update', [RoleController::class, 'update'])->name('role.update');
    Route::get('/role-trash', [RoleController::class, 'trash'])->name('role.trash');
    Route::get('/role/{id}/restore', [RoleController::class, 'restore'])->name('role.restore');
    Route::delete('/role/{id}/delete', [RoleController::class, 'delete'])->name('role.delete');
});