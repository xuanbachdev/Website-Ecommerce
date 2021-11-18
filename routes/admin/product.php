<?php
// Product
Route::prefix('product')->group(function () {

    Route::get('/', [
        'as' => 'product.index',
        'uses' => 'ProductController@index',
        'middleware' => 'can:product-list'
    ]);

    Route::get('/search', [
        'as' => 'product.search',
        'uses' => 'ProductController@search'
    ]);

    Route::get('/create', [
        'as' => 'product.create',
        'uses' => 'ProductController@create',
        'middleware' => 'can:product-add'
    ]);

    Route::post('/store', [
        'as' => 'product.store',
        'uses' => 'ProductController@store'
    ]);

    Route::get('/edit/{product_id}', [
        'as' => 'product.edit',
        'uses' => 'ProductController@edit',
        'middleware' => 'can:product-edit'
    ]);

    Route::post('/update/{product_id}', [
        'as' => 'product.update',
        'uses' => 'ProductController@update'
    ]);

    Route::get('/delete/{product_id}', [
        'as' => 'product.delete',
        'uses' => 'ProductController@delete',
        'middleware' => 'can:product-delete'
    ]);

});
