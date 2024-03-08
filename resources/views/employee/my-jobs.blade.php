@extends('employee.employee')

@section('emContent')
    <h3 style="text-align: center; text-decoration: underline" >Employee List </h3>


    <!-- Table with panel -->

    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>User Id</th>
            <th>Job Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Mobile</th>
            <th>Applied Date</th>
        </tr>
        </thead>
        <tbody>

            @if($jobs->isNotEmpty())
                @foreach($jobs as $job)
                    <tr>
                    <td>{{$job->id}}</td>
                    <td>{{$job->id}}</td>
                    <td>{{$job->name}}</td>
                    <td>{{$job->email}}</td>
                    <td >{{$job->designation}}</td>
                    <td>{{$job->mobile}}</td>
                    <td>{{$job->applied_date}}</td>
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
