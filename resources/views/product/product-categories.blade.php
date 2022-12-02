@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="d-flex justify-content-between mb-4">
   <h3>Category Product List</h3>
</div>
@if(session()->has('success'))
<label class="alert alert-success w-100">{{session('success')}}</label>
@elseif(session()->has('error'))
<label class="alert alert-danger w-100">{{session('error')}}</label>
@endif
@if(!empty($product))
@foreach($product as $prod)
<button onclick="myFunction({{ $prod->id }})" class="w3-btn w3-block w3-black w3-left-align">{{ $prod->title }}</button>
<div id="Demo{{ $prod->id }}"@if($loop->first)class="w3-container w3-show" @else class="w3-container w3-show" @endif>
   @foreach($prod->products as $val)
   <p>{{ $val->title }}</p>
   @endforeach
</div>
@endforeach
@else
<p>No Data Found</p>
@endif
<div class="d-flex justify-content-between">
</div>
@endsection
