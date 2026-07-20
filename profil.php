<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil - Web TI 2025</title>
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

  /* ====== SECTION HEAD ====== */
  .section-head { text-align: center; margin-bottom: 60px; }
  .kicker {
    display: inline-block;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: .15em;
    text-transform: uppercase;
    color: var(--sage-deep);
    margin-bottom: 14px;
    padding: 6px 16px;
    background: var(--sage-pale);
    border-radius: 999px;
  }
  .section-head h2 {
    font-family: 'Fraunces', serif;
    font-size: clamp(2rem, 4vw, 2.8rem);
    font-weight: 800;
    color: var(--sage-ink);
    letter-spacing: -.02em;
  }

  /* ====== VISION & MISSION ====== */
  .vision-mission {
    padding: 80px 32px;
    max-width: 1240px;
    margin: 0 auto;
  }
  .vm-grid {
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    gap: 48px;
    align-items: stretch;
  }
  .vm-card {
    background: var(--white);
    padding: 44px;
    border-radius: 24px;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(159, 176, 124, 0.12);
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .vm-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-sage);
  }
  .vm-header {
    display: flex;
    align-items: center;
    gap: 18px;
    margin-bottom: 28px;
  }
  .vm-icon {
    width: 56px;
    height: 56px;
    display: grid;
    place-items: center;
    background: linear-gradient(135deg, var(--sage-pale), var(--sage-light));
    color: var(--sage-dark);
    border-radius: 16px;
    font-size: 22px;
  }
  .vm-header h3 {
    font-family: 'Fraunces', serif;
    font-size: 26px;
    font-weight: 700;
    color: var(--sage-ink);
  }
  .vm-content p {
    font-size: 16px;
    color: var(--muted);
    margin-bottom: 20px;
    line-height: 1.7;
  }
  .mission-list {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 18px;
  }
  .mission-item {
    display: flex;
    gap: 16px;
    align-items: flex-start;
  }
  .mission-number {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: var(--sage-deep);
    color: var(--white);
    display: grid;
    place-items: center;
    font-size: 14px;
    font-weight: 700;
    flex-shrink: 0;
    box-shadow: 0 4px 10px rgba(107, 132, 84, 0.3);
  }
  .mission-text {
    font-size: 15px;
    color: var(--muted);
    line-height: 1.6;
  }

  /* ====== VALUES SECTION ====== */
  .values-section {
    background: var(--white);
    padding: 100px 32px;
  }
  .values-grid {
    max-width: 1240px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 28px;
  }
  .value-card {
    text-align: center;
    padding: 36px 24px;
    border-radius: 22px;
    background: var(--sage-mist);
    border: 1px solid transparent;
    transition: all 0.3s ease;
  }
  .value-card:hover {
    background: var(--white);
    border-color: var(--sage-light);
    box-shadow: var(--shadow-soft);
    transform: translateY(-6px);
  }
  .value-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 22px;
    display: grid;
    place-items: center;
    background: linear-gradient(135deg, var(--sage-deep), var(--sage-dark));
    color: var(--cream);
    border-radius: 50%;
    font-size: 24px;
    box-shadow: 0 8px 20px -8px rgba(63, 82, 51, 0.55);
  }
  .value-card h4 {
    font-family: 'Fraunces', serif;
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 12px;
    color: var(--sage-ink);
  }
  .value-card p {
    font-size: 14px;
    color: var(--muted);
    line-height: 1.6;
  }

  /* ====== STRUCTURE SECTION ====== */
  .structure-section {
    padding: 100px 32px;
    max-width: 1240px;
    margin: 0 auto;
  }
  .structure-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 36px;
  }
  .member-card {
    background: var(--white);
    border-radius: 24px;
    overflow: hidden;
    box-shadow: var(--shadow-soft);
    border: 1px solid rgba(159, 176, 124, 0.1);
    transition: all 0.4s ease;
    text-align: center;
  }
  .member-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-sage);
    border-color: var(--sage-light);
  }
  .member-img-box {
    width: 100%;
    aspect-ratio: 1/1;
    overflow: hidden;
    position: relative;
    background: var(--sage-pale);
  }
  .member-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
  }
  .member-card:hover .member-img-box img {
    transform: scale(1.06);
  }
  .member-info {
    padding: 28px 20px;
  }
  .member-role {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    color: var(--sage-deep);
    letter-spacing: 0.1em;
    margin-bottom: 8px;
  }
  .member-name {
    font-family: 'Fraunces', serif;
    font-size: 20px;
    font-weight: 700;
    color: var(--sage-ink);
    margin-bottom: 8px;
  }
  .member-meta {
    font-size: 13px;
    color: var(--muted);
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
    .vm-grid { grid-template-columns: 1fr; gap: 30px; }
    .values-grid { grid-template-columns: repeat(2, 1fr); }
    .structure-grid { grid-template-columns: repeat(2, 1fr); }
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
    .values-grid { grid-template-columns: 1fr; }
    .structure-grid { grid-template-columns: 1fr; }
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
      <a href="profil.php" class="active">Profil</a>
      <a href="kontak.php">Kontak</a>
      <a href="mahasiswa.php">Data Mahasiswa</a>
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
    <span class="badge"><span class="dot"></span> Visi, Misi, & Nilai</span>
    <h1>Profil Program Studi<br><em>Teknologi Informasi</em></h1>
    <p>Membentuk talenta digital masa depan yang inovatif, berdaya saing global, dan berorientasi pada komputasi berkelanjutan ramah lingkungan.</p>
  </div>
</section>

<!-- ====== VISION & MISSION ====== -->
<section class="vision-mission">
  <div class="vm-grid">
    <div class="vm-card reveal">
      <div>
        <div class="vm-header">
          <div class="vm-icon"><i class="fa-solid fa-eye"></i></div>
          <h3>Visi Kami</h3>
        </div>
        <div class="vm-content">
          <p>Menjadi Program Studi Teknologi Informasi yang unggul secara nasional, melahirkan inovator teknologi terdepan yang adaptif terhadap dinamika industri global, dengan komitmen mendalam terhadap etika profesi dan prinsip teknologi hijau (green computing) untuk kebaikan masyarakat berkelanjutan pada tahun 2035.</p>
        </div>
      </div>
    </div>
    
    <div class="vm-card reveal">
      <div>
        <div class="vm-header">
          <div class="vm-icon"><i class="fa-solid fa-bullseye"></i></div>
          <h3>Misi Kami</h3>
        </div>
        <div class="vm-content">
          <ul class="mission-list">
            <li class="mission-item">
              <div class="mission-number">1</div>
              <div class="mission-text">Menyelenggarakan pendidikan berkualitas berbasis kurikulum modern yang relevan dengan tren industri terkini (AI, IoT, Cloud).</div>
            </li>
            <li class="mission-item">
              <div class="mission-number">2</div>
              <div class="mission-text">Melakukan penelitian kolaboratif yang aplikatif guna memecahkan problematika nyata di masyarakat dan industri.</div>
            </li>
            <li class="mission-item">
              <div class="mission-number">3</div>
              <div class="mission-text">Mengintegrasikan konsep efisiensi energi (green computing) ke dalam siklus pengembangan perangkat keras dan lunak.</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ====== CORE VALUES ====== -->
<section class="values-section">
  <div class="section-head reveal">
    <span class="kicker">Nilai Utama</span>
    <h2>Pilar Kebudayaan Akademik</h2>
  </div>
  
  <div class="values-grid">
    <div class="value-card reveal">
      <div class="value-icon"><i class="fa-solid fa-lightbulb"></i></div>
      <h4>Inovatif</h4>
      <p>Berpikir kreatif tanpa batas dalam menciptakan solusi teknologi informasi yang segar dan efisien.</p>
    </div>
    <div class="value-card reveal">
      <div class="value-icon"><i class="fa-solid fa-users-gear"></i></div>
      <h4>Kolaboratif</h4>
      <p>Membiasakan kerja tim multidisiplin untuk membangun ekosistem sinergis yang dinamis.</p>
    </div>
    <div class="value-card reveal">
      <div class="value-icon"><i class="fa-solid fa-seedling"></i></div>
      <h4>Berkelanjutan</h4>
      <p>Mengutamakan keberlanjutan lingkungan melalui penerapan komputasi hijau dan efisien energi.</p>
    </div>
    <div class="value-card reveal">
      <div class="value-icon"><i class="fa-solid fa-shield-halved"></i></div>
      <h4>Integritas</h4>
      <p>Menunjung tinggi etika akademik, profesionalitas kerja, serta kejujuran intelektual.</p>
    </div>
  </div>
</section>

<!-- ====== STRUCTURE SECTION ====== -->
<section class="structure-section">
  <div class="section-head reveal">
    <span class="kicker">Kepemimpinan</span>
    <h2>Struktur Organisasi</h2>
  </div>
  
  <div class="structure-grid">
    <div class="member-card reveal">
      <div class="member-img-box">
        <img src="https://picsum.photos/seed/fauzi/400/400.jpg" alt="Dr. Ir. H. Ahmad Fauzi, M.T.">
      </div>
      <div class="member-info">
        <div class="member-role">Kepala Program Studi</div>
        <div class="member-name">Dr. Ir. H. Ahmad Fauzi, M.T.</div>
        <div class="member-meta">Spesialisasi: Green Computing & AI</div>
      </div>
    </div>
    
    <div class="member-card reveal">
      <div class="member-img-box">
        <img src="https://picsum.photos/seed/sarah/400/400.jpg" alt="Sarah Adelia, S.Kom., M.Sc.">
      </div>
      <div class="member-info">
        <div class="member-role">Sekretaris Prodi</div>
        <div class="member-name">Sarah Adelia, S.Kom., M.Sc.</div>
        <div class="member-meta">Spesialisasi: HCI & Rekayasa Informasi</div>
      </div>
    </div>
    
    <div class="member-card reveal">
      <div class="member-img-box">
        <img src="https://picsum.photos/seed/rian/400/400.jpg" alt="Rian Hermawan, M.Cs.">
      </div>
      <div class="member-info">
        <div class="member-role">Dosen Wali & Pembina</div>
        <div class="member-name">Rian Hermawan, M.Cs.</div>
        <div class="member-meta">Spesialisasi: Cyber Security & Cloud</div>
      </div>
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
