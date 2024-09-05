<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\customResponseTrait;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use customResponseTrait;
    protected $post;

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post::where('user_id', Auth::id())->paginate(10);
        return $this->customResponse($posts, 200);
    }


    public function show($id)
    {
        try {
            $post = $this->post::findOrFail($id);
            return $this->customResponse($post, 200);
        } catch (\Exception $e) {
            return $this->customResponse($e->getMessage(), 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'content' => 'required|string',
            ]);
            if ($validator->fails()) {
                return $this->customResponse($validator->errors(), 400);
            }
            $userId = Auth::id();

            $post = $this->post::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'user_id' => $userId,
            ]);

            return $this->customResponse($post, 200, ['message' => 'Post created successfully']);
        } catch (\Exception $e) {
            return $this->customResponse($e->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $post = $this->post::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'title' => 'string|max:255',
                'content' => 'string',
                'user_id' => 'int|exists:users,id',
            ]);

            if ($validator->fails()) {
                return $this->customResponse($validator->errors(), 400);
            }

            if ($post->user_id !== Auth::id()) {
                return $this->customResponse('Unauthorized', 403);
            }
            $post->update($request->only(['title', 'content']));
            return $this->customResponse($post, 200, ['message' => 'Post updated successfully']);
        } catch (\Exception $e) {
            return $this->customResponse($e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $post = $this->post::findOrFail($id);
            if ($post->user_id !== Auth::id()) {
                return $this->customResponse('Unauthorized', 403);
            }
            $post->delete();
            return $this->customResponse(null, 200, ['message' => 'Post deleted successfully']);
        } catch (\Exception $e) {
            return $this->customResponse($e->getMessage(), 500);
        }
    }

    public function all_posts()
    {
        $posts = $this->post::paginate(10);
        return $this->customResponse($posts, 200);
    }
}
