# Wedding Dress Rental Backend

A **Laravel** backend application for managing a Wedding Dress Rental service. This API handles user authentication, dress listings, reservations, and password management.

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)

## Features

- **User Authentication**: Registration, login, logout, and password management using Laravel Sanctum.
- **Dress Catalog**: Get list of available wedding dresses, View Details of an dress.
- **Reservations**: Users can reserve dresses for specific dates.
- **Password Management**: Users can change their passwords securely.
- **Error Handling**: Comprehensive error responses with appropriate HTTP status codes.
- **API Documentation**: Clear and organized API endpoints for easy integration.

## Technologies Used

- **Backend**:
  - Laravel Framework
  - PHP
  - MySQL
  - Laravel Sanctum (for API authentication)
  - Composer

## Prerequisites

Ensure you have the following installed on your machine:

- **PHP**: Version 8.0 or later
- **Composer**: Dependency Manager for PHP
- **MySQL**: Database Management System
- **Node.js and npm**: Required for frontend development (if applicable)
- **Git**: Version control system

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/wedding-dress-rental-backend.git
cd wedding-dress-rental-backend
```

### 2. Install Dependencies

Use Composer to install PHP dependencies:

```bash
composer install
```

### 3. Environment Configuration

- Copy .env.example to .env:

```bash
cp .env.example .env
```

- Generate Application Key:

```bash
php artisan key:generate
```

### 4. Configure Environment Variables

Open the .env file and set up your environment variables:

```bash
APP_NAME=WeddingDressRental
APP_ENV=local
APP_KEY=base64:generated_key_here
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wedding_dress_rental
DB_USERNAME=root
DB_PASSWORD=yourpassword

SANCTUM_STATEFUL_DOMAINS=localhost
SESSION_DOMAIN=localhost
```

### 5. Database Setup

- Create Database:

Ensure you have a MySQL database named wedding_dress_rental. You can create it using the MySQL command line or a GUI tool like phpMyAdmin.

```bash
CREATE DATABASE wedding_dress_rental;
```

- Run Migrations:

Execute the migrations to create the necessary tables.

```bash
php artisan migrate
```

- Seed the Database: (Dresses) Important because don't have create dress functionality

```bash
php artisan db:seed
```
### 6. Install Laravel Sanctum

Laravel Sanctum is already included if you followed the standard installation. Ensure it's properly set up by publishing the configuration and migrating:

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
php artisan migrate
```

### 7. Serve the Application

Start the Laravel development server:

```bash
php artisan serve
```

The backend API will be accessible at http://localhost:8000.