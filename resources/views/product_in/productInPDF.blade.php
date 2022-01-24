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
            <td width="">: {{ $product_in->id }}</td>
            <td width="30px">Created</td>
            <td>: {{ $product_in->date }}</td>
        </tr>

        <tr>
            <td>Telepon</td>
            <td>: {{ $product_in->supplier->phone1 }}</td>
            <td>Alamat</td>
            <td>: {{ $product_in->supplier->address1 }}</td>
        </tr>

        <tr>
            <td>Nama</td>
            <td>: {{ $product_in->supplier->name1 }}</td>
            <td>Email</td>
            <td>: {{ $product_in->supplier->email }}</td>
        </tr>

        <tr>
            <td>Product</td>
            <td >: {{ $product_in->product->name1 }}</td>
            <td>Quantity</td>
            <td >: {{ $product_in->qty }}</td>
        </tr>

    </table>

    {{--<hr  size="2px" color="black" align="left" width="45%">--}}

</div>
