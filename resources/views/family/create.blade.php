@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5" style="max-width: 500px; margin: 0 auto;">
            <div class="card-header">
                <h4>Add Family Member</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('family.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender:</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="M"
                                    required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="F"
                                    required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="parent_id" class="form-label">Parent ID:</label>
                        <input type="text" class="form-control" id="parent_id" name="parent_id">
                    </div>

                    <div class="mb-3">
                        <a href="{{ route('family.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
