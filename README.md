# Classified Ads Application

A modern classified ads platform built with Laravel 12, featuring user authentication, ad management, category organization, and admin functionality.

## Prerequisites

It's recommended to have [DDEV](https://ddev.readthedocs.io/en/stable/) installed for easy local development setup.

## Quick Start

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd classified-adds-app
   ```

2. **Start with DDEV**
   ```bash
   ddev start
   ddev composer install
   ddev npm install
   ```

3. **Set up the database**
   ```bash
   ddev artisan migrate
   ddev artisan db:seed
   ```

4. **Build assets**
   ```bash
   ddev npm run build
   ```

5. **Access the application**
   - Main site: https://classified-adds-app.ddev.site
   - Vite dev server: https://classified-adds-app.ddev.site:5173

## Alternative Setup (without DDEV)

1. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

2. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

4. **Start development servers**
   ```bash
   composer run dev
   ```

## Features

- **User Management**: Registration, authentication, and profile management
- **Ad System**: Create, edit, and manage classified advertisements
- **Category Management**: Hierarchical category organization
- **Search & Filtering**: Advanced search with price range and location filters
- **Admin Panel**: Complete admin interface for managing users, ads, and categories
- **Responsive Design**: Modern UI built with Tailwind CSS and Alpine.js

## Tech Stack

- **Backend**: Laravel 12, PHP 8.2+
- **Frontend**: Tailwind CSS, Alpine.js, Vite
- **Database**: MariaDB (via DDEV) / SQLite (testing)
- **Authentication**: Laravel Breeze

## Author

**Igor** - Developer and maintainer of this classified ads platform.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
