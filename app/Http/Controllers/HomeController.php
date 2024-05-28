<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Psychologist;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['dashboard', 'depression', 'aboutUs']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $articleDatas = Article::whereIn('section', ['dashboard', 'all'])->get();
        $articles = [];
        $no = -1;
        foreach ($articleDatas as $key => $data) {
            if ($key % 3 == 0) {
                $no = $no + 1;
            }
            $articles[$no][] = $data;
        }
        return view('dashboard', compact('articles'));
    }

    public function article(Article $article)
    {
        return view('article', compact('article'));
    }

    public function depression()
    {
        $articleDatas = Article::whereIn('section', ['depression', 'all'])->get();
        $articles = [];
        $no = -1;
        foreach ($articleDatas as $key => $data) {
            if ($key % 3 == 0) {
                $no = $no + 1;
            }
            $articles[$no][] = $data;
        }

        return view('depression', compact('articles'));
    }

    public function aboutUs()
    {
        $psychologists = Psychologist::get();
        return view('about_us', compact('psychologists'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'. $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $input = $request->all();
        if (!$input['password']) {
            unset($input['password']);
            unset($input['password_confirmation']);
        }

        if ($request->profile) {
            if ($user->getRawOriginal('profile')) {
                Storage::delete($user->getRawOriginal('profile'));
            }
            $input['profile'] = Storage::put('user/'.$user->id.'/profile', $request->profile);
        }

        $user->update($input);

        Session::flash('success', 'Berhasil Mengubah Profile');
        return back();
    }
}
