@extends('template.tmpDashboard')
@section('title','Book Return')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offsite-md-3">
        <h1>Book Return Form</h1>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <select name="user_id" id="user" class="form-control form-control-lg inputbox" >
                    <option value="">Select User</option>
                    @foreach ($users as $item)
                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                        @endforeach
                </select>
            </div>

            <div class="mb-3">
                <select name="book_id" id="book" class="form-control form-control-lg inputbox" >
                    <option value="">Select Book</option>
                    @foreach ($books as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-3 form-control-lg">SUBMIT</button>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
    </script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.inputbox').select2();
        });
    </script>
@endsection