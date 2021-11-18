<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\SiteSettingController;
use App\Http\Controllers\backend\ReturnController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartpageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\PaypalController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\backend\CouponController;
use App\Http\Controllers\backend\ShippingDivisionController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\AdminUserRoleController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Models\User;

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


Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'Loginform']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

//admin all routes
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');

Route::middleware(['auth:admin'])->group(function(){
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/password/update', [AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');
});


//User all routes
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $data = User::find(Auth::user()->id);
    return view('dashboard', compact('data'));
})->name('dashboard');

Route::get('/', [IndexController::class, 'Index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/update', [IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('user.change.password');
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

//admin brand all routes
Route::prefix('brands')->group(function(){
    Route::get('/view', [BrandController::class, 'BrandView'])->name('admin.brands');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});

Route::prefix('categories')->group(function(){
    //admin category all routes
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('admin.categories');
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

    //admin subcategory all routes
    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('admin.subcategory');
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

    //admin subsubcategory all routes
    Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('admin.subsubcategory');
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    Route::get('/subsubcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
    Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
});

//admin product all routes
Route::prefix('products')->group(function(){
    Route::get('/add', [ProductController::class, 'ProductAdd'])->name('add.product');
    Route::post('/store', [ProductController::class, 'ProductStore'])->name('store.product');
    Route::get('/manage', [ProductController::class, 'ProductManage'])->name('manage.product');
    Route::get('/edit/{id}', [ProductController::class, 'ProductEdit'])->name('product.edit');
    Route::post('/update', [ProductController::class, 'ProductUpdate'])->name('update.product');
    Route::post('/image/update', [ProductController::class, 'ProductImageUpdate'])->name('image.update');
    Route::post('/thumbnail/image/update', [ProductController::class, 'ProductThumbnailUpdate'])->name('thumbnail.image.update');
    Route::get('/image/delete/{id}', [ProductController::class, 'ProductImageDelete'])->name('image.delete');
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactivate'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActivate'])->name('product.active');
    Route::get('/view/{id}', [ProductController::class, 'ProductView'])->name('product.view');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
});

//admin slider all routes
Route::prefix('slider')->group(function(){
    Route::get('/view', [SliderController::class, 'SliderView'])->name('manage.slider');
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
    Route::get('/active{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
});


//////Frontend all routes//////////
///Language route of frontend//

Route::get('language/english', [LanguageController::class, 'English'])->name('language.english');
Route::get('language/hindi', [LanguageController::class, 'Hindi'])->name('language.hindi');

///Product Detail page routes
Route::get('/product/detail/{id}/{slug}', [IndexController::class, 'ProductDetail']);

///product tags route
Route::get('/product/tags/{tag}', [IndexController::class, 'TagWiseProduct']);

///subcategory wise product
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubcategoryProduct']);

///subsubcategory wise product
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubsubcategoryProduct']);

///Product view with modal
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewModal']);

///product add to cart routes
Route::post('/product/cart/store/{id}', [CartController::class, 'AddToCart']);

//product mini cart route 
Route::get('/product/mini/cart/', [CartController::class, 'AddToMiniCart']);

//product mini cart remove route 
Route::get('/product/minicart/remove/{rowId}', [CartController::class, 'MiniCartRemove']);

//product add to wishlist route
Route::post('/product/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);


Route::group(['prefix' => 'user','middleware' => ['user','auth'],'namespace' => 'User'],function(){
    //wishlist page route
    Route::get('/product/wishlist/', [WishlistController::class, 'Wishlist_view'])->name('wishlist');

    //Get wishlist route
    Route::get('/get/wishlist/', [WishlistController::class, 'Get_Wishlist']);

    //remove wishlist route
    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'Remove_Wishlist']);

    //stripe payment
    Route::post('/stripe/payment/', [StripeController::class, 'StripePayment'])->name('stripe.payment');

    //paypal payment route
    Route::post('/paypal/payment', [PaypalController::class, 'PaypalPayment']);

    //cash on delivery payment
    Route::post('/cash/delivery/', [CashController::class, 'CashPayment'])->name('cash.payment');

    //user my order page route
    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');

    //user my order view page route
    Route::get('/order/view/{order_id}', [AllUserController::class, 'OrderView']);

    //user my order invoice page route
    Route::get('/invoice/download/{order_id}', [AllUserController::class, 'InvoiceDownload']);

    //user return order reason route
    Route::post('/return/reason/{order_id}', [AllUserController::class, 'ReturnReason'])->name('return.reason');

    //user return order page route
    Route::get('/return/orders', [AllUserController::class, 'ReturnOrders'])->name('return.orders');

    //user cancel order page route
    Route::get('/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.order');

    //order tracking route
    Route::post('/order/tracking', [AllUserController::class, 'OrderTracking'])->name('order.tracking');
});

//remove wishlist route
Route::get('/product/mycart', [CartpageController::class, 'Cartpage_view'])->name('mycart');

//get cart product route
Route::get('/user/get/mycart/', [CartpageController::class, 'Get_Mycart']);

//remove cart product route
Route::get('/user/cart-remove/{rowId}', [CartpageController::class, 'Remove_Mycart']);

//increment cart product route
Route::get('/cart-increment/{rowId}', [CartpageController::class, 'Increment_Mycart']);

//decrement cart product route
Route::get('/cart-decrement/{rowId}', [CartpageController::class, 'Decrement_Mycart']);

///admin Coupon All routes
Route::prefix('coupons')->group(function(){
    Route::get('/view', [CouponController::class,'CouponView'])->name('manage.coupon');
    Route::post('/store', [CouponController::class,'CouponStore'])->name('coupon.store');
    Route::get('/edit/{id}', [CouponController::class,'CouponEdit'])->name('coupon.edit');
    Route::post('/update/{id}', [CouponController::class,'CouponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class,'CouponDelete'])->name('coupon.delete');
});

///admin Shipping All routes
Route::prefix('shipping')->group(function(){
    ///shipping division routes
    Route::get('/division/view', [ShippingDivisionController::class,'DivisionView'])->name('manage.division');
    Route::post('/division/store', [ShippingDivisionController::class,'DivisionStore'])->name('division.store');
    Route::get('/division/edit/{id}', [ShippingDivisionController::class,'DivisionEdit'])->name('division.edit');
    Route::post('/division/update/{id}', [ShippingDivisionController::class,'DivisionUpdate'])->name('division.update');
    Route::get('/division/delete/{id}', [ShippingDivisionController::class,'DivisionDelete'])->name('division.delete');

    ///shipping district routes
    Route::get('/district/view', [ShippingDivisionController::class,'DistrictView'])->name('manage.district');
    Route::post('/district/store', [ShippingDivisionController::class,'DistrictStore'])->name('district.store');
    Route::get('/district/edit/{id}', [ShippingDivisionController::class,'DistrictEdit'])->name('district.edit');
    Route::post('/district/update/{id}', [ShippingDivisionController::class,'DistrictUpdate'])->name('district.update');
    Route::get('/district/delete/{id}', [ShippingDivisionController::class,'DistrictDelete'])->name('district.delete');

    ///shipping state routes
    Route::get('/state/view', [ShippingDivisionController::class,'StateView'])->name('manage.state');
    Route::get('/get/district/{id}', [ShippingDivisionController::class,'GetDistrict']);
    Route::post('/state/store', [ShippingDivisionController::class,'StateStore'])->name('state.store');
    Route::get('/state/edit/{id}', [ShippingDivisionController::class,'StateEdit'])->name('state.edit');
    Route::post('/state/update/{id}', [ShippingDivisionController::class,'StateUpdate'])->name('state.update');
    Route::get('/state/delete/{id}', [ShippingDivisionController::class,'StateDelete'])->name('state.delete');
});

//frontend coupon route
Route::post('/apply-coupon', [CartController::class,'ApplyCoupon']);
Route::get('/coupon-calulate', [CartController::class,'CalculateCoupon']);
Route::get('/coupon-remove', [CartController::class,'RemoveCoupon']);

///frontend checkout route
Route::get('/checkout', [CartController::class,'CheckoutView'])->name('checkout');
Route::get('/get-district/ajax/{division_id}', [CheckoutController::class,'GetDistrictAjax']);
Route::get('/get-state/ajax/{district_id}', [CheckoutController::class,'GetStateAjax']);
Route::post('/checkout/store', [CheckoutController::class,'CheckoutStore'])->name('checkout.store');

///admin orders All routes
Route::prefix('orders')->group(function(){
    Route::get('/pending/orders', [OrderController::class,'PendingOrder'])->name('pending.orders');
    Route::get('/pending/orders/details/{order_id}', [OrderController::class,'PendingOrderDetails'])->name('pending.order.details');
    Route::get('/confirmed/orders', [OrderController::class,'ConfirmedOrder'])->name('confirmed.orders');
    Route::get('/processing/orders', [OrderController::class,'ProcessingOrder'])->name('processing.orders');
    Route::get('/picked/orders', [OrderController::class,'PickedOrder'])->name('picked.orders');
    Route::get('/shipped/orders', [OrderController::class,'ShippedOrder'])->name('shipped.orders');
    Route::get('/delivered/orders', [OrderController::class,'DeliveredOrder'])->name('delivered.orders');
    Route::get('/cancel/orders', [OrderController::class,'CancelOrder'])->name('cancel.orders');
    Route::get('/pending/confirm/{order_id}', [OrderController::class,'PendingToConfirm'])->name('pending-confirm');
    Route::get('/confirm/process/{order_id}', [OrderController::class,'ConfirmToProcessing'])->name('confirm-process');
    Route::get('/process/picked/{order_id}', [OrderController::class,'ProcessingToPicked'])->name('process-picked');
    Route::get('/picked/shipped/{order_id}', [OrderController::class,'PickedToShipped'])->name('picked-shipped');
    Route::get('/shipped/delivered/{order_id}', [OrderController::class,'ShippedToDelivered'])->name('shipped-delivered');
    Route::get('/delivered/cancel/{order_id}', [OrderController::class,'DeliveredToCancel'])->name('delivered-cancel');
    Route::get('/invoice-download/{order_id}', [OrderController::class,'InvoiceDownload'])->name('admin.invoice');
});

//admin reports all routes
Route::prefix('reports')->group(function(){
    Route::get('/view', [ReportController::class,'ReportView'])->name('reports.all');
    Route::post('/search/by/date', [ReportController::class,'ReportDate'])->name('search.date');
    Route::post('/search/by/month-year', [ReportController::class,'ReportMonthYear'])->name('search.month.year');
    Route::post('/search/by/month', [ReportController::class,'ReportYear'])->name('search.year');
});

//admin user all routes
Route::prefix('allusers')->group(function(){
    Route::get('/view', [AdminProfileController::class,'AllUserView'])->name('all.user');
});

//admin blog management routes
Route::prefix('blog')->group(function(){
    Route::get('/manage/category', [BlogController::class,'BlogCategory'])->name('manage.blog.category');
    Route::post('/category/store', [BlogController::class,'BlogCategoryStore'])->name('blogcategory.store');
    Route::get('/category/edit/{id}', [BlogController::class,'BlogCategoryEdit'])->name('blogcategory.edit');
    Route::post('/category/update', [BlogController::class,'BlogCategoryUpdate'])->name('blogcategory.update');
    Route::get('/category/delete/{id}', [BlogController::class,'BlogCategoryDelete'])->name('blogcategory.delete');
    ////blog post admin all routes
    Route::get('/post/add', [BlogController::class,'BlogPostAdd'])->name('blog.post.add');
    Route::get('/post/view', [BlogController::class,'BlogPostView'])->name('blog.post.list');
    Route::post('/post/store', [BlogController::class,'BlogPostStore'])->name('store.blogpost');
    Route::get('/post/edit/{id}', [BlogController::class,'BlogEdit'])->name('blog.edit');
    Route::post('/post/update', [BlogController::class,'BlogPostUpdate'])->name('update.blogpost');
    Route::get('/post/delete/{id}', [BlogController::class,'BlogDelete'])->name('blog.delete');
});

// Frontend blog
Route::get('/blog', [HomeBlogController::class,'AddBlogList'])->name('home.blog');
Route::get('/blog/post/details/{id}', [HomeBlogController::class,'BlogDetails'])->name('blog.details');
Route::get('/blog/category/{category_id}', [HomeBlogController::class,'BlogCategoryDetails']);


//admin blog management routes
Route::prefix('site')->group(function(){
    Route::get('/settings', [SiteSettingController::class,'SiteSetting'])->name('manage.site.settings');
    Route::post('/settings/update', [SiteSettingController::class,'SiteSettingUpdate'])->name('site.setting.update');
    Route::get('/seo', [SiteSettingController::class,'SeoSetting'])->name('manage.seo.settings');
    Route::post('/seo/update', [SiteSettingController::class,'SeoSettingUpdate'])->name('seo.setting.update');
});


//admin return request management routes
Route::prefix('return')->group(function(){
    Route::get('/admin/request', [ReturnController::class,'ReturnOrders'])->name('manage.return.request');
    Route::get('/admin/return/approve/{id}', [ReturnController::class,'ReturnOrdersApprove'])->name('return.order.approve');
    Route::get('/all/request', [ReturnController::class,'AllReturnOrders'])->name('all.return.request');
});

//User All Reviews Routes
Route::post('/review/store', [ReviewController::class,'ReviewStore'])->name('review.store');

//admin review management routes
Route::prefix('review')->group(function(){
    Route::get('/pending/list', [ReviewController::class,'PendingReview'])->name('manage.pending.review');
    Route::get('/pending/approve/{id}', [ReviewController::class,'PendingReviewApprove'])->name('review.approve');
    Route::get('/publish/list', [ReviewController::class,'PublishReview'])->name('manage.publish.review');
    Route::get('/delete/{id}', [ReviewController::class,'DeleteReview'])->name('review.delete');
});

//admin product stock management routes
Route::prefix('stock')->group(function(){
    Route::get('/products', [ProductController::class,'ProductStockManage'])->name('product.stock');
    
});

//admin user role management routes
Route::prefix('adminuserrole')->group(function(){
    Route::get('/list', [AdminUserRoleController::class,'AdminUserList'])->name('admin.user.role');
    Route::get('/add', [AdminUserRoleController::class,'AddAdminUser'])->name('add.admin.user');
    Route::post('/store', [AdminUserRoleController::class,'AdminUserStore'])->name('admin.user.store');
    Route::get('/edit/{id}', [AdminUserRoleController::class,'EditAdminUser'])->name('edit.admin.user');
    Route::post('/update', [AdminUserRoleController::class,'UpdateAdminUser'])->name('admin.user.update');
    Route::get('/delete/{id}', [AdminUserRoleController::class,'DeleteAdminUser'])->name('delete.admin.user');
});