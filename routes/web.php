<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => '/'], function () {
	// Route::get('/', function(){
	// 	return view('web.index');
	// })->name('web.home');
	
	Route::get('/about-us', function(){
		return view('web.about');
	})->name('web.about-us');

	Route::get('/', 'Web\WebController@index')->name('web.home');
	Route::get('/collaborators', 'Web\WebController@collaborators')->name('web.collaborators');
	Route::get('/companies', ['as' => 'web.companies', 'uses' => 'Web\WebController@companies']);
	Route::get('/products/{cid}', ['as' => 'allProductsRoute', 'uses' => 'Web\WebController@products']);
	Route::get('/product_desc/{pid}', 'Web\WebController@product_desc')->name('web.product_desc');
	Route::get('/clients', 'Web\WebController@clients')->name('web.clients');

});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

 Route::group(['prefix' => '/admin'], function () {
	Route::get('/', ['as' => 'homePage', 'uses' => 'WebController@index']);
	
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {
	Route::get('/dashboard', ['as' => 'dashboardRoute', 'uses' => 'DashboardController@index']);

	/*** For Category ***/
	Route::resource('categories', 'CategoryController');
	Route::get('/get-categories', ['as' => 'getCategoriesRoute', 'uses' => 'CategoryController@get']);
	Route::get('/categories/published/{id}', ['as' => 'publishedCategoriesRoute', 'uses' => 'CategoryController@published']);
	Route::get('/categories/unpublished/{id}', ['as' => 'unpublishedCategoriesRoute', 'uses' => 'CategoryController@unpublished']);

	/*** For Company ***/
	Route::resource('companies', 'CompanyController');
	Route::get('/get-companies', ['as' => 'getCompaniesRoute', 'uses' => 'CompanyController@get']);
	Route::get('/companies/published/{id}', ['as' => 'publishedCompaniesRoute', 'uses' => 'CompanyController@published']);
	Route::get('/companies/unpublished/{id}', ['as' => 'unpublishedCompaniesRoute', 'uses' => 'CompanyController@unpublished']);

	/*** For Tag ***/
	Route::resource('tags', 'TagController');
	Route::get('/get-tags', ['as' => 'getTagsRoute', 'uses' => 'TagController@get']);
	Route::get('/tags/published/{id}', ['as' => 'publishedTagsRoute', 'uses' => 'TagController@published']);
	Route::get('/tags/unpublished/{id}', ['as' => 'unpublishedTagsRoute', 'uses' => 'TagController@unpublished']);

	/*** For Product ***/
	Route::resource('products', 'ProductController');
	Route::get('/get-products', ['as' => 'getProductsRoute', 'uses' => 'ProductController@get']);
	Route::get('/products/published/{id}', ['as' => 'publishedProductsRoute', 'uses' => 'ProductController@published']);
	Route::get('/products/unpublished/{id}', ['as' => 'unpublishedProductsRoute', 'uses' => 'ProductController@unpublished']);

	/*** For Post ***/
	Route::resource('posts', 'PostController');
	Route::get('/get-posts', ['as' => 'getPostsRoute', 'uses' => 'PostController@get']);
	Route::get('/posts/published/{id}', ['as' => 'publishedPostsRoute', 'uses' => 'PostController@published']);
	Route::get('/posts/unpublished/{id}', ['as' => 'unpublishedPostsRoute', 'uses' => 'PostController@unpublished']);

	/*** For Subscriber ***/
	Route::resource('subscribers', 'SubscriberController');
	Route::get('/get-subscribers', ['as' => 'getSubscribersRoute', 'uses' => 'SubscriberController@get']);

	/*** For Setting ***/
	Route::resource('setting', 'SettingController');
	Route::post('/setting/logo/{id}', ['as' => 'settingLogoRoute', 'uses' => 'SettingController@logo']);
	Route::post('/setting/favicon/{id}', ['as' => 'settingFaviconRoute', 'uses' => 'SettingController@favicon']);
	Route::post('/setting/general/{id}', ['as' => 'settingGeneralRoute', 'uses' => 'SettingController@general']);
	Route::post('/setting/contact/{id}', ['as' => 'settingContactRoute', 'uses' => 'SettingController@contact']);
	Route::post('/setting/address/{id}', ['as' => 'settingAddressRoute', 'uses' => 'SettingController@address']);
	Route::post('/setting/social/{id}', ['as' => 'settingSocialRoute', 'uses' => 'SettingController@social']);
	Route::post('/setting/meta/{id}', ['as' => 'settingMetaRoute', 'uses' => 'SettingController@meta']);
	Route::post('/setting/gallery-meta/{id}', ['as' => 'settingGalleryMetaRoute', 'uses' => 'SettingController@gallery_meta']);

	/*** For Profile ***/
	Route::resource('profile', 'ProfileController');
	Route::post('/profile/avatar/{id}', ['as' => 'profileAvatarRoute', 'uses' => 'ProfileController@avatar']);
	Route::post('/profile/update-password', ['as' => 'profileUpdatePasswordRoute', 'uses' => 'ProfileController@update_password']);

	/*** For User ***/
	Route::resource('users', 'UserController');

	/*** For Comment ***/
	Route::resource('comments', 'CommentController');
	Route::get('/get-comments', ['as' => 'getCommentsRoute', 'uses' => 'CommentController@get']);
	Route::get('/comments/published/{id}', ['as' => 'publishedCommentsRoute', 'uses' => 'CommentController@published']);
	Route::get('/comments/unpublished/{id}', ['as' => 'unpublishedCommentsRoute', 'uses' => 'CommentController@unpublished']);

	/*** For Page ***/
	Route::resource('pages', 'PageController');
	Route::get('/get-pages', ['as' => 'getPagesRoute', 'uses' => 'PageController@get']);
	Route::get('/pages/published/{id}', ['as' => 'publishedPagesRoute', 'uses' => 'PageController@published']);
	Route::get('/pages/unpublished/{id}', ['as' => 'unpublishedPagesRoute', 'uses' => 'PageController@unpublished']);

	/*** For Gallery ***/
	Route::resource('galleries', 'GalleryController');
	Route::get('/get-galleries', ['as' => 'getGalleriesRoute', 'uses' => 'GalleryController@get']);
	Route::get('/galleries/published/{id}', ['as' => 'publishedGalleriesRoute', 'uses' => 'GalleryController@published']);
	Route::get('/galleries/unpublished/{id}', ['as' => 'unpublishedGalleriesRoute', 'uses' => 'GalleryController@unpublished']);

});

Auth::routes();