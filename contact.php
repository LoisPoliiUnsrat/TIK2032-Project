<?php
// Proses form jika dikirim
$sukses = false;
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Koneksi ke database
  $conn = new mysqli("localhost", "root", "mysql", "portfolio");

  // Cek koneksi
  if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
  }

  // Cek apakah semua data dikirim
  if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
    // Ambil dan sanitasi input
    $nama = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $pesan = $conn->real_escape_string(trim($_POST['message']));

    // Simpan ke database
    $sql = "INSERT INTO kontak (name, email, message) VALUES ('$nama', '$email', '$pesan')";

    if ($conn->query($sql) === TRUE) {
      $sukses = true;
    } else {
      $error = "Query error: " . $conn->error;
    }
  } else {
    $error = "Form tidak lengkap.";
  }

  $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Kontak</title>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
</head>
<body>
  <header>
    <h1>Hubungi Saya</h1>
    <p>Silakan isi formulir di bawah ini untuk mengirim pesan.</p>
  </header>

  <nav>
    <a href="index.html">Home</a>
    <a href="gallery.html">Gallery</a>
    <a href="blog.html">Blog</a>
    <a href="contact.php" class="active">Contact</a>
    <a href="about.html">About</a>
  </nav>

  <main class="fade-in">
    <?php if ($sukses): ?>
      <h2>Terima Kasih!</h2>
      <p>Pesan Anda telah berhasil dikirim dan disimpan.</p>
    <?php elseif (!empty($error)): ?>
      <h2>Terjadi Kesalahan</h2>
      <p><?= htmlspecialchars($error) ?></p>
    <?php else: ?>
      <h2>Formulir Kontak</h2>
      <form action="contact.php" method="post">
        <label for="name">Nama:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Pesan:</label><br>
        <textarea id="message" name="message" rows="6" required></textarea><br><br>

        <button type="submit">Kirim</button>
      </form>
    <?php endif; ?>
  </main>

  <footer>
    &copy; 2025 Website Pribadi
  </footer>

  <script src="script.js"></script>
</body>
</html>
