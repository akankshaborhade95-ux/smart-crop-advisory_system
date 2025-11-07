# Create README file
@"
# Smart Crop Advisory System

A Laravel-based web application that provides intelligent crop recommendations for small and marginal farmers based on soil type, region, and land size.

## Features

- 🌱 Smart crop recommendations based on soil type
- 🗺️ Regional adaptation for different parts of India
- 📊 Yield prediction based on land size
- 💡 Cultivation tips and sowing seasons
- 🎯 Risk assessment for different crops

## Technology Stack

- **Backend**: Laravel PHP Framework
- **Frontend**: Bootstrap 5
- **Database**: SQLite/MySQL
- **Architecture**: MVC Pattern

## Installation

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env`
4. Generate app key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Start server: `php artisan serve`

## Usage

1. Visit the homepage
2. Fill farmer registration form
3. Get personalized crop recommendation
4. View sowing season and expected yield

## Project Structure

- `app/Http/Controllers/FarmerController.php` - Main controller
- `routes/web.php` - Application routes
- `resources/views/` - Blade templates
- `database/migrations/` - Database schema
"@ | Out-File -FilePath README.md -Encoding utf8
