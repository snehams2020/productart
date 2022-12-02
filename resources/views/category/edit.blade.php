@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Edit Category</h3>
        <a class="btn btn-success btn-sm" href="{{ route('category') }}">List Category</a>
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

    <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="category title" value="{{ $category->title }}">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5" placeholder=" category description" class="form-control">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

