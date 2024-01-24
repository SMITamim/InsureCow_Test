@extends('designTeam.layout')
@section('content')
    <div class="container-fluid">
        <div class="row" style="text-align: center">
            <h1>Welcome To Insure Cow</h1>
        </div>

        <div class="row" >
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('product') }}"><b>Product</b></a></li>
                </ol>
            </nav>
        </div>
    </div>
@endsection