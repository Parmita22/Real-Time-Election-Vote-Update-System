# Real-Time Election Vote Update System
Overview
This web-based application provides a real-time voting update system, allowing for efficient tracking and management of election votes. It includes an admin interface for updating candidate votes and a dynamic frontend to display live updates.

Features
Admin Interface: Update candidate names and vote counts via a user-friendly form.
Real-Time Updates: Automatically refreshes vote counts on the frontend without page reload.
Notifications: Displays success or error notifications upon vote update.
Responsive Design: Adapts to various screen sizes for accessibility on desktop and mobile devices.

Technologies Used
Frontend: HTML, CSS, JavaScript
Backend: PHP
Database: MySQL

Installation
Clone the repository:
Copy code
git clone https://github.com/Parmita22/real-time-election-vote-update-system.git
Set up the database:
Import the provided SQL script to create the vote_system database and candidates table.

Configure Database Connection:
Update the database connection details in update_votes.php to match your database configuration.

Run the Application:
Place the project folder in your web server's root directory.
Access the application via http://localhost/real-time-election-vote-update-system. 

Usage
Admin Interface: Navigate to admin.php to update candidate votes.
Live Updates: View real-time vote updates on index.php.
