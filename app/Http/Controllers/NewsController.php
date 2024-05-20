<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('comment', 'user:id,name')->get();

        return response()->json(
            NewsResource::collection($news)
            , 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreNewsRequest $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $news = News::create($request->validated());

        if ($request->hasFile('image')) {
            $news->image = parent::storeFile($request->file('image'), 'news');
        }
        $news->user_id = auth()->id();
        $news->save();

        return response()->json($news, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return response()->json(
            NewsResource::collection($news->load('comment', 'user:id,name'))
            , 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        $news->update($request->validated());

        if ($request->hasFile('image')) {
            parent::deleteFile($news->image, 'news');
            $news->image = parent::storeFile($request->file('image'), 'news');
        }
        $news->save();

        return response()->json($news, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {

        if ($news->image){
            parent::deleteFile($news->image, 'news');
        }
        $news->comment()->delete();

        $news->delete();

        return response()->json(null, 204);
    }
}
