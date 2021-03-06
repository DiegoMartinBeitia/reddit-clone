<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;



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
        //para completarlo en la vista se debe agregar {{$post->render()}} 

    	return view("posts.index")->with(['posts'=>$posts]);
    }

	/*
    esta funcion de captura y ruteo segun id se puede abrebiar segun abajo...
    */
/*    
    public function show($id){
    	//$posts=Post::find($id);
    	//return view("posts.show",['posts'=>$posts]);
        return view("posts.show",['posts'=>Post::find($id)]); //la misma abreviada
    }
        //abrebiado
*/        
    
public function show(Post $post) //le antepongo el nombre del modelo entonces lo busca directamente en el modelo el id
    {
        //dd($post);
        return view("posts.show",['posts'=>$post]);
        //return view("posts.show");
    }
  


public function create() 
    {
        return view("posts.create");
        
    }


public function store(CreatePostRequest $request) //le antepongo el nombre y ya verifica
//que cumpla con las limitaciones programadas en el CreatePostReques
    {
        
        //hay varias opcioines para grabar los datos, una es uno a uno
        /*
        $posts=new Post;
        $posts->title=$request->title;
        $posts->description=$request->description;
        $posts->url=$request->url;
        $posts->save();
        */

        //otra es un solo comando pero esta no me trae el id de usuario
        //$post=Post::create($request->only('title','description','url' ));

        $post=new Post;
        $post->fill(
               $request->only('title','description','url' )
            );
        
        $post->user_id=auth()->user()->id;
        //tambien es valido
        //$post->user_id=\Auth::user()->id;
        //$post->user_id=$request->user()->id;

        $post->save();


        session()->flash('msg',"Post Grabado Correctamente");

        return redirect()->route('posts_path');

        //dd($request->all());
        
        //return view("posts.show",['posts'=>$posts]);
        //return view("posts.show");
    }

public function edit(Post $post) //le antepongo el nombre del modelo entonces lo busca directamente en el modelo el id
    {
        if (auth()->user()->id== $post->user_id){
            return view("posts.edit",['post'=>$post]);
        }else{    
            session()->flash('msg',"Error usted no es el autor del post");
            return redirect()->route('posts_path');    
        }
        //return view("posts.show");
    }
        //dd($post);
public function update(Post $post, UpdatePostRequest  $request)
    {
        
        //hay varias opcioines para grabar los datos, una es uno a uno
        /*        
        $post->title=$request->title;//$request->get('title');  esta seria la forma mas FORMAL
        $post->description=$request->description;
        $post->url=$request->url;
        $post->save();
        */

        //otra es un solo comando
        $post->update($request->only('title','description','url' ));//otra vez utilizamos el metodo only del Request

        session()->flash('msg',"Post Editado Correctamente");
        return redirect()->route('posts_path');
     
    }
    public function delete(Post $post) //le antepongo el nombre del modelo entonces lo busca directamente en el modelo el id
    {
        //dd($post);
        if (auth()->user()->id== $post->user_id){
            $post->delete();//para borrar al objeto se invoca el metodo delete
            session()->flash('msg',"Post Borrado");
            return redirect()->route('posts_path');
        }else{
            session()->flash('msg',"Error, Usted no es el autor de la publicacion, no puede eliminarla");
            return redirect()->route('posts_path');
        }    
    }
   
}
