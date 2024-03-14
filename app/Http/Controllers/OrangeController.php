<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrangeController extends Controller
{
    public function index()
    {
        return view("orange.index");
    }

    public function blog()
    {
        $response = Http::get("http://localhost:3000/posts");
        $posts = $response->object();
        return view("orange.blog", compact("posts"));
    }

    public function detail_post($id_post)
    {
        $response = Http::get("http://localhost:3000/posts");
        $posts = $response->object();
        $post = collect($posts)->firstWhere('id', $id_post); // Convertir la respuesta en un objeto

        // Obtener los comentarios del post
        $responseComment = Http::get("http://localhost:3000/comments");
        $comments = $responseComment->object();
        $comment = collect($comments)->where("post_id", $id_post);
        $comment->all();

        // contar los comentarios de un post
        $commentsCount = collect($comment)->count();

        return view("orange.detail_post", compact("post", "comment", "commentsCount"));
    }

    public function addComment(Request $request, $post_id)
    {
        // Validar los datos del formulario
        $request->validate([
            'commenter' => 'required|string|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        try {
            // Crear un nuevo comentario con los datos del formulario
            $newComment = [
                "post_id" => (int) $post_id,
                "commenter" => $request->input('commenter'),
                "comment" => $request->input('comment'),
                "created_at" => now()->format('Y-m-d'), // Fecha y hora actual
            ];

            // Enviar la solicitud al servicio web para insertar el comentario
            $response = Http::post("http://localhost:3000/posts/{$post_id}/comment", $newComment);

            // Verificar si la inserción fue exitosa
            if ($response->successful()) {
                return redirect()->back()->with('success', 'Comment added successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to add comment.');
            }
        } catch (\Exception $e) {
            // Manejar cualquier error
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
