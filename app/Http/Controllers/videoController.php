<?php

namespace App\Http\Controllers;
use App\Models\video;
use Illuminate\Http\Request;

class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $video = video::latest()->paginate(5);
        return view ('video.index',compact('video'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4,jpeg,png,jpg,gif|max:10048',
            'caption' => 'required', // Sesuaikan validasi sesuai kebutuhan
        ]);
        $user = auth()->user();
        $video = new video;

        if($request->hasFile('video')){
            $uploadedVideo = $request->file('video');
            $videoName = time() . '.' . $uploadedVideo->getClientOriginalExtension();
            $destinationPath = 'video/';
            $uploadedVideo->move($destinationPath, $videoName);
            $video->video = $videoName;
        }

        $video->created_by = $user->id;
        $video->caption = $request->caption;
        $video->save();

        return redirect()->route('vidio.index')->with('success', 'Video berhasil diunggah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(video $video)
    {
        $video->delete();
        return redirect()->route('vidio.index')->with('success', 'Video Berhasil di Hapus');
    }
}
