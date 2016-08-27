<?php

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
	]);

Route::group(['prefix'=>'admin','middleware'=>'isroleadmin'], function() {

	Route::get('dashboard',['as'=>'admin.getDashboard','uses'=>'DashboardController@getDashboard']);

	Route::group(['prefix'=>'cate'], function() {
		Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
		Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
		Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
		Route::get('detail/{id}',['as'=>'admin.cate.getDetail','uses'=>'CateController@getDetail']);
	});

	Route::group(['prefix'=>'product'], function() {
		Route::get('list',['as'=>'admin.product.getList','uses'=>'ProductController@getList']);
		Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
		Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);
		Route::get('delete_img/{id}',['uses'=>'ProductController@getDelete_img']);
		Route::get('detail/{id}',['as'=>'admin.product.getDetail','uses'=>'ProductController@getDetail']);
		Route::get('out-of-stock',['as'=>'admin.product.getOutofStock','uses'=>'ProductController@getOutofStock']);
		Route::get('product-sale',['as'=>'admin.product.getSale','uses'=>'ProductController@getSale']);
		Route::get('sale-list',['as'=>'admin.product.getListSale','uses'=>'ProductController@getListSale']);
		Route::get('save-sale',['as'=>'admin.product.saveSale','uses'=>'ProductController@saveSale']);
		Route::get('restore-price/{id}',['as'=>'admin.product.restorePrice','uses'=>'ProductController@restorePrice']);
	});

	Route::group(['prefix'=>'user'], function() {
		Route::get('list',['as'=>'admin.user.getList','uses'=>'UserController@getList']);
		Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);
		Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
		Route::get('detail/{id}',['as'=>'admin.user.getDetail','uses'=>'UserController@getDetail']);
	});

	Route::group(['prefix'=>'province'], function() {
		Route::get('list',['as'=>'admin.province.getList','uses'=>'ProvinceController@getList']);
		Route::get('add',['as'=>'admin.province.getAdd','uses'=>'ProvinceController@getAdd']);
		Route::post('add',['as'=>'admin.province.postAdd','uses'=>'ProvinceController@postAdd']);
		Route::get('delete/{id}',['as'=>'admin.province.getDelete','uses'=>'ProvinceController@getDelete']);
	});

	Route::group(['prefix'=>'transaction'], function() {
		Route::get('list',['as'=>'admin.transaction.getList','uses'=>'TransactionController@getList']);
		Route::get('list-order-detail',['as'=>'admin.transaction.getListOrderDetail','uses'=>'TransactionController@getListOrderDetail']);
		Route::get('order-detail/{id}',['as'=>'admin.transaction.orderDetail','uses'=>'TransactionController@orderDetail']);
		Route::get('sent/{id}',['as'=>'admin.transaction.sent','uses'=>'TransactionController@sent']);
		Route::get('delay/{id}',['as'=>'admin.transaction.delay','uses'=>'TransactionController@delay']);
		Route::get('delete/{id}',['as'=>'admin.transaction.delete','uses'=>'TransactionController@delete']);
		Route::get('ship',['as'=>'admin.transaction.ship','uses'=>'TransactionController@ship']);
	});

	Route::group(['prefix'=>'customer'], function() {
		Route::get('list',['as'=>'admin.customer.getList','uses'=>'CustomerController@getList']);
		Route::get('delete/{id}',['as'=>'admin.customer.getDelete','uses'=>'CustomerController@getDelete']);
		Route::get('total-guest',['as'=>'admin.customer.totalGuest','uses'=>'CustomerController@totalGuest']);
	});

	Route::group(['prefix'=>'display'], function() {
		Route::get('intro',['as'=>'admin.display.getIntro','uses'=>'DisplayController@getIntro']);
		Route::post('introduction',['as'=>'admin.display.postIntroduction','uses'=>'DisplayController@postIntroduction']);
		Route::post('shopping',['as'=>'admin.display.postShopping','uses'=>'DisplayController@postShopping']);
		Route::get('img-pages-index',['as'=>'admin.display.getImagePageIndex','uses'=>'DisplayController@getImagePageIndex']);
		Route::post('img-pages-index',['as'=>'admin.display.postImagePageIndex','uses'=>'DisplayController@postImagePageIndex']);
		Route::post('img-header-page',['as'=>'admin.display.postImagePage','uses'=>'DisplayController@postImagePage']);
		Route::get('img-pages/{id}',['as'=>'admin.display.getImagePage','uses'=>'DisplayController@getImagePage']);
		Route::get('contact-page',['as'=>'admin.display.contactPage','uses'=>'DisplayController@contactPage']);
		Route::post('contact-page',['as'=>'admin.display.postContactPage','uses'=>'DisplayController@postContactPage']);
		Route::get('policy',['as'=>'admin.display.getPolicy','uses'=>'DisplayController@getPolicy']);
		Route::post('policy',['as'=>'admin.display.postPolicy','uses'=>'DisplayController@postPolicy']);
	});

	Route::group(['prefix'=>'comment'], function() {
		Route::get('list',['as'=>'admin.comment.getList','uses'=>'CommentController@getList']);
		Route::get('see/{id}',['as'=>'admin.comment.getSee','uses'=>'CommentController@getSee']);
		Route::get('delete/{id}',['as'=>'admin.comment.getDelete','uses'=>'CommentController@getDelete']);
	});
});

Route::get('/',['as'=>'home','uses'=>'PagesController@index']);
Route::get('gioi-thieu.html',['as'=>'intro','uses'=>'PagesController@intro']);
Route::get('lien-he.html',['as'=>'contact','uses'=>'PagesController@contact']);
Route::post('lien-he',['as'=>'postContact','uses'=>'PagesController@postContact']);
Route::get('shop.html',['as'=>'shop','uses'=>'PagesController@shop']);
Route::get('hang-giam-gia.html',['as'=>'sale','uses'=>'PagesController@sale']);
Route::get('mua-hang/{id}',['as'=>'addCart','uses'=>'PagesController@addCart']);
Route::get('them-gio-hang',['as'=>'addCartajax','uses'=>'PagesController@addCartajax']);
Route::get('gio-hang.html',['as'=>'cart','uses'=>'PagesController@cart']);
Route::get('xoa-hang/{rowId}',['as'=>'delProductCart','uses'=>'PagesController@delProductCart']);
Route::get('sua-gio-hang',['as'=>'updateProductCart','uses'=>'PagesController@updateProductCart']);
Route::get('xoa-gio-hang',['as'=>'delCart','uses'=>'PagesController@delCart']);
Route::get('thanh-toan.html',['as'=>'checkout','uses'=>'PagesController@checkout']);
Route::post('thanh-toan.html',['as'=>'postCheckout','uses'=>'PagesController@postCheckout']);
Route::get('loai-san-pham/{id}/{alias}.html',['as'=>'cate','uses'=>'PagesController@cate']);
Route::get('san-pham/{id}/{alias}.html',['as'=>'product','uses'=>'PagesController@product']);
Route::get('thong-tin-tai-khoan/{id}/{name}',['as'=>'userinfo','uses'=>'PagesController@userinfo']);
Route::post('cap-nhat-tai-khoan',['as'=>'postUserinfo','uses'=>'PagesController@postUserinfo']);
Route::get('lich-su-giao-dich',['as'=>'historyCheckout','uses'=>'PagesController@historyCheckout']);
Route::get('tim-kiem',['as'=>'search','uses'=>'PagesController@search']);
Route::get('mail',['as'=>'mail','uses'=>'PagesController@mail']);


Route::get('google', function() {return redirect('https://plus.google.com/+ThyHo%C3%A0ngthy/posts');});
Route::get('facebook', function() {return redirect('https://www.facebook.com/hoangthy.bien');});
Route::get('404','PagesController@errorPage');


//Route::any('{all?}','PagesController@errorPage')->where('all','(.*)');



