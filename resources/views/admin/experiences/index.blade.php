@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Manage Experience & Certifications</h4>
                    <a href="{{ route('experiences.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i>Add New Experience
                    </a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    @if($experiences->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>Type</th>
                                    <th>Duration</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($experiences as $experience)
                                <tr>
                                    <td>{{ $experience->title }}</td>
                                    <td>{{ $experience->company }}</td>
                                    <td>
                                        <span class="badge bg-{{ $experience->type === 'certification' ? 'success' : ($experience->type === 'internship' ? 'info' : 'primary') }}">
                                            {{ ucfirst($experience->type) }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $experience->start_date->format('M Y') }} - 
                                        {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('experiences.edit', $experience) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('experiences.destroy', $experience) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4">
                        <p class="text-muted">No experiences found. <a href="{{ route('experiences.create') }}">Add your first experience</a>.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection