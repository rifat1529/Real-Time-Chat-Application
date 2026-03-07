# Real-Time Chat Application (PHP + MySQL)

A simple **Real-Time Chat Application** built using **PHP, MySQL, JavaScript, AJAX, HTML, and CSS**.
Users can register, log in, upload a profile picture, and chat with other users in real time.

This project demonstrates core web development concepts such as authentication, database interaction, AJAX requests, and dynamic UI updates.

---

# Features

* User Registration & Login
* Secure Password Hashing
* Profile Picture Upload
* Real-Time Messaging (AJAX auto refresh)
* Edit Message
* Delete Message
* User Dashboard
* Chat Interface
* Responsive UI
* Secure File Upload Validation

---

# Technologies Used

Frontend:

* HTML5
* CSS3
* JavaScript
* Font Awesome Icons

Backend:

* PHP

Database:

* MySQL

Server:

* XAMPP / Apache

---

# Project Structure

```
chat-app/
│
├── CSS/
│   └── style.css
│
├── Js/
│   └── chat.js
│
├── uploads/
│   └── default.png
│
├── db.php
├── register.php
├── login.php
├── logout.php
├── dashboard.php
├── chat.php
├── send_message.php
├── get_messages.php
├── edit_message.php
├── delete_message.php
│
└── README.md
```

---

# Database Setup

Create a database named:

```
chat_app
```

## Users Table

```sql
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
password VARCHAR(255) NOT NULL,
profile_image VARCHAR(255) DEFAULT 'default.png'
);
```

## Messages Table

```sql
CREATE TABLE messages (
id INT AUTO_INCREMENT PRIMARY KEY,
sender_id INT NOT NULL,
receiver_id INT NOT NULL,
message TEXT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

# Installation Guide

1. Install **XAMPP** or any local PHP server.

2. Copy the project folder into:

```
htdocs/
```

Example:

```
C:/xampp/htdocs/chat-app
```

3. Start:

* Apache
* MySQL

4. Open **phpMyAdmin**

Create database:

```
chat_app
```

Import the tables above.

5. Open your browser:

```
http://localhost/chat-app
```

---

# How It Works

1. Users create an account.
2. They log in to the dashboard.
3. The dashboard lists all available users.
4. Clicking a user opens the chat interface.
5. Messages are sent using **AJAX requests**.
6. The chat updates automatically every second.

---

# Security Features

* Password hashing using `password_hash()`
* Image upload validation
* File size limit
* SQL injection protection

---

# Future Improvements

* Online / Offline Status
* Message Seen ✔✔ System
* Typing Indicator
* File & Image Sharing
* Group Chat
* WebSocket Real-Time Messaging

---

# Author

Developer: **Rohan Rifat**

Project: **Real-Time Chat Application**

---

# License

This project is open-source and available for learning purposes.
