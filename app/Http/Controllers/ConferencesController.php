<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conferences;

class ConferencesController extends Controller
{
    /**
     * JSON API for Conferences
     */
    public function conferencesTable()
    {
        $conferences = Conferences::all();
        return response()->json($conferences);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conferences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'user' => 'required',
            'description' => 'required',
            'color' => 'required',
        ]);

        $conference = new Conferences;
        $conference->title = $request->title;
        $conference->user = $request->user;
        $conference->description = $request->description;
        $conference->color = $request->color;
        $conference->start_date = now();
        $conference->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $conference = Conferences::find($id);
        return view('conferences.show', compact('conference'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $conference = Conferences::find($id);
        if ($conference) {
            return view('conferences.edit', compact('conference'));
        } else {
            return redirect('/home')->with('error', 'Conference not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'user' => 'required',
            'description' => 'required',
            'color' => 'required',
        ]);

        $conference = Conferences::find($id);
        if ($conference) {
            $conference->title = $request->title;
            $conference->user = $request->user;
            $conference->description = $request->description;
            $conference->color = $request->color;
            $conference->save();

            return redirect('/home')->with('success', 'Conference updated successfully');
        } else {
            return redirect('/home')->with('error', 'Conference not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $conference = Conferences::find($id);
        if ($conference) {
            $conference->delete();
            return redirect('/home')->with('success', 'Conference deleted successfully');
        } else {
            return redirect('/home')->with('error', 'Conference not found');
        }
    }
}
