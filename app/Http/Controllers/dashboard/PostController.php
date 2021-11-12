<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Requests\StorePostPost;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate('4');

        return view('dashboard.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id', 'name');

        return view("dashboard.post.create", ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostPost $request)
    {

        Post::create($request->validated());

        return back()->with('status', 'Post creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = Category::pluck('id', 'name');
        return view('dashboard.post.show', ["post" => $post, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'name');

        return view('dashboard.post.edit', ["post" => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostPost $request, Post $post)
    {

        $post->update($request->validated());

        return back()->with('status', 'Post actualizado con exito');
    }

    public function image(Request $request, Post $post)
    {

        $request->validate(
            [
                'image' => 'required|mimes:jpeg,bmp,png|max:10240'
            ]
        );

        $filename = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'),$filename);

        PostImage::create(['image'=>$filename , 'post_id'=>$post->id]);


        return back()->with('status', 'Imagen cargada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status', 'Borrado con exito');
    }
}
