<div>
    <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Book</th>
                    <th>Rent Date</th>
                    <th>Return Date</th>
                    <th>Actual Return</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentLog as $item)
                    <tr
                    class="{{ $item->actual_return_date == null ? '' : ($item->actual_return_date > $item->return_date ? 'bg-danger' : 'bg-success')}}"
                    style="{{ $item->actual_return_date == null ? '' : 'color:white'}}">
                        <td>{{ $loop->iteration }}</td>
                        @if ($item->user)
                            <td>{{ $item->user->name }}</td>   
                        @endif
                        <td>{{ $item->book->title }}</td>
                        <td>{{ $item->rent_date }}</td>
                        <td>{{ $item->return_date }}</td>
                        <td>{{ $item->actual_return_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>