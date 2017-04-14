<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\CreatePostRequest;



class PostsController extends Controller
{
    public function index()
    {
        //asi trae todos en cualquier orden  
    	//$posts=Post::all();

        //asi trae todos  ordenados segun quiero
        //$posts=Post::orderBy('id','desc')->get();

        //asi me pagina
        $posts=Post::orderBy('id','desc')->paginate(10);
        //para completarlo en la vista se debe agregar
        //{{$post->render()}} 


    	return view("posts.index")->with(['posts'=>$posts]);
        
        

    }

	/*
    esta funcion de captura y ruteo segun id se puede abrebiar segun abajo...
    */
    public function show($id)

    {
    	$posts=Post::find($id);
    	return view("posts.show",['posts'=>$posts]);
        //return view("posts.show");
    }
/*
    abrebiado
    
public function show(Post $id) //le antepongo el nombre del modelo entonces lo busca directamente en el modelo el id
    {
         
        return view("posts.show",['posts'=>$posts]);
        //return view("posts.show");
    }
    */


public function create() 
    {
        return view("posts.create");
        
    }


public function store(CreatePostRequest $request) //le antepongo el nombre del modelo entonces lo busca directamente en el modelo el id
    {
        
        //hay varias opcioines para grabar los datos, una es uno a uno
        /*
        $posts=new Post;
        $posts->title=$request->title;
        $posts->description=$request->description;
        $posts->url=$request->url;
        $posts->save();
        */

        //otra es un solo comando
        $posts=Post::create($request->only('title','description','url' ));

        return redirect()->route('posts_path');

        //dd($request->all());
        
        //return view("posts.show",['posts'=>$posts]);
        //return view("posts.show");
    }


    
}
