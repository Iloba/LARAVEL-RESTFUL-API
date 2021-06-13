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
               ], 200);
            }
            
       }else{
           return response()->json([
                "message" => "Post does not Exist"
           ], 404);
       }
    }


    //Edit Comments on a Blog Post
    public function editComment(Request $request, Post $post, $id){
        if(Post::where('id', $post->id)->exists()){
              //Find the particular comment
           $comments = Post::find($post->id)->comment()->where('id', $id)->first();
           $comments->commentor_name = is_null($request->commentor_name) ? $comments->commentor_name : $request->commentor_name;
           $comments->comment = is_null($request->comment) ? $comments->comment : $request->comment;
           $comments->save();

            //Return Response
            return response()->json([
                "message" => "comment successfully Updated"
            ], 200);
        }else{
            return response()->json([
                "message" => "No such Post Found"
            ], 404);
        }
    }




    //Delete Comments on a Blog Post
    public function deleteComment(Post $post, $id){
        if(Post::where('id', $post->id)->exists()){
            //Find the particular comment
         $comments = Post::find($post->id)->comment()->where('id', $id)->first();
         
         $comments->delete();

          //Return Response
          return response()->json([
              "message" => "comment successfully Deleted"
          ], 200);
      }else{
          return response()->json([
              "message" => "No such Post Found"
          ], 404);
      }
    }

}
