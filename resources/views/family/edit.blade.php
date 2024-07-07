@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5" style="max-width: 500px; margin: 0 auto;">
            <div class="card-header">
                <h4>Family Member Details</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('family.update', $family->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $family->name }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="M"
                                    {{ $family->gender == 'M' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="F"
                                    {{ $family->gender == 'F' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="parent_id" class="form-label">Parent ID:</label>
                        <input type="text" class="form-control" id="parent_id" name="parent_id"
                            value="{{ $family->parent_id }}">
                    </div>

                    <div class="d-flex justify-content-between">
                      <a href="{{ route('family.index') }}" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
