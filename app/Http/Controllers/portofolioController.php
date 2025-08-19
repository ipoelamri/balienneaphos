<?php

namespace App\Http\Controllers;

use App\Models\portofolio;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portofolios = portofolio::latest()->get();
        return Inertia::render('portofolios/index', [
            'portofolios' => $portofolios,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('portofolios/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
        ]);

        $data = $request->only(['title', 'description', 'link']);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portofolios', 'public');
        }

        portofolio::create($data);

        return redirect()->route('portofolios.index')->with('success', 'Portofolio created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $portofolio = portofolio::findOrFail($id);
        return Inertia::render('portofolios/show', [
            'portofolio' => $portofolio,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portofolio = portofolio::findOrFail($id);
        return Inertia::render('portofolios/edit', [
            'portofolio' => $portofolio,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
        ]);

        $portofolio = portofolio::findOrFail($id);
        $data = $request->only(['title', 'description', 'link']);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portofolios', 'public');
        }

        $portofolio->update($data);

        return redirect()->route('portofolios.index')->with('success', 'Portofolio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portofolio = portofolio::findOrFail($id);
        $portofolio->delete();

        return redirect()->route('portofolios.index')->with('success', 'Portofolio deleted successfully.');
    }
}
