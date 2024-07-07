@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="card" style="max-width: 500px; margin: 0 auto;">
            <div class="card-header p-3">
                <h4>Family Member Details</h4>
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 30%;">Name:</th>
                            <td>{{ $family->name }}</td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>{{ $family->gender == 'M' ? 'Male' : 'Female' }}</td>
                        </tr>
                        <tr>
                            <th>Parent ID:</th>
                            <td>{{ $family->parent_id }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <a href="{{ route('family.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
