<?php

namespace App\Services\Blog;

use App\DataTransferObjects\BlogPostDto;
use App\Models\BlogPost;
use App\Enums\BlogPostSource;

class BlogPostService
{
    public function store(BlogPostDto $dto)
    {
        $post = BlogPost::create([
            'title' => $dto->title,
            'body' => $dto->content,
            'source' => $dto->source,
        ]);

        return $post;
    }

    public function update(BlogPost $blogPost, BlogPostDto $dto)
    {
        $post = tap($blogPost)->update([
            'title' => $dto->title,
            'body' => $dto->content,
            'source' => $dto->source,
        ]);

        return $post;
    }
}