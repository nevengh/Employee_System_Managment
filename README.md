#Employee Management System (EMS)
This is a basic Employee Management System (EMS) built using Laravel 10. The system allows for managing departments and employees within those departments, with features like user authentication, CRUD operations, relationships between departments and employees, soft deletion of records, and an API to interact with the system.

Features

    Authentication:
        Implement a simple authentication system where users can register, login, and logout.
        Ensure that only authenticated users can access the CRUD functionalities.
    CRUD Operations:
        Create interfaces for adding, updating, viewing, and deleting departments and employees.
        Utilize form requests to validate data before storing it in the database.
    Models and Relationships:
        Department Model: Has a name and description.
        Employee Model: Has fields like first_name, last_name, email, department_id, and position.
        Implement a Many-to-Many relationship between Employees and Projects (assume a project model exists and employees can work on multiple projects).
        Use Polymorphic Relations (Morph Relation) to allow both departments and employees to have notes (assume a notes model that can be associated with multiple models).
    Soft Deletes:
        Implement soft deleting for departments and employees, allowing them to be restored or permanently deleted.

    Extra Features:

        Implement setters and getters in the Employee model to ensure that the first_name and last_name are properly capitalized upon retrieval and storage.

    Installation
    
        1-Clone the repository:
            git clone https://github.com/nevengh/Employee_System_Managment
        2-Navigate to the project directory:
            cd employee-management-system
        3-Install the dependencies:
            composer install
        4-Generate an application key:
            php artisan key:generate
        5-Configure the database connection in the .env file.
        6-Run the database migrations :
            php artisan migrate
        7-Start the development server:
            php artisan serve
    
    API Documentation:
    The API documentation can be found at https://documenter.getpostman.com/view/32061004/2sA3BuUnrJ.

    

