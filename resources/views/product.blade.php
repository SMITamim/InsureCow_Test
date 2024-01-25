@extends('designTeam.layout')
@section('content')

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card addForm">
                    <div class="card-header">
                        <label for="Title"><h2>Product Information</h2></label>
                    </div>
                    <div class="card-body">
                        <div class="PersonalInfo">
                            <form action="{{route('addProduct')}}" method="post" enctype="multipart/form-data"
                                  id="myForm">
                                {{csrf_field()}}
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <ul>
                                            <button type="button" class="btn-close"
                                                    data-bs-dismiss="alert"></button>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="Form text-white">
                                                <label for="college">Product Name<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name" id="center"
                                                       placeholder="Product Name" value="{{old('name')}}">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="Form text-white">
                                                <label for="college">Category<span class="text-danger">*</span></label>
                                                <select class="form-select" name="category" id="category_id" >
                                                    <option value="">--Select--</option>
                                                    @foreach($categories as $Category)
                                                        <option value={{$Category->id}}>{{$Category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="Form text-white">
                                                <label for="serial">Price<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="price" id="price"
                                                       placeholder="Price" value="{{old('price')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="Form text-white">
                                                <label for="address">Quantity</label>
                                                <textarea class="form-control" name="quantity" id="quantity"
                                                          placeholder="Quantity">{{old('quantity')}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

            </div>
            
                <div class="row mt-5">
                    <div class="col-md-12">
                        <!-- Add export button -->
                        <a href="{{ route('export-products') }}" class="btn btn-primary mb-3">
                            <i class="bi bi-file-earmark-excel"></i>
                        </a>
            
                        <div class="card addForm">
                            <!-- ... (your existing code) ... -->
                        </div>
                    </div>
                </div>
            
        <div class="row mt-2">
            @if($products->count()>0)
            <table class="table table-dark" id="myTable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" id="edit" title="edit"
                                   data-url="{{route('getProduct',$product->id)}}">
                                    <i class="bi bi-pen"></i>
                                </a>
                                <a class="btn btn-danger btn-sm" id="delete" title="Delete"
                                   data-url="{{route('getProduct',$product->id)}}">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
            </table>
            @endif
            
        </div>
    </div>
    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Product Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="text-dark">Are you sure to delete this Product?</span>
                </div>
                <div class="modal-footer">
                    <form action="{{route('deleteProduct')}}" class="form-group" method="post"
                          enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" id="id" name="id">
                        <input type="submit" class="btn btn-danger" id="yes" value="Yes">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample" action="{{route('updateProduct')}}" method="post"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="form-group">

                                        <input type="hidden" class="form-control" name="id" id="pid"
                                              >
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Product Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="productEdit"
                                               placeholder="Enter Product name">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Category <span class="text-danger">*</span></label>
                                        <select class="form-select" name="category" id="categoryEdit">
                                            <option value="">--Select--</option>
                                            @foreach($categories as $category)
                                                <option value={{$category->id}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="short">Product Price <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="price" id="priceEdit"
                                               placeholder="Enter Price">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Quantity <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="quantity" id="quantityEdit"
                                               placeholder="Quantity">
                                    </div>
                                    

                                    <button type="submit" class="btn btn-primary mr-2 mt-2">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $('body').on('click', '#delete', function () {
                var userURL = $(this).data('url');
                $.get(userURL, function (data) {
                    console.log(data)
                    $('#deleteModal').modal('show');
                    $('#id').val(data.id);
                })
            });
        });
        $(document).ready(function () {
            $('body').on('click', '#edit', function () {
                var userURL = $(this).data('url');
                $.get(userURL, function (data) {
                    console.log(data)
                    $('#editModal').modal('show');
                    $('#pid').val(data.id);
                    $('#productEdit').val(data.name);
                    $('#categoryEdit').val(data.category_id);
                    $('#priceEdit').val(data.price);
                    $('#quantityEdit').val(data.quantity);
                })
            });
        });
    </script>
@endsection