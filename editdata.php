<?php
require 'fungsi.php';

// Ambil ID dari URL
$id = $_GET["id"] ?? null;
if (!$id) {
    echo "
        <script>
            alert('ID mahasiswa tidak ditemukan!');
            document.location.href = 'mahasiswa.php';
        </script>
    ";
    exit;
}

// Query data mahasiswa berdasarkan ID
$mhs = tampildata("SELECT * FROM mahasiswa WHERE id = '$id'");
if (empty($mhs)) {
    echo "
        <script>
            alert('Data mahasiswa tidak ditemukan!');
            document.location.href = 'mahasiswa.php';
        </script>
    ";
    exit;
}
$mhs = $mhs[0];

// Cek apakah tombol submit sudah ditekan
if (isset($_POST["submit"])) {
    // Jalankan fungsi ubah(), jika sukses (mengembalikan >= 0) redirect ke mahasiswa.php
    if (ubah($_POST) >= 0) {
        echo "
            <script>
                alert('Data berhasil diperbarui!');
                document.location.href = 'mahasiswa.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diperbarui!');
                document.location.href = 'mahasiswa.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Data Mahasiswa - Web TI 2025</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,800;9..144,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
  :root {
    /* Palet Hijau Telur Asin */
    --sage-mist:    #eef2e2;   /* background paling terang */
    --sage-pale:    #dde6c8;   /* soft sage */
    --sage-light:   #c2d1a4;   /* sage terang */
    --sage-mid:     #9fb07c;   /* sage sedang */
    --sage-deep:    #6b8454;   /* hijau telur asin utama */
    --sage-dark:    #3f5233;   /* hijau tua */
    --sage-ink:     #28331f;   /* hampir hitam hijau */
    --yolk:         #e9c46a;   /* kuning telur asin */
    --yolk-deep:    #d4a017;   /* kuning telur matang */
    --cream:        #faf8ee;
    --muted:        #6b7a6e;
    --white:        #ffffff;
    --shadow-sage:  0 20px 50px -20px rgba(63, 82, 51, 0.35);
    --shadow-soft:  0 10px 30px -12px rgba(63, 82, 51, 0.25);
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--sage-mist);
    color: var(--sage-ink);
    overflow-x: hidden;
    line-height: 1.6;
  }

  /* ====== NAVBAR ====== */
  .navbar {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 1000;
    padding: 18px 0;
    background: rgba(238, 242, 226, 0.7);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border-bottom: 1px solid rgba(159, 176, 124, 0.25);
    transition: all .35s ease;
  }
  .navbar.scrolled {
    padding: 12px 0;
    background: rgba(238, 242, 226, 0.92);
    box-shadow: 0 8px 30px -15px rgba(63, 82, 51, 0.25);
  }
  .nav-inner {
    max-width: 1240px;
    margin: 0 auto;
    padding: 0 32px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .logo {
    display: flex; align-items: center; gap: 12px;
    text-decoration: none; color: var(--sage-ink);
    font-family: 'Fraunces', serif;
  }
  .logo-mark {
    width: 44px; height: 44px;
    display: grid; place-items: center;
    background: linear-gradient(135deg, var(--sage-deep), var(--sage-dark));
    color: var(--cream);
    border-radius: 14px;
    font-weight: 800; font-size: 18px;
    box-shadow: 0 6px 18px -6px rgba(63, 82, 51, 0.55);
    position: relative;
    overflow: hidden;
  }
  .logo-mark::after {
    content: "";
    position: absolute; inset: 0;
    background: radial-gradient(circle at 30% 20%, rgba(233,196,106,.6), transparent 60%);
    opacity: .8;
  }
  .logo-text { font-size: 20px; font-weight: 600; letter-spacing: -.02em; }
  .logo-text strong { color: var(--sage-deep); font-weight: 800; }

  .nav-links { display: flex; gap: 6px; align-items: center; }
  .nav-links a {
    position: relative;
    text-decoration: none;
    color: var(--sage-ink);
    font-weight: 500;
    font-size: 15px;
    padding: 10px 18px;
    border-radius: 999px;
    transition: all .3s ease;
  }
  .nav-links a::before {
    content: "";
    position: absolute; inset: 0;
    background: var(--sage-pale);
    border-radius: 999px;
    transform: scale(.6); opacity: 0;
    transition: all .3s cubic-bezier(.4,0,.2,1);
    z-index: -1;
  }
  .nav-links a:hover { color: var(--sage-dark); }
  .nav-links a:hover::before { transform: scale(1); opacity: 1; }
  .nav-links a.active {
    background: linear-gradient(135deg, var(--sage-deep), var(--sage-dark));
    color: var(--cream);
    box-shadow: 0 8px 20px -8px rgba(63, 82, 51, 0.55);
  }

  .menu-toggle {
    display: none;
    background: var(--sage-pale);
    border: none;
    width: 44px; height: 44px;
    border-radius: 12px;
    color: var(--sage-dark);
    font-size: 18px;
    cursor: pointer;
  }

  /* ====== PAGE HERO ====== */
  .page-hero {
    position: relative;
    padding: 160px 32px 60px;
    overflow: hidden;
    background: linear-gradient(180deg, var(--sage-mist) 0%, rgba(238, 242, 226, 0.4) 100%);
    text-align: center;
  }
  .page-hero-bg { position: absolute; inset: 0; z-index: 0; pointer-events: none; }
  .blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(60px);
    opacity: .4;
    animation: float 18s ease-in-out infinite;
  }
  .blob-1 { width: 400px; height: 400px; background: var(--sage-light); top: -100px; right: -80px; }
  .blob-2 { width: 300px; height: 300px; background: var(--yolk); bottom: -100px; left: -80px; opacity: .25; animation-delay: -6s; }

  @keyframes float {
    0%,100% { transform: translate(0,0) scale(1); }
    33%     { transform: translate(30px,-20px) scale(1.05); }
    66%     { transform: translate(-20px,30px) scale(.98); }
  }

  .page-hero-inner {
    max-width: 800px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
  }
  .badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: var(--white);
    border: 1px solid var(--sage-pale);
    padding: 8px 16px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
    color: var(--sage-deep);
    box-shadow: var(--shadow-soft);
    margin-bottom: 20px;
  }
  .badge .dot {
    width: 8px; height: 8px;
    background: var(--sage-deep);
    border-radius: 50%;
    box-shadow: 0 0 0 4px rgba(107,132,84,.2);
    animation: pulse 2s ease-in-out infinite;
  }
  @keyframes pulse {
    0%,100% { box-shadow: 0 0 0 4px rgba(107,132,84,.2); }
    50%     { box-shadow: 0 0 0 8px rgba(107,132,84,.05); }
  }

  .page-hero h1 {
    font-family: 'Fraunces', serif;
    font-size: clamp(2.4rem, 5vw, 3.5rem);
    line-height: 1.1;
    font-weight: 800;
    letter-spacing: -.02em;
    color: var(--sage-ink);
    margin-bottom: 16px;
  }
  .page-hero h1 em {
    font-style: italic;
    background: linear-gradient(120deg, var(--sage-deep), var(--yolk-deep));
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 900;
  }

  /* ====== FORM SECTION ====== */
  .form-section {
    padding: 40px 32px 100px;
    max-width: 720px;
    margin: 0 auto;
  }
  .form-card {
    background: var(--white);
    padding: 44px;
    border-radius: 24px;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(159, 176, 124, 0.15);
  }
  .form-group {
    margin-bottom: 24px;
  }
  .form-group label {
    display: block;
    font-size: 13.5px;
    font-weight: 600;
    color: var(--sage-dark);
    margin-bottom: 8px;
  }
  .form-control {
    width: 100%;
    padding: 14px 18px;
    border-radius: 12px;
    border: 1.5px solid var(--sage-pale);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px;
    background: var(--cream);
    color: var(--sage-ink);
    transition: all 0.3s ease;
  }
  .form-control:focus {
    outline: none;
    border-color: var(--sage-deep);
    background: var(--white);
    box-shadow: 0 0 0 4px rgba(107, 132, 84, 0.15);
  }

  /* Buttons */
  .btn-group {
    display: flex;
    gap: 12px;
    margin-top: 32px;
  }
  .btn {
    display: inline-flex; align-items: center; justify-content: center; gap: 10px;
    padding: 14px 26px;
    border-radius: 14px;
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    transition: all .3s cubic-bezier(.4,0,.2,1);
    cursor: pointer;
    border: none;
    flex: 1;
  }
  .btn-primary {
    background: linear-gradient(135deg, var(--sage-deep), var(--sage-dark));
    color: var(--cream);
    box-shadow: 0 10px 24px -8px rgba(63, 82, 51, 0.5);
  }
  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 28px -8px rgba(63, 82, 51, 0.6);
  }
  .btn-ghost {
    background: var(--white);
    color: var(--sage-dark);
    border: 1.5px solid var(--sage-pale);
  }
  .btn-ghost:hover {
    background: var(--sage-pale);
    transform: translateY(-2px);
  }

  /* ====== FOOTER ====== */
  footer {
    background: var(--sage-ink);
    color: var(--sage-mist);
    padding: 60px 32px 30px;
  }
  .footer-inner {
    max-width: 1240px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1.4fr 1fr 1fr;
    gap: 50px;
    padding-bottom: 40px;
    border-bottom: 1px solid rgba(255,255,255,.08);
  }
  .footer-brand h3 {
    font-family: 'Fraunces', serif;
    font-size: 24px;
    margin-bottom: 14px;
    color: var(--cream);
  }
  .footer-brand p { font-size: 14px; opacity: .7; max-width: 320px; }
  .footer-col h4 {
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: .12em;
    color: var(--yolk);
    margin-bottom: 18px;
  }
  .footer-col a {
    display: block;
    color: var(--sage-mist);
    text-decoration: none;
    font-size: 14px;
    opacity: .75;
    padding: 6px 0;
    transition: all .25s ease;
  }
  .footer-col a:hover { opacity: 1; color: var(--yolk); transform: translateX(4px); }
  .footer-bottom {
    max-width: 1240px;
    margin: 0 auto;
    padding-top: 24px;
    display: flex; justify-content: space-between;
    font-size: 13px; opacity: .6;
    flex-wrap: wrap; gap: 10px;
  }

  /* ====== REVEAL ANIMATION ====== */
  .reveal {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity .8s ease, transform .8s ease;
  }
  .reveal.visible { opacity: 1; transform: translateY(0); }

  /* ====== RESPONSIVE ====== */
  @media (max-width: 960px) {
    .footer-inner { grid-template-columns: 1fr 1fr; }
  }
  @media (max-width: 680px) {
    .nav-links {
      position: fixed;
      top: 76px; left: 16px; right: 16px;
      flex-direction: column;
      background: var(--white);
      padding: 18px;
      border-radius: 18px;
      box-shadow: var(--shadow-sage);
      gap: 4px;
      transform: translateY(-20px);
      opacity: 0; pointer-events: none;
      transition: all .3s ease;
    }
    .nav-links.open { transform: translateY(0); opacity: 1; pointer-events: auto; }
    .nav-links a { width: 100%; }
    .menu-toggle { display: grid; place-items: center; }
    .page-hero { padding: 120px 20px 50px; }
    .form-card { padding: 30px 20px; }
    .btn-group { flex-direction: column; }
    .footer-inner { grid-template-columns: 1fr; gap: 30px; }
  }

  @media (prefers-reduced-motion: reduce) {
    *, *::before, *::after { animation: none !important; transition: none !important; }
  }
</style>
</head>
<body>

<!-- ====== NAVBAR ====== -->
<header class="navbar" id="navbar">
  <div class="nav-inner">
    <a href="index.php" class="logo">
      <span class="logo-mark">TI</span>
      <span class="logo-text">Web TI <strong>2025</strong></span>
    </a>
    <nav class="nav-links" id="navLinks">
      <a href="index.php">Rumah</a>
      <a href="profil.php">Profil</a>
      <a href="kontak.php">Kontak</a>
      <a href="mahasiswa.php" class="active">Data Mahasiswa</a>
    </nav>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
      <i class="fa-solid fa-bars"></i>
    </button>
  </div>
</header>

<!-- ====== PAGE HERO ====== -->
<section class="page-hero">
  <div class="page-hero-bg">
    <span class="blob blob-1"></span>
    <span class="blob blob-2"></span>
  </div>
  <div class="page-hero-inner reveal">
    <span class="badge"><span class="dot"></span> Update Modul</span>
    <h1>Edit Data <em>Mahasiswa</em></h1>
  </div>
</section>

<!-- ====== FORM SECTION ====== -->
<section class="form-section">
  <div class="form-card reveal">
    <form action="" method="post" enctype="multipart/form-data">
      <!-- Hidden ID and Old Photo inputs -->
      <input type="hidden" name="id" value="<?= htmlspecialchars($mhs["id"]) ?>">
      <input type="hidden" name="fotoLama" value="<?= htmlspecialchars($mhs["foto"]) ?>">
      
      <div class="form-group">
        <label for="nama">Nama Lengkap *</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($mhs["nama"]) ?>" required autocomplete="off">
      </div>
      
      <div class="form-group">
        <label for="nim">Nomor Induk Mahasiswa (NIM) *</label>
        <input type="text" name="nim" id="nim" class="form-control" value="<?= htmlspecialchars($mhs["nim"]) ?>" required autocomplete="off">
      </div>
      
      <div class="form-group">
        <label for="prodi">Program Studi *</label>
        <input type="text" name="prodi" id="prodi" class="form-control" value="<?= htmlspecialchars($mhs["prodi"]) ?>" required autocomplete="off">
      </div>
      
      <div class="form-group">
        <label for="email">Alamat Email *</label>
        <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($mhs["email"]) ?>" required autocomplete="off">
      </div>
      
      <div class="form-group">
        <label for="no_hp">Nomor WhatsApp *</label>
        <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?= htmlspecialchars($mhs["no_hp"]) ?>" required autocomplete="off">
      </div>

      <div class="form-group" style="display: flex; align-items: center; gap: 20px; margin-bottom: 24px;">
        <div>
          <label style="display: block; margin-bottom: 8px;">Foto Saat Ini</label>
          <div style="width: 64px; height: 64px; border-radius: 50%; overflow: hidden; border: 2px solid var(--sage-light); box-shadow: 0 4px 10px rgba(63, 82, 51, 0.12);">
            <?php
              $current_foto = 'images.jpeg';
              if (!empty($mhs["foto"])) {
                  if (file_exists('img/' . $mhs["foto"])) {
                      $current_foto = 'img/' . $mhs["foto"];
                  } elseif (file_exists($mhs["foto"])) {
                      $current_foto = $mhs["foto"];
                  } else {
                      $current_foto = 'img/' . $mhs["foto"];
                  }
              }
            ?>
            <img src="<?= $current_foto ?>" alt="Foto" onerror="this.src='images.jpeg'" style="width: 100%; height: 100%; object-fit: cover;">
          </div>
        </div>
        <div style="flex: 1;">
          <label for="foto">Unggah Foto Baru (Biarkan kosong untuk mempertahankan foto lama)</label>
          <input type="file" name="foto" id="foto" class="form-control" accept="image/jpeg, image/png, image/webp">
        </div>
      </div>
      
      <div class="btn-group">
        <a href="mahasiswa.php" class="btn btn-ghost">
          <i class="fa-solid fa-arrow-left"></i> Batal
        </a>
        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin ingin memperbarui data ini?');">
          <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</section>

<!-- ====== FOOTER ====== -->
<footer>
  <div class="footer-inner">
    <div class="footer-brand">
      <h3>Web TI 2025</h3>
      <p>Portal resmi mahasiswa Teknologi Informasi Angkatan 2025. Dirancang segar, interaktif, dan ramah lingkungan.</p>
    </div>
    <div class="footer-col">
      <h4>Navigasi</h4>
      <a href="index.php">Rumah</a>
      <a href="profil.php">Profil</a>
      <a href="kontak.php">Kontak</a>
      <a href="mahasiswa.php">Data Mahasiswa</a>
    </div>
    <div class="footer-col">
      <h4>Sosial</h4>
      <a href="https://www.instagram.com/rrachmadika/" target="_blank" rel="noopener noreferrer">
        <i class="fa-brands fa-instagram"></i> Instagram
      </a>
      <a href="https://github.com/Rachmadika" target="_blank" rel="noopener noreferrer">
        <i class="fa-brands fa-github"></i> GitHub
      </a>
      <a href="https://www.youtube.com/@mrizaqirachmatd4090" target="_blank" rel="noopener noreferrer">
        <i class="fa-brands fa-youtube"></i> YouTube
      </a>
      <!-- LinkedIn is explicitly excluded/deferred per project requirement -->
      <a href="javascript:void(0);" style="opacity: 0.4; cursor: default;" title="Segera Hadir">
        <i class="fa-brands fa-linkedin"></i> LinkedIn
      </a>
    </div>
  </div>
  <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> Web TI 2025 • Teknologi Informasi</span>
    <span>Dibuat dengan <i class="fa-solid fa-leaf" style="color: var(--yolk)"></i> & kopi hijau</span>
  </div>
</footer>

<script>
  /* === Navbar scroll === */
  const navbar = document.getElementById('navbar');
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 30);
  });

  /* === Mobile menu === */
  const toggle = document.getElementById('menuToggle');
  const links = document.getElementById('navLinks');
  toggle.addEventListener('click', () => {
    links.classList.toggle('open');
    const icon = toggle.querySelector('i');
    icon.className = links.classList.contains('open') ? 'fa-solid fa-xmark' : 'fa-solid fa-bars';
  });

  /* === Reveal on scroll === */
  const io = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('visible'), i * 80);
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.15 });
  document.querySelectorAll('.reveal').forEach(el => io.observe(el));
</script>

</body>
</html>
