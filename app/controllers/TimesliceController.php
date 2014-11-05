<?php

class TimesliceController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $timeslices = Timeslice::where('user_id', Auth::user()->id)->get();

        return Response::json([
            'error' => false,
            'timeslices' => $timeslices->toArray()
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
        $timeslice = new Timeslice;
        $timeslice->name = Request::get('name');
        $timeslice->alias = Request::get('alias');
        $timeslice->enabled = true;
        $timeslice->user_id = Auth::user()->id;

        // Validation and Filtering is sorely needed!!
        // Seriously, I'm a bad person for leaving that out.

        $timeslice->save();

        return Response::json([
            'error' => false,
            'timeslice' => $timeslice->toArray()
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
        $timeslice = Timeslice::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->take(1)
            ->get();

        return Response::json([
            'error' => false,
            'timeslice' => $timeslice->toArray()
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
        $timeslice = Timeslice::where('user_id', Auth::user()->id)->find($id);

        foreach (['alias', 'name', 'enabled'] as $field) {
            if (Request::get($field)) {
                $timeslice->$field = Request::get($field);
            }
        }

        $timeslice->save();

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
        $timeslice = Timeslice::where('user_id', Auth::user()->id)->find($id);

        $timeslice->delete();

        return Response::json([
            'error' => false,
            'message' => 'timeslice deleted'
        ], 200);
    }
}
