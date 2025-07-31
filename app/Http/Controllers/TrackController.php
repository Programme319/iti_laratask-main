<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return response()->json([
            'tracks' => Track::all()
        ]);
    }

    public function show($id)
    {
        $track = Track::find($id);

        if (!$track) {
            return response()->json(['message' => 'Track not found'], 404);
        }

        return response()->json(['track' => $track]);
    }

    public function store(Request $request)
    {
        $track = Track::create($request->all());

        return response()->json(['track' => $track], 201);
    }

    public function update(Request $request, $id)
    {
        $track = Track::find($id);

        if (!$track) {
            return response()->json(['message' => 'Track not found'], 404);
        }

        $track->update($request->all());

        return response()->json(['track' => $track]);
    }

    public function destroy($id)
    {
        $track = Track::find($id);

        if (!$track) {
            return response()->json(['message' => 'Track not found'], 404);
        }

        $track->delete();

        return response()->json(['message' => 'Track deleted']);
    }
}
