<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);

        $validated = $request->validate([
            'author_name' => ['required', 'string', 'max:255'],
            'email'       => ['nullable', 'email', 'max:255'],
            'body'        => ['required', 'string', 'max:2000'],
        ]);

        $post->comments()->create([
            'author_name' => $validated['author_name'],
            'email'       => $validated['email'] ?? null,
            'body'        => $validated['body'],
            'approved'    => false,
        ]);

        return redirect()->route('posts.show', $postId)
            ->with('comment_success', 'نظر شما با موفقیت ثبت شد و پس از تأیید نمایش داده می‌شود.');
    }
}
