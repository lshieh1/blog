<?php
	
	Route::view('/', 'welcome');

	Route::resource('blogs', 'BlogController');