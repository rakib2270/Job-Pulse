@extends('admin.admin')

@section('dbContent')
    <h3 style="text-align: center; text-decoration: underline" >All Users </h3>


    <!-- Table with panel -->

    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>User Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Mobile</th>
            <th>Role</th>
            <th>Paid Customer</th>
            <th>Joining Date</th>
        </tr>
        </thead>
        <tbody>

            @if($users->isNotEmpty())
                @foreach($users as $user)
                    <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td >{{$user->designation}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->is_paid}}</td>
                    <td>{{$user->created_at}}</td>
                    </tr>
                @endforeach
            @endif



        </tbody>
        <tfoot>
        <tr>
            <th>User Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Mobile</th>
            <th>Role</th>
            <th>Paid Customer</th>
            <th>Joining Date</th>
        </tr>
        </tfoot>
    </table>
    <!-- Table -->


@endsection

@section('customJs')
    <script>
        new DataTable('#example', {
            pagingType: 'simple_numbers'
        });
    </script>
@endsection
