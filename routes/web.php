<?php

//Website Routes and Template Routes
Route::namespace('Template')->group(function(){

    //Static and Self Defined Routes for Custom Pages
    Route::get('/','SiteController@index')->name('index');

    //Blog Pages and Sub Pages
    Route::namespace('Blog')->prefix('blog')->group(function(){

        Route::get('','BlogController@index')->name('blog_index');


        //Vue Component Routes For Blog behind a middleware denying browser requests
        Route::middleware('ajax')->group(function(){
            Route::get('getFeatured','BlogController@getFeatured')->name('blog_featured_vue');
            Route::get('latest_post','BlogController@getLatests')->name('blog_latests_vue');
        });

    });

});


//Admin Routes and Voyager Stuff
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



//Adding this at the end to make provision for all pages that has been activated from the CMS Section
Route::namespace('CMSPages')->group(function(){
    Route::get('/{any}','PageController@index');
});
