<?php

namespace App\Http\Controllers;


use App\Exports\ExportProduckIn;
use App\Product;
use App\Product_In;
use App\Supplier;
use PDF;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class ProductInController extends Controller
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

        $suppliers = Supplier::orderBy('name1','ASC')
            ->get()
            ->pluck('name1','id');

        $invoice_data = Product_In::all();
        return view('product_in.index', compact('products','suppliers','invoice_data'));
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
            'supplier_id'    => 'required',
            'qty'            => 'required',
            'date'        => 'required'
        ]);

        Product_In::create($request->all());

        $product = Product::findOrFail($request->product_id);
        $product->qty += $request->qty;
        $product->save();

        return response()->json([
            'success'    => true,
            'message'    => 'Products In Created'
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
        $product_in = Product_In::find($id);
        return $product_in;
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
            'supplier_id'    => 'required',
            'qty'            => 'required',
            'date'        => 'required'
        ]);

        $product_in = Product_In::findOrFail($id);
        $product_in->update($request->all());

        $product = Product::findOrFail($request->product_id);
        $product->qty += $request->qty;
        $product->update();

        return response()->json([
            'success'    => true,
            'message'    => 'Product In Updated'
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
        Product_In::destroy($id);

        return response()->json([
            'success'    => true,
            'message'    => 'Products In Deleted'
        ]);
    }



    public function apiProductsIn(){
        $product = Product_In::all();

        return Datatables::of($product)
            ->addColumn('products_name', function ($product){
                return $product->product->name1;
            })
            ->addColumn('supplier_name', function ($product){
                return $product->supplier->name1;
            })
            ->addColumn('action', function($product){
                return 
                    '<a onclick="editForm('. $product->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $product->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a> ';


            })
            ->rawColumns(['products_name','supplier_name','action'])->make(true);

    }

    public function exportProductInAll()
    {
        $product_in = Product_In::all();
        $pdf = PDF::loadView('product_in.productInAllPDF',compact('product_in'));
        return $pdf->download('product_in.pdf');
    }

    public function exportProductIn($id)
    {
        $product_in = Product_In::findOrFail($id);
        $pdf = PDF::loadView('product_in.productInPDF', compact('product_in'));
        return $pdf->download($product_in->id.'_product_in.pdf');
    }

    public function exportExcel()
    {
        return (new ExportProduckIn)->download('product_in.xlsx');
    }
}
