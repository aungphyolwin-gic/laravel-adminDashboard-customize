@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-3 shadow">
                <div class="card-header text-center bg-info">
                    <h3>Create Category</h3>
                </div>

                <div class="card-body bg-dark">

                    <div class="row mb-3">
                        <div class="col-xs-8 col-sm-6 text-light   ">Category ID</div>
                        <div class="col-xs-8 col-sm-6 text-info bg-gray ">{{ $category->id }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xs-8 col-sm-6 text-light  ">Category Name</div>
                        <div class="col-xs-8 col-sm-6 text-info bg-gray ">{{ $category->name }}</div>
                    </div>
                    <div class="rwo mb-3 text-center">
                        <a href="{{ route('category.index') }}" class="btn btn-outline-secondary ">
                            <i class="far fa-arrow-alt-circle-left fa-lg"></i>
                          </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
