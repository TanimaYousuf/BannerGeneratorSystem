<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Banner Generator System</title>

    @include('backend.layouts.styles')
    <link rel="stylesheet"
        href="{{ asset('backend/assets/templates/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/templates/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"
        type="text/css" />

    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        .button {
            margin-left: 10px;
            border-radius: 10px;
            background-color: whitesmoke;
            border: none;
            color: #7a8fa4;
            padding: 5px
        }

        .button_selected {
            margin-left: 10px;
            border-radius: 10px;
            background-color: whitesmoke;
            color: #fff;
            float: right;
            padding: 5px
        }

    </style>
</head>

<body>
    <div class="container-scroller team-list-main-page">
        <!-- partial:partials/_navbar.html -->
        @include('backend.layouts.header')
        <div class="container-fluid page-body-wrapper">
            @include('backend.layouts.sidebar')
            <div class="main-panel team-list-main-panel">
                <div class="content-wrapper">
                    @include('backend.layouts.messages')
                    <div class="row team-list-page-top-row">
                        <div class="col-md-7 team-list-page-top">
                           
                        </div>
                        <div class="col-md-5 team-list-page-buttons">
                        
                        </div>
                    </div>
                    <!-- card view -->
                    <div id="card-view">
                        <div class="row">
                            @foreach ($banner->products as $product)
                                <div class="col-sm-3 team-list-card-top">
                                    <div class="card team-card">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-left">
                                                    @if(isset($product->link))
                                                        <img class="img-show" src="{{$product->link}}" style="border-radius:0; height:100px;" />
                                                    @else
                                                        <img class="img-show" src="{{asset('backend/uploads/banners/'.$banner->id.'/'.$product->file_name)}}" style="border-radius:0; height:100px;"/>
                                                    @endif
                                                </div>
                                                <div class="media-body ml-1" style="marign-left:20px;">
                                                <h4 class="media-heading" style="font-family:Rubik;">{{$product->custom_title}}</h4>
                                                <h3 style="color:green;">{{$product->price}}</h3>
                                                <img src="{{asset('backend/assets/img/order.png')}}" style="width:170px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- list view -->
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    {{-- footer --}}
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
        </div>
    </div>
    <!-- page-body-wrapper ends -->
    <!-- container-scroller -->

    @include('backend.layouts.scripts')

</body>

</html>
