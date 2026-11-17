CREATE DATABASE IF NOT EXISTS db_perpustakaan;
USE db_perpustakaan;

CREATE TABLE admin (
    id_admin INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE kategori_buku (
    id_kategori INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50) NOT NULL
);

CREATE TABLE buku (
    id_buku INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_kategori INT(6) NOT NULL,
    judul_buku VARCHAR(100) NOT NULL,
    pengarang VARCHAR(100) NOT NULL,
    tahun_terbit INT(4) NOT NULL,
    cover_buku VARCHAR(255),
    FOREIGN KEY (id_kategori) REFERENCES kategori_buku(id_kategori)
);
