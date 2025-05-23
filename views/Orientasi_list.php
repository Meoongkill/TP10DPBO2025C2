<?php
require_once __DIR__ . '/../viewmodel/OrientasiVM.php';

$vm = new OrientasiVM();

// Handle delete action
if (isset($_GET['delete'])) {
    $result = $vm->deleteOrientasi($_GET['delete']);
    $message = $result['message'];
    $messageType = $result['success'] ? 'success' : 'error';
}

$orientasiList = $vm->getAllOrientasi();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Orientasi</title>
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
        <a href="Mahasiswa_list.php" class="btn btn-primary">Mahasiswa</a>
        <a href="Waifu_list.php" class="btn btn-primary">Waifu</a>
    </div>

    <h1>Daftar Orientasi</h1>

    <?php if (isset($message)): ?>
        <div class="message <?php echo $messageType; ?>"><?php echo $message; ?></div>
    <?php endif; ?>

    <a href="Orientasi_form.php" class="btn btn-primary">Tambah Orientasi</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orientasiList as $orientasi): ?>
            <tr>
                <td><?php echo $orientasi['id']; ?></td>
                <td><?php echo htmlspecialchars($orientasi['name']); ?></td>
                <td>
                    <a href="Orientasi_form.php?id=<?php echo $orientasi['id']; ?>" class="btn btn-warning">Edit</a>
                    <a href="?delete=<?php echo $orientasi['id']; ?>" class="btn btn-danger" 
                       onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>