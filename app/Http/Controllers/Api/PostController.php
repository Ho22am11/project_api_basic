<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    use ApiResponseTrait;
    
    public function index(){

        $posts = Category::get();

       return $this->ApiResponse($posts , 'ok' , 200);
        
    }

    public function show($id){
        $posts = User::find($id);

        if($posts){
            return $this->ApiResponse($posts , 'ok' , 200);
        }
        return $this->ApiResponse( null , 'not found' , 401);
    }
}
