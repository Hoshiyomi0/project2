<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>


</head>

<style>
    #table-data {
        border-collapse: collapse;
        padding: 3px;
    }

    #table-data td, #table-data th {
        border: 1px solid black;
    }
</style>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                             
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


        <table border="0" id="table-data" width="80%">
            <tr>
                <td width="70px">Invoice ID</td>
                <td width="">: {{ $product_out->id }}</td>
                <td width="30px">Created</td>
                <td>: {{ $product_out->date }}</td>
            </tr>

            <tr>
                <td>Telephone</td>
                <td>: {{ $product_out->customer->phone1 }}</td>
                <td>Address</td>
                <td>: {{ $product_out->customer->address1 }}</td>
            </tr>

            <tr>
                <td>Name</td>
                <td>: {{ $product_out->customer->name1 }}</td>
                <td>Email</td>
                <td>: {{ $product_out->customer->email }}</td>
            </tr>

            <tr>
                <td>Product</td>
                <td >: {{ $product_out->product->name1 }}</td>
                <td>Quantity</td>
                <td >: {{ $product_out->qty }}</td>
            </tr>

            <tr>
                <td>Driver</td>
                <td >: {{ $product_out->driver->name1 }}</td>
                <td>Status></td>
                <td>: {{ $product_out->status }}</td>
            </tr>

        </table>

        {{--<hr  size="2px" color="black" align="left" width="45%">--}}

</div>
