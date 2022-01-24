<?php

namespace App\Http\Controllers;
use App\Category;
use App\Delivery;
use App\Product;
use App\Driver;
use App\Customer;
use Illuminate\Http\Request;

class DeliveryController extends Controller
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
        $customer = Customer::orderBy('id','DESC')
            ->get()
            ->pluck('id');
        $driver = Driver::orderBy('name2','DESC')
            ->get()
            ->pluck('name2','id');
        $products = Product::orderBy('name1','DESC')
            ->get()
            ->pluck('name1','id');
        $delivery = Delivery::all();
        return view('delivery.index', compact('delivery'));
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
            'Customer_name'    => 'required',
            'Customer_address'    => 'required',
            'Product_name'     => 'required',
            'Product_price'         => 'required',
            'Product_qty'           => 'required',
            'Driver_name'   => 'required',
        ]);

        $input = $request->all();
        $input['image'] = null;
        $product = Product::findOrFail($request->product_name);
        $product->qty += $request->qty;
        $product->price += $request->price;
        $product->save();

        Delivery::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Delivery Created'
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

        $delivery = Delivery::find($id);
        return $delivery;
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
            'Customer_name'    => 'required',
            'Customer_address'    => 'required',
            'Product_name'     => 'required',
            'Product_price'         => 'required',
            'Product_qty'           => 'required',
            'Driver_name'   => 'required',
        ]);

        $input = $request->all();
        $produk = Product::findOrFail($id);
        $product = Product::findOrFail($request->product_id);
        $product->qty += $request->qty;
        $product->update();


        $produk->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Delivery Updated'
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
        $delivery = Delivery::findOrFail($id);


        Delivery::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Delivery Deleted'
        ]);
    }

    public function apiDelivery(){
        $delivery = Delivery::all();

        return Datatables::of($delivery)
            ->addColumn('Customer_name', function ($product){
                return $product->category->name;
            })
            
            ->addColumn('action', function($product){
                return 
                    '<a onclick="editForm('. $product->id .')" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a> ' .
                    '<a onclick="deleteData('. $product->id .')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            })
            ->rawColumns(['category_name','show_photo','action'])->make(true);

    }
}
