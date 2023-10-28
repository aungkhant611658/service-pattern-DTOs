<?php

namespace App\DataTransferObjects;

use App\Enums\BlogPostSource;
use App\Http\Requests\Api\BlogPostRequest as ApiBlogPostRequest;
use App\Http\Requests\App\BlogPostRequest as AppBlogPostRequest;

class BlogPostDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $content,
        public readonly BlogPostSource $source,
    ) {

    }

    public static function fromAppRequest(AppBlogPostRequest $request): BlogPostDto
    {
        return new self(
            $request->validated('title'),
            $request->validated('content'),
            BlogPostSource::App,
        );
    }

    public static function fromApiRequest(ApiBlogPostRequest $request): BlogPostDto
    {
        return new self(
            $request->validated('payload.post.title'),
            $request->validated('payload.post.body'),
            BlogPostSource::Api,
        );
    }
}