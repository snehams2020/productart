@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Edit product</h3>
        <a class="btn btn-success btn-sm" href="{{ route('product') }}">List product</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif
 @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
    <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="product title" value="{{ $product->title }}">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5" placeholder="product description" class="form-control">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label>category</label>
            <select name="category_id" class="form-control">
                <option value="">--select category--</option>
                @foreach($category as $cate)
                <option value="{{$cate->id}}" @if($product->category_id==$cate->id)selected="selected" @endif>{{$cate->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

