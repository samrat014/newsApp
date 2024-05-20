<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\News;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(News $news)
    {
        return response()->json(
            CommentResource::collection($news->comment), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, News $news)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->id();
        $comment->news_id = $news->id;
        $comment->save();

        return response()->json('comment added to ' .$news->title, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {

        $this->authorize('update', $comment);

        if (!$news = News::find($request->news_id)) {
            return response()->json('news not found', 404);
        }

        if ($news->id !== $comment->news_id) {
            return response()->json('comment not found', 404);
        }

        $comment->comment = $request->comment;
        $comment->save();

        return response()->json('comment updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return response()->json('comment deleted', 200);
    }
}
