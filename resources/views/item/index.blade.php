@extends('dashboard.index')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-3 shadow">
                <div class="card-header bg-gray text-center">
                    <h3 class="fst-italic">Item List</h3>
                </div>

                <div class="card-body ">

                    @if (session('create'))
                        <div class="alert alert-success  alert-dismissible  " role="alert">
                            <i class="fas fa-check-circle"> </i>
                            {{ session('create') }}
                            <button type="button" class="close" data-dismiss="alert" >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endif

                    @if (session('update'))
                        <div class="alert alert-info alert-dismissible"  role="alert">
                            <i class="fas fa-exclamation-circle">  </i>
                            {{ session('update') }}
                            <button type="button" class="close" data-dismiss="alert" >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endif

                @if (session('delete'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <i class="fas fa-exclamation-circle">  </i>
                        {{ session('delete') }}
                        <button type="button" class="close" data-dismiss="alert" >
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                    <table class="table table-striped">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Category Type</th>
                                <th scope="col">Expired Date</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $number = 1;
                                @endphp
                                @foreach ($items as $item)
                                <tr>
                                    <th scope="row" >{{ $number++    }}</th>
                                    <td >{{ $item->name }}</td>
                                    <td >{{ $item->price }}</td>
                                    <td >{{ $item->amount }}</td>
                                    <td >{{ $item->category->name }}</td>
                                    <td >{{ $item->expiredDate }}</td>
                                    <td ><img src="{{ asset('storage/gallery/'.$item->image) }}"  width="50px" alt="item"></td>

                                    <td>
                                        <div class="d-inline">
                                            <a href="{{ route('item.edit',$item->id) }}" class="btn btn-outline-warning "><i class="fa fa-pen"></i></a>
                                            {{-- <a href="{{ route('item.show',$item->id) }}" class="btn btn-outline-info "><i class="fa fa-info"></i></a> --}}
                                        </div>

                                        <form action="{{ route('item.destroy',$item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                  </tr>
                                @endforeach

                            </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
