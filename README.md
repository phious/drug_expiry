Drug Expiry Alert System
Overview
The Drug Expiry Alert System is a web-based application developed for the Ethiopian Pharmaceuticals Supply Agency (EPSA) to enhance inventory management. Built from scratch, it enables real-time tracking and automated alerting for pharmaceuticals nearing expiry, reducing wastage across EPSA’s 19 regional hubs. The system integrates with SAP S/4HANA, offers a user-friendly dashboard, and supports email and SMS notifications for proactive inventory control.
Features

Home Page: Displays metrics for Total Drug List, Distribution Centers, Batches, Expiry Drugs, and Trashed Drugs with quick “Check Out” navigation.
Admin Files: Centralizes administrative tasks, including user account management.
Drug Details: Tracks drugs with details: S/n, Drug Name, Description, Batch, QR Code, Production Date, Expiry Date, Quantity, Price, Expiry Status, Action (Evaluate).
Batches: Lists batches (ID, Batch Name, Created By, Date, Action) with an “Add Batch” button.
Distribution Center: Manages centers (S/n, Name, Location, Contact Info, Action) with an “Add Distribution” button.
Customer: Handles customer data (S/n, Name, Location, Contact Info, Action).
Manage Sales: Reports sales (Sales Date, Distribution Center, Drugs Sold, Expiry Status, Total Purchase) with a “New Sales” button.
Reports:
Expiry Report: Lists expiring drugs (S/n, Drug Name, Quantity).
History Report: Tracks system activities (Date, User, Action).


Create Admin User: Enables admin account creation with role-based access control.
Logout: Ensures secure user logout.
Additional Features:
Real-time expiry tracking using MySQL.
Automated email and SMS alerts via Africa’s Talking API for drugs nearing expiry (e.g., 3 months prior).
JavaScript/CSS dashboard for inventory visualization.
Integration with SAP S/4HANA via REST APIs.



Technologies

Backend: PHP (Laravel, 96.4%)
Frontend: JavaScript (0.7%), CSS (0.1%)
Database: MySQL (Aiven.io, TSQL scripts 1.5%)
Other: Hack (1.3%), Shell scripts (0.0%)
Communication: Africa’s Talking API for SMS
Deployment: Render.com
Development Tools: Visual Studio Code, Git, GitHub
Integration: REST APIs for SAP S/4HANA

Prerequisites

PHP >= 8.1
MySQL >= 8.0
Composer for PHP dependencies
Node.js and npm for frontend assets
Git for version control
Accounts for Render.com, Aiven.io, and Africa’s Talking

Setup Instructions

Clone the Repository:
git clone https://github.com/phious/drug_expiry.git
cd drug_expiry


Install Dependencies:

Backend:composer install


Frontend:npm install
npm run dev




Configure Environment:

Copy .env.example to .env:cp .env.example .env


Update .env with:
MySQL credentials (Aiven.io)
Africa’s Talking API keys
SAP S/4HANA API endpoints
Render.com deployment settings




Set Up Database:

Create a MySQL database on Aiven.io.
Run migrations:php artisan migrate




Run Locally:
php artisan serve

Access at http://localhost:8000.


Deployment

Render.com:

Create a web service on Render.com.
Link to the GitHub repository (github.com/phious/drug_expiry).
Set build command: composer install && npm install && npm run build.
Set start command: php artisan serve --host=0.0.0.0 --port=$PORT.
Configure environment variables in Render’s dashboard.


Aiven.io:

Set up a MySQL instance.
Update .env with database credentials.


Africa’s Talking:

Configure SMS API credentials in .env for alerts.



Usage

Admin Access:
Log in with admin credentials (created via Create Admin User).
Use Admin Files to manage users and settings.


Inventory Management:
View and evaluate drugs in Drug Details.
Add batches via Batches page.
Manage distribution centers and customers.


Sales and Reports:
Record sales in Manage Sales.
Generate Expiry and History Reports for insights.


Alerts:
Receive automated email/SMS alerts for drugs nearing expiry.



Contribution Guidelines

Fork the repository and create a feature branch (git checkout -b feature-name).
Follow coding standards (PSR-12 for PHP, ESLint for JavaScript).
Commit changes with clear messages (git commit -m "Add feature X").
Push to your fork and submit a pull request.
Ensure tests pass before submitting.

License
This project is licensed under the MIT License. See LICENSE for details.
Acknowledgments

Ethiopian Pharmaceuticals Supply Agency (EPSA) for project inspiration.
Open-source communities for Laravel, MySQL, and Africa’s Talking.

