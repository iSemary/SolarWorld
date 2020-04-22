<?php


Auth::routes();


// Admin Routes
Route::group(['middleware' => ['auth', 'CheckRole']], function() {
    // Admin/Moderator Dashboard
    Route::get('/admin/dashboard', 'AdminController@index')->name('admin.dashboard');
    // Show Administrators / Editors
    Route::get('/admin/users-list', 'ManageUsersController@index')->name('admin.users_show');
    // File Explorer
    Route::get('/admin/file-explorer', 'AdminController@explorer')->name('admin.explorer');
    // Control Users
    Route::post('/admin/users-list/delete', 'ManageUsersController@delete')->name('admin.users_delete');
    Route::post('/admin/users-list/edit', 'ManageUsersController@edit')->name('admin.users_edit');
    Route::post('/admin/users-list/promote', 'ManageUsersController@promote')->name('admin.users_promote');
    // Control Mods
    Route::post('/admin/mods-list/delete', 'ManageModsController@delete')->name('admin.mods_delete');
    Route::post('/admin/mods-list/edit', 'ManageModsController@edit')->name('admin.mods_edit');
    Route::post('/admin/mods-list/unpromote', 'ManageModsController@unpromote')->name('admin.mods_unpromote');
    // Files Manage
    Route::get('/admin/upload-file','AdminController@upload')->name('admin.upload');
    Route::post('/admin/store','AdminController@store')->name('ajax.uploadfile');

    // Category Manage
    Route::get('/admin/category', 'CategoryController@create_categories')->name('admin.create_category');
    Route::post('/admin/category/save','CategoryController@store_categories')->name('admin.store_category');
    // Sub Category Manage
    Route::get('/admin/sub-category','CategoryController@create_sub_categories')->name('admin.create_sub_category');
    Route::post('/admin/sub-category/save','CategoryController@store_sub_categories')->name('admin.store_sub_category');

});

//// Main Routes
Route::get('/', 'ViewController@index');
// View Page with Value => Movies / Series / Music
Route::get('/{value}','ViewController@show_as')->name('view.value');
// View Page with value and name => Movie => spiderman
Route::get('/{value}/{name}','ViewController@show_with_name')->name('view.value.name');
// Download File with id
Route::post('/download/{file}','ViewController@download_file')->name('view.download.file');
// After Login/Register
Route::get('/home', 'HomeController@index')->name('home');




