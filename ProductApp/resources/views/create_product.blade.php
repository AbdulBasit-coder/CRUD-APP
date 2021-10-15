@extends('layout.master')
@section('content')
  <div class="container">
  <div class="row pt-5">
    <div class="col-md-12"><a href="{{url('product')}}">Goto Product Page</a></div>
    </div>
    <div class="row pt-2">
    <div class="col-md-12"><h1><b>Create Product</b></h1></div>
    </div>
    <div class="row frm">
      <div class="col-md-12">
        <form  action="{{url('product')}}" method="POST">
        @csrf
          <div class="row">
            <div class="col-lg-6 pb-3">
              <label for="name">Title</label>
              <input type="text" class="form-control" id="name" name="title" placeholder="Enter Product title">
                @if($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div>
                @endif
            </div>
            <div class="col-lg-6 pb-3">
              <label for="lastname">Description</label>
              <input type="text" class="form-control" id="lastname" name="description" placeholder="Enter Product Description">
                @if($errors->has('description'))
                <div class="error">{{ $errors->first('description') }}</div>
                @endif
            </div>
            <div class="col-lg-6 pt-3">
              <label for="email">Price</label>
              <input type="number" class="form-control" id="email" name="price" placeholder="Enter Product Price">
                @if($errors->has('price'))
                <div class="error">{{ $errors->first('price') }}</div>
                @endif
            </div>
          </div>
          <div class="submit">
            <button class="btn sub">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection