<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('chapters.index', [
            'chapters' => Chapter::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chapters.create', [
            'courses' => Course::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'course_id' => 'required',
            'video' => 'required'
        ]);

        $video_path = $request->file('video')->store('videos');
        $validated['user_id'] = Auth::id();
        $validated['video'] = $video_path;

        Chapter::create($validated);
        return redirect(route("chapters.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        return view('chapters.show', [
            'chapter' => $chapter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        return view('chapters.create', [
            'chapter' => $chapter,
            'courses' => Course::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'course_id' => 'required',
        ]);
        if($request->hasFile('video')) {
            $video_path = $request->file('video')->store('videos');
            $validated['video'] = $video_path;
        }
        $validated['user_id'] = Auth::id();
        $chapter->update($validated);
        return redirect(route('chapters.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return redirect(route('chapters.index'));
    }
}
