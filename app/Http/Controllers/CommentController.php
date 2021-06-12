<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //Add comment to Blog post
    public function addComment(Request $request, Post $post){
        $post->comment()->create([
            'commentor_name' => $request->commentor_name,
            'comment' => $request->comment
        ]);

        //Return response
        return response()->json([
            "message" => "Comment Added to Post"
        ], 200);
    }

    //Get all Comments on a Blog posts
    public function getComments(Post $post, Comment $comment){
        if(Post::where('id', $post->id)->exists()){
            $comments = Comment::where('post_id', $post->id)->get()->toJson(JSON_PRETTY_PRINT);
            if($comments){
                return response($comments, 200);
                
            }else{
                return response()->json([
                    "message" => "No Comments on this Empty"
               ], 404);
            }
            
       }else{
           return response()->json([
                "message" => "Post does not Exist"
           ], 404);
       }
    }


    //Edit Comments on a Blog Post
    public function editComment(Post $post){

    }




    //Delete Comments on a Blog Post
    public function deleteComment(Post $post){

    }

}
