<div align="center">

<br>

![Banner](https://github.com/demonicheinz/gis-app/blob/test/assets/project-banner.png)

<br>

![Laravel](https://img.shields.io/badge/Laravel-%23FF2D20.svg?logo=laravel&logoColor=white)
![Leaflet](https://img.shields.io/badge/Leaflet-color?style=flat&logo=leaflet&color=%23199900)
![MySQL](https://img.shields.io/badge/MySQL-color?style=flat&logo=mysql&logoColor=white&color=%234479A1)
![Bootstrap](https://img.shields.io/badge/Bootstrap-color?style=flat&logo=bootstrap&logoColor=white&color=%237952B3)

![GitHub License](https://img.shields.io/github/license/demonicheinz/gis-app?label=License)
![GitHub branch check runs](https://img.shields.io/github/check-runs/demonicheinz/gis-app/main?logo=github&label=Checks)
[![CodeQL](https://github.com/demonicheinz/gis-app/actions/workflows/github-code-scanning/codeql/badge.svg)](https://github.com/demonicheinz/gis-app/actions/workflows/github-code-scanning/codeql)
[![Live Preview](https://img.shields.io/badge/Live%20Preview-➚-blue)](https://sig.heinz.id/)

</div>

<br>

## Table of Content

1. [Description](#description)
2. [Features](#features)
3. [Tech Stack](#tech-stack)
4. [Quick Start](#quick-start)
5. [Environment Variables](#environment-variables)
6. [Contribution](#contribution)
7. [License](#license)

<br>

## Description

Ini adalah proyek Sistem Informasi Geografis (SIG) untuk Kabupaten Banyumas. Proyek ini dikembangkan menggunakan Laravel 11 sebagai framework backend dan LeafletJS sebagai pustaka JavaScript untuk peta interaktif.

Aplikasi ini menampilkan data spasial Kabupaten Banyumas dan memungkinkan pengguna untuk menjelajahi serta mengelola data kecamatan dan sekolah.

<br>

## Features

- Peta interaktif menggunakan LeafletJS.
- CRUD data kecamatan dan sekolah.
- Tampilan responsif menggunakan Bootstrap 5.

<br>

## Tech Stack

- **Bahasa Pemrograman**: PHP, JavaScript
- **Framework**: Laravel 11
- **Library Pemetaan**: LeafletJS
- **Basis Data**: MySQL
- **CSS Framework**: Bootstrap 5

<br>

## Quick Start

Ikuti langkah-langkah di bawah ini untuk menginstal dan menyiapkan semua prasyarat:

| **Prasyarat** | **Deskripsi**                                                              | **Versi Minimum** |
| ------------- | -------------------------------------------------------------------------- | ----------------- |
| **Laragon**   | Pastikan Laragon sudah terinstal dan berjalan di komputer Anda.            | -                 |
| **PHP**       | Laravel 11 memerlukan PHP versi 8.2 atau lebih tinggi.                     | 8.2+              |
| **Node.js**   | Pastikan Node.js terinstal dan berjalan. Disarankan menggunakan versi LTS. | 18+               |
| **Composer**  | Composer harus sudah terinstal. Pastikan versinya 2.2.0 atau lebih tinggi. | 2.2.0+            |
| **Git**       | Pastikan Git terinstal secara global dan berjalan.                         | -                 |

Setelah semua prasyarat terpasang, Anda dapat melanjutkan ke langkah-langkah berikut untuk memulai proyek Anda:

1.  **Clone Repositori**

    ```bash
    git clone https://github.com/demonicheinz/gis-app.git
    cd gis-app
    ```

2.  **Install Dependencies**

    ```bash
    composer install && npm install
    ```

3.  **Konfigurasi File `.env`**

    Salin file `.env.example` menjadi `.env` dan atur konfigurasinya:

    ```bash
    cp .env.example .env
    ```

4.  **Generate Key Aplikasi**

    ```bash
    php artisan key:generate
    ```

5.  **Jalankan Migrasi dan Seeder**

    ```bash
    php artisan migrate:fresh --seed
    ```

6.  **Jalankan Aplikasi**

    ```bash
    php artisan serve
    ```

7.  **Buka Aplikasi di browser**

    ```
    http://localhost:8000
    ```

<br>

## Environment Variables

Pastikan file .env telah diisi dengan variabel berikut:

<details>
<summary><code>.env</code></summary>

```env
APP_NAME="SIG Banyumas"

DB_DATABASE=gis_app
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your-email@example.com
MAIL_PASSWORD=your-password
```

</details>

<br>

## Contribution

Jika Anda ingin berkontribusi pada proyek ini, silakan fork repositori ini dan ajukan pull request. Kami menerima berbagai bentuk kontribusi seperti penambahan fitur, perbaikan bug, dan dokumentasi.

<br>

## License

Proyek ini dilisensikan di bawah lisensi MIT - lihat file LICENSE untuk detail lebih lanjut.

<br>
