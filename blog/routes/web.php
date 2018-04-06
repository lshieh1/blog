<?php

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
use App\Blog;
use Illuminate\Http\Request;

Route::get('/', function () {
    $blogs = Blog::orderBy('created_at', 'asc')->get();

    return view('blogs', [
    	'blogs' => $blogs
    ]);
});

// Route::get('/blogs', function () {
// 	return view('blogs');
// });

Route::post('/blogs', function (Request $request) {
	$validator = Validator::make($request->all(), [
		'name' => 'required|max:255',
	]);

	if ($validator->fails()) {
		return redirect('/')
			->withInput()
			->withErrors($validator);
	}

	$blog = new Blog;
	$blog->name = $request->name;
	$blog->save();

	return redirect('/');
});

// Route::get('/blogs/{id}', function ($id) {
// 	//
// });

Route::delete('/blogs/{id}', function ($id) {
	Blog::findOrFail($id)->delete();

	return redirect('/');
});