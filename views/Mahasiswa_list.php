<?php
require_once __DIR__ . '/../viewmodel/MahasiswaVM.php';

$vm = new MahasiswaVM();

// Handle delete action
if (isset($_GET['delete'])) {
    $result = $vm->deleteMahasiswa($_GET['delete']);
    $message = $result['message'];
    $messageType = $result['success'] ? 'success' : 'error';
}

$mahasiswaList = $vm->getAllMahasiswa();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; text-decoration: none; margin: 0 2px; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-warning { background-color: #ffc107; color: black; }
        .btn-danger { background-color: #dc3545; color: white; }
        .message { padding: 10px; margin: 10px 0; border-radius: 4px; }
        .success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .nav { margin-bottom: 20px; }
        .nav a { margin-right: 10px; }
    </style>
</head>
<body>
    <div class="nav">
        <a href="../index.php" class="btn btn-primary">Home</a>
        <a href="Waifu_list.php" class="btn btn-primary">Waifu</a>
        <a href="Orientasi_list.php" class="btn btn-primary">Orientasi</a>
    </div>

    <h1>Daftar Mahasiswa</h1>

    <?php if (isset($message)): ?>
        <div class="message <?php echo $messageType; ?>"><?php echo $message; ?></div>
    <?php endif; ?>

    <a href="Mahasiswa_form.php" class="btn btn-primary">Tambah Mahasiswa</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Telepon</th>
                <th>Orientasi</th>
                <th>Waifu</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswaList as $mahasiswa): ?>
            <tr>
                <td><?php echo $mahasiswa['id']; ?></td>
                <td><?php echo htmlspecialchars($mahasiswa['name']); ?></td>
                <td><?php echo htmlspecialchars($mahasiswa['nim']); ?></td>
                <td><?php echo htmlspecialchars($mahasiswa['phone']); ?></td>
                <td><?php echo htmlspecialchars($mahasiswa['orientasi_name']); ?></td>
                <td><?php echo htmlspecialchars($mahasiswa['waifu_name']); ?></td>
                <td>
                    <a href="Mahasiswa_form.php?id=<?php echo $mahasiswa['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="?delete=<?php echo $mahasiswa['id']; ?>" class="btn btn-danger" 
                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>