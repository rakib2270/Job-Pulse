@extends('admin.admin')

@section('dbContent')
    <h3 style="text-align: center; text-decoration: underline" >Employee List </h3>

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

            @if($employes->isNotEmpty())
                @foreach($employes as $employee)
                    <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td >{{$employee->designation}}</td>
                    <td>{{$employee->mobile}}</td>
                    <td>{{$employee->role}}</td>
                    <td>{{$employee->is_paid}}</td>
                    <td>{{$employee->created_at}}</td>
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
