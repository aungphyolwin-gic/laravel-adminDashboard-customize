    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1 class="header text-primary text-center text-capitalize">GIC Shopping</h1>
        <div class="row">
                {{-- divide three columns --}}
                <div class="col-md-8 ">
                    <div class="row align-content-around">
                        @foreach ($items as $item)

                            {{-- Data card --}}
                            <div class="col-md-4 mb-3">
                                <div class="card ">
                                    <img class="card-img-top img-fluid" style="object-fit: fill, height:200px, width:200px;" src="{{ asset('storage/gallery/'.$item->image) }}"  alt="product image">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title fw-bold">{{ $item->name }}</h5>
                                            <div class="card-text fw-bold">{{ $item->price }}</div>
                                        </div>
                                        <div class=" d-flex justify-content-end">
                                            <a href="#" class="btn btn-outline-primary text-left btn-sm">
                                                <i class="fas fa-shopping-basket">   Add</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
                {{-- Third voucher card --}}
                <div class="col-md-4">
                    <div class="card p-3 ">
                        <table class="">
                            <thead>
                                <th scope="col">List</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Amount</th>
                                <th scope="col"  class="text-left">Cost</th>
                            </thead>

                            {{-- @foreach ($buyItems as $items)
                                <tr scope="row">
                                    <td scope="col">1</td>
                                    <td scope="col">Apple</td>
                                    <td scope="col">1500</td>
                                    <td scope="col">2</td>
                                    <td scope="col"  class="text-left">3000</td>
                                </tr>
                            @endforeach --}}

                        </table>
                    </div>


        </div>
    </div>
    @endsection
