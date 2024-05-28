<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Result::get();
        return view('admin.result.index', compact('results'));
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
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->image) {
            $input['image'] = Storage::put('results', $request->image);
        }
        $result = Result::create($input);

        Session::flash('success', 'Berhasil Membuat Hasil '. $result->name);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
    {
        $input = $request->all();
        if ($request->image) {
            if ($result->image) {
                Storage::delete($result->getRawOriginal('image'));
            }
            $input['image'] = Storage::put('results', $request->image);
        }
        $result->update($input);

        Session::flash('warning', 'Berhasil Mengubah Hasil '. $result->name);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        if ($result->image) {
            Storage::delete($result->getRawOriginal('image'));
        }
        $result->delete();

        Session::flash('error', 'Berhasil Menghapus Hasil '. $result->name);
        return back();
    }
}
