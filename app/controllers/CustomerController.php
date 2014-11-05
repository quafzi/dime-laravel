<?php

class CustomerController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $customers = Customer::where('user_id', Auth::user()->id)->get();

        return Response::json([
            'error' => false,
            'customers' => $customers->toArray()
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
        $customer = new Customer;
        $customer->name = Request::get('name');
        $customer->alias = Request::get('alias');
        $customer->enabled = true;
        $customer->user_id = Auth::user()->id;

        // Validation and Filtering is sorely needed!!
        // Seriously, I'm a bad person for leaving that out.

        $customer->save();

        return Response::json([
            'error' => false,
            'customer' => $customer->toArray()
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
        $customer = Customer::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->take(1)
            ->get();

        return Response::json([
            'error' => false,
            'customer' => $customer->toArray()
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
        $customer = Customer::where('user_id', Auth::user()->id)->find($id);

        foreach (['alias', 'name', 'enabled'] as $field) {
            if (Request::get($field)) {
                $customer->$field = Request::get($field);
            }
        }

        $customer->save();

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
        $customer = Customer::where('user_id', Auth::user()->id)->find($id);

        $customer->delete();

        return Response::json([
            'error' => false,
            'message' => 'customer deleted'
        ], 200);
    }
}
