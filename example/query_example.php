<?php
use App\Models\Post;

// Fetch all published posts, ordered by newest first, with their comments eagerly loaded
$posts = Post::where('is_published', true)
             ->orderBy('created_at', 'desc')
             ->with('comments')
             ->get();

foreach ($posts as $post) {
    echo "<h1>{$post->title}</h1>";
    
    foreach ($post->comments as $comment) {
        echo "<p>- {$comment->author_name}: {$comment->content}</p>";
    }
}
