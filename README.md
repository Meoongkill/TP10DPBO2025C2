# Janji Desain Pemrograman Berorientasi Objek
Saya Muhammad Fathan Putra dengan NIM 2300330 berjanji mengerjakan Tugas Praktikum 9 DPBO dengan keberkahan-Nya, maka saya tidak akan melakukan kecurangan sesuai yang telah di spesifikasikan, Aamiin

## 💡 Konsep MVVM Architecture

MVVM (Model-View-ViewModel) merupakan pola desain arsitektur yang memungkinkan pemisahan antara pengembangan user interface dengan business logic aplikasi. Pattern ini banyak dimanfaatkan dalam pembangunan aplikasi modern baik desktop, web, maupun mobile.

## ⚙️ Elemen Inti MVVM

- **Model**: Pengelola data dan aturan bisnis (Mahasiswa, Mata Kuliah, Orientasi)
- **View**: Interface pengguna untuk menampilkan informasi
- **ViewModel**: Perantara Model dan View, mengontrol state serta commands

## 🔍 Arsitektur Direktori

```
library-system/
├── config/                  # Setup konfigurasi
│   └── Database.php         # Pengaturan koneksi database PDO

├── model/                   # Model Layer - Logika Data & Bisnis
│   ├── Mahasiswa.php        # Model entitas Mahasiswa
│   ├── Waifu.php           # Model entitas Waifu
│   └── Orientasi.php        # Model entitas Orientasi

├── viewmodel/               # ViewModel Layer - Kontroler Logika
│   ├── MahasiswaVM.php      # ViewModel operasi Mahasiswa
│   ├── WaifuVM.php          # ViewModel operasi Waifu
│   └── OrientasiVM.php      # ViewModel operasi Orientasi

├── views/                   # View Layer - Antarmuka Pengguna
│   ├── Mahasiswa_list.php   # Daftar tampilan Mahasiswa
│   ├── Mahasiswa_form.php   # Formulir data Mahasiswa
│   ├── Waifu_list.php       # Daftar tampilan Waifu
│   ├── Waifu_form.php       # Formulir data Waifu
│   ├── Orientasi_list.php   # Daftar tampilan Orientasi
│   └── Orientasi_form.php   # Formulir data Orientasi

├── index.php                # Halaman utama dan navigasi
└── README.md                # Dokumentasi sistem
```

## 🔀 Mekanisme Arsitektur MVVM

### 1. Lapisan Model
Mengatur data dan logika bisnis:
- **Mahasiswa.php**: Operasi CRUD untuk informasi mahasiswa
- **Waifu.php**: Operasi CRUD untuk fitur gamifikasi waifu
- **Orientasi.php**: Operasi CRUD untuk data program orientasi

### 2. Lapisan ViewModel
Berperan sebagai penghubung Model dengan View:
- **MahasiswaVM.php**: Mengatur state dan perintah Mahasiswa
- **WaifuVM.php**: Mengatur state dan perintah Waifu
- **OrientasiVM.php**: Mengatur state dan perintah Orientasi

### 3. Lapisan View
Menampilkan interface dan menangani input user:
- File template untuk rendering HTML
- Penanganan form input data
- Tampilan daftar untuk menampilkan informasi
- Desain responsif untuk berbagai ukuran layar

## ✨ Keuntungan Penerapan MVVM

### 🎪 Pemisahan Tanggung Jawab
- **Model**: Berkonsentrasi pada data dan business logic
- **View**: Fokus pada presentation dan interaksi user
- **ViewModel**: Menangani binding dan state management

### 🔗 Pengikatan Data
- Two-way binding antara View dengan ViewModel
- Update otomatis UI saat data mengalami perubahan
- Event handling yang disederhanakan

### 🧩 Kemudahan Testing
- Unit test dapat dilakukan pada lapisan Model
- ViewModel bisa ditest secara mandiri
- Logic View yang minimal dan mudah untuk ditest

### 🛠️ Kemudahan Maintenance
- Struktur kode yang lebih rapi dan modular
- Mudah untuk dimodifikasi dan dikembangkan
- Struktur dependency yang jelas

## 🎮 Fungsionalitas Utama

### 🎓 Pengelolaan Mahasiswa
- **Model**: `Mahasiswa.php` - Akses data dan aturan bisnis
- **ViewModel**: `MahasiswaVM.php` - Manajemen state dan commands
- **View**: `Mahasiswa_form.php`, `Mahasiswa_list.php` - Komponen UI

### 🎭 Sistem Waifu (Gamifikasi)
- **Model**: `Waifu.php` - Operasi data waifu
- **ViewModel**: `WaifuVM.php` - Manajemen state waifu
- **View**: `Waifu_form.php`, `Waifu_list.php` - Interface waifu

### 📘 Manajemen Orientasi
- **Model**: `Orientasi.php` - Logika orientasi akademik
- **ViewModel**: `OrientasiVM.php` - State dan commands orientasi
- **View**: `Orientasi_form.php`, `Orientasi_list.php` - UI orientasi

## 🔧 Penerapan Design Pattern

### Alur Data dalam MVVM
```
Interaksi User → View → ViewModel → Model → Database
                                  ↓
View ← ViewModel ← Model ← Response Database
```

### Integrasi Command Pattern
- ViewModel mengimplementasikan commands untuk berbagai aksi
- Loose coupling antara View dengan business logic
- Penanganan command yang terpusat

### Observer Pattern
- ViewModel bertindak sebagai observer dari perubahan Model
- View sebagai observer dari perubahan state ViewModel
- Update UI otomatis melalui data binding

## 🎨 Antarmuka Pengguna

### Alur Navigasi
- **Dashboard** - Ringkasan sistem perpustakaan
- **Mahasiswa** - Pengelolaan informasi mahasiswa
- **Waifu** - Fitur gamifikasi dan reward system
- **Orientasi** - Manajemen program orientasi akademik

### Desain Responsif
- Pendekatan mobile-first
- Layout fleksibel menggunakan CSS
- Komponen UI yang konsisten
- Interface yang user-friendly

## 📄 Skema Database

### Struktur Tabel
- **mahasiswa**: Data mahasiswa dan metadata
- **waifu**: Informasi sistem gamifikasi
- **orientasi**: Data program orientasi akademik
- **users**: Informasi pengguna sistem

### Relasi Antar Tabel
- Mahasiswa → Orientasi (Satu-ke-Banyak)
- Mahasiswa → Waifu (Banyak-ke-Banyak)
- Integritas referensial menggunakan foreign key

## 💻 Stack Teknologi

- **Backend**: PHP 7.4+ dengan PDO
- **Database**: MySQL 8.0+
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Arsitektur**: MVVM Pattern
- **Styling**: CSS custom dengan responsive design

## 📊 Manfaat Implementasi MVVM

- **Skalabilitas**: Kemudahan menambah fitur dan modul baru
- **Maintainability**: Pemisahan yang jelas mempermudah perawatan
- **Testability**: Setiap lapisan dapat ditest secara independen
- **Reusability**: ViewModel dapat dipakai dengan berbagai View
- **Team Development**: Developer berbeda dapat bekerja pada lapisan terpisah

## 🚀 Memulai Penggunaan

### Prasyarat
- PHP versi 7.4 ke atas
- MySQL versi 8.0 ke atas
- Web server (Apache/Nginx)

### Instalasi
1. Clone repository
```bash
git clone https://github.com/yourusername/haram-library-system.git
```

2. Import skema database
```sql
-- Import skema database di sini
```

3. Konfigurasi koneksi database pada `config/Database.php`
```php
// Update kredensial database
$host = 'localhost';
$dbname = 'haram_library';
$username = 'your_username';
$password = 'your_password';
```

4. Jalankan aplikasi via web server
```bash
# Menggunakan PHP built-in server
php -S localhost:8000
```

## 📖 Cara Penggunaan

1. Buka dashboard utama melalui `index.php`
2. Pilih modul yang diinginkan (Mahasiswa, Waifu, Orientasi)
3. Gunakan formulir untuk menambah/mengubah data
4. Lihat daftar untuk menampilkan data tersimpan

## 🤝 Kontribusi

Kontribusi sangat diterima! Silakan:
1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b feature/NewFeature`)
3. Commit perubahan (`git commit -m 'Add NewFeature'`)
4. Push ke branch (`git push origin feature/NewFeature`)
5. Buat Pull Request

## 📄 Lisensi

Didistribusikan dengan GNU General Public License v3.0. Lihat `LICENSE` untuk informasi lebih lanjut.
