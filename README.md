# PHP MySQL User API

This project is a simple REST-style API built with **PHP** and **MySQL**.
It connects to a MySQL database and performs operations on the `users` table.

---

## Database Configuration

Database connection settings are stored in:

```
db.php
```

**Database Name:**

```
api_test_db
```

---

## Users Table Structure

| Field | Type            | Null | Extra                       | Description    |
| ----- | --------------- | ---- | --------------------------- | -------------- |
| id    | INT(6) UNSIGNED | NO   | AUTO_INCREMENT, PRIMARY KEY | Unique user ID |
| name  | VARCHAR(30)     | NO   | —                           | User name      |
| email | VARCHAR(50)     | NO   | —                           | User email     |
| age   | INT(3)          | NO   | —                           | User age       |

---

## Features

* Connects to MySQL database using PHP
* Performs CRUD operations on users
* Returns JSON responses
* Simple and lightweight structure

---

## Setup Instructions

1. Clone this repository:

   ```
   git clone <your-repo-url>
   ```

2. Import the database:

   * Create a database named **api_test_db**
   * Create the **users** table using the structure above

3. Configure database credentials in:

   ```
   db.php
   ```

4. Run the project on a local server:

   * XAMPP / WAMP / LAMP recommended

5. Access the API through your browser or Postman.

---

## Requirements

* PHP 7.0+
* MySQL
* Apache or any PHP-supported web server

---

## Author

Created as a simple PHP + MySQL API project.
