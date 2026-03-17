<?php

namespace App\Http\Controllers;

use App\Models\Visura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisuraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $search   = $request->get('search');
    $category = $request->get('category');

    $query = Visura::query();
    if ($search)                        $query->where('photographer_name', 'like', '%'.$search.'%');
    if ($category && $category !== 'all') $query->where('type', $category);

    $photos = $query->latest()->get(); 
    $categories = Visura::select('type')->distinct()->pluck('type')->toArray();

    return view('visura.index', compact('photos', 'search', 'category', 'categories'));
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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,webp|max:2048',
            'photographer_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        // Store the image
        $imagePath = $request->file('image')->store('photos', 'public');

        // Create the photo record
        Visura::create([
            'image_path' => $imagePath,
            'photographer_name' => $request->photographer_name,
            'type' => $request->type,
        ]);

        return redirect()->route('visura.index')->with('success', 'Photo uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visura $visura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visura $visura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visura $visura)
    {
        $request->validate([
            'photographer_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,webp|max:2048',
        ]);

        // Update image if a new one is uploaded
        if ($request->hasFile('image')) {
            // Delete old image
            if ($visura->image_path && Storage::disk('public')->exists($visura->image_path)) {
                Storage::disk('public')->delete($visura->image_path);
            }
            // Store new image
            $imagePath = $request->file('image')->store('photos', 'public');
            $visura->update(['image_path' => $imagePath]);
        }

        // Update other fields
        $visura->update([
            'photographer_name' => $request->photographer_name,
            'type' => $request->type,
        ]);

        return redirect()->route('visura.index')->with('success', 'Photo updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visura $visura)
    {
        // Delete the image file
        if ($visura->image_path && Storage::disk('public')->exists($visura->image_path)) {
            Storage::disk('public')->delete($visura->image_path);
        }

        // Delete the record
        $visura->delete();

        return redirect()->route('visura.index')->with('success', 'Photo deleted successfully!');
    }
}
