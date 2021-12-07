<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KirepoNews;
class NewsController extends Controller
{
    public function index()
    {
        $news = KirepoNews::paginate(5);
        return response()->json($news);      
    }

    public function store(Request $request)
    {
        $news = new KirepoNews([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'is_published' => $request->input('is_published'),
            'created_at' => $request->input('created_at'),
            'updated_at' => $request->input('updated_at'),
        ]);
        $news->save();

        return response()->json('KirepoNews created!');
    }

    public function show($id)
    {
        $news = KirepoNews::find($id);
        return response()->json($news);
    }

    public function update($id, Request $request)
    {
        $news = KirepoNews::find($id);
        $news->update($request->all());

        return response()->json('KirepoNews updated!');
    }

    public function destroy($id)
    {
        $news = KirepoNews::find($id);
        $news->delete();

        return response()->json('KirepoNews deleted!');
    }
}
