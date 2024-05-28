<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Psychologist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PsychologistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psychologists = Psychologist::get();
        return view('admin.psychologist.index', compact('psychologists'));
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
        if ($request->photo) {
            $input['photo'] = Storage::put('psychologist', $request->photo);
        }
        $psychologist = Psychologist::create($input);

        Session::flash('success', 'Berhasil Membuat Psikolog '. $psychologist->name);
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
    public function update(Request $request, Psychologist $psychologist)
    {
        $input = $request->all();
        if ($request->photo) {
            if ($psychologist->photo) {
                Storage::delete($psychologist->getRawOriginal('photo'));
            }
            $input['photo'] = Storage::put('psychologist', $request->photo);
        }
        $psychologist->update($input);

        Session::flash('warning', 'Berhasil Mengubah Psikolog '. $psychologist->name);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Psychologist $psychologist)
    {
        if ($psychologist->photo) {
            Storage::delete($psychologist->getRawOriginal('photo'));
        }
        $psychologist->delete();

        Session::flash('error', 'Berhasil Menghapus Psikolog '. $psychologist->name);
        return back();
    }
}
