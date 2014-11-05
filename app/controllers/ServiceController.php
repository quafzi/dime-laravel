<?php

class ServiceController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $services = Service::where('user_id', Auth::user()->id)->get();

        return Response::json([
            'error' => false,
            'services' => $services->toArray()
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
        $service = new Service;
        $service->name = Request::get('name');
        $service->alias = Request::get('alias');
        $service->enabled = true;
        $service->user_id = Auth::user()->id;

        // Validation and Filtering is sorely needed!!
        // Seriously, I'm a bad person for leaving that out.

        $service->save();

        return Response::json([
            'error' => false,
            'service' => $service->toArray()
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
        $service = Service::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->take(1)
            ->get();

        return Response::json([
            'error' => false,
            'service' => $service->toArray()
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
        $service = Service::where('user_id', Auth::user()->id)->find($id);

        foreach (['alias', 'name', 'enabled'] as $field) {
            if (Request::get($field)) {
                $service->$field = Request::get($field);
            }
        }

        $service->save();

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
        $service = Service::where('user_id', Auth::user()->id)->find($id);

        $service->delete();

        return Response::json([
            'error' => false,
            'message' => 'service deleted'
        ], 200);
    }
}
