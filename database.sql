-- ================================================
--  DATABASE: platform31_crud
--  Tugas Praktikum Pertemuan 7 - Full CRUD
--  PWA Arsitektur API Client-Server
-- ================================================

CREATE DATABASE IF NOT EXISTS platform31_crud
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE platform31_crud;

CREATE TABLE IF NOT EXISTS barang (
  id           INT(11)        NOT NULL AUTO_INCREMENT,
  nama_barang  VARCHAR(150)   NOT NULL,
  kategori     VARCHAR(100)   NOT NULL,
  harga        DECIMAL(15,2)  NOT NULL DEFAULT 0,
  stok         INT(11)        NOT NULL DEFAULT 0,
  created_at   TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at   TIMESTAMP      NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data awal / dummy
INSERT INTO barang (nama_barang, kategori, harga, stok) VALUES
  ('Laptop Asus VivoBook',  'Elektronik',  8500000, 12),
  ('Mouse Wireless Logitech','Elektronik',  250000,  50),
  ('Keyboard Mechanical',   'Elektronik',  750000,  30),
  ('Meja Belajar Kayu',     'Furnitur',   1200000,   8),
  ('Kursi Ergonomis',       'Furnitur',   2300000,   5),
  ('Buku Algoritma',        'Buku',         95000,  20),
  ('Headset Gaming',        'Elektronik',  450000,  25),
  ('Lampu LED Meja',        'Aksesori',    175000,  40);
