<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiscussionRequest;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiscussionController extends Controller
{

    public function __construct() 
    {
        $this->middleware("auth")->only(["create", "store"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("discussions.index",[ 
        "discussions" => Discussion::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("discussions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDiscussionRequest $request)
    {
        auth()->user()->discussions()->create([
            "title" => $request->title,
            "content" => $request->content,
            "channel_id" => $request->channel,
            "slug" => Str::slug($request->title)

        ]);

        session()->flash("success", "Discussion posted.");
        return redirect()->route("discussions.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Discussion $discussion)
    {
        return view("discussions.show", compact("discussion"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
