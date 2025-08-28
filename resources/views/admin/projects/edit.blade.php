@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Project</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="title" class="form-label">Project Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $project->title) }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="4" required>{{ old('description', $project->description) }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="screenshot" class="form-label">Screenshot</label>
                            @if($project->screenshot)
                            <div class="mb-2">
                                @if(str_starts_with($project->screenshot, 'images/'))
                                    <img src="{{ asset($project->screenshot) }}" alt="Current screenshot" class="img-thumbnail" style="max-width: 200px;">
                                @else
                                    <img src="{{ asset('storage/' . $project->screenshot) }}" alt="Current screenshot" class="img-thumbnail" style="max-width: 200px;">
                                @endif
                                <p class="text-muted small">Current screenshot</p>
                            </div>
                            @endif
                            <input type="file" class="form-control @error('screenshot') is-invalid @enderror" 
                                   id="screenshot" name="screenshot" accept="image/*">
                            @error('screenshot')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tools_used" class="form-label">Tools Used</label>
                            <input type="text" class="form-control @error('tools_used') is-invalid @enderror" 
                                   id="tools_used" name="tools_used" 
                                   value="{{ old('tools_used', implode(', ', $project->tools_used)) }}" 
                                   placeholder="e.g., Nmap, Burp Suite, Python" required>
                            <div class="form-text">Separate tools with commas</div>
                            @error('tools_used')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="link" class="form-label">Project Link (Optional)</label>
                            <input type="url" class="form-control @error('link') is-invalid @enderror" 
                                   id="link" name="link" value="{{ old('link', $project->link) }}" 
                                   placeholder="https://github.com/username/project">
                            @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Project</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection