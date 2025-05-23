-- 1. Buat database baru
CREATE DATABASE db_harem;
USE db_harem;

-- 2. Tabel orientasi (seperti department)
CREATE TABLE orientasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name ENUM('Harem', 'NTR', 'Vanilla') NOT NULL
);

-- 3. Tabel waifu (sebagai referensi, mirip shift)
CREATE TABLE waifu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- 4. Tabel mahasiswa (seperti staff)
CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nim VARCHAR(20) NOT NULL UNIQUE,
    phone VARCHAR(20),
    orientasi_id INT NOT NULL,
    waifu_id INT NOT NULL,
    FOREIGN KEY (orientasi_id) REFERENCES orientasi(id),
    FOREIGN KEY (waifu_id) REFERENCES waifu(id)
);

-- 5. Insert orientasi
INSERT INTO orientasi (name) VALUES ('Harem'), ('NTR'), ('Vanilla');

-- 6. Insert waifu
INSERT INTO waifu (name) VALUES ('Rem'), ('Asuna'), ('Makima');

-- 7. Insert mahasiswa
INSERT INTO mahasiswa (name, nim, phone, orientasi_id, waifu_id) VALUES
('Rizky Senpai', '20241001', '081234567890', 1, 1),
('Arif Sensei', '20241002', '082345678901', 2, 3);
