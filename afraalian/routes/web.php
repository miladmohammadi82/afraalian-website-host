<?php

use App\Http\Controllers\AddressController as ControllersAddressController;
use App\Http\Controllers\API\userController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\back\adminController;
use App\Http\Controllers\back\CommentArticleController;
use App\Http\Controllers\back\CommentProductController;
use App\Http\Controllers\back\OrderController as BackOrderController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\front\AddressController;
use App\Http\Controllers\front\ArticleCommentController;
use App\Http\Controllers\front\ArticleController as FrontArticleController;
use App\Http\Controllers\front\cartController as FrontCartController;
use App\Http\Controllers\front\categoryController as FrontCategoryController;
use App\Http\Controllers\front\CommentProductController as FrontCommentProductController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\indexController as FrontIndexController;
use App\Http\Controllers\front\OrderController as FrontOrderController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\LikePostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitemapController;
use Faker\Provider\cs_CZ\Address;
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

Route::get('/', [FrontIndexController::class, 'index'])->name('index.page');

Route::get('/product/{product}', [FrontIndexController::class, 'show'])->name('show.product.index.page');

Route::post('/product/comment/{product}', [FrontCommentProductController::class, 'store'])->name('carte.comment.product.store');

Route::get('/sitemap.xml', [SitemapController::class, 'sitemap']);


Route::get('/cart', [FrontCartController::class, 'index'])->name('cart.page');
Route::post('/cart', [FrontCartController::class, 'store'])->name('carte.store');
Route::post('/cart/delete/{id}', [FrontCartController::class, 'destroy'])->name('carte.delete');
Route::post('/cart/update/{id}', [FrontCartController::class, 'update'])->name('carte.update');


Route::get('/category/{category}', [FrontCategoryController::class, 'show'])->name('show.category.page');



Route::prefix('checkout')->middleware('CheckAuthForCheckOut', 'auth')->group(function (){
    Route::get('/', [FrontCartController::class, 'checkout'])->name('checkout.page');
    Route::get('/edit-address-checkout/{address}', [FrontCartController::class, 'edit'])->name('edit.checkout.page');
    Route::post('/edit-address-checkout/{address}', [FrontCartController::class, 'updateAddress'])->name('update.checkout.page');
    Route::get('/getCity/{id}', [FrontCartController::class, 'getCity'])->name('getState.checkout.page');
});

// Start Route Pay

Route::prefix('zarinpal')->middleware('auth')->group(function (){
    Route::get('/payment', [PaymentController::class, 'payment'])->name('zarinpal.payment');
    Route::get('/paymentVerify/{orderId}', [PaymentController::class, 'paymentVerify'])->name('zarinpal.paymentVerify');
    Route::get('/success', [PaymentController::class, 'success'])->name('zarinpal.success');
});

// END Route Pay



Route::get('/like', function (){
    return back();
})->name('redirect.auth.like.post')->middleware('auth');

Route::post('/like/{article:slug}', [LikePostController::class, 'store'])->name('like.post')->middleware('auth');
Route::get('/article/{slug}', [FrontArticleController::class, 'show'])->name('article.show.page');


Route::middleware('auth')->group(function (){
    Route::post('/new-article-comment/{articleId}', [ArticleCommentController::class, 'store'])->name('create.new.comment-article');
    Route::post('/new-article-comment-replay', [ArticleCommentController::class, 'replay'])->name('create.new.replay-article');
});

Route::middleware('auth')->group(function (){
    Route::post('/new-product-comment/{productId}', [FrontCommentProductController::class, 'store'])->name('create.new.comment-product');
    Route::post('/new-product-comment-replay', [FrontCommentProductController::class, 'replay'])->name('create.new.replay-product');
});


Route::resource('orders', OrderController::class)->middleware('CheckAuthForCheckOut', 'auth');
Route::get('/search', [FrontIndexController::class, 'search'])->name('search');

Route::prefix('contact')->group(function (){
    Route::get('/', [ContactController::class, 'index'])->name('contact.page');
    Route::post('/store-contact-message', [ContactController::class, 'store'])->name('store.contact.page');
});


Route::get('/about', function() {
    return view('front.pages.aboutPage');
})->name('about.page');


// User EnterFace
Route::get('/profile/edit-profile', function(){
    return view('profile.profile-show');
})->name('editProfile.information')->middleware('auth');

Route::get('/profile', function(){
    return view('profile.profile-show-edit');
})->middleware('auth');

Route::get('/profile/show-edit-password', function(){
    return view('profile.edit-password-user');
})->name('editUserPassword')->middleware('auth');


Route::get('/profile/comments', [FrontCommentProductController::class, 'index'])->name('profile.show.comments');
Route::get('/profile/likes', [LikePostController::class, 'index'])->name('profile.show.likes');


// Start admin router

Route::prefix('admin')->middleware('checkRole')->group(function (){
    Route::get('/', [adminController::class, 'index'])->name('admin.page');
    Route::get('/dashboard', [adminController::class, 'dashboardPage'])->name('admin.dashboard.page');
});

Route::prefix('admin/users')->middleware('checkRole')->group(function (){
    Route::get('/', [userController::class, 'index'])->name('showUsers.admin.panel');
    Route::get('/edit-users/{user}', [userController::class, 'edit'])->name('editUser.admin.panel');
    Route::post('/edit-users/{user}', [userController::class, 'update'])->name('updateUser.admin.panel');
    Route::post('/delete-users/{user}', [userController::class, 'destroy'])->name('destroyUser.admin.panel');
    Route::get('/new-user', [userController::class, 'newUser'])->name('newUser.admin.panel');
    Route::post('/create-user', [userController::class, 'store'])->name('createUser.admin.panel');
});


Route::prefix('admin/categories')->middleware('checkRole')->group(function (){
    Route::get('/add-new', [CategoryController::class, 'addNewCategory'])->name('addNewCategories.admin.panel');
    Route::get('/', [CategoryController::class, 'index'])->name('showCategories.admin.panel');
    Route::get('/{category}', [CategoryController::class, 'editActive'])->name('editActive.admin.panel');
    Route::post('/create-new-category', [CategoryController::class, 'store'])->name('createNewCategories.admin.panel');
    Route::get('/edit-category/{category}', [CategoryController::class, 'edit'])->name('editCategories.admin.panel');
    Route::post('/update-category/{category}', [CategoryController::class, 'update'])->name('updateCategories.admin.panel');
    Route::post('/delete-category/{category}', [CategoryController::class, 'destroy'])->name('deleteCategories.admin.panel');
});

Route::prefix('admin/products')->middleware('checkRole')->group(function (){
    Route::get('/add-new-product', [ProductController::class, 'newProductPage'])->name('newProductPage.admin.panel');
    Route::get('/', [ProductController::class, 'index'])->name('products.admin.panel');
    Route::get('/{product}', [ProductController::class, 'editActive'])->name('editActive.product.admin.panel');
    Route::post('/store-new-product', [ProductController::class, 'store'])->name('storeNew.product.admin.panel');
    Route::get('/edit-product/{product}', [ProductController::class, 'edit'])->name('edit.product.admin.panel');
    Route::post('/edit-product/{product}', [ProductController::class, 'update'])->name('update.product.admin.panel');
    Route::post('/delete-product/{product}', [ProductController::class, 'destroy'])->name('destroy.product.admin.panel');
});

Route::prefix('admin/comments-product')->middleware('checkRole')->group(function (){
    Route::get('/', [CommentProductController::class, 'index'])->name('products-comment.admin.panel');
    Route::get('/{comment}', [CommentProductController::class, 'editActive'])->name('editComment.product-comment.admin.panel');
    Route::get('/edit-product-comment/{comment}', [CommentProductController::class, 'edit'])->name('edit.product-comment.admin.panel');
    Route::post('/edit-product-comment/{comment}', [CommentProductController::class, 'update'])->name('update.product-comment.admin.panel');
    Route::post('/delete-product-comment/{comment}', [CommentProductController::class, 'destroy'])->name('destroy.product-comment.admin.panel');
});



Route::prefix('admin/address')->middleware('checkRole')->group(function (){
    Route::get('/', [ControllersAddressController::class, 'showAddressesUserAdminPanel'])->name('address.admin.panel');
});




Route::prefix('admin/articles')->middleware('checkRole')->group(function (){
    Route::get('/', [ArticleController::class, 'index'])->name('articles.admin.panel');
    Route::get('/edit-article-status/{articles}', [ArticleController::class, 'editStatus'])->name('articles.edit.status.admin.panel');
    Route::post('/delete-article/{articles}', [ArticleController::class, 'destroy'])->name('articles.delete.admin.panel');
    Route::get('/edit-article/{articles}', [ArticleController::class, 'edit'])->name('articles.edit.admin.panel');
    Route::post('/update-article/{articles}', [ArticleController::class, 'update'])->name('articles.update.admin.panel');
    Route::get('/new-article', [ArticleController::class, 'create'])->name('articles.create.admin.panel');
    Route::post('/new-article', [ArticleController::class, 'store'])->name('articles.store.admin.panel');
});

Route::prefix('admin/comments-article')->middleware('checkRole')->group(function (){
    Route::get('/', [CommentArticleController::class, 'index'])->name('comments.article.admin.panel');
    Route::get('/{comment}', [CommentArticleController::class, 'editStatus'])->name('editStatus.comment.article.admin.panel');
    Route::post('/delete{comment}', [CommentArticleController::class, 'destroy'])->name('destroy.comment.article.admin.panel');
});

Route::prefix('admin/orders')->middleware('checkRole')->group(function (){
    Route::get('/', [BackOrderController::class, 'index'])->name('orders.show.admin.panel');
    Route::get('/{order}', [BackOrderController::class, 'show'])->name('order.show.admin.panel');
    Route::get('/edit-shipping_status/{order}', [BackOrderController::class, 'editShippingStatus'])->name('order.edit.shipping.status.admin.panel');
});


// End admin router

// Start profile Route

Route::prefix('profile/address')->middleware('checkRole', 'auth')->group(function (){
    Route::get('/', [ControllersAddressController::class, 'index'])->name('address.user.profile');
    Route::get('/edit-address/{address}', [ControllersAddressController::class, 'edit'])->name('edit.address.user.profile');
    Route::post('/edit-address/{address}', [ControllersAddressController::class, 'update'])->name('update.address.user.profile');
});

Route::prefix('profile/orders')->middleware('auth')->group(function (){
    Route::get('/', [FrontOrderController::class, 'index'])->name('orders.user.profile');
});

// END profile Route


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
