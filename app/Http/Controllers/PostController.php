<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        //return response()->json($posts);
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = $this->postService->getPostById($id);
        if ($post) {
            //return response()->json($post);
            return new PostResource($post);
        }
        return response()->json(['message' => 'Post not found'], 404);
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $post = $this->postService->createPost($data);
        return response()->json($post, 201);
        
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $data = $request->validated();
        $post = $this->postService->updatePost($id, $data);
        if ($post) {
            return response()->json($post);
        }
        return response()->json(['message' => 'Post not found'], 404);
    }

    public function destroy($id)
    {
        $deleted = $this->postService->deletePost($id);
        if ($deleted) {
            return response()->json(['message' => 'Post deleted']);
        }
        return response()->json(['message' => 'Post not found'], 404);
    }
}

