<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Get all Posts
    public function getPosts(){
        $posts = Post::get()->toJson(JSON_PRETTY_PRINT);
        return response($posts, 200);
    }


    //Get all posts with pagination
    public function paginatePosts(){
        $posts = Post::Latest()->paginate(5);
        return response($posts, 200);
    }



    //Get post by ID
    public function show($id){
       if(Post::where('id', $id)->exists()){
        $post = Post::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($post, 200);
       }else{
           return response()->json([
               'Message' => 'Record Not Found'
           ], 404);
       }
        
    }


    //Create Post
    public function create(Request $request){
        $post = new Post;
        $post->post_title = $request->post_title;
        $post->post_description = $request->post_description;
        $post->save();

        //return response
        return response()->json([
            "message" => 'Post record Created'
        ], 201); 
    }

    //Update Post
    public function update(Request $request, $id){
        if(Post::where('id', $id)->exists()){
            $post = Post::find($id);
            $post->post_title = is_null($request->post_title) ? $post->post_title : $request->post_title;
            $post->post_description = is_null($request->post_description) ? $post->post_description : $request->post_description;

            $post->save();

            //return response
            return response()->json([
                "message" => "Record Updated Succesfully"
            ], 200);
        }else{
            return response()->json([
                "message" => "No SUch Post Found"
            ], 404);
        }

    }



    //Delete Post
    public function destroy($id){

    }
}
