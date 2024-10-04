# Laravel 10 Customer_Service Project is Project is Incompleted 

## Overview

This is a Laravel 10 Customer_Service project . 

## Prerequisites

Before you begin, ensure you have met the following requirements:

- PHP >= 8.2
- Composer
- Node.js (for frontend dependencies)
- A database (MySQL)

Login Page

![login](https://github.com/user-attachments/assets/d74dc6d6-0b5f-43ad-b547-4f956b8433e4)

Admin Page

![admin dashboard](https://github.com/user-attachments/assets/3a94495c-1831-45b8-ba31-a0d4fe76ad76)






## Installation

Follow these steps to install the project:

### 1. Clone the Repository

```bash
git clone https://github.com/Kunalverma320/Customer_Service.git
cd fileupload

2. Install Dependencies
Install the PHP dependencies using Composer:

composer install

3. Environment Configuration
Copy the .env.example file to .env:

cp .env.example .env


Open the .env file and configure your database and application settings. Update the following fields accordingly:

env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password


Generate Application Key
Generate a new application key:

php artisan key:generate



Run Migrations
Run the database migrations to create the necessary tables:

php artisan migrate


Serve the Application
You can now serve the application using the built-in PHP server:

php artisan serve






