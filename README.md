# Hostel Management System

A lightweight PHP-based hostel booking and management web application for managing room listings, user bookings, and basic admin operations.

## Overview

This project allows:

- Students to register and log in
- Guests to browse available rooms
- Users to book rooms for selected dates
- Admins to manage rooms and view booking activity
- Users to view and manage their account and bookings

The project is built using plain PHP, MySQL, HTML, CSS, and JavaScript, and is intended to run locally with XAMPP or a similar local PHP/MySQL stack.

## Tech Stack

- PHP 7+
- MySQL / MariaDB
- HTML5
- CSS3
- JavaScript
- XAMPP / Apache Server

## Project Structure

```text
hostel/
├── admin/                 # Admin module
│   ├── addroom.php
│   ├── booked.php
│   ├── bookedprocess.php
│   ├── booking.php
│   ├── connect.php
│   ├── index.php
│   ├── navbar.php
│   ├── payment.php
│   ├── room.php
│   ├── users.php
│   └── styles.css
├── User/                  # User-facing views
│   ├── booking.php
│   ├── contact.php
│   ├── home.php
│   ├── index.php
│   ├── navbar.php
│   └── room.php
├── connect.php            # Shared database connection
├── index.php              # Main entry page
├── booking.php
├── booking1.php
├── booked.php
├── bookedprocess.php
├── dashboard.php
├── edit.php
├── footer.php
├── header.php
├── home.php
├── login.php
├── loginprocess.php
├── logout.php
├── myaccount.php
├── mybooking.php
├── navbar.php
├── register.php
├── registerprocess.php
├── room.php
├── style.css
├── qa-tests/              # Postman/Newman test assets
├── README.md
└── .gitignore
```

## Features

### User Features

- User registration and login
- Room listing and filters
- Room booking form
- Booking summary and confirmation flows
- Profile/account management
- My bookings page

### Admin Features

- Admin dashboard overview
- Add rooms to the hostel
- View bookings
- Manage room listings
- User and booking status overview

## Database Setup

The application expects a MySQL database named `hostel`.

The default database connection is defined in `connect.php`:

```php
$host = "localhost";
$user = "root";
$pw = "";
$db = "hostel";
```

Create the database in phpMyAdmin or MySQL CLI:

```sql
CREATE DATABASE hostel;
```

Example table structure used by the app:

```sql
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100),
    username VARCHAR(100),
    email VARCHAR(150),
    password VARCHAR(255),
    phone VARCHAR(20),
    gender VARCHAR(20)
);

CREATE TABLE room (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(100),
    room_type VARCHAR(50),
    description TEXT,
    price DECIMAL(10,2),
    image VARCHAR(255)
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100),
    room_name VARCHAR(100),
    booking_date DATE,
    check_in DATE,
    check_out DATE
);
```

## Local Setup

1. Install XAMPP or a similar PHP + MySQL environment.
2. Start Apache and MySQL.
3. Place the project folder in `htdocs` (for XAMPP) or your local web root.
4. Create the `hostel` database in MySQL.
5. Add the required tables as shown above.
6. Open the app in your browser:

```text
http://localhost/hostel/index.php
```

### Admin Panel

The admin area is available at:

```text
http://localhost/hostel/admin/index.php
```

## Running the App

The app does not require a build step. Once the files are under the web root and the database is configured, the app is ready to use.

## QA / Testing

This project includes a `qa-tests` directory with Postman/Newman-related assets. You can use those files for API and endpoint validation as needed.

## Notes

- The project uses raw PHP and server-side rendering rather than a modern framework.
- Database credentials are currently local defaults and should be updated for production use.
- Password handling is basic and should be hardened before real-world deployment.

## License

This project is provided as-is for learning and local project use.
