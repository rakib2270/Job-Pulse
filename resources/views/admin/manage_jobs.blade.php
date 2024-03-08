@extends('admin.dashboard')

@section('dbContent')
    <h3 style="text-align: center; text-decoration: underline" >Manage Jobs </h3>
<div class="table-control">

    <form action="" method="POST" id="manageJobs" name="manageJobs" role="form">
        @csrf
    <table id="dataTable">
        <thead>
        <tr>
            <th>User Name</th>
            <th>Tittle</th>
            <th>Job Category</th>
            <th>Company Name</th>
            <th>Company Status</th>
            <th>Job Status</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
                 @if($jobs->isNotEmpty())
                    @foreach($jobs as $job)
                        <tr>

                        <td>
                            @if($users->isNotEmpty())
                                @foreach($users as $user) @endforeach
                                    <input type="text" name="user_name" id="user_name"  class="form-control" value="{{ $user->name }}">
                            @endif
                        </td>
                        <td>
                            <input type="text" name="tittle" id="tittle"  class="form-control" value="{{ $job->title }}">
                        </td>
                        <td>
                            <select class="form-select form-control" name="category_name" id="category_name">
                                @if($categories->isNotEmpty())
                                    @foreach($categories as $category)
                                        <option type="text" name="category_name" id="category_name"  class="form-control" value="{{ $category->name }}">{{ $category->name }}</option>
                                     @endforeach
                                 @endif
                             </select>
                        </td>

                        <td>
                            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ $job->company_name }}">
                        </td>

                        <td>
                            <select class="form-select form-control" name="company_status" id="company_status">
                                <option type="text" name="company_status" id="company_status"  class="form-control" value="{{ $job->company_status }}">{{ $job->company_status }}</option>
                                <option type="text" name="company_status" id="company_status"  class="form-control" value="1">1</option>
                                <option type="text" name="company_status" id="company_status"  class="form-control" value="1">0</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select form-control" name="status" id="status">
                                <option type="text" name="status" id="status"  class="form-control" value="{{ $job->status }}">{{ $job->status }}</option>
                                <option type="text" name="status" id="status"  class="form-control" value="1">1</option>
                                <option type="text" name="status" id="status"  class="form-control" value="0">0</option>
                            </select>
                        </td>
                             <td>
                                    <button type="submit" name="submit" id="submitBtn" class="btn btn-primary">Update</button>
                            </td>
                    </tr>
                    @endforeach
                @endif
           </tbody>

    </table>


    </form>


    </div>
@endsection




@section('customJs')
    <script>
        $(document).ready(function () {
            // Function to update table data and fetch updated data
            function updateTableData(formData) {
                $.ajax({
                    url: "{{route('admin.updateJobs',['id'=>'$job->id'])}}", // Replace with the actual route for updating data
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        // Assuming the response is an array of updated data
                        // You may need to modify this based on your actual response format
                        var updatedData = response.data;

                        // Clear existing table rows
                        $('#dataTable tbody').empty();

                        // Update the table with new data
                        updatedData.forEach(function (item) {
                            var row = '<tr>';
                            row += '<td>' + item.title + '</td>';
                            row += '<td>' + item.company_name + '</td>';
                            row += '<td>' + item.company_status + '</td>';
                            row += '<td>' + item.status + '</td>';
                            row += '</tr>';
                            $('#dataTable tbody').append(row);
                        });
                    },
                    error: function (error) {
                        console.error('Error updating table data:', error);
                    }
                });
            }

            // Submit form event
            $('#manageJobs').submit(function (e) {
                e.preventDefault();

                // Get form data
                var formData = $(this).serialize();

                // Call the updateTableData function with form data
                updateTableData(formData);
            });
        });
    </script>

{{--    <script type="text/javascript">--}}
{{--        $('#manageJobs').on('click', function ()--}}
{{--        {--}}
{{--            e.preventDefault();--}}

{{--            $.ajax({--}}
{{--                url: "{{ route("admin.updateJobs", ['id'=>'$job->id']) }}",--}}
{{--                type: 'put',--}}
{{--                dataType: 'json',--}}
{{--                data: $("#manageJobs").serializeArray(),--}}
{{--                success: function(response) {--}}

{{--                    if(response.status === true) {--}}

{{--                        $("#user_name").removeClass('is-invalid')--}}
{{--                            .siblings('p')--}}
{{--                            .removeClass('invalid-feedback')--}}
{{--                            .html('')--}}

{{--                        $("#tittle").removeClass('is-invalid')--}}
{{--                            .siblings('p')--}}
{{--                            .removeClass('invalid-feedback')--}}
{{--                            .html('')--}}
{{--                        $("#job_type").removeClass('is-invalid')--}}
{{--                            .siblings('p')--}}
{{--                            .removeClass('invalid-feedback')--}}
{{--                            .html('')--}}
{{--                        $("#company_name").removeClass('is-invalid')--}}
{{--                            .siblings('p')--}}
{{--                            .removeClass('invalid-feedback')--}}
{{--                            .html('')--}}

{{--                        $("#company_status").removeClass('is-invalid')--}}
{{--                            .siblings('p')--}}
{{--                            .removeClass('invalid-feedback')--}}
{{--                            .html('')--}}

{{--                        $("#status").removeClass('is-invalid')--}}
{{--                            .siblings('p')--}}
{{--                            .removeClass('invalid-feedback')--}}
{{--                            .html('')--}}

{{--                        window.location.href="{{ route('account.profile') }}";--}}

{{--                    } else {--}}
{{--                        var errors = response.errors;--}}

{{--                        if (errors.user_name) {--}}
{{--                            $("#user_name").addClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .addClass('invalid-feedback')--}}
{{--                                .html(errors.name)--}}
{{--                        } else {--}}
{{--                            $("#user_name").removeClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .removeClass('invalid-feedback')--}}
{{--                                .html('')--}}
{{--                        }--}}

{{--                        if (errors.tittle) {--}}
{{--                            $("#tittle").addClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .addClass('invalid-feedback')--}}
{{--                                .html(errors.name)--}}
{{--                        } else {--}}
{{--                            $("#tittle").removeClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .removeClass('invalid-feedback')--}}
{{--                                .html('')--}}
{{--                        }--}}

{{--                        if (errors.job_type) {--}}
{{--                            $("#job_type").addClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .addClass('invalid-feedback')--}}
{{--                                .html(errors.email)--}}
{{--                        } else {--}}
{{--                            $("#job_type").removeClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .removeClass('invalid-feedback')--}}
{{--                                .html('')--}}
{{--                        }--}}
{{--                        if (errors.company_name) {--}}
{{--                            $("#company_name").addClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .addClass('invalid-feedback')--}}
{{--                                .html(errors.email)--}}
{{--                        } else {--}}
{{--                            $("#company_name").removeClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .removeClass('invalid-feedback')--}}
{{--                                .html('')--}}
{{--                        }--}}
{{--                        if (errors.company_status) {--}}
{{--                            $("#company_status").addClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .addClass('invalid-feedback')--}}
{{--                                .html(errors.email)--}}
{{--                        } else {--}}
{{--                            $("#company_status").removeClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .removeClass('invalid-feedback')--}}
{{--                                .html('')--}}
{{--                        }--}}
{{--                        if (errors.status) {--}}
{{--                            $("#status").addClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .addClass('invalid-feedback')--}}
{{--                                .html(errors.email)--}}
{{--                        } else {--}}
{{--                            $("#status").removeClass('is-invalid')--}}
{{--                                .siblings('p')--}}
{{--                                .removeClass('invalid-feedback')--}}
{{--                                .html('')--}}
{{--                        }--}}
{{--                    }--}}

{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}
@endsection
