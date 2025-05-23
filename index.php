<?php
require_once(__DIR__ . '/viewmodel/MahasiswaVM.php');
require_once(__DIR__ . '/viewmodel/WaifuVM.php');
require_once(__DIR__ . '/viewmodel/OrientasiVM.php');

$mahasiswaVM = new MahasiswaVM();
$waifuVM = new WaifuVM();
$orientasiVM = new OrientasiVM();

$totalMahasiswa = count($mahasiswaVM->getAllMahasiswa());
$totalWaifu = count($waifuVM->getAllWaifu());
$totalOrientasi = count($orientasiVM->getAllOrientasi());
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System - Dashboard</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 20px; 
            background-color: #f5f5f5; 
        }
        .container { 
            max-width: 1200px; 
            margin: 0 auto; 
            background-color: white; 
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0,0,0,0.1); 
        }
        h1 { 
            text-align: center; 
            color: #333; 
            margin-bottom: 30px; 
        }
        .stats { 
            display: flex; 
            justify-content: space-around; 
            margin-bottom: 40px; 
        }
        .stat-card { 
            background-color: #007bff; 
            color: white; 
            padding: 20px; 
            border-radius: 10px; 
            text-align: center; 
            min-width: 150px; 
        }
        .stat-card h3 { 
            margin: 0; 
            font-size: 2em; 
        }
        .stat-card p { 
            margin: 5px 0 0 0; 
        }
        .navigation { 
            display: flex; 
            justify-content: center; 
            gap: 20px; 
            margin-top: 30px; 
        }
        .nav-card { 
            background-color: #f8f9fa; 
            border: 2px solid #dee2e6; 
            border-radius: 10px; 
            padding: 30px; 
            text-align: center; 
            text-decoration: none; 
            color: #495057; 
            transition: all 0.3s; 
            min-width: 200px; 
        }
        .nav-card:hover { 
            background-color: #007bff; 
            color: white; 
            border-color: #007bff; 
            transform: translateY(-5px); 
        }
        .nav-card h3 { 
            margin: 0 0 10px 0; 
        }
        .nav-card p { 
            margin: 0; 
            font-size: 0.9em; 
        }
        .footer { 
            text-align: center; 
            margin-top: 40px; 
            padding-top: 20px; 
            border-top: 1px solid #dee2e6; 
            color: #6c757d; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏛️ Library Management System</h1>
        <p style="text-align: center; color: #6c757d; margin-bottom: 30px;">
            Sistem Manajemen Perpustakaan dengan Teknologi MVVM
        </p>

        <div class="stats">
            <div class="stat-card">
                <h3><?php echo $totalMahasiswa; ?></h3>
                <p>Total Mahasiswa</p>
            </div>
            <div class="stat-card">
                <h3><?php echo $totalWaifu; ?></h3>
                <p>Total Waifu</p>
            </div>
            <div class="stat-card">
                <h3><?php echo $totalOrientasi; ?></h3>
                <p>Total Orientasi</p>
            </div>
        </div>

        <div class="navigation">
            <a href="views/Mahasiswa_list.php" class="nav-card">
                <h3>👨‍🎓 Mahasiswa</h3>
                <p>Kelola data mahasiswa dengan informasi lengkap termasuk orientasi dan waifu favorit</p>
            </a>
            
            <a href="views/Waifu_list.php" class="nav-card">
                <h3>💕 Waifu</h3>
                <p>Manajemen daftar waifu yang tersedia dalam sistem</p>
            </a>
            
            <a href="views/Orientasi_list.php" class="nav-card">
                <h3>🎯 Orientasi</h3>
                <p>Kelola kategori orientasi: Harem, NTR, dan Vanilla</p>
            </a>
        </div>

        <div class="footer">
            <p>© 2024 Library Management System | Built with PHP & MVVM Architecture</p>
        </div>
    </div>
</body>
</html>