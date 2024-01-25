@extends('designTeam.layout')

@section('content')
    <div class="row mt-2">
        @if($products->count() > 0)
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
                                <a class="btn btn-success btn-sm edit-btn" title="edit"
                                   data-url="{{route('getUserProduct', $product->id)}}" data-id="{{$product->id}}">
                                    <i class="bi bi-pen"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- purchase Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success">Purchase Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form class="forms-sample" action="/update-product-user" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="id" id="pid">
                                    </div>

                                    <div class="form-group">
                                        <label for="quantityEdit">Quantity <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="quantity" id="quantityEdit">
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2 mt-2">Purchase</button>
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
    $('#myTable').DataTable();
}); 

        $(document).ready(function () {
            $('body').on('click', '.edit-btn', function () {
                var productId = $(this).data('id');
                var userURL = $(this).data('url');

                $.get(userURL, function (data) {
                    console.log(data);
                    $('#editModal').modal('show');
                    $('#pid').val(productId);
                    $('#quantityEdit').val('');
                });
            });
            
        });
    </script>
@endsection
