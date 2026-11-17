-- =====================================================
-- DUMMY DATA UNTUK SISTEM PERPUSTAKAAN (db_perpustakaan)
-- =====================================================

USE db_perpustakaan;

-- 1. Dummy Data untuk Tabel Admin
-- Catatan: Password adalah 'admin123'
-- Hash ini dihasilkan menggunakan password_hash('admin123', PASSWORD_DEFAULT)
-- sehingga dapat diverifikasi oleh password_verify() pada auth/proses_login.php
INSERT INTO admin (username, password) VALUES
('admin', '$2y$12$ayJwA1aoNODOQHMD8Xg3multE8YJsfJqAbXV.BcFxirNo7XrLt0hO'),
('pustakawan', '$2y$12$ayJwA1aoNODOQHMD8Xg3multE8YJsfJqAbXV.BcFxirNo7XrLt0hO');

-- 2. Dummy Data untuk Tabel Kategori Buku
INSERT INTO kategori_buku (id_kategori, nama_kategori) VALUES
(1, 'Teknologi & Komputer'),
(2, 'Sains & Matematika'),
(3, 'Sastra & Fiksi'),
(4, 'Sejarah & Budaya'),
(5, 'Pengembangan Diri');

-- 3. Dummy Data untuk Tabel Buku
-- Berelasi dengan id_kategori pada tabel kategori_buku
INSERT INTO buku (id_kategori, judul_buku, pengarang, tahun_terbit, cover_buku) VALUES
(1, 'Clean Code: A Handbook of Agile Software Craftsmanship', 'Robert C. Martin', 2008, 'clean_code.jpg'),
(1, 'Pemrograman Web dengan PHP dan MySQL', 'Budi Raharjo', 2021, 'web_php.jpg'),
(1, 'The Pragmatic Programmer', 'Andrew Hunt & David Thomas', 2019, 'pragmatic_programmer.jpg'),
(2, 'A Brief History of Time', 'Stephen Hawking', 1988, 'brief_history_of_time.jpg'),
(2, 'Kalkulus Edisi Kesembilan', 'Dale Varberg', 2010, 'kalkulus.jpg'),
(3, 'Laskar Pelangi', 'Andrea Hirata', 2005, 'laskar_pelangi.jpg'),
(3, 'Bumi Manusia', 'Pramoedya Ananta Toer', 1980, 'bumi_manusia.jpg'),
(3, 'Cantik Itu Luka', 'Eka Kurniawan', 2002, 'cantik_itu_luka.jpg'),
(4, 'Sapiens: Riwayat Singkat Umat Manusia', 'Yuval Noah Harari', 2014, 'sapiens.jpg'),
(4, 'Nusantara: Sejarah Indonesia', 'Bernard H.M. Vlekke', 2008, 'nusantara.jpg'),
(5, 'Atomic Habits', 'James Clear', 2018, 'atomic_habits.jpg'),
(5, 'Filosofi Teras', 'Henry Manampiring', 2018, 'filosofi_teras.jpg');
