<?php

namespace App\Http\Controllers;


use App\Driver;
use Excel;
use Illuminate\Http\Request;
use PDF;
use Yajra\DataTables\DataTables;

class DriverController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('role:admin,staff');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::all();
        return view('drivers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request , [
            'name1'          => 'required|string',
            'address1'         => 'required',
            'email'   => 'required',
            'phone1'   => 'required',
        ]);

        

        Driver::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Driver Created'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $driver = Driver::find($id);
        return $driver;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request , [
            'name1'          => 'required|string',
            'address1'         => 'required',
            'email'   => 'required',
            'phone1'   => 'required',
        ]);

        $input = $request->all();
        $driver = Driver::findOrFail($id);

       
        $driver->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Driver Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);


        drivers::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Driver Deleted'
        ]);
    }

    public function apiDrivers(){
        $driver = Driver::all();

        return Datatables::of($driver)
            ->addColumn('action', function ($driver){

                return 
                    '<a onclick="editForm('. $driver->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $driver->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['action'])->make(true);

    }
}
