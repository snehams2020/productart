@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Create Category</h3>
        <a class="btn btn-success btn-sm" href="{{ route('category') }}">List Category</a>
    </div>

    @if(session()->has('success'))
        <label class="alert alert-success w-100">{{session('success')}}</label>
    @elseif(session()->has('error'))
        <label class="alert alert-danger w-100">{{session('error')}}</label>
    @endif

    <form action="{{ route('category.store') }}" method="POST">

        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Category name">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5" placeholder="Category description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

