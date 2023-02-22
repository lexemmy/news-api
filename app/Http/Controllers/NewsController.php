<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getAll()
    {
        $news = News::query();

        if (request()->has('search')) {
            $search = '%' . request()->search . '%';
            $news->where(function ($q) use ($search) {
                return $q->where('title', 'LIKE', $search);
            });
        }

        $news = $news->latest()->paginate(20);

        return response()->json($news);
    }

    public function getOne($id)
    {
        $news = News::findOrFail($id);

        return response()->json($news);
    }
}
