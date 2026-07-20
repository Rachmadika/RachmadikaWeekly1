<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Web TI 2025</title>
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

  /* ====== HERO ====== */
  .hero {
    position: relative;
    min-height: 100vh;
    padding: 140px 32px 80px;
    overflow: hidden;
    display: flex;
    align-items: center;
  }
  .hero-bg { position: absolute; inset: 0; z-index: 0; pointer-events: none; }
  .blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(60px);
    opacity: .55;
    animation: float 18s ease-in-out infinite;
  }
  .blob-1 { width: 480px; height: 480px; background: var(--sage-light); top: -120px; right: -80px; }
  .blob-2 { width: 380px; height: 380px; background: var(--yolk); bottom: -100px; left: -80px; opacity: .35; animation-delay: -6s; }
  .blob-3 { width: 280px; height: 280px; background: var(--sage-mid); top: 40%; left: 45%; opacity: .3; animation-delay: -12s; }

  @keyframes float {
    0%,100% { transform: translate(0,0) scale(1); }
    33%     { transform: translate(40px,-30px) scale(1.08); }
    66%     { transform: translate(-30px,40px) scale(.95); }
  }

  .hero-inner {
    position: relative; z-index: 2;
    max-width: 1240px;
    margin: 0 auto;
    width: 100%;
    display: grid;
    grid-template-columns: 1.05fr 1fr;
    gap: 60px;
    align-items: center;
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

  .hero-text h1 {
    font-family: 'Fraunces', serif;
    font-size: clamp(2.6rem, 5.2vw, 4.6rem);
    line-height: 1.05;
    font-weight: 800;
    letter-spacing: -.03em;
    color: var(--sage-ink);
    margin-bottom: 24px;
  }
  .hero-text h1 em {
    font-style: italic;
    background: linear-gradient(120deg, var(--sage-deep), var(--yolk-deep));
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 900;
  }
  .hero-text p {
    font-size: 17px;
    color: var(--muted);
    max-width: 520px;
    margin-bottom: 36px;
  }

  .hero-cta { display: flex; gap: 14px; flex-wrap: wrap; margin-bottom: 48px; }
  .btn {
    display: inline-flex; align-items: center; gap: 10px;
    padding: 14px 26px;
    border-radius: 14px;
    font-weight: 600;
    font-size: 15px;
    text-decoration: none;
    transition: all .3s cubic-bezier(.4,0,.2,1);
    cursor: pointer;
    border: none;
    position: relative;
    overflow: hidden;
  }
  .btn-primary {
    background: linear-gradient(135deg, var(--sage-deep), var(--sage-dark));
    color: var(--cream);
    box-shadow: 0 12px 28px -10px rgba(63, 82, 51, 0.6);
  }
  .btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 18px 36px -10px rgba(63, 82, 51, 0.7);
  }
  .btn-primary i { transition: transform .3s ease; }
  .btn-primary:hover i { transform: translateX(4px); }
  .btn-ghost {
    background: var(--white);
    color: var(--sage-dark);
    border: 1.5px solid var(--sage-pale);
  }
  .btn-ghost:hover {
    background: var(--sage-pale);
    transform: translateY(-3px);
  }

  .hero-stats {
    display: flex; gap: 36px;
    padding-top: 32px;
    border-top: 1px dashed var(--sage-light);
  }
  .stat { display: flex; flex-direction: column; }
  .stat strong {
    font-family: 'Fraunces', serif;
    font-size: 32px;
    font-weight: 800;
    color: var(--sage-dark);
    line-height: 1;
  }
  .stat span { font-size: 13px; color: var(--muted); margin-top: 6px; }

  /* Hero Visual */
  .hero-visual { position: relative; }
  .image-frame {
    position: relative;
    border-radius: 28px;
    overflow: hidden;
    aspect-ratio: 4/5;
    box-shadow: var(--shadow-sage);
    transform: rotate(-2deg);
    transition: transform .5s ease;
  }
  .image-frame:hover { transform: rotate(0deg) scale(1.02); }
  .image-frame img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform .8s ease;
  }
  .image-frame:hover img { transform: scale(1.08); }
  .image-glow {
    position: absolute; inset: 0;
    background: linear-gradient(180deg, transparent 50%, rgba(63, 82, 51, 0.55));
    pointer-events: none;
  }
  .image-frame::after {
    content: "Teknologi Informasi";
    position: absolute;
    bottom: 24px; left: 24px;
    color: var(--cream);
    font-family: 'Fraunces', serif;
    font-size: 22px;
    font-weight: 600;
    z-index: 2;
  }

  .float-card {
    position: absolute;
    background: var(--white);
    padding: 14px 18px;
    border-radius: 16px;
    display: flex; align-items: center; gap: 12px;
    box-shadow: var(--shadow-soft);
    animation: bob 4s ease-in-out infinite;
  }
  .float-card i {
    width: 38px; height: 38px;
    display: grid; place-items: center;
    border-radius: 10px;
    font-size: 16px;
  }
  .float-card div { display: flex; flex-direction: column; line-height: 1.2; }
  .float-card strong { font-size: 14px; color: var(--sage-ink); }
  .float-card span { font-size: 11px; color: var(--muted); }
  .float-card-1 {
    top: 12%; left: -8%;
    animation-delay: -1s;
  }
  .float-card-1 i { background: var(--sage-pale); color: var(--sage-dark); }
  .float-card-2 {
    bottom: 14%; right: -6%;
    animation-delay: -2.5s;
  }
  .float-card-2 i { background: #fbeec6; color: var(--yolk-deep); }

  @keyframes bob {
    0%,100% { transform: translateY(0); }
    50%     { transform: translateY(-12px); }
  }

  /* ====== MENU SECTION ====== */
  .menu {
    padding: 100px 32px;
    max-width: 1240px;
    margin: 0 auto;
    position: relative;
  }
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
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    color: var(--sage-ink);
    letter-spacing: -.02em;
  }

  .menu-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
  }
  .card {
    position: relative;
    background: var(--white);
    border-radius: 22px;
    padding: 32px 26px;
    text-decoration: none;
    color: var(--sage-ink);
    overflow: hidden;
    border: 1px solid transparent;
    transition: all .4s cubic-bezier(.4,0,.2,1);
    min-height: 240px;
    display: flex; flex-direction: column;
    justify-content: space-between;
  }
  .card::before {
    content: "";
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--sage-deep), var(--yolk));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform .5s ease;
  }
  .card::after {
    content: "";
    position: absolute;
    bottom: -40px; right: -40px;
    width: 120px; height: 120px;
    background: var(--sage-mist);
    border-radius: 50%;
    transition: all .5s ease;
    z-index: 0;
  }
  .card:hover {
    transform: translateY(-8px);
    border-color: var(--sage-light);
    box-shadow: var(--shadow-sage);
  }
  .card:hover::before { transform: scaleX(1); }
  .card:hover::after {
    background: var(--sage-pale);
    transform: scale(1.4);
  }
  .card-icon {
    width: 56px; height: 56px;
    display: grid; place-items: center;
    background: linear-gradient(135deg, var(--sage-pale), var(--sage-light));
    color: var(--sage-dark);
    border-radius: 16px;
    font-size: 22px;
    margin-bottom: 20px;
    position: relative; z-index: 1;
    transition: all .4s ease;
  }
  .card:hover .card-icon {
    background: linear-gradient(135deg, var(--sage-deep), var(--sage-dark));
    color: var(--cream);
    transform: rotate(-8deg) scale(1.08);
  }
  .card h3 {
    font-family: 'Fraunces', serif;
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 8px;
    position: relative; z-index: 1;
  }
  .card p {
    font-size: 14px;
    color: var(--muted);
    position: relative; z-index: 1;
    margin-bottom: 18px;
  }
  .card-arrow {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 13px; font-weight: 600;
    color: var(--sage-deep);
    position: relative; z-index: 1;
    transition: gap .3s ease;
  }
  .card:hover .card-arrow { gap: 14px; }

  /* ====== INFO STRIP ====== */
  .strip {
    background: linear-gradient(135deg, var(--sage-dark), var(--sage-deep));
    color: var(--cream);
    padding: 80px 32px;
    position: relative;
    overflow: hidden;
  }
  .strip::before {
    content: "";
    position: absolute; inset: 0;
    background-image:
      radial-gradient(circle at 20% 30%, rgba(233,196,106,.15), transparent 40%),
      radial-gradient(circle at 80% 70%, rgba(194,209,164,.15), transparent 40%);
  }
  .strip-inner {
    max-width: 1240px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    position: relative; z-index: 1;
  }
  .strip h2 {
    font-family: 'Fraunces', serif;
    font-size: clamp(1.8rem, 3.5vw, 2.6rem);
    font-weight: 700;
    line-height: 1.15;
    margin-bottom: 18px;
  }
  .strip h2 em {
    color: var(--yolk);
    font-style: normal;
  }
  .strip p { font-size: 16px; opacity: .85; margin-bottom: 24px; }
  .strip-features { display: flex; flex-direction: column; gap: 14px; }
  .strip-feature {
    display: flex; align-items: center; gap: 14px;
    background: rgba(255,255,255,.06);
    padding: 16px 20px;
    border-radius: 14px;
    border: 1px solid rgba(255,255,255,.1);
    backdrop-filter: blur(10px);
    transition: all .3s ease;
  }
  .strip-feature:hover {
    background: rgba(255,255,255,.12);
    transform: translateX(6px);
  }
  .strip-feature i {
    width: 40px; height: 40px;
    display: grid; place-items: center;
    background: var(--yolk);
    color: var(--sage-ink);
    border-radius: 10px;
    font-size: 16px;
    flex-shrink: 0;
  }
  .strip-feature strong { display: block; font-size: 15px; }
  .strip-feature span { font-size: 13px; opacity: .7; }

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
    .hero-inner { grid-template-columns: 1fr; gap: 50px; }
    .hero-visual { max-width: 420px; margin: 0 auto; width: 100%; }
    .menu-grid { grid-template-columns: repeat(2, 1fr); }
    .strip-inner { grid-template-columns: 1fr; }
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
    .hero { padding: 120px 20px 60px; }
    .menu { padding: 70px 20px; }
    .menu-grid { grid-template-columns: 1fr; }
    .hero-stats { gap: 22px; }
    .stat strong { font-size: 26px; }
    .strip { padding: 60px 20px; }
    .footer-inner { grid-template-columns: 1fr; gap: 30px; }
    .float-card-1 { left: 0; }
    .float-card-2 { right: 0; }
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
      <a href="index.php" class="active">Rumah</a>
      <a href="profil.php">Profil</a>
      <a href="kontak.php">Kontak</a>
      <a href="mahasiswa.php">Data Mahasiswa</a>
    </nav>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
      <i class="fa-solid fa-bars"></i>
    </button>
  </div>
</header>

<!-- ====== HERO ====== -->
<section class="hero">
  <div class="hero-bg">
    <span class="blob blob-1"></span>
    <span class="blob blob-2"></span>
    <span class="blob blob-3"></span>
  </div>
  <div class="hero-inner">
    <div class="hero-text reveal">
      <span class="badge"><span class="dot"></span> Teknologi Informasi • Angkatan 2025</span>
      <h1>Selamat Datang<br>di <em>My Website</em></h1>
      <p>Portal akademik mahasiswa Teknologi Informasi. Jelajahi profil, kontak, hingga data mahasiswa dalam satu tempat.</p>
      <div class="hero-cta">
        <a href="profil.php" class="btn btn-primary">Lihat Profil <i class="fa-solid fa-arrow-right"></i></a>
        <a href="mahasiswa.php" class="btn btn-ghost"><i class="fa-solid fa-database"></i> Data Mahasiswa</a>
      </div>
      <div class="hero-stats">
        <div class="stat"><strong data-count="60">0</strong><span>Mahasiswa Aktif</span></div>
        <div class="stat"><strong data-count="8">0</strong><span>Mata Kuliah</span></div>
        <div class="stat"><strong data-count="2025">0</strong><span>Tahun Angkatan</span></div>
      </div>
    </div>

    <div class="hero-visual reveal">
      <div class="image-frame">
        <img src="download.jpeg?v=<?= filemtime('download.jpeg'); ?>" alt="Teknologi Informasi 2025" onerror="this.src='https://picsum.photos/seed/ti2025/600/750.jpg'">
        <div class="image-glow"></div>
      </div>
      <div class="float-card float-card-1">
        <i class="fa-solid fa-graduation-cap"></i>
        <div><strong>Akreditasi A</strong><span>BAN-PT 2024</span></div>
      </div>
      <div class="float-card float-card-2">
        <i class="fa-solid fa-leaf"></i>
        <div><strong>Green Campus</strong><span>Eco Friendly</span></div>
      </div>
    </div>
  </div>
</section>

<!-- ====== MENU CARDS ====== -->
<section class="menu">
  <div class="section-head reveal">
    <span class="kicker">Rachmadika</span>
    <h2>Jelajahi Setiap Halaman</h2>
  </div>
  <div class="menu-grid">
    <a href="index.php" class="card reveal">
      <div>
        <div class="card-icon"><i class="fa-solid fa-house"></i></div>
        <h3>Rumah</h3>
        <p>Halaman utama berisi sambutan dan informasi terkini tentang program studi.</p>
      </div>
      <span class="card-arrow">Kunjungi <i class="fa-solid fa-arrow-right"></i></span>
    </a>
    <a href="profil.php" class="card reveal">
      <div>
        <div class="card-icon"><i class="fa-solid fa-user"></i></div>
        <h3>Profil</h3>
        <p>Kenali lebih dekat identitas, visi, misi, dan struktur organisasi program studi.</p>
      </div>
      <span class="card-arrow">Kunjungi <i class="fa-solid fa-arrow-right"></i></span>
    </a>
    <a href="kontak.php" class="card reveal">
      <div>
        <div class="card-icon"><i class="fa-solid fa-envelope"></i></div>
        <h3>Kontak</h3>
        <p>Hubungi kami melalui berbagai saluran komunikasi yang tersedia dan aktif.</p>
      </div>
      <span class="card-arrow">Kunjungi <i class="fa-solid fa-arrow-right"></i></span>
    </a>
    <a href="mahasiswa.php" class="card reveal">
      <div>
        <div class="card-icon"><i class="fa-solid fa-database"></i></div>
        <h3>Data Mahasiswa</h3>
        <p>Akses informasi dan rekam jejak akademik mahasiswa Teknologi Informasi 2025.</p>
      </div>
      <span class="card-arrow">Kunjungi <i class="fa-solid fa-arrow-right"></i></span>
    </a>
  </div>
</section>

<!-- ====== INFO STRIP ====== -->
<section class="strip">
  <div class="strip-inner">
    <div class="reveal">
      <h2>Belajar, Berkarya, <em>Berkontribusi</em> untuk Masa Depan Hijau.</h2>
      <p>Program studi Teknologi Informasi berkomitmen mencetak lulusan yang tidak hanya unggul secara teknis, tetapi juga peduli lingkungan dan berkelanjutan.</p>
    </div>
    <div class="strip-features reveal">
      <div class="strip-feature">
        <i class="fa-solid fa-code"></i>
        <div><strong>Kurikulum Modern</strong><span>Berbasis industri & riset terkini</span></div>
      </div>
      <div class="strip-feature">
        <i class="fa-solid fa-microchip"></i>
        <div><strong>Lab Lengkap</strong><span>AI, IoT, Jaringan, dan Robotika</span></div>
      </div>
      <div class="strip-feature">
        <i class="fa-solid fa-seedling"></i>
        <div><strong>Berkelanjutan</strong><span>Green computing & efisiensi energi</span></div>
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

  /* === Counter animation === */
  const counters = document.querySelectorAll('[data-count]');
  const counterIO = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        const el = e.target;
        const target = +el.dataset.count;
        const duration = 1600;
        const start = performance.now();
        const step = (now) => {
          const p = Math.min((now - start) / duration, 1);
          const eased = 1 - Math.pow(1 - p, 3);
          el.textContent = Math.floor(eased * target).toLocaleString('id-ID');
          if (p < 1) requestAnimationFrame(step);
          else el.textContent = target.toLocaleString('id-ID');
        };
        requestAnimationFrame(step);
        counterIO.unobserve(el);
      }
    });
  }, { threshold: 0.5 });
  counters.forEach(c => counterIO.observe(c));

  /* === Parallax blobs mengikuti mouse === */
  const blobs = document.querySelectorAll('.blob');
  document.querySelector('.hero').addEventListener('mousemove', (e) => {
    const rect = e.currentTarget.getBoundingClientRect();
    const x = (e.clientX - rect.left) / rect.width - 0.5;
    const y = (e.clientY - rect.top) / rect.height - 0.5;
    blobs.forEach((b, i) => {
      const depth = (i + 1) * 14;
      b.style.transform = `translate(${x * depth}px, ${y * depth}px)`;
    });
  });

  /* === Active nav indicator saat scroll === */
  const sections = document.querySelectorAll('section[id]');
  const navAnchors = document.querySelectorAll('.nav-links a');
  window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
      if (window.scrollY >= s.offsetTop - 120) current = s.id;
    });
  });
</script>

</body>
</html>