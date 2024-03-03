@extends('admin.dashboard')

@section('dashboard')
    <div class="container">
        <h1 class="page-title">Manage Jobs</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Employer</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->category->name }}</td>
                    <td>{{ $job->user->name }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.edit.job', $job->id) }}" class="btn btn-edit">Edit</a>
                        <form method="POST" action="{{ route('admin.delete.job', $job->id) }}" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this job?')" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
