@extends('template.tmpDashboard')
@section('title','List of Users')

@section('content')
    <h1>Usres Approved</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="user-registered" class="btn btn-success me-2">Need to Approve</a>
        <a href="#" class="btn btn-secondary">Users Banned</a>
    </div> 

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            @if ($item->phone)
                                {{ $item->phone }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="/user-detail/{{ $item->slug }}">Detail</a> | <a href="#">Banned</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection