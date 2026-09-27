# Library Management System

A complete, responsive Library Management System built with PHP, MySQL, and Bootstrap 5. This system is designed for librarians to manage books, students, and book circulation efficiently.

## Features

- **Admin Authentication**: Secure login system with session management
- **Dashboard**: Real-time statistics showing total books, students, issued/returned books
- **Book Management**: Add, edit, delete, and search books with quantity tracking
- **Student Management**: Add, edit, delete, and search students
- **Book Issue System**: Issue books to students with due date tracking
- **Book Return System**: Return books and automatically update inventory
- **Reports**: View issued books, returned books, and overdue books
- **Responsive Design**: Mobile-friendly using Bootstrap 5
- **Security**: Prepared statements for SQL injection prevention

## Technology Stack

- **Backend**: PHP (Core PHP, no frameworks)
- **Database**: MySQL
- **Frontend**: HTML, CSS, Bootstrap 5
- **Icons**: Bootstrap Icons

## Project Structure

```
library-management-system/
├── admin/
│   ├── login.php              # Admin login page
│   ├── logout.php             # Logout functionality
│   ├── dashboard.php          # Admin dashboard with statistics
│   ├── add_book.php           # Add new book
│   ├── manage_books.php       # View, search, delete books
│   ├── edit_book.php          # Edit book details
│   ├── add_student.php        # Add new student
│   ├── manage_students.php    # View, search, delete students
│   ├── edit_student.php       # Edit student details
│   ├── issue_book.php         # Issue book to student
│   ├── return_book.php        # Return book
│   └── reports.php            # View reports (issued, returned, overdue)
├── assets/
│   ├── css/
│   │   └── style.css          # Custom styles
│   └── js/                    # JavaScript files (if needed)
├── includes/
│   ├── header.php             # Reusable header
│   ├── footer.php             # Reusable footer
│   ├── navbar.php             # Navigation bar
│   └── db.php                 # Database connection
├── database/
│   └── library.sql            # Database schema and sample data
└── README.md                  # This file
```

## Database Schema

### Tables

1. **admins** - Admin user accounts
   - id, name, email, password, created_at

2. **books** - Book inventory
   - id, title, author, category, isbn, quantity, available_quantity, added_date

3. **students** - Student records
   - id, name, email, phone, created_at

4. **issued_books** - Book circulation records
   - id, book_id, student_id, issue_date, return_date, status, created_at

## Installation Instructions

### Prerequisites

- XAMPP (or any PHP/MySQL server)
- PHP 7.4 or higher
- MySQL 5.7 or higher

### Step-by-Step Setup

1. **Install XAMPP**
   - Download and install XAMPP from https://www.apachefriends.org/
   - Start Apache and MySQL services from XAMPP Control Panel

2. **Set Up the Project**
   - Copy the `library-management-system` folder to:
     - Windows: `C:\xampp\htdocs\`
     - Mac/Linux: `/Applications/XAMPP/htdocs/` or `/opt/lampp/htdocs/`

3. **Create the Database**
   - Open phpMyAdmin: http://localhost/phpmyadmin
   - Click on "New" to create a new database
   - Or import the SQL file directly:
     - Select the "Import" tab
     - Choose `library-management-system/database/library.sql`
     - Click "Go"

   **Or manually run the SQL:**
   ```sql
   -- Open phpMyAdmin and run this SQL
   CREATE DATABASE IF NOT EXISTS library_management;
   USE library_management;
   -- Then execute the contents of library.sql
   ```

4. **Configure Database Connection**
   - Open `includes/db.php`
   - Verify the database settings:
     ```php
     $host = 'localhost';
     $dbname = 'library_management';
     $username = 'root';
     $password = '';
     ```
   - Adjust if your MySQL credentials are different

5. **Access the Application**
   - Open your browser and go to: http://localhost/library-management-system/admin/login.php

6. **Login Credentials**
   - Default Admin Email: `admin@library.com`
   - Default Admin Password: `admin123`

   **Important**: Change the default password after first login for security.

## Usage Guide

### 1. Dashboard
- View overall statistics
- Quick access to all features
- Navigate using the top navbar

### 2. Book Management
- **Add Book**: Click "Add Book" to add new books to the library
- **Manage Books**: View all books, search, edit, or delete
- **Edit Book**: Update book details including quantity
- **Search**: Search by title, author, or ISBN

### 3. Student Management
- **Add Student**: Register new students
- **Manage Students**: View student list, search, edit, or delete
- **Edit Student**: Update student information

### 4. Issue Book
- Select a student from the dropdown
- Select an available book
- Set the return due date
- System automatically decreases available quantity

### 5. Return Book
- View all currently issued books
- Click "Return" to mark a book as returned
- System automatically increases available quantity
- Overdue books are highlighted in red

### 6. Reports
- **Issued Books**: View all currently issued books
- **Returned Books**: View history of returned books
- **Overdue Books**: Track overdue books with days overdue

## Security Features

- **Prepared Statements**: All database queries use PDO prepared statements to prevent SQL injection
- **Session Management**: Secure session-based authentication
- **Password Hashing**: Admin passwords are hashed using PHP's password_hash()
- **Input Validation**: Form inputs are validated and sanitized
- **CSRF Protection**: Basic CSRF protection through session checks

## Customization

### Change Admin Password
1. Access phpMyAdmin
2. Go to `library_management` database
3. Edit the `admins` table
4. Update the password field with a new hashed password
5. Or use PHP to generate a new hash:
   ```php
   echo password_hash('your_new_password', PASSWORD_DEFAULT);
   ```

### Modify Categories
Edit the category dropdown in:
- `admin/add_book.php`
- `admin/edit_book.php`

### Change Styling
Modify `assets/css/style.css` to customize the appearance.

## Troubleshooting

### Database Connection Error
- Verify MySQL is running in XAMPP
- Check database credentials in `includes/db.php`
- Ensure the database `library_management` exists

### Login Not Working
- Verify the admin account exists in the database
- Check if the password hash matches
- Try clearing browser cookies and cache

### Books Not Showing
- Ensure books are added to the database
- Check if the query is executing correctly
- Verify the database connection

### Session Issues
- Check if PHP sessions are enabled
- Verify session_save_path is writable
- Clear browser cookies

## Sample Data

The system comes pre-loaded with:
- 1 Admin account
- 5 Sample books
- 3 Sample students

You can modify or delete this sample data as needed.

## Browser Compatibility

- Chrome (recommended)
- Firefox
- Safari
- Edge
- Mobile browsers (iOS Safari, Chrome Mobile)

## License

This project is open source and available for educational purposes.

## Support

For issues or questions:
1. Check the troubleshooting section
2. Verify XAMPP services are running
3. Check browser console for errors
4. Review PHP error logs in XAMPP

## Future Enhancements

Potential features to add:
- Book reservation system
- Fine calculation for overdue books
- Email notifications for due dates
- Barcode/QR code scanning
- Advanced reporting with charts
- Multi-admin support with role-based access
- Student portal for self-service
- Book rating and review system

---

**Developed with PHP, MySQL, and Bootstrap 5**
**Admin-Focused Library Management System**
