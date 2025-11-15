# English with Gaven

A secure web application for English tutoring services with online lesson scheduling and profile management.

## 🚀 Features

- ✅ User authentication (signup/login)
- ✅ Profile management with photo upload
- ✅ Real-time email validation
- ✅ English level tracking
- ✅ Secure payment integration (PayPal)
- ✅ Responsive design (mobile-friendly)
- ✅ Grammar resources (A1-C2 levels)

## 🔒 Security

- PDO with prepared statements (SQL injection prevention)
- Password hashing with `password_hash()`
- Environment variables for sensitive data
- Session security with regeneration
- Input validation (client & server-side)

## 🛠️ Tech Stack

- **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript
- **Backend:** PHP 8+
- **Database:** MySQL 8+
- **Validation:** Just-validate.js

## 📦 Installation

1. Clone repository
2. Create `.env` file (see `.env.example`)
3. Import database schema
4. Set up uploads folder permissions
5. Configure web server

## 🔐 Environment Variables

Create a `.env` file in the project root:

```env
DB_HOST=localhost
DB_NAME=your_database_name
DB_USER=your_database_user
DB_PASS=your_database_password
DB_CHARSET=utf8mb4
SESSION_LIFETIME=3600
SESSION_NAME=english_with_gaven_session
ENVIRONMENT=development
```

## 📄 License

© 2025 English with Gaven. All rights reserved.