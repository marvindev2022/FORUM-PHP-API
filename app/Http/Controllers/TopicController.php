<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic; // Certifique-se de importar o modelo Topico

class TopicController extends Controller
{
    public function create(Request $request)
    {
        $topic = Topic::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);

        return response()->json(['message' => 'Topico created successfully'], 201);
    }

    public function update(Request $request)
    {
        $topic = Topico::find($request->id);
        $topic->title = $request->title;
        $topic->content = $request->content;
        $topic->user_id = $request->user_id;
        $topic->save();

        return response()->json(['message' => 'Topico updated successfully'], 200);
    }

    public function delete(Request $request)
    {
        $topic = Topico::find($request->id);
        $topic->delete();

        return response()->json(['message' => 'Topico deleted successfully'], 200);
    }
}
