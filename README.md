# Digital Bursary Management System

A full-stack bursary management system built with HTML, CSS, JavaScript, PHP, and a C++ eligibility calculator. It helps institutions track student bursary applications, review applications, approve or reject requests, and calculate funding recommendations.

## Features

- Student bursary application form
- Admin login and dashboard
- Application tracking by status
- Eligibility score calculation
- Funding recommendation logic
- Responsive dashboard UI
- JSON-based lightweight data storage
- C++ calculator for eligibility scoring

## Tech Stack

- HTML5
- CSS3
- JavaScript
- PHP 8+
- C++17

## Project Structure

- `index.php` – landing page with overview and quick links
- `application.php` – student bursary application form
- `admin.php` – admin dashboard and application review
- `process_application.php` – saves student applications
- `includes/functions.php` – shared logic for storage and calculations
- `assets/css/style.css` – styling
- `assets/js/script.js` – UI helpers and notifications
- `src/bursary_calculator.cpp` – C++ eligibility calculator
- `data/applications.json` – stored applications
- `data/users.json` – administrator credentials

## Setup

1. Make sure PHP is installed.
2. Start a local PHP server:

```bash
php -S localhost:8000
```

3. Open in your browser:

```text
http://localhost:8000/index.php
```

## Admin Login

Username: `admin`
Password: `admin123`

## C++ Calculator

Compile the C++ program:

```bash
g++ -std=c++17 src/bursary_calculator.cpp -o bursary_calculator
```

Example:

```bash
./bursary_calculator 3.8 25000 8
```

This returns the eligibility score.

## Notes

This project uses JSON files as a lightweight database so it runs without needing MySQL or other database services. For a production deployment, you can replace the file-based storage with a database-backed implementation.
