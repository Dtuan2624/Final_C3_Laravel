📘 Course Management System – Laravel

Hệ thống quản lý khóa học (Course Management System) – xây dựng bằng Laravel (CRUD Courses, Lessons, Enrollments).

🚀 Yêu cầu môi trường

Trước khi chạy project, máy của bạn cần cài:

PHP 8.1+\n
Composer
XAMPP
MySQL 
📥 Bước 1 – Clone repository
git clone https://github.com/Dtuan2624/Final_C3_Laravel.git
cd Final_C3_Laravel
📦 Bước 2 – Cài các thư viện

Cài các package PHP thông qua Composer:

composer install
📄 Bước 3 – Thiết lập file .env

Sao chép file .env.example thành .env:

cp .env.example .env

mở XAMPP , vào admin mySQL , tạo 1 database của bạn

Mở .env và cấu hình thông tin database của bạn. Ví dụ:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quanlykhoahoc //thay tên databse là được
DB_USERNAME=root
DB_PASSWORD=

🗃️ Bước 4 – Migrate database

Tạo các bảng trong database theo migration:

php artisan migrate

Nếu có seeders/fixtures, bạn có thể chạy thêm (nếu project hỗ trợ):

php artisan db:seed


🔗 Bước 5 – Tạo symbolic link (nếu dùng storage)

Nếu project lưu ảnh/ file trong storage, cần tạo liên kết để phục vụ file:

php artisan storage:link

🖥️ Bước 6 – Chạy server

Khởi động server Laravel:

php artisan serve

Bạn sẽ truy cập được project tại:

http://localhost:8000




📂 Cấu trúc chính của project
Thư mục	Mục đích
app/Models	                            Eloquent Models
app/Http/Controllers	                Controllers
database/migrations	                    Migrations tạo bảng
resources/views	                        Blade views
routes/web.php	                        Định nghĩa route UI


💬 Liên hệ / Góp ý

Nếu bạn thấy hướng dẫn này thiếu hoặc cần hỗ trợ thêm, có thể mở issue trên GitHub hoặc hỏi trực tiếp tác giả repo.
