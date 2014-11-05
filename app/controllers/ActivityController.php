<?php

class ActivityController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $activities = Activity::where('user_id', Auth::user()->id)->get();

        return Response::json([
            'error' => false,
            'activities' => $activities->toArray()
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
        $activity = new Activity;
        $activity->name = Request::get('name');
        $activity->alias = Request::get('alias');
        $activity->enabled = true;
        $activity->user_id = Auth::user()->id;

        // Validation and Filtering is sorely needed!!
        // Seriously, I'm a bad person for leaving that out.

        $activity->save();

        return Response::json([
            'error' => false,
            'activity' => $activity->toArray()
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
        $activity = Activity::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->take(1)
            ->get();

        return Response::json([
            'error' => false,
            'activity' => $activity->toArray()
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
        $activity = Activity::where('user_id', Auth::user()->id)->find($id);

        foreach (['alias', 'name', 'enabled'] as $field) {
            if (Request::get($field)) {
                $activity->$field = Request::get($field);
            }
        }

        $activity->save();

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
        $activity = Activity::where('user_id', Auth::user()->id)->find($id);

        $activity->delete();

        return Response::json([
            'error' => false,
            'message' => 'activity deleted'
        ], 200);
    }
}
