<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::all();
        return view('tracks.index', compact('tracks'));
    }



    public function show($id)
    {
        $track = Track::findOrFail($id);
        return view('tracks.show', compact('track'));
    }



    public function destroy($id)
    {
        $track = Track::findOrFail($id);

        // Delete the image if stored
        if ($track->img && Storage::exists('public/images/' . $track->img)) {
            Storage::delete('public/images/' . $track->img);
        }

        $track->delete();
        return redirect('/tracks')->with('success', 'Track deleted successfully!');
    }



    public function edit($id)
    {
        $track = Track::findOrFail($id);
        return view('tracks.edit', compact('track'));
    }



    public function update(Request $request, $id)
    {
        $track = Track::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'img' => 'nullable|image|max:2048' // allow image upload (optional)
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('img')) {
            // Delete old image if it exists
            if ($track->img && Storage::exists('public/images/' . $track->img)) {
                Storage::delete('public/images/' . $track->img);
            }

            $imageName = time() . '.' . $request->img->extension();
            $request->img->storeAs('public/images', $imageName);
            $data['img'] = $imageName;
        }

        $track->update($data);

        return redirect()->route('tracks.show', $track->id)->with('success', 'Track updated successfully!');
    }


    public function create()
    {
        $courses = Course::all();
        return view('tracks.create', compact('courses'));
    }


    
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'img' => 'nullable|image',
        'course_id' => 'required|exists:courses,id', // 👈 validate this
    ]);

    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/tracks'), $imageName);
        $validated['img'] = $imageName;
    } else {
        $validated['img'] = 'default.png';
    }

    Track::create($validated);

    return redirect()->route('tracks.index')->with('success', 'Track created successfully.');
}


}