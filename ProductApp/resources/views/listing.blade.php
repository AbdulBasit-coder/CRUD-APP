@extends('layout.master')
@section('content')
<div id="product-list">
<product-listing></product-listing>
<export-excel
    :data   = "{{json_encode($product)}}">
    Download Data
</export-excel>
</div>
@endsection
@section('scripts')
@parent
<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
@endsection