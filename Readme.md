# 📌 وب‌سایت پورتفولیو PHP MVC

## 🚀 معرفی
این یک **وب‌سایت پورتفولیو سفارشی با PHP MVC** است که برای نمایش پروژه‌ها، تجربیات و مهارت‌ها طراحی شده است. این پروژه از معماری **مدل-نما-کنترل‌کننده (MVC)** پیروی می‌کند که آن را **ساختاریافته، مقیاس‌پذیر و قابل نگهداری** می‌سازد.

> **⚠️ توجه:**
> این پروژه هنوز کامل نشده و ممکن است مشکلات و آسیب‌پذیری‌های زیادی داشته باشد. اگر پیشنهاد یا نظری دارید، خوشحال می‌شوم که بشنوم.


## 🎯 ویژگی‌ها
✅ پیروی از الگوی **MVC** برای کدنویسی تمیز و ماژولار.
✅ استفاده از **PDO** برای تعامل ایمن با پایگاه داده.
✅ پیاده‌سازی **مدیریت خطا و ثبت لاگ**.
✅ طراحی شده با **رابط کاربری مدرن و واکنش‌گرا**.

## 📂 ساختار پروژه
```
project-root/
│── public/         # فایل‌های عمومی (index.php، CSS، JS، تصاویر)
│── config/         # فایل‌های پیکربندی (پایگاه داده، تنظیمات)
│── views/          # قالب‌های فرانت‌اند (HTML، PHP)
│── models/         # مدل‌های پایگاه داده
│── controllers/    # کنترل‌کننده‌های برنامه
│── README.md       # مستندات
```

## ⚙️ راهنمای نصب
### **1️⃣ کلون کردن مخزن**
```sh
git clone https://github.com/Msd1367/Portfolio-MrMas.git
cd Portfolio-MrMas
```

### **2️⃣ نصب وابستگی‌ها**
```sh
composer install
```

### **3️⃣ تنظیم متغیرهای محیطی**
یک فایل **`.env`** در ریشه پروژه ایجاد کنید و مقداردهی کنید:
```ini
DB_NAME=your_database_name
DB_HOST=localhost
DB_USER=root
DB_PASS=
```

### **4️⃣ وارد کردن پایگاه داده**
- فایل **`database.sql`** را در پایگاه داده MySQL خود وارد کنید.

### **5️⃣ اجرای پروژه**
اجرای پروژه با سرور داخلی PHP:
```sh
php -S localhost:8000 -t public
```
سپس در مرورگر خود به **`http://localhost:8000`** بروید.

## 🗄️ ساختار پایگاه داده
پروژه از یک پایگاه داده **MySQL** شامل جداول زیر استفاده می‌کند:

- **admin** – ذخیره اطلاعات مدیران.
- **contacts** – ذخیره پیام‌های دریافتی از فرم تماس.
- **donations** – ذخیره اطلاعات کمک‌های مالی.
- سایر جداول در **`database.sql`** مشخص شده‌اند.
-  برای کسب اطلاع بیشتر و ساخت دیتابیس و جداول آن فایل Database Generator Codes.txt را بخوانید


## 🔐 بهترین شیوه‌های امنیتی
- **استفاده از `.env`** برای اطلاعات پایگاه داده (**هرگز آن‌ها را در کد هاردکد نکنید!**)
- **همیشه از کوئری‌های آماده (Prepared Statements)** برای جلوگیری از حملات SQL Injection استفاده کنید.
- **اطمینان حاصل کنید که `vendor/` و `.env` در `.gitignore`** قبل از ارسال به GitHub نادیده گرفته شده‌اند.

## 📜 لایسنس
این پروژه تحت **لایسنس MIT** منتشر شده است.

## 🙌 مشارکت در پروژه
مشارکت‌ها استقبال می‌شوند! لطفاً پروژه را فورک کنید و درخواست Pull ارسال کنید. 😊

## 📧 تماس
برای سوالات یا همکاری، با **مسعود سیاح‌پور** تماس بگیرید:
📩 ایمیل: sayahpour.masoud@gmail.com

-----------------------------------------------------------------------------------

# 📌 PHP MVC Portfolio Website

## 🚀 Introduction
This is a **custom PHP MVC portfolio website** designed to showcase projects, experiences, and skills. The project follows the **Model-View-Controller (MVC)** architecture, making it **structured, scalable, and maintainable**.

> **⚠️ Note:**
> This project is still under development and may have many issues and vulnerabilities. If you have any suggestions or feedback, I would be happy to hear them.


## 🎯 Features
✅ Follows the **MVC pattern** for clean and modular code.
✅ Uses **PDO** for secure database interactions.
✅ Supports **environment variables (.env)** for sensitive credentials.
✅ Implements **error handling and logging**.
✅ Designed with **responsive and modern UI**.

## 📂 Project Structure
```
project-root/
│── public/         # Public assets (index.php, CSS, JS, images)
│── config/         # Configuration files (database, settings)
│── views/          # Frontend templates (HTML, PHP)
│── models/         # Database models
│── controllers/    # Application controllers
│── README.md       # Documentation
```

## ⚙️ Installation Guide
### **1️⃣ Clone the Repository**
```sh
git clone https://github.com/Msd1367/Portfolio-MrMas.git
cd Portfolio-MrMas
```

### **2️⃣ Install Dependencies**
```sh
composer install
```

### **3️⃣ Set Up Environment Variables**
Create a **`.env`** file in the project root and add:
```ini
DB_NAME=your_database_name
DB_HOST=localhost
DB_USER=root
DB_PASS=
```

### **4️⃣ Import the Database**
- Import the **`database.sql`** file into your MySQL database.

### **5️⃣ Start the Project**
Serve the project using PHP’s built-in server:
```sh
php -S localhost:8000 -t public
```
Then visit **`http://localhost:8000`** in your browser.

## 🗄️ Database Structure
The project uses a **MySQL database** with the following tables:

- **admin** – Stores admin user details.
- **contacts** – Stores messages received from the contact form.
- **donations** – Stores donation records.
- Additional tables are defined in **`database.sql`**.
- For more information and to create the database and its tables, read the Database Generator Codes.txt file.


## 🔐 Security Best Practices
- **Use `.env`** for database credentials (**Never hardcode them!**)
- **Always use prepared statements** to prevent SQL injection.
- **Ensure `vendor/` and `.env` are in `.gitignore`** before pushing to GitHub.

## 📜 License
This project is licensed under the **MIT License**.

## 🙌 Contributing
Contributions are welcome! Feel free to fork and submit pull requests. 😊

## 📧 Contact
For questions or collaboration, contact **Masoud Sayahpour**:
📩 Email: sayahpour.masoud@gmail.com