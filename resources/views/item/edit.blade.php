@extends('dashboard.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card  mt-3 shadow">
                <div class="card-header bg-gray text-left">
                    <h3>Edit Item </h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('item.update', $item->id) }}">
                        @csrf
                        @method("PUT")
                        <div class="form-group m-3 row">
                            <label for="name" class="col-sm-6 col-form-label">Item Name <small class="text-danger">*</small></label>
                            <div class="col-sm-6">
                              <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name')?? $item->name }}">
                              @error('name')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group m-3 row">
                            <label for="price" class="col-sm-6 col-form-label">Price <small class="text-danger">*</small></label>
                            <div class="col-sm-6">
                              <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price')?? $item->price }}">
                              @error('price')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group m-3 row">
                            <label for="amount" class="col-sm-6 col-form-label">Available Amount <small class="text-danger">*</small></label>
                            <div class="col-sm-6">
                              <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount')?? $item->amount }}">
                              @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group m-3 row">
                            <label for="category_id" class="col-sm-6 col-form-label">Category Type <small class="text-danger">*</small></label>
                            <div class="col-sm-6 dropdown">
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" >
                                    <p>hello</p>
{{-- Category to be selected --}}
                                    @if (! $categories->isEmpty())
                                    @foreach ($categories as $category)
                                        <option value="{{ old('category_id')?? $category->id }}" {{ ($item->category_id==$category->id)? "selected":"" }}> {{ $category->name }} </option>
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

                          <div class="form-group m-3 row">
                            <label for="expiredDate" class="col-sm-6 col-form-label">Expired Date </label>
                            <div class="col-sm-6">
                              <input type="date" name="expiredDate" class="form-control @error('expiredDate') is-invalid @enderror" value="{{ old('expiredDate')??$item->expiredDate }}">
                              @error('expiredDate')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>


                          <div class="form-group m-3 row  ">
                            <div class="mx-auto">
                              <a href="{{ route('item.index') }}" class="btn btn-outline-dark ">
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
