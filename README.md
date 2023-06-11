# Book Store Application

A web application for managing and showcasing books.

## Installation

Follow these steps to set up the book store application:

### Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL or another compatible database

### Step 1: Clone the repository

https://github.com/omkar3524/book-store.git

### Step 2: Install dependencies
```
cd book-store
composer install
```

### Step 3: Configure the environment

Create a copy of the `.env.example` file and rename it to `.env`. Update the necessary environment variables such as database credentials.
```
cp .env.example .env
```

### Step 4: Generate application key

Generate a unique application key by running the following command:
```
php artisan key:generate
```

### Step 5: Run database migrations

Run the database migrations to create the necessary tables:
```
php artisan migrate
```

### Step 6: Seed the database

If you want to populate the database with sample data, you can run the database seeder:
```
php artisan db:seed
```
### Step 7: Start the development server
```
php artisan serve
```