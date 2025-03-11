Here’s the regenerated **README.md** including all features, icons, and the deployment information:

---

# MoneyMind - Personal Budget Management Application

**MoneyMind** is a platform designed to simplify personal budget management by helping users track their income, expenses, savings goals, and wishlist items, while receiving intelligent suggestions through AI. The platform automates salary entries, manages recurring expenses, sends alerts when users exceed budget thresholds, and allows administrators to add custom expense categories. 

The application is hosted on a Linux server and is accessible via [this link](http://161.35.205.124/).

## Features

### 💻 **Front Office**

#### 🧑‍💻 **Visitor Features:**
- **Public Homepage:** View a general introduction to the application.
- **Sign Up:** Users can register by providing their salary input and the credit date.
- **Password Recovery:** Users can recover their password.

#### 👤 **Authenticated User Features:**
- **Salary Management:** Input and modify monthly salary with an automatic credit date (e.g., 5000 DH every 10th of the month).
- **Expense Management:** Add expenses with name, price, and category (selected from admin-created categories).
- **Recurring Expenses:** Users can add, modify, or delete recurring expenses (e.g., "Rent - 1000 DH, due every 1st of the month").
- **Budget Alerts:** Set budget thresholds (e.g., "Alert if I exceed 50% of my budget"). Category-specific thresholds can also be set.
- **Personal Dashboard:** View remaining income, total expenses, distribution by category, savings progress (e.g., "Save 200 DH"), and wishlist status (e.g., "Phone - 1500 DH, 10% achieved").
- **Notifications:** Receive alerts on exceeding thresholds, salary credits, and other important updates.
- **Savings Goals & Wishlist:** Track savings progress and wishlist items with percentage completion.

### 🛠️ **Back Office (Admin Features)**

- **Admin Dashboard:** View statistics like the total number of users, average monthly income, and manage inactive accounts.
- **Account Management:** Delete inactive accounts (no activity in the last 2 months).
- **Category Management:** Add, modify, or delete expense categories (e.g., "Entertainment," "Food," "Bills").

### 🔄 **Transversal Features**
- **Role-based Authentication:** Implement a secure login system for users and admins.
- **Email Notifications:** Send notifications about alerts, salary updates, and other essential updates.
- **Automatic Salary & Recurring Expense Management:** Salaries and recurring expenses are managed automatically through the platform.
- **AI Suggestions:** Integrate AI suggestions via Gemini based on users’ spending patterns.
- **Statistics:** Simple statistics for both users (e.g., spending trends) and administrators (e.g., average income).
- **Expense Filtering:** Filter expenses by category or period.

---

## ⚙️ **Technical Requirements**

- **Framework:** Laravel (latest stable version)
- **Database:** MySQL / PostgreSQL
- **Frontend:** Blade + Tailwind CSS
- **Authentication:** Laravel Breeze / Jetstream / UI
- **Tools:** 
  - `php artisan make:model -mcr`
  - `php artisan make:seeder & make:factory`
  - `php artisan tinker`
  - Eloquent ORM

---

### 🧑‍💻 **Application Architecture**

#### **User Management (users)**
- **Authentication:** Secure user login and sign-up with roles (user/admin).
- **Profile Management:** Users can view and edit their profile information.

#### **Event Management (events)**
- **CRUD Operations:** Create, read, update, delete events with pagination.
- **Geolocation:** Users can filter events based on proximity.

#### **RSVP Management (rsvps)**
- **Participant Management:** Users can register and unregister for events.
- **Notification System:** Alerts for changes in event status.

#### **Comment Management (comments)**
- **Comment System:** Add, edit, or delete comments on events.
- **Moderation:** Users can delete their own comments.

---

## 🚀 **Deployment**

The **MoneyMind** application is hosted on a **Linux server** and can be accessed through the following link:  
**[http://161.35.205.124/](http://161.35.205.124/)**

### Hosting Details
- **Platform:** Hosted on a Linux server via **DigitalOcean** (or AWS/ Azure, depending on the configuration).
- **Web Server:** Configured with **Nginx/Apache**.
- **Database:** **MySQL/PostgreSQL**.
- **Deployment Environment:** Hosted on a **Linux server** for live access.

---

## 🔧 **Bonus Features**

- **Expense History:** View past expenses, compare trends (e.g., "February: More spending in Entertainment").
- **Contextual Suggestions:** AI provides suggestions based on specific periods (e.g., "February: Watch out for Ramadan-related expenses!").
- **Export Data:** Users can download monthly expense reports in **PDF** or **CSV** format.

---

## 🎯 **Example Workflow**

1. **Sign-Up:** User enters a salary of 5000 DH, credited on the 15th of each month.
2. **Admin:** Adds categories like "Entertainment," "Food," and "Bills."
3. **Recurring Expenses:** User adds "Internet subscription - 200 DH, Bills, due on the 10th." Budget updates to 4800 DH on February 10.
4. **Manual Expenses:** User adds "Game - 600 DH, Entertainment" (remaining 4200 DH).
5. **Alerts:** User sets a budget threshold at 50% (2500 DH) and adds "TV - 2000 DH, Miscellaneous." Total spent = 2800 DH. Alert: "You’ve exceeded 50% of your budget!"
6. **AI Suggestions:** Gemini suggests: "Wow, 600 DH in Entertainment? Try free alternatives to save."
7. **Goals:** "Save 300 DH" (not achieved). Wishlist: "Headphones - 1000 DH" (10% progress with 100 DH saved).
8. **Admin:** Sees 20 users, with an average income of 4500 DH. Deletes an inactive account and adds "Transport" as a new category.
9. **Deployment:** The app is accessible via **[http://161.35.205.124/](http://161.35.205.124/)**.

---

## 🗓️ **Development and Deployment Phases**

### 📅 **Week 1: Basic Setup & Core Features**
- **Initialize GitHub repository** for project management.
- **Set up Laravel environment** and configure database (MySQL/PostgreSQL).
- **User Authentication:** Implement login, registration, password recovery with roles (user/admin).
- **Form Development:** Create CRUD forms for salary, expenses, recurring expenses, savings goals, and wishlist.
- **User Dashboard:** Design dashboard to show remaining income, total expenses, and budget progress.
- **Recurring Expenses Management:** Implement automated salary and recurring expense management.
- **Admin Dashboard:** Add functionality to manage user accounts and expense categories.

### 📅 **Week 2: Advanced Features, Testing & Deployment**
- **Integrate Gemini API** for personalized AI suggestions based on expenses.
- **Set up Budget Alerts** with global and category-specific thresholds.
- **Visualizations:** Implement simple graphs to visualize spending distribution.
- **UI/UX Improvements:** Enhance the design to make it responsive and user-friendly.
- **Test Features:** Conduct functional tests and fix any bugs.
- **Documentation:** Create diagrams for class structure and use cases.
- **Deploy Application:** Transfer code to a Linux server (DigitalOcean, AWS, or Azure) and perform live tests.
- **Final Delivery:** Upload the code to GitHub and deploy the live version of the app.

---

## ✅ **Performance Criteria**

### **Functional:**
- Secure authentication and proper management of financial data (create, modify, delete expenses).
- Automatic budget distribution adhering to predefined rules.

### **Technical:**
- Well-structured **Laravel MVC** architecture with modular code.
- **Eloquent ORM** and **middleware** for efficient data handling.
- **API Integration:** Implement AI-driven suggestions via **Gemini**.

### **Organizational:**
- Regular updates and tracking through **GitHub**.
- Timely delivery and quality documentation.

### **Pedagogical:**
- Clear and comprehensive diagrams (UML class diagrams, use cases).
- Professional presentation and demonstrations.

---

Feel free to modify any additional content, customize the hosting links, or further adjust specific details as needed for your project!
