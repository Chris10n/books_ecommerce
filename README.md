# 📚 Books eCommerce Platform

> A fully functional online bookstore built with **PHP**, **JavaScript**, and **MySQL**. This application provides a complete shopping experience for buying books, including product browsing, shopping cart management, and order checkout.

![Books eCommerce](https://img.shields.io/badge/Status-Active-brightgreen?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-10.4+-00758F?style=for-the-badge&logo=mysql)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

---

## 📑 Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Database Setup](#database-setup)
- [Usage](#usage)
- [File Descriptions](#file-descriptions)
- [Key Features Explained](#key-features-explained)
- [Contributing](#contributing)

## ✨ Features

| Feature | Description |
|---------|-------------|
| 🛍️ **Product Browsing** | Browse a catalog of books with images, titles, and prices |
| 🔍 **Search Functionality** | Search for books by title in real-time |
| 🛒 **Shopping Cart** | Add, remove, and update quantities of books in your cart |
| 💳 **Order Checkout** | Complete shipping information and process orders |
| ✅ **Order Processing** | Confirmation page after successful order placement |
| 💾 **Session Management** | Persistent cart management across page navigation |
| 📱 **Responsive Design** | Mobile-friendly interface with Font Awesome icons |
| 🗄️ **Database Integration** | MySQL database for storing book and order information |

## 🛠️ Tech Stack

<div align="center">

| Category | Technology |
|----------|-----------|
| 🎨 **Frontend** | ![HTML5](https://img.shields.io/badge/HTML5-E34C26?style=flat&logo=html5&logoColor=white) ![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white) ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black) |
| ⚙️ **Backend** | ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white) |
| 🗄️ **Database** | ![MySQL](https://img.shields.io/badge/MySQL-00758F?style=flat&logo=mysql&logoColor=white) ![MariaDB](https://img.shields.io/badge/MariaDB-003545?style=flat&logo=mariadb&logoColor=white) |
| 🖥️ **Server** | ![Apache](https://img.shields.io/badge/Apache-D42029?style=flat&logo=apache&logoColor=white) |
| 📦 **Libraries** | Font Awesome 6.4.0 • Google Fonts |

</div>

## 📁 Project Structure

```
📦 books_ecommerce
├── 📄 index.php              ← Main product listing page
├── 🛒 cart.php              ← Shopping cart management
├── 💳 checkout.php          ← Checkout form interface
├── ⚙️ process_cart.php      ← Cart operations handler
├── ✅ process_order.php     ← Order processing backend
├── 🔌 db.php                ← Database connection
├── 📊 books_db.sql          ← Database schema & data
├── 🎨 style.css             ← Application styling
├── ⚡ script.js             ← Client-side logic
└── 📚 README.md             ← Documentation (you are here)
```

## 🚀 Installation

### 📋 Prerequisites

- 💻 XAMPP (or similar PHP/MySQL stack)
- 🐘 PHP 8.0+
- 🗄️ MySQL/MariaDB
- 🌐 Modern web browser

### 📝 Steps

1. **Clone the Repository** 📥
   ```bash
   git clone https://github.com/Chris10n/books_ecommerce.git
   cd books_ecommerce
   ```

2. **Move Project to XAMPP** 📂
   ```
   Copy the books_ecommerce folder to: C:\xampp\htdocs\
   ```

3. **Start XAMPP Services** ▶️
   - Open XAMPP Control Panel
   - Start Apache and MySQL

4. **Create the Database** 🗄️
   - Open phpMyAdmin: `http://localhost/phpmyadmin`
   - Create a new database named `books_db`
   - Import the SQL file:
     - Click on `books_db` database
     - Go to Import tab
     - Select `books_db.sql` from the project folder
     - Click Import

5. **Access the Application** 🌐
   ```
   http://localhost/books_ecommerce/
   ```

## 💾 Database Setup

The database setup is automated through `books_db.sql`. The schema includes:

### 📊 Tables

#### 📕 Books Table
| Column | Type | Description |
|--------|------|-------------|
| `id` | INT | Primary key |
| `title` | VARCHAR | Book title |
| `author` | VARCHAR | Book author |
| `price` | DECIMAL | Book price |
| `image` | VARCHAR | URL to book cover image |

#### 📦 Orders Table *(Optional - can be created for persistence)*
| Feature | Details |
|---------|---------|
| 📋 Order Information | Customer order details |
| 📮 Shipping Details | Customer shipping information |
| 💰 Order Totals | Price calculations and timestamps |

## 📖 Usage

### 🏠 Home Page (index.php)
- 📚 Browse books displayed in a grid layout
- 🔍 Use the search bar to find books by title
- 🛍️ Click "Add to Cart" button to add books to your shopping cart
- 📊 View cart count in the header

### 🛒 Shopping Cart (cart.php)
- 📋 Review all items in your cart
- 💵 View individual item prices and quantities
- 🧮 See the total price
- ✏️ Update quantities or remove items
- 🏪 Proceed to checkout or continue shopping

### 💳 Checkout (checkout.php)
- 📝 Enter your shipping information (Full Name, Email, Address, Phone)
- 📦 Review your order summary
- 💳 Select payment method (options available)
- ✅ Click "Place Order" to complete purchase

### 🎉 Order Confirmation
- 📬 Receive confirmation message after successful order
- 📄 View order details
- 🏠 Return to home page to shop more

## 📄 File Descriptions

### **📄 index.php** (143 lines)
Main product listing and search page. Features:
- ⚡ Session management for cart persistence
- 📚 Simulated book catalog (12 books)
- 🔍 Search functionality by title
- 🎨 Product grid display
- 🛍️ Add to cart functionality

### **🛒 cart.php** (69 lines)
Shopping cart display page. Features:
- 📋 Display all items in cart with quantities
- 🧮 Calculate item totals and grand total
- ❌ Remove items functionality
- ✏️ Update quantities
- 💳 Proceed to checkout button

### **💳 checkout.php** (80 lines)
Checkout form page. Features:
- 👤 Customer information form
- 📮 Shipping address input
- 💳 Payment method selection
- 📦 Order summary display
- ✅ Order success modal

### **⚙️ process_cart.php**
Backend handler for cart operations:
- ➕ Add items to cart
- ➖ Remove items from cart
- 🔄 Update item quantities
- 💾 Session cart management

### **✅ process_order.php**
Order processing backend:
- ✔️ Validate customer information
- 📝 Process order submission
- 🎉 Set order confirmation flags
- 💾 Handle database storage (if configured)

### **🔌 db.php** (11 lines)
Database connection configuration:
- 🌐 Database host, user, and password
- 📦 Database name (`books_db`)
- 🔗 MySQLi connection error handling
- ⚙️ Note: Configure credentials based on your MySQL setup

### **📊 books_db.sql** (71 lines)
Database schema and sample data:
- 📋 Books table structure
- 📚 Sample book records
- 🗄️ Database initialization script

### **🎨 style.css**
Complete styling for the application:
- 🎯 Header and navigation styling
- 📐 Product grid layout
- 📊 Cart table styling
- 📝 Form styling for checkout
- 🪟 Modal and popup styling
- 📱 Responsive design elements
- 🔤 Font styling (Merriweather, Nunito)

### **⚡ script.js**
Client-side JavaScript functionality:
- ✅ Form validation
- 🔄 Dynamic cart updates
- 🪟 Modal interactions
- 💬 User feedback and confirmations

## 🎯 Key Features Explained

### 💾 Session-Based Cart
- 🔐 Uses PHP sessions to maintain cart data across pages
- 🔄 Cart persists during the user's browsing session
- 🧮 Automatically calculates quantities and totals

### 🔍 Search Functionality
- ⚡ Real-time search by book title
- 🔤 Case-insensitive matching
- 🎯 Filters products on the home page

### 💳 Checkout Process
- 📋 Multi-step form for customer information
- ✅ Input validation on client and server side
- 📬 Order confirmation page upon success

### 🗄️ Database Integration
- 🔗 MySQLi for database operations
- 🛡️ Prepared statements ready for implementation
- 📚 Sample data included for testing

## 🔧 Configuration

### 🔌 Database Credentials
Edit `db.php` if your MySQL setup differs:
```php
$host = "localhost";      // Your MySQL host
$user = "root";           // Your MySQL user
$pass = "";               // Your MySQL password
$dbname = "books_db";     // Database name
```

### 📚 Product Catalog
To add more books, edit the `$books` array in `index.php`:
```php
['id' => 13, 'title' => 'Your Book', 'price' => 599.00, 'image' => 'url_to_image.jpg']
```

## 🤝 Contributing

Contributions are welcome! To contribute:

1. 🍴 Fork the repository
2. 🌿 Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. 💬 Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. 🚀 Push to the branch (`git push origin feature/AmazingFeature`)
5. 📥 Open a Pull Request

## 📝 License

This project is open source and available under the MIT License.

## 📞 Support

For issues or questions, please create an issue on the GitHub repository.

## 🎓 Learning Resources

This project demonstrates:
- 🐘 PHP server-side programming
- 🗄️ MySQL database design
- 🔐 Session management in web applications
- 📝 Form handling and validation
- 🔌 RESTful-like backend operations
- 🎨 Frontend-backend integration
- 📱 Responsive web design

---

<div align="center">

### 🌟 If you find this project helpful, please consider giving it a ⭐!

**Version**: 1.0.0  
**Last Updated**: December 2025  
**Author**: [Chris10n](https://github.com/Chris10n)  
**Repository**: [books_ecommerce](https://github.com/Chris10n/books_ecommerce)

</div>
