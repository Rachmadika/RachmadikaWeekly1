<?php
    // Memanggil file fungsi
    require 'fungsi.php';

    // Mengambil data dari database
    $query = "SELECT * FROM mahasiswa";
    $mahasiswas = tampildata($query); // wadah isi data
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Mahasiswa - Web TI 2025</title>
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
    padding: 160px 32px 80px;
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
    margin-bottom: 24px;
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
    font-size: clamp(2.4rem, 5vw, 3.8rem);
    line-height: 1.1;
    font-weight: 800;
    letter-spacing: -.02em;
    color: var(--sage-ink);
    margin-bottom: 20px;
  }
  .page-hero h1 em {
    font-style: italic;
    background: linear-gradient(120deg, var(--sage-deep), var(--yolk-deep));
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 900;
  }
  .page-hero p {
    font-size: 17px;
    color: var(--muted);
    max-width: 600px;
    margin: 0 auto;
  }

  /* ====== DASHBOARD SECTION ====== */
  .dashboard-section {
    padding: 80px 32px;
    max-width: 1240px;
    margin: 0 auto;
  }
  .data-card {
    background: var(--white);
    border-radius: 24px;
    padding: 40px;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(159, 176, 124, 0.12);
    margin-bottom: 50px;
  }
  .card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 30px;
  }
  .card-title-group h3 {
    font-family: 'Fraunces', serif;
    font-size: 26px;
    font-weight: 700;
    color: var(--sage-ink);
  }
  .card-title-group p {
    font-size: 14px;
    color: var(--muted);
    margin-top: 4px;
  }
  
  .btn {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 14px;
    text-decoration: none;
    transition: all .3s cubic-bezier(.4,0,.2,1);
    cursor: pointer;
    border: none;
  }
  .btn-primary {
    background: linear-gradient(135deg, var(--sage-deep), var(--sage-dark));
    color: var(--cream);
    box-shadow: 0 10px 20px -8px rgba(63, 82, 51, 0.5);
  }
  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 24px -8px rgba(63, 82, 51, 0.6);
  }

  /* ====== TABLE STYLING ====== */
  .table-responsive {
    width: 100%;
    overflow-x: auto;
    border-radius: 16px;
    border: 1px solid var(--sage-pale);
    box-shadow: 0 4px 15px rgba(63, 82, 51, 0.03);
  }
  .table-premium {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    background: var(--white);
  }
  .table-premium th {
    background: linear-gradient(135deg, var(--sage-deep), var(--sage-dark));
    color: var(--cream);
    padding: 18px 20px;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
  }
  .table-premium td {
    padding: 16px 20px;
    border-bottom: 1px solid var(--sage-pale);
    color: var(--sage-ink);
    font-size: 14.5px;
    vertical-align: middle;
  }
  .table-premium tr:last-child td {
    border-bottom: none;
  }
  .table-premium tbody tr {
    transition: background-color 0.2s ease;
  }
  .table-premium tbody tr:hover {
    background-color: rgba(221, 230, 200, 0.2);
  }

  /* Avatar Circle */
  .avatar-box {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    overflow: hidden;
    border: 2px solid var(--sage-light);
    box-shadow: 0 4px 10px rgba(63, 82, 51, 0.12);
    display: inline-block;
  }
  .avatar-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  /* Pill badges */
  .badge-prodi {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    background: var(--sage-pale);
    color: var(--sage-dark);
    border: 1px solid rgba(107, 132, 84, 0.15);
  }

  /* Action Buttons */
  .btn-action-group {
    display: flex;
    gap: 8px;
  }
  .btn-sm {
    padding: 8px 14px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    text-decoration: none;
    cursor: pointer;
    border: none;
    transition: all 0.2s ease;
  }
  .btn-edit {
    background: var(--sage-pale);
    color: var(--sage-dark);
  }
  .btn-edit:hover {
    background: var(--sage-light);
    transform: translateY(-2px);
  }
  .btn-delete {
    background: #fdf2f2;
    color: #d9534f;
    border: 1px solid #f5c2c2;
  }
  .btn-delete:hover {
    background: #d9534f;
    color: var(--white);
    transform: translateY(-2px);
  }

  /* ====== PRACTICE SECTION ====== */
  .practice-card {
    background: var(--white);
    border-radius: 24px;
    padding: 40px;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(159, 176, 124, 0.12);
  }
  .practice-title {
    font-family: 'Fraunces', serif;
    font-size: 24px;
    font-weight: 700;
    color: var(--sage-ink);
    margin-bottom: 24px;
    text-align: center;
  }
  .practice-table {
    width: 100%;
    border-collapse: collapse;
    background: var(--cream);
    border: 2px solid var(--sage-mid);
    border-radius: 12px;
    overflow: hidden;
  }
  .practice-table td {
    padding: 20px;
    border: 1.5px solid var(--sage-light);
    text-align: center;
    font-size: 14.5px;
    font-weight: 600;
    color: var(--sage-dark);
  }
  .practice-table tr:hover {
    background: var(--sage-mist);
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
    .page-hero { padding: 120px 20px 60px; }
    .data-card, .practice-card { padding: 30px 18px; }
    .card-header { flex-direction: column; align-items: stretch; }
    .btn-primary { justify-content: center; }
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
    <span class="badge"><span class="dot"></span> Database Akademik</span>
    <h1>Daftar Mahasiswa<br><em>Teknologi Informasi</em></h1>
    <p>Manajemen database terpadu mahasiswa aktif program studi Teknologi Informasi Angkatan 2025.</p>
  </div>
</section>

<!-- ====== DASHBOARD SECTION ====== -->
<section class="dashboard-section">
  <!-- Data Table Card -->
  <div class="data-card reveal">
    <div class="card-header">
      <div class="card-title-group">
        <h3>Tabel Data Mahasiswa</h3>
        <p>Menampilkan seluruh rekaman data mahasiswa yang tersimpan di sistem.</p>
      </div>
      <a href="tambahdata.php" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Tambah Data
      </a>
    </div>
    
    <div class="table-responsive">
      <table class="table-premium">
        <thead>
          <tr>
            <th style="width: 60px; text-align: center;">No</th>
            <th>Nama Lengkap</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Surel / Email</th>
            <th>Nomor Whatsapp</th>
            <th style="text-align: center; width: 100px;">Foto</th>
            <th style="text-align: center; width: 180px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $no = 1;
              foreach($mahasiswas as $mhs) {
                  $foto = 'images.jpeg';
                  if (!empty($mhs["foto"])) {
                      if (file_exists('img/' . $mhs["foto"])) {
                          $foto = 'img/' . $mhs["foto"];
                      } elseif (file_exists($mhs["foto"])) {
                          $foto = $mhs["foto"];
                      } else {
                          $foto = 'img/' . $mhs["foto"];
                      }
                  }
          ?>
          <tr>
            <td style="text-align: center; font-weight: 700; color: var(--sage-deep);"><?= $no ?></td>
            <td style="font-weight: 600;"><?= htmlspecialchars($mhs["nama"]) ?></td>
            <td style="font-family: monospace; font-size: 13.5px;"><?= htmlspecialchars($mhs["nim"]) ?></td>
            <td><span class="badge-prodi"><?= htmlspecialchars($mhs["prodi"]) ?></span></td>
            <td style="font-size: 13.5px;"><?= htmlspecialchars($mhs["email"]) ?></td>
            <td style="font-size: 13.5px;"><?= htmlspecialchars($mhs["no_hp"]) ?></td>
            <td style="text-align: center;">
              <div class="avatar-box">
                <img src="<?= $foto ?>" alt="Foto <?= htmlspecialchars($mhs["nama"]) ?>" onerror="this.src='images.jpeg'">
              </div>
            </td>
            <td style="text-align: center;">
              <div class="btn-action-group">
                <a href="editdata.php?id=<?= $mhs["id"] ?>" class="btn-sm btn-edit">
                  <i class="fa-solid fa-pen-to-square"></i> Edit
                </a> 
                <a href="hapusdata.php?id=<?= $mhs["id"] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="btn-sm btn-delete">
                  <i class="fa-solid fa-trash-can"></i> Hapus
                </a>
              </div>
            </td>
          </tr>
          <?php
                  $no++;
              }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- HTML Table Practice Card -->
  <div class="practice-card reveal">
    <h3 class="practice-title">Latihan Tabel HTML</h3>
    <div class="table-responsive">
      <table class="practice-table">
        <tr>
          <td>1,1</td>
          <td>1,2</td>
          <td>1,3</td>
          <td>1,4</td>
        </tr>
        <tr>
          <td>2,1</td>
          <td rowspan="2" colspan="2" style="background: rgba(107, 132, 84, 0.08); font-family: 'Fraunces', serif; color: var(--sage-deep); font-size: 16px;">
            Gabungan Baris & Kolom
          </td>
          <td>2,4</td>
        </tr>
        <tr>
          <td>3,1</td>
          <td>3,4</td>
        </tr>
        <tr>
          <td>4,1</td>
          <td>4,2</td>
          <td>4,3</td>
          <td>4,4</td>
        </tr>
      </table>
    </div>
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
      <a href="#"><i class="fa-brands fa-instagram"></i> Instagram</a>
      <a href="#"><i class="fa-brands fa-github"></i> GitHub</a>
      <a href="#"><i class="fa-brands fa-youtube"></i> YouTube</a>
      <a href="#"><i class="fa-brands fa-linkedin"></i> LinkedIn</a>
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