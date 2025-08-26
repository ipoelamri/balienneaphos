<?php

namespace App\Http\Controllers;

use App\Models\portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PortofolioControllerText extends Controller
{
    /**
     * Display a listing of the resource for the public page.
     */
    public function publicIndex()
    {
        $portofolios = portofolio::latest()->get();
        return Inertia::render('Portofolios', [
            'portofolios' => $portofolios,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portofolios = portofolio::latest()->get();
        return Inertia::render('portofolios/indexText', [
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
        ]);

        $data = $request->only(['title', 'description', 'link']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Generate a unique name while preserving the extension
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $data['image'] = $file->storeAs('portofolios', $filename, 'public');
        }

        portofolio::create($data);

        return redirect()->route('dashboard.portofolios.index')->with('success', 'Portofolio created successfully.');
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
        return Inertia::render('portofolios/editText', [
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
            // Delete old image if it exists
            if ($portofolio->image) {
                Storage::disk('public')->delete($portofolio->image);
            }
            $file = $request->file('image');
            // Generate a unique name while preserving the extension
            $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $data['image'] = $file->storeAs('portofolios', $filename, 'public');
        }

        $portofolio->update($data);

        return redirect()->route('dashboard.portofolios.index')->with('success', 'Portofolio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portofolio = portofolio::findOrFail($id);
        // Delete old image if it exists
        if ($portofolio->image) {
            Storage::disk('public')->delete($portofolio->image);
        }
        $portofolio->delete();

        return redirect()->route('dashboard.portofolios.index')->with('success', 'Portofolio deleted successfully.');
    }
}
