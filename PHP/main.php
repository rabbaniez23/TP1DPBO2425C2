<?php
include "GudangGadget.php";
session_start();

// Inisialisasi
if (!isset($_SESSION['gudang'])) {
    $_SESSION['gudang'] = [];
}

// Tambah gadget
if (isset($_POST['action']) && $_POST['action'] == 'tambah') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];
    $garansi = $_POST['garansi'];
    $kondisi = $_POST['kondisi'];

    $gambar = "";
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $dir = "uploads/";
        if (!is_dir($dir)) mkdir($dir, 0777, true);
        $gambar = $dir . time() . "_" . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
    }

    $_SESSION['gudang'][] = new GudangGadget($id, $nama, $harga, $stok, $kategori, $garansi, $kondisi, $gambar);
}

// Hapus gadget
if (isset($_GET['hapus'])) {
    $i = $_GET['hapus'];
    unset($_SESSION['gudang'][$i]);
    $_SESSION['gudang'] = array_values($_SESSION['gudang']);
    header("Location: main.php");
    exit;
}

// Update gadget
if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $i = $_POST['index'];
    $g = $_SESSION['gudang'][$i];
    $g->setNama($_POST['nama']);
    $g->setHarga($_POST['harga']);
    $g->setStok($_POST['stok']);
    $g->setKategori($_POST['kategori']);
    $g->setGaransi($_POST['garansi']);
    $g->setKondisi($_POST['kondisi']);

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $dir = "uploads/";
        if (!is_dir($dir)) mkdir($dir, 0777, true);
        $gambar = $dir . time() . "_" . basename($_FILES['gambar']['name']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar);
        $g->setGambar($gambar);
    }
}

// Cari gadget
$cariHasil = [];
if (isset($_POST['action']) && $_POST['action'] == 'cari') {
    $tipe = $_POST['tipe'];
    $key = $_POST['keyword'];
    foreach ($_SESSION['gudang'] as $g) {
        if (($tipe == "id" && $g->getId() == $key) ||
            ($tipe == "nama" && strcasecmp($g->getNama(), $key) == 0)) {
            $cariHasil[] = $g;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Gudang Gadget (OOP PHP)</title>
<style>
    body { font-family: Arial; }
    table, th, td { border: 1px solid black; border-collapse: collapse; padding: 6px; }
    th { background: #ddd; }
    .form-section { margin-bottom: 30px; }
</style>
</head>
<body>
<h1>Gudang Gadget</h1>

<!-- Form Tambah -->
<div class="form-section">
    <h2>Tambah Gadget</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="tambah">
        ID: <input type="text" name="id" required><br><br>
        Nama: <input type="text" name="nama" required><br><br>
        Harga: <input type="number" step="0.01" name="harga" required><br><br>
        Stok: <input type="number" name="stok" required><br><br>
        Kategori: <input type="text" name="kategori" required><br><br>
        Garansi (bulan): <input type="number" name="garansi" required><br><br>
        Kondisi: 
        <select name="kondisi">
            <option value="Baru">Baru</option>
            <option value="Bekas">Bekas</option>
            <option value="Refurbished">Refurbished</option>
        </select><br><br>
        Gambar: <input type="file" name="gambar" accept="image/*" required><br><br>
        <button type="submit">Tambah</button>
    </form>
</div>

<!-- Form Cari -->
<div class="form-section">
    <h2>Cari Gadget</h2>
    <form method="post">
        <input type="hidden" name="action" value="cari">
        <select name="tipe">
            <option value="id">ID</option>
            <option value="nama">Nama</option>
        </select>
        <input type="text" name="keyword" required>
        <button type="submit">Cari</button>
    </form>

    <?php if (!empty($cariHasil)): ?>
        <h3>Hasil Pencarian:</h3>
        <table>
            <tr><th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Kategori</th><th>Garansi</th><th>Kondisi</th><th>Gambar</th></tr>
            <?php foreach ($cariHasil as $g): ?>
            <tr>
                <td><?= $g->getId(); ?></td>
                <td><?= $g->getNama(); ?></td>
                <td>Rp <?= number_format($g->getHarga(), 2, ',', '.'); ?></td>
                <td><?= $g->getStok(); ?></td>
                <td><?= $g->getKategori(); ?></td>
                <td><?= $g->getGaransi(); ?> bulan</td>
                <td><?= $g->getKondisi(); ?></td>
                <td><img src="<?= $g->getGambar(); ?>" width="80"></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<!-- Tabel Semua -->
<h2>Daftar Gadget</h2>
<table>
<tr><th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Kategori</th><th>Garansi</th><th>Kondisi</th><th>Gambar</th><th>Aksi</th></tr>
<?php if (!empty($_SESSION['gudang'])): ?>
    <?php foreach ($_SESSION['gudang'] as $i => $g): ?>
    <tr>
        <td><?= $g->getId(); ?></td>
        <td><?= $g->getNama(); ?></td>
        <td>Rp <?= number_format($g->getHarga(), 2, ',', '.'); ?></td>
        <td><?= $g->getStok(); ?></td>
        <td><?= $g->getKategori(); ?></td>
        <td><?= $g->getGaransi(); ?> bulan</td>
        <td><?= $g->getKondisi(); ?></td>
        <td><img src="<?= $g->getGambar(); ?>" width="80"></td>
        <td>
            <a href="?hapus=<?= $i; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a> |
            <a href="?edit=<?= $i; ?>">Edit</a>
        </td>
    </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr><td colspan="9">Belum ada data.</td></tr>
<?php endif; ?>
</table>

<!-- Form Edit -->
<?php if (isset($_GET['edit'])): 
    $i = $_GET['edit']; $g = $_SESSION['gudang'][$i]; ?>
<div class="form-section">
    <h2>Edit Gadget</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="index" value="<?= $i; ?>">
        Nama: <input type="text" name="nama" value="<?= $g->getNama(); ?>"><br><br>
        Harga: <input type="number" step="0.01" name="harga" value="<?= $g->getHarga(); ?>"><br><br>
        Stok: <input type="number" name="stok" value="<?= $g->getStok(); ?>"><br><br>
        Kategori: <input type="text" name="kategori" value="<?= $g->getKategori(); ?>"><br><br>
        Garansi: <input type="number" name="garansi" value="<?= $g->getGaransi(); ?>"><br><br>
        Kondisi: 
        <select name="kondisi">
            <option value="Baru" <?= $g->getKondisi()=="Baru"?"selected":""; ?>>Baru</option>
            <option value="Bekas" <?= $g->getKondisi()=="Bekas"?"selected":""; ?>>Bekas</option>
            <option value="Refurbished" <?= $g->getKondisi()=="Refurbished"?"selected":""; ?>>Refurbished</option>
        </select><br><br>
        Gambar baru (opsional): <input type="file" name="gambar" accept="image/*"><br><br>
        <button type="submit">Update</button>
    </form>
</div>
<?php endif; ?>

</body>
</html>
