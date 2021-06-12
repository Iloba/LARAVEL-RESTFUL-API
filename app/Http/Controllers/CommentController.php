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

    //Get all Blog posts
    public function getComments(Post $post, Comment $comment){
        if(Post::where('id', $post->id)->exists()){
            $comments = Comment::where('post_id', $comment->post_id)->get()->toJson(JSON_PRETTY_PRINT);
                
                return response($comments, 200);
            
       }else{
           return response()->json([
                "message" => "Post does not Exist"
           ], 404);
       }
    }
}
