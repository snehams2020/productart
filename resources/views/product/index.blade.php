@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between mb-4">
        <h3>Product List</h3>
        <a class="btn btn-success btn-sm" href="{{ route('product.create') }}">Create New</a>
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
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($product as $prod)
            <tr>

                <td>{{ $prod->title }}</td>
                <td>{{ $prod->description }}</td>

                <td>
                    <a href="{{ route('product.edit', ['id' => $prod->id]) }}" class="btn btn-success btn-sm">Edit</a>
                    <form action="{{ route('product.delete', ['id' => $prod->id]) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <div class="d-flex justify-content-between">
        {{ $product->render() }}
    </div>

@endsection

