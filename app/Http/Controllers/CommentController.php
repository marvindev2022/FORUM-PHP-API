<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $comment = Comment::create([
            'content' => $request->content,
            'user_id' => $request->user_id,
            'topic_id' => $request->topic_id,
        ]);

        return response()->json(['message' => 'Comment created successfully'], 201);
    }

    public function update(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->content = $request->content;
        $comment->user_id = $request->user_id;
        $comment->topic_id = $request->topic_id;
        $comment->save();

        return response()->json(['message' => 'Comment updated successfully'], 200);
    }

    public function delete(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->delete();

        return response()->json(['message' => 'Comment deleted successfully'], 200);
    }

    public function get(Request $request)
    {
        $comment = Comment::find($request->id);

        return response()->json(['comment' => $comment], 200);
    }

    public function list()
    {
        $comments = Comment::all();

        return response()->json(['comments' => $comments], 200);
    }
}
