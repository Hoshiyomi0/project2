<?php

namespace App\Http\Controllers;

use App\Category;
use App\Exports\ExportDisposal;
use App\Product;
use App\Disposal;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use PDF;


class DisposalController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::orderBy('name1','ASC')
            ->get()
            ->pluck('name1','id');

        $invoice_data = Disposal::all();
        return view('disposal.index', compact('products'));
    }
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
           'qty'            => 'required',
           'date'           => 'required'
        ]);

        Disposal::create($request->all());

        $product = Product::findOrFail($request->product_id);
        $product->qty -= $request->qty;
        $product->save();

        return response()->json([
            'success'    => true,
            'message'    => 'Disposed'
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
        $disposal = Disposal::find($id);
        return $disposal;
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
            'qty'            => 'required',
            'date'           => 'required'
        ]);

        $disposal= Disposal::findOrFail($id);
        $disposal->update($request->all());

        $product = Product::findOrFail($request->product_id);
        $product->qty -= $request->qty;
        $product->update();

        return response()->json([
            'success'    => true,
            'message'    => 'Updated'
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
        Disposal::destroy($id);

        return response()->json([
            'success'    => true,
            'message'    => 'Products Disposed'
        ]);
    }



    public function apiDisposal(){
        $product = Disposal::all();

        return Datatables::of($product)
            ->addColumn('products_name', function ($product){
                return $product->product->name1;
            })
            ->addColumn('action', function($product){
                return 
                    '<a onclick="editForm('. $product->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $product->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['products_name','action'])->make(true);

    }

    public function exportDisposal()
    {
        $disposal = disposal::all();
        $pdf = PDF::loadView('disposal.disposalPDF',compact('disposal'));
        return $pdf->download('disposal.pdf');
    }
}
