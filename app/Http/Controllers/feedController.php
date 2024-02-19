<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\feed;
use Illuminate\Http\Request;

class feedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feed = feed::latest()->paginate(1);
        return view ('feed.index',compact('feed'))->with('i', (request()->input('page', 1) -1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feed.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'video' => ['required', 'mimes:mp4', 'max:10048'],
            'caption' => ['nullable', 'string', 'max:100'],
        ]);

        $user = auth()->user();
        $feed = new Feed();
        $feed->created_by = $user->id;
        $feed->video =$request->file('video')->store('feed');
        $feed->caption = $request->caption;
        $feed->save();

        return redirect(route('feed.index'))->with('success','Added!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(feed $feed)
    {
        if($feed->feed) {
            storage::delete($feed->video);
        }
        if($feed->delete()) {
            return redirect()->route('feed.index')->with('success', 'video berhasil dihapus!');
        }
        return redirect()->route('feed.index')->with('error', 'video gagal dihapus!');
    }
}
