# CRUD Tanpa Framework: Membangun Sistem Artikel dengan PHP Native

Ini adalah aplikasi CRUD artikel sederhana berbasis PHP Native, cocok untuk proyek pemula yang ingin memahami dasar-dasar pengembangan web tanpa framework.

---

## Fitur Utama

- **Manajemen Artikel**: Tambah, Edit, Hapus, dan Lihat artikel.
- **Otentikasi Pengguna**:
  - Login
  - Logout
  - Registrasi (sedang dalam pengembangan)

---

## Teknologi yang Digunakan

- **PHP 8**: Bahasa pemrograman inti.
- **MySQL**: Sistem manajemen database.
- **HTML & CSS**: Struktur dan styling antarmuka.
- **JavaScript**: Fungsionalitas interaktif (jika ada).

---

## Struktur Folder

Proyek ini memiliki struktur folder yang terorganisir untuk memisahkan logika dan konfigurasi:

- `config/`: Berisi file konfigurasi database (`config.php`). **Anda perlu membuat file ini secara manual.**
- `article/`: Mengelola semua operasi CRUD untuk artikel.
- `auth/`: Menangani alur otentikasi pengguna (login dan logout).
- `utils/`: Berisi fungsi atau skrip yang digunakan berulang kali di berbagai bagian aplikasi.

---

## Instalasi

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di lingkungan lokal Anda:

1.  **Siapkan Lingkungan Server**:

    - Instal **XAMPP** atau **Laragon**.
    - Aktifkan layanan **Apache** dan **MySQL**.

2.  **Buat Database**:

    - Buat database baru di MySQL (nama database bebas).
    - Buat dua tabel di dalam database tersebut:
      - **`articles`**:
        - `id` (INT, Primary Key)
        - `title` (VARCHAR)
        - `content` (VARCHAR)
        - `release_date` (DATETIME)
      - **`users`**:
        - `id` (INT, Primary Key)
        - `username` (VARCHAR)
        - `password` (VARCHAR)

3.  **Kloning Repositori**:

    ```bash
    git clone https://github.com/HCK42MRX/article-pemula-php-native.git
    ```

4.  **Akses Direktori Proyek**:
    Masuk ke folder `article-pemula-php-native` (atau `public` jika struktur proyek Anda menggunakannya).

5.  **Konfigurasi Database**:

    - Di direktori **root** proyek Anda, buat folder bernama `config`.
    - Di dalam folder `config`, buat file bernama `config.php`.
    - Salin dan tempel kode berikut ke dalam `config.php`:

    ```php
    <?php

    $db_servername = "localhost"; // Sesuaikan jika server Anda berbeda
    $db_username = "root";
    $db_password = ""; // Sesuaikan dengan password database Anda
    $db_name = "database_belajar"; // Ganti dengan nama database yang Anda buat

    try {
        $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
        // Atur mode error ke EXCEPTION untuk penanganan error yang lebih baik
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }

    ?>
    ```

    - **Penting**: Ganti `$db_name` dengan nama database yang Anda buat pada langkah 2. Sesuaikan `$db_username` dan `$db_password` jika Anda menggunakan kredensial yang berbeda.

---

## Selesai!

Sekarang Anda sudah siap untuk menggunakan atau memodifikasi kode ini sesuai kebutuhan Anda. Selamat bereksperimen!

# CRUD Tanpa Framework: Membangun Sistem Artikel dengan PHP Native

Ini adalah aplikasi CRUD artikel sederhana berbasis PHP Native, cocok untuk proyek pemula yang ingin memahami dasar-dasar pengembangan web tanpa framework.

---

## Fitur Utama

- **Manajemen Artikel**: Tambah, Edit, Hapus, dan Lihat artikel.
- **Otentikasi Pengguna**:
  - Login
  - Logout
  - Registrasi (sedang dalam pengembangan)

---

## Teknologi yang Digunakan

- **PHP 8**: Bahasa pemrograman inti.
- **MySQL**: Sistem manajemen database.
- **HTML & CSS**: Struktur dan styling antarmuka.
- **JavaScript**: Fungsionalitas interaktif (jika ada).

---

## Struktur Folder

Proyek ini memiliki struktur folder yang terorganisir untuk memisahkan logika dan konfigurasi:

- `config/`: Berisi file konfigurasi database (`config.php`). **Anda perlu membuat file ini secara manual.**
- `article/`: Mengelola semua operasi CRUD untuk artikel.
- `auth/`: Menangani alur otentikasi pengguna (login dan logout).
- `utils/`: Berisi fungsi atau skrip yang digunakan berulang kali di berbagai bagian aplikasi.

---

## Instalasi

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di lingkungan lokal Anda:

1.  **Siapkan Lingkungan Server**:

    - Instal **XAMPP** atau **Laragon**.
    - Aktifkan layanan **Apache** dan **MySQL**.

2.  **Buat Database**:

    - Buat database baru di MySQL (nama database bebas).
    - Buat dua tabel di dalam database tersebut:
      - **`articles`**:
        - `id` (INT, Primary Key)
        - `title` (VARCHAR)
        - `content` (VARCHAR)
        - `release_date` (DATETIME)
      - **`users`**:
        - `id` (INT, Primary Key)
        - `username` (VARCHAR)
        - `password` (VARCHAR)

3.  **Kloning Repositori**:

    ```bash
    git clone https://github.com/HCK42MRX/article-pemula-php-native.git
    ```

4.  **Akses Direktori Proyek**:
    Masuk ke folder `article-pemula-php-native` (atau `public` jika struktur proyek Anda menggunakannya).

5.  **Konfigurasi Database**:

    - Di direktori **root** proyek Anda, buat folder bernama `config`.
    - Di dalam folder `config`, buat file bernama `config.php`.
    - Salin dan tempel kode berikut ke dalam `config.php`:

    ```php
    <?php

    $db_servername = "localhost"; // Sesuaikan jika server Anda berbeda
    $db_username = "root";
    $db_password = ""; // Sesuaikan dengan password database Anda
    $db_name = "database_belajar"; // Ganti dengan nama database yang Anda buat

    try {
        $conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_password);
        // Atur mode error ke EXCEPTION untuk penanganan error yang lebih baik
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }

    ?>
    ```

    - **Penting**: Ganti `$db_name` dengan nama database yang Anda buat pada langkah 2. Sesuaikan `$db_username` dan `$db_password` jika Anda menggunakan kredensial yang berbeda.

---

## Selesai!

Sekarang Anda sudah siap untuk menggunakan atau memodifikasi kode ini sesuai kebutuhan Anda. Selamat bereksperimen!
