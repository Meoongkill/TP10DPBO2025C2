# TP10DPBO2025C2
Folder untuk mengumpulkan Tugas Praktikum 10 untuk Mata Pelajaran Praktikum Desain Pemrograman Berorientasi Objek

/library-system/
│
├── index.php (Dashboard utama)
├── model/ (3 tabel dengan relasi PK-FK)
│   ├── Mahasiswa.php
│   ├── Waifu.php
│   └── Orientasi.php
├── viewmodel/ (Business logic layer)
│   ├── MahasiswaVM.php
│   ├── WaifuVM.php
│   └── OrientasiVM.php
├── views/ (Presentation layer)
│   ├── Mahasiswa_list.php & Mahasiswa_form.php
│   ├── Waifu_list.php & Waifu_form.php
│   └── Orientasi_list.php & Orientasi_form.php
└── config/
    └── Database.php (PDO connection)
