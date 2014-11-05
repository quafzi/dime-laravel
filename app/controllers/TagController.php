<?php

class TagController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::where('user_id', Auth::user()->id)->get();

        return Response::json([
            'error' => false,
            'tags' => $tags->toArray()
        ], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $tag = new Tag;
        $tag->name = Request::get('name');
        $tag->alias = Request::get('alias');
        $tag->enabled = true;
        $tag->user_id = Auth::user()->id;

        // Validation and Filtering is sorely needed!!
        // Seriously, I'm a bad person for leaving that out.

        $tag->save();

        return Response::json([
            'error' => false,
            'tag' => $tag->toArray()
        ], 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // Make sure current user owns the requested resource
        $tag = Tag::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->take(1)
            ->get();

        return Response::json([
            'error' => false,
            'tag' => $tag->toArray()
        ], 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $tag = Tag::where('user_id', Auth::user()->id)->find($id);

        foreach (['alias', 'name', 'enabled'] as $field) {
            if (Request::get($field)) {
                $tag->$field = Request::get($field);
            }
        }

        $tag->save();

        return Response::json([
            'error' => false,
            'message' => 'url updated'
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $tag = Tag::where('user_id', Auth::user()->id)->find($id);

        $tag->delete();

        return Response::json([
            'error' => false,
            'message' => 'tag deleted'
        ], 200);
    }
}
