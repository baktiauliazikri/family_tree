@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Family Members</h1>
        <a href="{{ route('family.create') }}" class="btn btn-primary mb-3">Add Family Member</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Family Members List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="family-table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%;">ID</th>
                                <th style="width: 20%;">Name</th>
                                <th style="width: 10%;">Gender</th>
                                <th style="width: 10%;">Parent ID</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($families as $family)
                                <tr>
                                    <td>{{ $family->id }}</td>
                                    <td>{{ $family->name }}</td>
                                    <td>{{ $family->gender == 'M' ? 'Male' : 'Female' }}</td>
                                    <td>{{ $family->parent_id }}</td>
                                    <td>
                                        <a href="{{ route('family.show', $family->id) }}" class="btn btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('family.edit', $family->id) }}" class="btn btn-warning">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('family.destroy', $family->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this family member?');">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#family-table').DataTable({
                "scrollX": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
