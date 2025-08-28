@extends('layouts.portfolio')

@section('content')
<!-- Hero Section -->
<section id="about" class="hero-section py-5" style="margin-top: 76px;">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6">
                <div class="text-center text-lg-start">
                    <img src="https://th.bing.com/th/id/R.a4b7c21da1a5a8e07cfdf10389ac5c67?rik=sVARq%2fR3JKvVEw&pid=ImgRaw&r=0" 
                         alt="Profile Picture" class="rounded-circle mb-4" width="300" height="300">
                </div>
            </div>
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-3">
                    Hi, I'm <span class="text-primary">Moses Mwendwa</span>
                </h1>
                <h2 class="h3 text-muted mb-4">Cybersecurity Specialist</h2>
                <p class="lead mb-4">
                    Passionate cybersecurity professional with expertise in ethical hacking, penetration testing, 
                    and network security. I help organizations identify vulnerabilities and strengthen their 
                    security posture against evolving cyber threats.
                </p>
                <div class="mb-4">
                    <span class="badge bg-primary me-2 mb-2">Ethical Hacking</span>
                    <span class="badge bg-primary me-2 mb-2">Penetration Testing</span>
                    <span class="badge bg-primary me-2 mb-2">Network Security</span>
                    <span class="badge bg-primary me-2 mb-2">SIEM Analysis</span>
                </div>
                <a href="#contact" class="btn btn-primary btn-lg me-3">Get In Touch</a>
                <a href="#projects" class="btn btn-outline-light btn-lg">View Projects</a>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">Technical Skills</h2>
                <p class="lead text-muted">Core competencies in cybersecurity</p>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-shield-alt text-primary me-2"></i>Network Security</h5>
                        <div class="progress mb-3">
                            <div class="progress-bar" style="width: 90%"></div>
                        </div>
                        <p class="card-text">Firewall configuration, IDS/IPS, network monitoring</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-bug text-primary me-2"></i>Penetration Testing</h5>
                        <div class="progress mb-3">
                            <div class="progress-bar" style="width: 85%"></div>
                        </div>
                        <p class="card-text">Web app testing, network pentesting, vulnerability assessment</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-search text-primary me-2"></i>SIEM Tools</h5>
                        <div class="progress mb-3">
                            <div class="progress-bar" style="width: 80%"></div>
                        </div>
                        <p class="card-text">Splunk, ELK Stack, IBM QRadar, log analysis</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-scan text-primary me-2"></i>Vulnerability Scanning</h5>
                        <div class="progress mb-3">
                            <div class="progress-bar" style="width: 88%"></div>
                        </div>
                        <p class="card-text">Nessus, OpenVAS, Nmap, vulnerability management</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">Featured Projects</h2>
                <p class="lead text-muted">Recent cybersecurity projects and research</p>
            </div>
        </div>
        <div class="row g-4">
            @forelse($projects as $project)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    @if($project->screenshot)
                        @if(str_starts_with($project->screenshot, 'images/'))
                            <img src="{{ asset($project->screenshot) }}" class="card-img-top" alt="{{ $project->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('storage/' . $project->screenshot) }}" class="card-img-top" alt="{{ $project->title }}" style="height: 200px; object-fit: cover;">
                        @endif
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($project->description, 100) }}</p>
                        <div class="mb-3">
                            @foreach($project->tools_used as $tool)
                            <span class="badge bg-secondary me-1 mb-1">{{ $tool }}</span>
                            @endforeach
                        </div>
                        @if($project->link)
                        <a href="{{ $project->link }}" class="btn btn-primary" target="_blank">
                            <i class="fas fa-external-link-alt me-1"></i>View Project
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No projects available yet.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">Experience & Certifications</h2>
                <p class="lead text-muted">Professional journey and achievements</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @forelse($experiences as $experience)
                <div class="timeline-item ps-4 pb-4 position-relative">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-1">{{ $experience->title }}</h5>
                                <span class="badge bg-{{ $experience->type === 'certification' ? 'success' : 'primary' }}">
                                    {{ ucfirst($experience->type) }}
                                </span>
                            </div>
                            <h6 class="text-primary mb-2">{{ $experience->company }}</h6>
                            <p class="text-muted small mb-2">
                                {{ $experience->start_date->format('M Y') }} - 
                                {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                            </p>
                            <p class="card-text">{{ $experience->description }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center">
                    <p class="text-muted">No experience entries available yet.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">Get In Touch</h2>
                <p class="lead text-muted">Let's discuss cybersecurity opportunities</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                   id="subject" name="subject" value="{{ old('subject') }}" required>
                            @error('subject')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" 
                                      id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection