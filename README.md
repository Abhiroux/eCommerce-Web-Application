# 🛍️ E-Commerce Web Application

An e-commerce web application built with PHP, MySQL, HTML, CSS, JavaScript, and Bootstrap. The application offers a smooth shopping experience with features like user authentication, product catalog, cart management, checkout with address selection, order tracking, and profile management.

![E-Commerce Banner](https://via.placeholder.com/1200x300?text=E-Commerce+Web+Application) <!-- Replace this URL with an actual banner image URL -->

## 🔥 Features

- **🔑 User Authentication**: Register, log in, and manage user sessions.
- **👤 Profile Management**: View and update profile details, change passwords, and manage user information.
- **🛒 Cart Management**: Add products to the cart, adjust quantities, and view the cart summary.
- **📦 Checkout with Address Selection**: Choose a saved address, add a new address, or edit an existing one before checkout.
- **📜 Order Tracking**: Track orders with a list view and see details for each placed order.

## 📂 Database Structure

### `users` Table

| Field        | Type           | Key | Description          |
| ------------ | -------------- | --- | -------------------- |
| `id`         | `int(11)`      | PK  | User ID              |
| `name`       | `varchar(100)` |     | User's full name     |
| `email`      | `varchar(100)` | UNI | User's email address |
| `password`   | `varchar(255)` |     | Hashed password      |
| `created_at` | `timestamp`    |     | Creation timestamp   |

### `orders` Table

| Field        | Type            | Key | Description                                       |
| ------------ | --------------- | --- | ------------------------------------------------- |
| `id`         | `int(11)`       | PK  | Order ID                                          |
| `user_id`    | `int(11)`       | FK  | User who placed the order                         |
| `total`      | `decimal(10,2)` |     | Total amount of the order                         |
| `status`     | `enum`          |     | Order status (`pending`, `completed`, `canceled`) |
| `created_at` | `timestamp`     |     | Order creation timestamp                          |

### `order_items` Table

| Field        | Type            | Key | Description                  |
| ------------ | --------------- | --- | ---------------------------- |
| `order_id`   | `int(11)`       | FK  | Order ID from `orders` table |
| `product_id` | `int(11)`       | FK  | ID of the ordered product    |
| `quantity`   | `int`           |     | Quantity ordered             |
| `price`      | `decimal(10,2)` |     | Price of each unit           |

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/Abhiroux/ecommerce-application.git
cd ecommerce-application
```

2. Set up the database
   Import the database.sql file to set up tables and sample data.
   Update db.php with your MySQL database credentials.
3. Run the application
   Use a local server like XAMPP, MAMP, or WAMP and point it to this project folder.
   🖥️ Usage Guide
   Home Page: Explore the product catalog, view details, and add items to the cart.
   Cart Page: View and adjust quantities for products in the cart.
   Checkout Page: Select or add an address before placing an order.
   Orders Page: Track and view details of placed orders.
   Profile Page: Update profile information, view past orders, and change the password.
   🛠️ Technologies Used
   Frontend: HTML, CSS, JavaScript, Bootstrap
   Backend: PHP (PDO for database handling), MySQL
   📸 Screenshots
   Home Page: Displays the product catalog.
   Cart Page: Shows items in the user's cart.
   Profile Page: Allows the user to edit profile information and change password.
   Orders Page: Lists all past orders.
   Note: Add screenshots for each of these sections here to make the README more illustrative and attractive.

🔄 Future Enhancements
Integrate a payment gateway for secure online transactions.
Add an admin dashboard for managing products and tracking orders.
Enhance UI with more responsive and dynamic elements.
📄 License
This project is open-source and available under the MIT License.

👤 Author
Abhishek Kumar
GitHub
