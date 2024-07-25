# Warehouse Management System

## Project Description

The "Warehouse Management System" is a web application designed to manage and track warehouses, shelves, and types of goods within the warehouse system. The system supports multiple warehouses, each containing multiple shelves, with each shelf dedicated to a specific type of goods. The application also supports clear user role management.

## Key Features

1. **Warehouse Management:**
   - Manage multiple warehouses.
   - Each warehouse can contain multiple shelves.

2. **Shelf Management:**
   - Manage multiple shelves within each warehouse.
   - Each shelf is dedicated to a specific type of goods.
   - Ability to add, update, and delete shelves within each warehouse.

3. **Goods Management:**
   - Define and manage different types of goods.
   - Link each type of goods to a specific shelf.

4. **User Roles and Permissions:**
   - Role-based access control to manage user permissions and functionalities.
   - User roles include:
     - **Admin:** Full access to manage the system, including warehouses, shelves, goods, and user roles.
     - **Warehouse Staff:** Can view and update warehouse and shelf information, and manage goods on shelves.
     - **User:** Can view information about warehouses and shelves but cannot make changes.

## Technologies Used

- **Backend:** PHP
  - Server-side scripting language for building the application's logic.
  - Handles database interactions, user authentication, and authorization.

- **Frontend:** jQuery
  - JavaScript library for DOM manipulation, event handling, and AJAX requests.
  - Provides dynamic and interactive features for the user interface.

- **Database:** MySQL
  - Relational database management system to store data related to warehouses, shelves, and goods.

