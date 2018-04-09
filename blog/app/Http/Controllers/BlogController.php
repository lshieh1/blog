<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'asc')->get();
        return view('blogs', [
         'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
        //
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'name' => 'required|max:255',
         ]);

         if ($validator->fails()) {
             return redirect('/blogs')
                 ->withInput()
                 ->withErrors($validator);
         }

         $blog = new Blog;
         $blog->name = $request->name;
         $blog->save();

         return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singleBlog = Blog::find($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('blog', [
            'singleBlog'=> $singleBlog,
            'comments' => $comments
        ]);

        // $blog = Blog::find($id);
        // return view::make('blog.show')
        //     ->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('editblog', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // $validator = Validator::make($request->all(), [
         //     'name' => 'required|max:255',
         // ]);

         // if ($validator->fails()) {
         //     return redirect('/blogs')
         //         ->withInput()
         //         ->withErrors($validator);
         // }

         // $blog = Blog::findOrFail($id);
         // $blog->name = $request->name;
         // $blog->update();

         // return redirect('/blogs/$id');
        // Blog::findOrFail($id)->update($request->except('_token'));
        // return redirect('/blogs/$id');
        $blog = Blog::findOrFail($id);

        $blog->name = $request->name;

        $blog->save();

        return redirect("/blogs/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Blog::findOrFail($id)->delete();

         return redirect('/blogs');
    }
    public function createComment(Request $request, $id)
    {
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;
        $comment->save();
        return redirect("/blogs/$id");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
