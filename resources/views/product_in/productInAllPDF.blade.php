{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport"--}}
          {{--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    {{--<link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css ')}}">--}}
    
    {{--<link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css')}} ">--}}
    
    {{--<link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css')}} ">--}}

    {{--<title>Product In Exports All PDF</title>--}}
{{--</head>--}}
{{--<body>--}}
    <style>
        #product-in {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #product-in td, #product-in th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #product-in tr:nth-child(even){background-color: #f2f2f2;}

        #product-in tr:hover {background-color: #ddd;}

        #product-in th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>

    <table id="product-in" width="100%">
        <thead>
        <tr>
            <td>ID</td>
            <td>Product</td>
            <td>Supplier</td>
            <td>Quantity</td>
            <td>Date</td>
        </tr>
        </thead>
        @foreach($product_in as $p)
            <tbody>
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->product->name1 }}</td>
                <td>{{ $p->supplier->name1 }}</td>
                <td>{{ $p->qty }}</td>
                <td>{{ $p->date }}</td>
            </tr>
            </tbody>
        @endforeach

    </table>


    
    {{--<script src="{{  asset('assets/bower_components/jquery/dist/jquery.min.js') }} "></script>--}}
    
    {{--<script src="{{  asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>--}}
    
    {{--<script src="{{  asset('assets/dist/js/adminlte.min.js') }}"></script>--}}
{{--</body>--}}
{{--</html>--}}


