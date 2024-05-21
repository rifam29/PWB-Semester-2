<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Http\Requests\StoreCastRequest;
use App\Http\Requests\UpdateCastRequest;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $casts = Cast::select('id','nama', 'umur')->get();
        return view('cast.index', compact('casts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cast.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCastRequest $request, Cast $cast)
    {
        //
        $cast->create($request->all());
        return redirect()->route('cast.index')->with(['success' => 'Data '.$request['nama'].' berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cast $cast)
    {
        //
        return view('cast.show', compact('cast'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cast $cast)
    {
        //
        return view('cast.edit', compact('cast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCastRequest $request, Cast $cast)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer',
            'bio' => 'nullable|string',
        ]);
        $cast->update($request->all());
        return redirect()->route('casts.index')->with('success', 'Cast updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cast $cast)
    {
        //
        $cast->delete();
        return redirect()->route('cast.index')->with('success', 'Cast deleted successfully');
    }
}
