@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-success btn-sm" href="{{ route('category') }}">Categories</a>
                    <a class="btn btn-success btn-sm" href="{{ route('product') }}">Products</a>
                    <a class="btn btn-success btn-sm" href="{{ route('product-categories') }}">Category-Products</a>
                    <br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
