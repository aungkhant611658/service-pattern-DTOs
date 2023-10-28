<?php

namespace App\Http\Controllers\Api\V1;

use App\DataTransferObjects\BlogPostDto;
use App\Http\Requests\Api\BlogPostRequest;
use App\Http\Resources\Api\BlogPostResource;
use App\Models\BlogPost;
use App\Services\Blog\BlogPostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Enums\BlogPostSource;

class BlogPostController
{
    public function __construct(
        protected BlogPostService $service
    ) {

    }

    public function index(Request $request)
    {
        return "hi";
    }

    public function store(BlogPostRequest $request)
    {
        $post = $this->service->store(
            BlogPostDto::fromApiRequest($request),
        );

        return BlogPostResource::make($post);
    }

    public function update(BlogPostRequest $request, BlogPost $blogPost): BlogPostResource
    {
        $post = $this->service->update(
            $blogPost,
            BlogPostDto::fromApiRequest($request),
        );

        return BlogPostResource::make($post);
    }
}
