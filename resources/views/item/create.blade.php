@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card  mt-3 shadow">
                <div class="card-header bg-gray text-left">
                    <h3>Item Category</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Item Name Field --}}
                        <div class="form-group m-3 row">
                            <label for="name" class="col-sm-6 col-form-label">Item Name <small class="text-danger">*</small></label>
                            <div class="col-sm-6">
                              <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                              @error('name')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          {{-- Item Price Field --}}
                          <div class="form-group m-3 row">
                            <label for="price" class="col-sm-6 col-form-label">Price <small class="text-danger">*</small></label>
                            <div class="col-sm-6">
                              <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                              @error('price')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          {{-- Item Amount Field --}}
                          <div class="form-group m-3 row">
                            <label for="amount" class="col-sm-6 col-form-label">Available Amount <small class="text-danger">*</small></label>
                            <div class="col-sm-6">
                              <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}">
                              @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          {{-- Item Category Type Field --}}
                          <div class="form-group m-3 row">
                            <label for="category_id" class="col-sm-6 col-form-label">Category Type <small class="text-danger">*</small></label>
                            <div class="col-sm-6 dropdown">
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" >
                                    <option value="" @selected(true)>Category Types</option>

                                    @if (! $categories->isEmpty())
                                    @foreach ($categories as $category)
                                        <option value="{{ old('category_id')?? $category->id }}"> {{ $category->name }} </option>
                                    @endforeach
                                    @else
                                        <option class="text-danger" disabled >No category available</option>
                                    @endif
                                </select>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          </div>

                          {{-- Item Exp Date Field --}}
                          <div class="form-group m-3 row">
                            <label for="expiredDate" class="col-sm-6 col-form-label">Expired Date </label>
                            <div class="col-sm-6">
                              <input type="date" name="expiredDate" class="form-control @error('expiredDate') is-invalid @enderror" value="{{ old('expiredDate') }}">
                              @error('expiredDate')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          {{-- Item Image File Upload Filed --}}
                          <div class="form-group m-3 row">
                            <label for="image" class="col-sm-6 col-form-label">Item Image </label>
                            <div class="col-sm-6">
                                <div class=" input-group-append">
                                    <input type="file" name="image" class=" custom-file-input @error('image') is-invalid @enderror" value="{{ old('image') }}">
                                    <label for="image" class=" custom-file-label">Choose File</label>
                                </div>
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group m-3 row">
                            <div class="mx-auto">
                              <a href="{{ route('item.index') }}" class="btn btn-outline-dark">
                                <i class="far fa-arrow-alt-circle-left fa-lg"></i>
                              </a>
                              <button type="submit" class="btn btn-outline-primary">Add</button>
                            </div>
                          </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
