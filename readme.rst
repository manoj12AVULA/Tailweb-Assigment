# Teacher Portal Project

This project is a web application for teachers to manage student data. It includes functionalities for teachers to log in, view a list of all students, and perform CRUD (Create, Read, Update, Delete) operations on student data. The project uses HTML, CSS, JavaScript, and the CodeIgniter framework.

## Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Database Schema](#database-schema)
- [Installation](#installation)
- [Usage](#usage)
- [Examples](#examples)
- [Contributing](#contributing)
- [License](#license)

## Features
- **Teacher Login:** Secure login functionality for teachers.
- **Student Management:** View, add, edit, and delete student details.
- **Responsive Design:** Styled with CSS for a responsive user interface.

## Technologies Used
- **Frontend:**
  - HTML
  - CSS
  - JavaScript
- **Backend:**
  - PHP
  - CodeIgniter Framework
- **Database:**
  - MySQL

## Database Schema

### Table: `user_details`
| Column Name | Data Type | Description |
|-------------|------------|-------------|
| `id`        | INT        | Primary Key |
| `Email`  | VARCHAR    | Teacher's username |
| `password`  | VARCHAR    | Teacher's password (hashed) |

### Table: `students_details`
| Column Name    | Data Type | Description          |
|----------------|------------|----------------------|
| `id`           | INT        | Primary Key          |
| `name`         | VARCHAR    | Student's name       |
| `subject_name`        | VARCHAR    | Student's Subject Name      |
| `marks`        | VARCHAR    | Student's Marks      |
| `Upated_at`      | VARCHAR    | Update Student Data    |
| `delete_At`| VARCHAR       | Delets Student Data |

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/manoj12AVULA/Tailweb-Assigment.git
    ```

2. Navigate to the project directory:
    ```bash
    cd Tailweb-Assigment
    ```

3. Install the necessary dependencies:
    ```bash
    composer install
    ```

4. Set up your database and import the provided SQL files to create the necessary tables.

5. Configure the database settings in `application/config/database.php`:
    ```php
    $db['default'] = array(
        'dsn'   => '',
        'hostname' => 'localhost',
        'username' => 'your_db_username',
        'password' => 'your_db_password',
        'database' => 'your_db_name',
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => (ENVIRONMENT !== 'production'),
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt' => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array(),
        'save_queries' => TRUE
    );
    ```

6. Start the server using XAMPP or any other local server setup.

## Usage

1. Open your web browser and navigate to the project's URL, typically `http://localhost/Tailweb-Assigment`.

2. Log in using the credentials from the `user_details` table.

3. Manage student data using the provided interface.

## Examples

### Adding a New Student

1. Click on the "Add Student" button.
2. Fill out the form with the student's details.
3. Click "Submit" to save the new student to the database.

### Editing Student Details

1. Click on the "Edit" button next to the student's name.
2. Update the student's information in the form.
3. Click "Update" to save the changes.

### Deleting a Student

1. Click on the "Delete" button next to the student's name.
2. Confirm the deletion in the popup dialog.

## Contributing

Contributions are welcome! Please fork this repository and submit pull requests for any improvements or bug fixes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
