<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(Request $request)
    {
        $message = Message::create([
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);

        return response()->json(['message' => 'Mensagem criada com sucesso'], 201);
    }
    public function update(Request $request)
    {
        $message = Message::find($request->id);
        $message->content = $request->content;
        $message->user_id = $request->user_id;
        $message->save();

        return response()->json(['message' => 'Mensagem atualizada com sucesso'], 200);
    }
    public function delete(Request $request)
    {
        $message = Message::find($request->id);
        $message->delete();

        return response()->json(['message' => 'Mensagem deletada com sucesso'], 200);
    }
    public function list()
    {
        $messages = Message::with('user')->get();

        return response()->json($messages, 200);
    }
    
}
