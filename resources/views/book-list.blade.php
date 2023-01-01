@extends('template.tmpDashboard')
@section('title','Books')

@section('content')
    <form action="#" method="get">
        <div class="row">
            <div class="col-12 col-sm-6">
                <select name="category" id="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Type your book title" aria-label="Search" aria-describedby="search-addon" name="title"/>
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </div>
            </div>
        </div>
    </form>

    <div class="my-5">
        <div class="row">
            @foreach ($books as $item)   
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ $item->cover != null ?  asset('storage/cover/'.$item->cover) :  asset('image/cover.gif') }}" class="card-img-top" draggable="false"/>
                            <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title fw-bold">{{ $item->title }}</h4>
                            {{-- <p class="card-text">{{ $item->title }}</p> --}}
                            <p  class="card-text {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                                {{ $item->status }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection