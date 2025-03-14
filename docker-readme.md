# Panduan Docker untuk Aplikasi GIS Banyumas dengan FrankenPHP

Dokumen ini berisi panduan untuk menjalankan aplikasi GIS Banyumas menggunakan Docker dengan FrankenPHP.

## Apa itu FrankenPHP?

FrankenPHP adalah server web dan runtime PHP modern yang dikembangkan oleh Kévin Dunglas. FrankenPHP menggabungkan Caddy (server web yang cepat dan modern) dengan PHP, menawarkan performa yang lebih baik dibandingkan dengan konfigurasi tradisional seperti Nginx + PHP-FPM.

Keuntungan menggunakan FrankenPHP:
- Performa yang lebih baik
- Penggunaan memori yang lebih efisien
- Dukungan untuk fitur modern seperti HTTP/2 dan HTTP/3
- Konfigurasi yang lebih sederhana

## Prasyarat

- Docker dan Docker Compose terinstal di sistem Anda
- Git (untuk mengkloning repositori)

## Langkah-langkah Penggunaan

### 1. Persiapan Lingkungan

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Sesuaikan konfigurasi database di file `.env` jika diperlukan:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=gis_app
DB_USERNAME=gis_user
DB_PASSWORD=password
```

### 2. Membangun dan Menjalankan Container

```bash
docker-compose up -d
```

Perintah ini akan membangun image Docker dan menjalankan container untuk FrankenPHP, MySQL, dan Redis.

### 3. Mengakses Aplikasi

Setelah container berjalan, Anda dapat mengakses aplikasi melalui browser di:

```
http://localhost
```

### 4. Menjalankan Perintah Laravel

Untuk menjalankan perintah Laravel (seperti migrasi, seeder, dll.), gunakan perintah berikut:

```bash
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```

### 5. Menghentikan Container

```bash
docker-compose down
```

Untuk menghentikan dan menghapus container, jaringan, dan volume:

```bash
docker-compose down -v
```

## Struktur Direktori Docker

- `Dockerfile`: Konfigurasi untuk membangun image FrankenPHP
- `docker-compose.yml`: Konfigurasi untuk menjalankan container
- `docker/caddy/Caddyfile`: Konfigurasi FrankenPHP/Caddy
- `docker/php/local.ini`: Konfigurasi PHP
- `docker/mysql/my.cnf`: Konfigurasi MySQL

## Troubleshooting

### Masalah Izin

Jika Anda mengalami masalah izin pada direktori storage atau bootstrap/cache, jalankan perintah berikut:

```bash
docker-compose exec app chown -R www-data:www-data /app/storage /app/bootstrap/cache
```

### Masalah Koneksi Database

Pastikan konfigurasi database di file `.env` sudah benar. Jika masih mengalami masalah, coba jalankan:

```bash
docker-compose exec mysql mysql -u root -p
```

Kemudian masukkan password yang dikonfigurasi di `docker-compose.yml`.

### Melihat Log FrankenPHP

Untuk melihat log dari FrankenPHP, gunakan perintah:

```bash
docker-compose logs -f app
``` 