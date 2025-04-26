-   Inventory Backend (UTS Sistem Manajemen)

Proyek ini adalah aplikasi backend untuk mengelola persediaan barang toko, termasuk kategori, pemasok, dan pengguna (users), dibangun menggunakan Laravel dan MySQL dengan containerisasi Docker.

-   Project Overview
    Proyek ini merupakan tugas UTS untuk mata kuliah "Pemrograman Sisi Server" (Semester 6). Aplikasi ini menyediakan API untuk mengelola data barang, termasuk menambah barang baru, melihat ringkasan stok, dan mengidentifikasi barang dengan stok rendah. Proyek ini menggunakan Laravel sebagai framework backend, MySQL sebagai database, dan Docker untuk containerisasi agar lingkungan pengembangan konsisten.

-   Features

1. Menambahkan barang baru dengan detail seperti nama, deskripsi, harga, stok, kategori, pemasok, dan pembuat (created_by).
2. Melihat ringkasan stok barang.
3. Mengidentifikasi barang dengan stok rendah (stok <= 5).
4. API dengan validasi dan penanganan error.
5. Setup container menggunakan Docker untuk kemudahan deployment.

-   Prerequisites

Sebelum menjalankan proyek, pastikan Anda memiliki:

1. Docker: Untuk menjalankan aplikasi dalam container.
2. Docker Compose: Untuk mengelola multi-container Docker.
3. Git: Untuk meng-clone repositori.

-   Setup Instructions
    Ikuti langkah-langkah berikut untuk menjalankan proyek di mesin lokal Anda:

1. Clone repository:Clone repositori ini ke mesin lokal Anda menggunakan Git:
   git clone https://github.com/farisazizy289/inventory-backend-uts.git
   cd inventory-backend-uts

2. Copy the example environment file:Salin file .env.example untuk membuat file .env lokal:
   cp .env.example .env

Konfigurasi database di .env sudah diatur untuk Docker (DB_HOST=db, dll.), sehingga Anda tidak perlu mengubahnya jika menggunakan Docker.

3. Install dependencies:Gunakan Composer untuk menginstal dependensi PHP. Jalankan perintah ini di dalam container Docker:
   docker-compose exec app composer install

4. Generate application key:Generate kunci aplikasi untuk Laravel:
   docker-compose exec app php artisan key:generate

5. Run the application with Docker:Jalankan container Docker (ini akan menjalankan aplikasi PHP, database MySQL, dan layanan lain yang didefinisikan di docker-compose.yml):
   docker-compose up -d

6. Run migrations and seed the database:Jalankan migrasi database dan seeder untuk menyiapkan database dan mengisi data awal:
   docker-compose exec app php artisan migrate --seed

7. Access the API:API akan tersedia di http://localhost:8000.

-   API Endpoints
    Berikut adalah endpoint API yang tersedia untuk mengelola sistem inventory:

1. Create Item:

Method: POST
URL: http://localhost:8000/api/items
Body (JSON):{
"name": "Kulkas 2 Pintu",
"description": "Kulkas hemat energi.",
"price": 5000000,
"stock": 2,
"category_id": 1,
"supplier_id": 1,
"created_by": 1
}

Description: Menambahkan barang baru ke inventory.

2. Get Summary:

Method: GET
URL: http://localhost:8000/api/items/summary
Description: Mengambil ringkasan stok semua barang.

3. Get Low Stock Items:

Method: GET
URL: http://localhost:8000/api/items/low-stock
Description: Mengambil daftar barang dengan stok rendah (stok < 5).

-   Database Structure
    Database (inventory) mencakup tabel berikut, yang dibuat melalui migrasi Laravel:

Users: Informasi pengguna yang membuat barang (id, name, email, password, created_at, updated_at).
Categories: Kategori barang (id, name, description).
Suppliers: Data pemasok (id, name, contact, address).
Items: Data barang (id, name, description, price, stock, category_id, supplier_id, created_by, created_at, updated_at).

Data awal untuk kategori, pemasok, dan pengguna diisi menggunakan Laravel seeder.

-   Technologies Used

1. Laravel: Framework PHP untuk membangun API.
2. MySQL: Database untuk menyimpan data inventory.
3. Docker: Containerisasi untuk lingkungan pengembangan yang konsisten.
4. Docker Compose: Mengelola aplikasi multi-container Docker.
5. Composer: Manajemen dependensi PHP.
6. Laravel Mix: Kompilasi aset (digunakan untuk mengelola aset frontend, jika ada).

-   Project Development Journey
    Proyek ini dikembangkan melalui beberapa tahap:

1. Inisialisasi Proyek:

Membuat proyek Laravel baru: composer create-project laravel/laravel inventory-backend-uts.
Menginisialisasi Git dan membuat repositori GitHub: https://github.com/farisazzy289/inventory-backend-uts.

2. Pengaturan Database:

Menggunakan MySQL sebagai database.
Membuat migrasi untuk tabel Users, Categories, Suppliers, dan Items.
Menambahkan data awal dengan seeder untuk Users, Categories, dan Suppliers.

3. Pengembangan Backend:

Membuat API untuk menambah barang (POST /api/items), melihat ringkasan stok (GET /api/items/summary), dan mengidentifikasi barang dengan stok rendah (GET /api/items/low-stock).
Menggunakan Eloquent ORM untuk relasi antar tabel (Items berelasi dengan Categories, Suppliers, dan Users).
Menambahkan validasi dan penanganan error untuk API.

4. Containerisasi:

Membuat docker-compose.yml untuk menjalankan aplikasi (service app) dan database (service db).
Mengatur konfigurasi Docker untuk PHP dan MySQL.

5. Konfigurasi Git:

Membuat .gitattributes untuk memastikan akhir baris LF digunakan secara konsisten.
Mengelola commit untuk file aplikasi, migrasi, seeder, dan konfigurasi.
Mengatasi masalah pada composer.json dan composer.lock (misalnya, kompatibilitas versi PHP).

6. Konfigurasi Lingkungan:

Membuat .env.example sebagai template konfigurasi lingkungan.
Mengatur .env untuk pengembangan lokal, memastikan kompatibilitas dengan Docker (misalnya, DB_HOST=db, MAIL_HOST=mailhog).
Memastikan .env tidak diunggah ke Git melalui .gitignore.

7. Finalisasi:

Mengganti nama webback.mix.js menjadi webpack.mix.js untuk kejelasan.
Membuat README.md untuk mendokumentasikan proyek.

-   Troubleshooting

1. Composer Installation Fails:

Pastikan Anda menjalankan composer install di dalam container Docker menggunakan docker-compose exec app composer install.
Jika ada masalah versi PHP, pastikan versi PHP di container Docker sesuai dengan yang dibutuhkan di composer.json.

2. Database Connection Errors:

Pastikan container MySQL berjalan (docker-compose up -d).
Verifikasi kredensial database di .env sesuai dengan konfigurasi di docker-compose.yml (misalnya, DB_HOST=db, DB_PASSWORD=secret).

3. API Not Accessible:

Pastikan aplikasi berjalan pada port 8000 (atau port yang didefinisikan di docker-compose.yml).
Periksa log container Docker untuk error: docker-compose logs app.

-   Future Improvements

1. Menambahkan autentikasi untuk endpoint API (misalnya, menggunakan Laravel Passport atau Sanctum).
2. Membuat antarmuka frontend untuk berinteraksi dengan API.
3. Menambahkan fitur lanjutan seperti riwayat pelacakan stok atau notifikasi stok rendah.
4. Menambahkan unit test untuk endpoint API menggunakan PHPUnit.

-   Author

Name: Faris Azzy
GitHub: farisazizy289
Course: Pemrograman Sisi Server (Semester 6 UTS)
Institution: Universitas Dian Nuswantoro

-   License
    Proyek ini dibuat untuk tujuan pendidikan dan tidak dilisensikan untuk penggunaan komersial.
