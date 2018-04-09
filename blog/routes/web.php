<?php
	
	Route::view('/', 'welcome');
	Route::resource('blogs', 'BlogController');
	Route::post('/blogs/{blog}', 'BlogController@createComment');