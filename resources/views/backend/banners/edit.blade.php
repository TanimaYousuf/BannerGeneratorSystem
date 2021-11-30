<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Banner Generator System</title>
    @include('backend.layouts.styles')
    <link rel="stylesheet" href="{{asset('backend/assets/templates/vendors/font-awesome/css/font-awesome.min.css')}}">
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('backend.layouts.header')
    <div class="container-fluid page-body-wrapper">
        @include('backend.layouts.sidebar')
        <div class="main-panel user-create-main-panel">
            <div class="content-wrapper">
                <h4 class="user-create-title">Edit Banner - {{$banner->title}}</h4>
                <hr class="Dash-Line">
                <div class="CreateTaskBox card-body">
                    <form method="POST" action="{{route('banners.update',$banner->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-row py-4">
                            {{-- start 1st col --}}
                            <div class="col-md-4 px-5">
                                <div class="form-group row">
                                    <div>
                                        <label for="title">Title<span class="mandatory">*</span></label>
                                    </div>
                                    <div>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $banner->title }}">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <a href="{{route('banners.index')}}" class=" btn custom-outline-btn">Cancel</a>
                                    <button class="btn custom-btn">Update</button>
                                </div>
                            </div>

                            {{-- end 1st col --}}
                            {{-- start 2nd col --}}
                            <div class="col-md-8">
                                <div class="row DataTableBox" style="margin-top: 20px; margin-bottom:20px; margin-left:30px; margin-right:30px; padding-bottom:10px;">
                                    <div class="table-abc">
                                        <table class="table" id="task-table">
                                            <thead>
                                            <tr>
                                                <th>Image Link/upload</th>
                                                <th>Content</th>
                                                <th>Price</th>
                                                <th>Custom Title</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr id="table-row-copy" style="display:none;">
                                                    <td>
                                                        <input type="file" name="images[]" style="display:none;">
                                                        <a onClick="fileUpload($(this))" style="margin-bottom:10px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16.5 6v11.5c0 2.21-1.79 4-4 4s-4-1.79-4-4V5c0-1.38 1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5v10.5c0 .55-.45 1-1 1s-1-.45-1-1V6H10v9.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5V5c0-2.21-1.79-4-4-4S7 2.79 7 5v12.5c0 3.04 2.46 5.5 5.5 5.5s5.5-2.46 5.5-5.5V6h-1.5z"/></svg>
                                                        </a>
                                                        <textarea name="links[]" rows="10" cols="15"></textarea>
                                                    </td>
                                                    
                                                    <td><img class="img-show" src="#" style="display:none; border-radius:0; height:150px; width:150px;"/></td>

                                                    <td>
                                                        <input type="text" class="form-control" name="prices[]" style="width:100px;">
                                                    </td>

                                                    <td>
                                                        <input type="text" class="form-control" name="custom_titles[]" style="width:100px;">
                                                    </td>

                                                    <td>
                                                        <button onclick="rowAdd($(this))" style="background-color:green;border:none;height:30px;width:30px;"><i class="fa fa-plus" style="color:white"></i></a>
                                                        <button onclick="rowRemove($(this))" style="background-color:red;border:none;height:30px;width:30px;display:none;"><i class="fa fa-minus" style="color:white"></i></button>
                                                    </td>
                                                </tr>
                                                @foreach($banner->products as $product)
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" name="productIds" value="{{$product->id}}">
                                                            <input type="file" name="ext_images[]" style="display:none;">
                                                            <a onClick="fileUpload($(this))" style="margin-bottom:10px;">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16.5 6v11.5c0 2.21-1.79 4-4 4s-4-1.79-4-4V5c0-1.38 1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5v10.5c0 .55-.45 1-1 1s-1-.45-1-1V6H10v9.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5V5c0-2.21-1.79-4-4-4S7 2.79 7 5v12.5c0 3.04 2.46 5.5 5.5 5.5s5.5-2.46 5.5-5.5V6h-1.5z"/></svg>
                                                            </a>
                                                            @if(isset($product->link))
                                                                <textarea name="ext_links[]" rows="10" cols="15">{{$product->link}}</textarea>
                                                            @else
                                                                <textarea name="ext_links[]" rows="10" cols="15"></textarea>
                                                            @endif
                                                        </td>
                                                    
                                                        <td>
                                                            @if(isset($product->link))
                                                                <img class="img-show" src="{{$product->link}}" style="border-radius:0; height:150px; width:150px;" height="100%" width="100%" />
                                                            @else
                                                                <img class="img-show" src="{{asset('backend/uploads/banners/'.$banner->id.'/'.$product->file_name)}}" style="border-radius:0; height:150px; width:150px;" height="100%" width="100%" />
                                                            @endif

                                                        </td>

                                                        <td>
                                                            <input type="text" class="form-control" name="ext_prices[]" style="width:100px;" value="{{$product->price}}">
                                                        </td>

                                                        <td>
                                                            <input type="text" class="form-control" name="ext_custom_titles[]" style="width:100px;" value="{{$product->custom_title}}">
                                                        </td>

                                                        <td>
                                                            <button onclick="rowAdd($(this))" style="background-color:green;border:none;height:30px;width:30px;display:none;"><i class="fa fa-plus" style="color:white"></i></a>
                                                            <button onclick="rowRemove($(this))" style="background-color:red;border:none;height:30px;width:30px;"><i class="fa fa-minus" style="color:white"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td>
                                                        <input type="file" name="images[]" style="display:none;">
                                                        <a onClick="fileUpload($(this))" style="margin-bottom:10px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16.5 6v11.5c0 2.21-1.79 4-4 4s-4-1.79-4-4V5c0-1.38 1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5v10.5c0 .55-.45 1-1 1s-1-.45-1-1V6H10v9.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5V5c0-2.21-1.79-4-4-4S7 2.79 7 5v12.5c0 3.04 2.46 5.5 5.5 5.5s5.5-2.46 5.5-5.5V6h-1.5z"/></svg>
                                                        </a>
                                                        <textarea name="links[]" rows="10" cols="15"></textarea>
                                                    </td>
                                                   
                                                    <td><img class="img-show" src="#" style="display:none; border-radius:0; height:150px; width:150px;" height="100%" width="100%" /></td>

                                                    <td>
                                                        <input type="text" class="form-control" name="prices[]" style="width:100px;">
                                                    </td>

                                                    <td>
                                                        <input type="text" class="form-control" name="custom_titles[]" style="width:100px;">
                                                    </td>

                                                    <td>
                                                        <button onclick="rowAdd($(this))" style="background-color:green;border:none;height:30px;width:30px;"><i class="fa fa-plus" style="color:white"></i></a>
                                                        <button onclick="rowRemove($(this))" style="background-color:red;border:none;height:30px;width:30px;display:none;"><i class="fa fa-minus" style="color:white"></i></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- end 2nd col --}}
                        </div> 
                    </form>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
            {{--            footer--}}
            <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        <!-- container-scroller -->
        @include('backend.layouts.scripts')
        <script>
            function rowAdd(This){
                event.preventDefault();
                $("#table-row-copy").clone().appendTo("tbody").removeAttr('id').show();
                This.hide();
                This.next().show();
            }
            function rowRemove(This){
                event.preventDefault();
                This.closest('tr').remove();
            }

            function fileUpload(This){
                This.prev().trigger('click');
                This.prev().change(function(){
                    This.next().val('');
                    const file = this.files[0];
                    if (file){
                        let reader = new FileReader();
                        reader.onload = function(event){
                            This.closest('td').next().find('.img-show').attr('src', event.target.result);
                            This.closest('td').next().find('.img-show').show();
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
            $('textarea').keyup(function(){
                $(this).closest('td').next().find('.img-show').attr('src',$(this).val());
                $(this).closest('td').next().find('.img-show').show();
            });
        </script>

</body>

</html>
