@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-8">
            <div class="card  mt-3 shadow">
                <div class="card-header bg-gray text-center">
                    <h3>Edit Category </h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method("PUT")
                        <div class="form-group m-3 row">
                            <label for="name" class="col-sm-6 col-form-label">Category Name <small class="text-danger">*</small></label>
                            <div class="col-sm-6">
                              <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')??$category->name }}">
                              @error('name')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group m-3 row  ">
                            <div class="mx-auto">
                              <a href="{{ route('category.index') }}" class="btn btn-outline-dark ">
                                <i class="far fa-arrow-alt-circle-left fa-lg"></i>
                              </a>
                              <button type="submit" class="btn btn-outline-primary ">Change</button>
                            </div>
                          </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
