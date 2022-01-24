<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Driver;
use App\Exports\ExportProduckOut;
use App\Product;
use App\Product_Out;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use PDF;


class ProductOutController extends Controller
{
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
        $products = Product::orderBy('name1','ASC')
            ->get()
            ->pluck('name1','id');

        $customers = Customer::orderBy('name1','ASC')
            ->get()
            ->pluck('name1','id');

            $drivers = Driver::orderBy('name1','ASC')
            ->get()
            ->pluck('name1','id');

        $invoice_data = Product_Out::all();
        return view('product_out.index', compact('products','customers','drivers', 'invoice_data'));
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
        $this->validate($request, [
           'product_id'     => 'required',
           'customer_id'    => 'required',
           'qty'            => 'required',
           'date'           => 'required',
           'driver_id'      => 'required',
           'status'         => 'required'
        ]);

        Product_Out::create($request->all());

        $product = Product::findOrFail($request->product_id);
        $product->qty -= $request->qty;
        $product->save();

        return response()->json([
            'success'    => true,
            'message'    => 'Products Out Created'
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
        $product_out = Product_Out::find($id);
        return $product_out;
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
        $this->validate($request, [
            'product_id'     => 'required',
            'customer_id'    => 'required',
            'qty'            => 'required',
            'date'           => 'required',
            'driver'         => 'required'
        ]);

        $product_out = Product_Out::findOrFail($id);
        $product_out->update($request->all());

        $product = Product::findOrFail($request->product_id);
        $product->qty -= $request->qty;
        $product->update();

        return response()->json([
            'success'    => true,
            'message'    => 'Product Out Updated'
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
        Product_Out::destroy($id);

        return response()->json([
            'success'    => true,
            'message'    => 'Products Delete Deleted'
        ]);
    }



    public function apiProductsOut(){
        $product = Product_Out::all();

        return Datatables::of($product)
            ->addColumn('products_name', function ($product){
                return $product->product->name1;
            })
            ->addColumn('customer_name', function ($product){
                return $product->customer->name1;
            })
            ->addColumn('action', function($product){
                return 
                    '<a onclick="editForm('. $product->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $product->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['products_name','customer_name','action'])->make(true);

    }

    public function exportProductOutAll()
    {
        $product_out = Product_Out::all();
        $pdf = PDF::loadView('product_out.productOutAllPDF',compact('product_out'));
        return $pdf->download('product_out.pdf');
    }

    public function exportProductOut($id)
    {
        $product_out = Product_Out::findOrFail($id);
        $pdf = PDF::loadView('product_out.productOutPDF', compact('product_out'));
        return $pdf->download($product_out->id.'_product_out.pdf');
    }

    public function exportExcel()
    {
        return (new ExportProduckOut)->download('product_out.xlsx');
    }
}
