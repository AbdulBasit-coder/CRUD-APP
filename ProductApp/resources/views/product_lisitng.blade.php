@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="add_list pt-5">
      <a  href="{{url('product/create')}}">Add Product</a>
    </div>
    <div class="row tables_data">
      <div class="col-md-12">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Price</th>
              <th scope="col">Edit</th>
              <th scope="col">Soft Delete Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($product as $p)
            <tr>
              <th scope="row">{{$p->id}}</th>
              <td>{{$p->title}}</td>
              <td>{{$p->description}}</td>
              <td>{{$p->price}}</td>
              <td><a href="{{url('product/edit/'.$p->id)}}">Edit</a></td>
              <td><a href="{{url('product/delete/'.$p->id)}}">Click to delete</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection