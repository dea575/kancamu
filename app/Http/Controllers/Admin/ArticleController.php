<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::get();
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->thumbnail) {
            $input['thumbnail'] = Storage::put('articles', $request->thumbnail);
        }

        $article = Article::create($input);

        Session::flash('success', 'Berhasil Membuat Artikel '. $article->title);
        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $input = $request->all();
        if ($request->thumbnail) {
            if ($article->thumbnail) {
                Storage::delete($article->getRawOriginal('thumbnail'));
            }
            $input['thumbnail'] = Storage::put('articles', $request->thumbnail);
        }

        $article->update($input);

        Session::flash('warning', 'Berhasil Mengubah Artikel '. $article->title);
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->thumbnail) {
            Storage::delete($article->getRawOriginal('thumbnail'));
        }
        $article->delete();

        Session::flash('error', 'Berhasil Menghapus Artikel '. $article->title);
        return back();
    }
}
