<?php

class ProjectController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $projects = Project::where('user_id', Auth::user()->id)->get();

        return Response::json([
            'error' => false,
            'projects' => $projects->toArray()
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
        $project = new Project;
        $project->name = Request::get('name');
        $project->alias = Request::get('alias');
        $project->enabled = true;
        $project->user_id = Auth::user()->id;

        // Validation and Filtering is sorely needed!!
        // Seriously, I'm a bad person for leaving that out.

        $project->save();

        return Response::json([
            'error' => false,
            'project' => $project->toArray()
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
        $project = Project::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->take(1)
            ->get();

        return Response::json([
            'error' => false,
            'project' => $project->toArray()
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
        $project = Project::where('user_id', Auth::user()->id)->find($id);

        foreach (['alias', 'name', 'enabled'] as $field) {
            if (Request::get($field)) {
                $project->$field = Request::get($field);
            }
        }

        $project->save();

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
        $project = Project::where('user_id', Auth::user()->id)->find($id);

        $project->delete();

        return Response::json([
            'error' => false,
            'message' => 'project deleted'
        ], 200);
    }
}
