<?php

Route::get('/', 'PostsController@index')->name('home');
/*
	1. controller => PostsController (php artisan make:controller PostsController)
	2. Eloquent model => Post (php artisan make:model Post)
	3. migration => create_posts_table (php artisan make:migration create_posts_table --create-posts)
	or just 
	php artisan make:model Posts -mc //model controller
*/

/*
		GET /posts
		GET /posts/create
		POST /posts
		GET /posts/{id}/edit
		GET /posts/{id}
		PATCH /posts/{id}
		DELETE /posts/{id}
*/

Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');