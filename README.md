#  Student Registration System

## Student Details
- **Name:** Chukwuemeka Kelechukwu Emereonye
- **Matric Number:** 23/CSC/094
- **Department:** Computer Science Department
- **Course Code:** CSC282
- **Assignment Title:** Student Registration System

## Project Description
This is a simple PHP & MySQL application that allows students to register by submitting their:
- Full Name
- Email
- Department
- Matric Number

The records are stored in a MySQL database and can be viewed in a table.

## Setup Instructions
1. Install XAMPP and start Apache + MySQL.
2. Copy project files into `C:\xampp\htdocs\student_registration\`.
3. Create a database in phpMyAdmin:
   ```sql
   CREATE DATABASE student_db;
4. Import the SQL table:
   CREATE TABLE student_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    department VARCHAR(50) NOT NULL,
    matric_number VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

5. Open in browser:
    Form: http://localhost/student_registration/index.php
    Records: http://localhost/student_registration/view.php

