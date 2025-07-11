# 🔓 Vulnerable Web Application Setup & Testing Guide

**Provided by Mohamed Sadik**

---

## Overview

This project is a deliberately vulnerable web app to help you learn and practice:

- Session hijacking through insecure session management  
- Cross-Site Scripting (XSS) attacks  
- SQL Injection (SQLi) vulnerabilities  

Use it to understand common attack vectors and improve your security skills.

---

## ✅ Prerequisites

Make sure you have the following installed:

- Apache2 web server  
- PHP (with `mysqli` extension)  
- MySQL or MariaDB database server  
- Linux environment (Ubuntu/Debian recommended)  

---

## 🛠️ Installation & Configuration

### 1. Install Required Software

```bash
sudo apt update
sudo apt install apache2 php libapache2-mod-php php-mysqli mysql-server -y
sudo a2enmod rewrite
sudo systemctl restart apache2
```
### 2. Deploy Project

```bash
sudo cp -r /path/to/your/project /var/www/html/vulnerable-site
sudo chown -R www-data:www-data /var/www/html/vulnerable-site
sudo chmod -R 755 /var/www/html/vulnerable-site
```
### 3. Create Database and Tables
- The project have included database
### 4. Configure Database Class
- Configure database with your creddentials
- Make sure not to keep the database credentials inside the htdocs folder or /var/www/html folder place them locally outside these directories.
### 🎯 Testing Focus
- Session Hijacking: Learn how attackers steal session tokens.

- XSS Testing: Practice injecting malicious scripts to steal cookies or manipulate pages.

- SQL Injection: Test inputs with SQL payloads to reveal injection points.

- Etc...OWASP's Top 10 Vulnerabilities

### ⚠️ Important Notes
- This app is intentionally vulnerable for educational use only.

- Do NOT deploy on public or production servers.

- Practice responsible and ethical hacking.
## 🙏 Credits

Created by **Mohamed Sadik** for educational purposes.

This project was originally built as a personal learning tool, and is now shared with the cybersecurity student community to help others gain hands-on experience and a deeper understanding of web vulnerabilities.
