<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        return view('posts.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Campos a validar
        // $campos=[
        //     'title_post'=>'required|string|max:50',
        //     'content_post'=>'required|string|min:200',
        //     'image_post'=>'required|max:1000|mimes:jpeg,png,svg,jpg',
        // ];

        // mensajes de error
        // $mensaje=[
        //     'title_post.required' => 'Falta el título',
        //     'content_post.required' => 'Falta el contenido',
        //     'image_post.required' => 'Falta la imagen'
        // ];

        // $this->validate($request, $campos, $mensaje);
        //imagen con Cloudinary
        $image = request()->file('image_post');
        $result = Cloudinary::upload($image->getRealPath(),['folder'=>'my_posts',
                                        'public_id'=>uniqid()]);
        $url = $result->getSecurePath();;
        
        $datosPost = $request-> except('_token');
        $datosPost['image_post'] = $url;
        //$datosPost['code_secretary'] = "eij85";
        Post::insert($datosPost);
        return to_route('posts.index')->with('mensaje','Registro Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
