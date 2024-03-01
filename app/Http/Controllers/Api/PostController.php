<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    use ApiResponseTrait;
    
    public function index(){


        //for collection data is deffrant

        $posts = PostResource::collection(User::get()) ;

       return $this->ApiResponse($posts , 'ok' , 200);
        
    }

    public function show($id){

        // for controller of data get
        $posts = User::find($id);

        if($posts){
            // for solve error not found
            return $this->ApiResponse(new PostResource($posts) , 'ok' , 200);
        }
        return $this->ApiResponse( null , 'not found' , 401);
    }

    public function store(Request $request){

        $post = Post::create($request->all());

        if($post){
            return $this->ApiResponse(new PostResource($post) , 'the post stored' , 201);
        }

        return $this->ApiResponse( null , 'the post not stored' , 400);

    }
}
