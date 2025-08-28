# Cybersecurity Portfolio Website

A professional portfolio website built with Laravel and Bootstrap, specifically designed for cybersecurity specialists to showcase their skills, projects, and experience.

## Features

### Public Portfolio
- **Hero Section**: Professional introduction with profile picture and brand statement
- **Skills Section**: Technical skills with progress bars (Network Security, Penetration Testing, SIEM Tools, Vulnerability Scanning)
- **Projects Section**: Showcase cybersecurity projects with screenshots, descriptions, and tools used
- **Experience & Certifications**: Timeline view of work experience, internships, and certifications
- **Contact Form**: Laravel-powered contact form with database storage and email notifications
- **Responsive Design**: Bootstrap dark theme optimized for cybersecurity aesthetics

### Admin Dashboard
- **Authentication**: Laravel Breeze authentication system
- **Project Management**: Full CRUD operations for portfolio projects
- **Experience Management**: Manage work experience, internships, and certifications
- **File Upload**: Screenshot upload for projects with automatic storage management
- **Dashboard**: Centralized admin panel for content management

## Technology Stack

- **Backend**: Laravel 11
- **Frontend**: Bootstrap 5.3 (Dark Theme)
- **Database**: SQLite (easily configurable to MySQL/PostgreSQL)
- **Authentication**: Laravel Breeze
- **Icons**: Font Awesome 6
- **File Storage**: Laravel Storage with public disk

## Installation & Setup

1. **Clone and Install Dependencies**
   ```bash
   git clone <repository-url>
   cd My-portfolio
   composer install
   npm install && npm run build
   ```

2. **Environment Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database Setup**
   ```bash
   php artisan migrate
   php artisan db:seed --class=PortfolioSeeder
   ```

4. **Storage Setup**
   ```bash
   php artisan storage:link
   ```

5. **Start Development Server**
   ```bash
   php artisan serve
   ```

## Usage

### Public Portfolio
- Visit `http://localhost:8000` to view the public portfolio
- All sections are responsive and optimized for mobile devices
- Contact form submissions are stored in the database

### Admin Access
1. Register a new account at `/register`
2. Login at `/login`
3. Access dashboard at `/dashboard`
4. Manage projects at `/projects`
5. Manage experience at `/experiences`

### Customization

#### Personal Information
Update the hero section in `resources/views/portfolio/index.blade.php`:
- Replace placeholder profile image
- Update name, title, and description
- Modify skills and progress bars
- Update social media links in footer

#### Styling
- Main portfolio styles: `public/css/portfolio.css`
- Color scheme uses CSS custom properties for easy theming
- Bootstrap dark theme with cybersecurity-focused color palette

#### Content Management
- Projects: Add/edit through admin dashboard or directly in database
- Experience: Manage through admin interface with support for jobs, internships, and certifications
- Skills: Currently static in view file, can be made dynamic by creating a Skills model

## Database Schema

### Projects Table
- `title`: Project name
- `description`: Detailed project description
- `screenshot`: Optional project image
- `tools_used`: JSON array of tools/technologies used
- `link`: Optional project URL

### Experiences Table
- `title`: Job title or certification name
- `company`: Company or issuing organization
- `type`: job, internship, or certification
- `description`: Role description or certification details
- `start_date` & `end_date`: Duration (end_date nullable for current positions)

### Contact Messages Table
- `name`, `email`, `subject`, `message`: Contact form submissions
- Automatically timestamped for follow-up

## Security Features

- CSRF protection on all forms
- File upload validation and sanitization
- Authentication middleware for admin routes
- Input validation and sanitization
- Secure file storage with proper permissions

## Deployment Considerations

1. **Environment Variables**: Configure proper database and mail settings
2. **File Permissions**: Ensure storage and cache directories are writable
3. **HTTPS**: Enable SSL for production deployment
4. **Database**: Consider PostgreSQL or MySQL for production
5. **Email**: Configure mail driver for contact form notifications
6. **Backup**: Implement regular database and file backups

## Customization Ideas

- Add blog functionality for cybersecurity articles
- Implement contact form email notifications
- Add project categories and filtering
- Create a skills management system
- Add testimonials section
- Implement SEO optimization
- Add analytics tracking
- Create API endpoints for mobile app integration

## Support

This portfolio template is designed to be easily customizable for any cybersecurity professional. The codebase follows Laravel best practices and includes comprehensive commenting for easy modification.