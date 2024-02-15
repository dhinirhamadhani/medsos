<?php

namespace App\Http\Controllers;
use App\Models\vid;
use Illuminate\Http\Request;

class vidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vid = vid::latest()->paginate(5);
        return view ('vid.index',compact('vid'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vid' => ['required', 'mines:mp4', 'max:10048']
        ]);
        $user = auth()->user();
        $vid = new vid();
        $vid->created_by = $user->id;
        $vid->vid = $user->request->file('vid')->store('vid');
        $vid->caption = $reuest->caption;
        $vid->save();

        return redirect(route('vidd.index'))->with('success','Addes!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vid $vid)
    {
        // $vid->delete();
        // return redirect()->route('vidd.index')->with('success', 'Video Berhasil di Hapus');
        if($vid->vid) {
            storage::delete($vid->$vid);
        }
        if($vid->delete()) {
            return redirect()->route('vidd.index')->with('success', 'Video berhasil dihapus!');
        }
        return redirect()->route('vidd.index')->with('error', 'Video gagal dihapus!');
    }
}
