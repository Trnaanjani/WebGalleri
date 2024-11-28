<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 4 Bogor</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* General Styles */
        body {
            padding-top: 56px;
        }

        section {
            padding: 60px 0;
        }

        /* Banner Styles */
        .banner-container {
            position: relative;
            overflow: hidden;
        }

        .banner-img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            transition: filter 0.3s ease;
        }

        .banner-img:hover {
            filter: brightness(80%);
        }

        .banner-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            z-index: 2;
        }

        /* Card Styles */
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        /* Section Styles */
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: #003366;
            font-weight: bold;
        }

        /* Footer Style */
        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            margin-top: 40px;
        }

        /* Modal Styles */
        .modal-content {
            border: none;
            border-radius: 10px;
        }

        .modal-header {
            background-color: #003366;
            color: white;
            border-radius: 10px 10px 0 0;
        }

        .modal-body img {
            width: 100%;
            height: auto;
        }

        /* Navigation Styles */
        .nav-pills .nav-link.active {
            background-color: #003366;
        }

        .nav-pills .nav-link {
            color: #003366;
        }

        /* Agenda & Information Cards */
        .info-card {
            height: 100%;
            transition: transform 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
        }

        /* Tambahkan style untuk garis pemisah */
        .nav-item .text-muted {
            padding: 0.5rem 0.25rem;
        }
        
        /* Style untuk link login */
        .nav-item:last-child .nav-link {
            color: #003366;
            transition: color 0.3s ease;
        }
        
        .nav-item:last-child .nav-link:hover {
            color: #0056b3;
        }
        
        /* Spacing untuk ikon login */
        .nav-link i {
            margin-right: 5px;
        }

        /* Gallery Styles */
        .gallery-item .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .gallery-item .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .gallery-item .card-img-wrapper {
            aspect-ratio: 16/9;
        }

        .gallery-item .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .gallery-item .overlay-content {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item .card:hover .overlay-content {
            opacity: 1;
        }

        /* Gallery Navigation Styles */
        #galleryTab .nav-link {
            border-radius: 20px;
            padding: 8px 20px;
            color: #003366;
            background-color: transparent;
            border: 2px solid #003366;
            transition: all 0.3s ease;
        }

        #galleryTab .nav-link:hover {
            background-color: rgba(0, 51, 102, 0.1);
        }

        #galleryTab .nav-link.active {
            background-color: #003366;
            color: white;
        }

        /* Modal Enhancements */
        .modal-content {
            border-radius: 15px;
            overflow: hidden;
        }

        .modal-header {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .modal-footer {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .gallery-card {
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.5s ease forwards;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .lazy-load {
            opacity: 0;
            transition: opacity 0.3s ease-in;
        }

        .lazy-load.loaded {
            opacity: 1;
        }

        .gallery-item {
            transition: all 0.3s ease;
        }

        .animate__fadeIn {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #galleryTab .nav-link {
            margin-bottom: 10px;
        }

        .overlay-content {
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .card:hover .overlay-content {
            transform: translateY(0);
        }

        .gallery-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .gallery-item.show {
            opacity: 1;
            transform: translateY(0);
        }

        .form-select, .form-control {
            border: 2px solid #003366;
            border-radius: 20px;
            padding: 10px 20px;
        }

        .form-select:focus, .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(0, 51, 102, 0.25);
            border-color: #003366;
        }

        .input-group-text {
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 0 20px 20px 0;
        }

        /* Filter Button Styles */
        #galleryFilter {
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }

        #galleryFilter .btn {
            border-radius: 20px;
            padding: 8px 20px;
            margin: 5px;
            transition: all 0.3s ease;
        }

        #galleryFilter .btn-outline-primary {
            color: #003366;
            border-color: #003366;
        }

        #galleryFilter .btn-outline-primary:hover,
        #galleryFilter .btn-outline-primary.active {
            background-color: #003366;
            color: white;
        }

        /* Badge Styles */
        .badge {
            transition: all 0.3s ease;
        }

        .btn-outline-primary .badge {
            background-color: #003366 !important;
        }

        .btn-outline-primary:hover .badge {
            background-color: #fff !important;
            color: #003366;
        }

        .btn-outline-primary.active .badge {
            background-color: #fff !important;
            color: #003366;
        }

        /* Information Card Styles */
        .info-card {
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .info-icon {
            background: #003366;
            color: white;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* Agenda Card Styles */
        .agenda-card {
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .agenda-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .date-badge {
            background: #003366;
            color: white;
            padding: 10px;
            border-radius: 8px;
            display: inline-block;
            text-align: center;
            min-width: 80px;
        }

        .date-badge .month {
            display: block;
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        .date-badge .day {
            display: block;
            font-size: 1.5rem;
            font-weight: bold;
            line-height: 1;
        }

        .event-details {
            color: #666;
            font-size: 0.9rem;
        }

        .detail-item {
            margin-bottom: 5px;
        }

        .event-meta {
            font-size: 0.9rem;
            color: #666;
        }

        /* Modal Enhancements */
        .modal-content {
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .content-wrapper, .event-content {
            line-height: 1.8;
            color: #444;
        }

        .modal .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .modal .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Card Styles */
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #003366 !important;
            border-bottom: none;
            padding: 1rem;
        }

        .card-header h3 {
            font-size: 1.5rem;
            margin: 0;
        }

        .list-group-item {
            border: none;
            padding: 0.75rem 1.25rem;
            position: relative;
            padding-left: 2rem;
        }

        .list-group-item:before {
            content: "•";
            color: #003366;
            position: absolute;
            left: 0.75rem;
        }

        .text-justify {
            text-align: justify;
        }

        /* Map container */
        .ratio-4x3 {
            --bs-aspect-ratio: 75%;
        }

        /* Location info */
        .card-body p i {
            width: 20px;
            text-align: center;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .col-md-6:first-child {
                margin-bottom: 2rem;
            }
        }

        /* About School Styles */
        .about-school {
            padding: 20px 0;
        }

        .about-school h3 {
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            color: #003366;
        }

        .about-school h4 {
            font-size: 1.3rem;
            color: #003366;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .about-school p {
            line-height: 1.8;
            color: #444;
            margin-bottom: 1.5rem;
        }

        .custom-list {
            list-style: none;
            padding-left: 1.5rem;
        }

        .custom-list li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .custom-list li:before {
            content: "•";
            color: #003366;
            position: absolute;
            left: 0;
            font-size: 1.2em;
        }

        .text-justify {
            text-align: justify;
        }

        @media (max-width: 768px) {
            .about-school {
                margin-bottom: 2rem;
            }
        }

        /* Update style untuk section-title */
        .section-title {
            text-align: center;
            color: #003366;
            font-weight: bold;
        }

        /* Khusus untuk judul di about-school, hilangkan center alignment */
        .about-school .section-title {
            text-align: left;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">SMK Negeri 4 Bogor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#information">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#agenda">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link text-muted">|</span>
                    </li>
                    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}"">
            <i class="fas fa-user"></i> Login
        </a>
    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home">
        <!-- Banner -->
        <div class="banner-container">
            <img src="{{ asset('assets/images/smkn4bogor_2.jpg') }}" alt="Banner Image" class="banner-img">
            <div class="banner-text">
                <h1>Selamat Datang di SMKN 4 Bogor</h1>
                <p>Menjadi Lembaga Pendidikan yang Unggul dan Berkarakter</p>
            </div>
        </div>

        <!-- School Information -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-school">
                        <h3 class="section-title mb-4">Tentang Sekolah</h3>
                        <p class="text-justify">SMKN 4 Bogor merupakan sekolah kejuruan berbasis Teknologi Informasi dan Komunikasi. Sekolah ini didirikan dan dirintis pada tahun 2008 kemudian dibuka pada tahun 2009 yang saat ini terakreditasi A. Terletak di Jalan Raya Tajur Kp. Buntar, Muarasari, Bogor.</p>
                        
                        <h4 class="section-title mt-4">Visi</h4>
                        <p class="text-justify">Terwujudnya SMK Pusat Keunggulan melalui terciptanya pelajar pancasila yang berbasis teknologi, berwawasan lingkungan dan berkewirausahaan.</p>
                        
                        <h4 class="section-title mt-4">Misi</h4>
                        <ul class="custom-list">
                            <li>Mewujudkan karakter pelajar Pancasila yang beriman dan bertakwa kepada Tuhan Yang Maha Esa</li>
                            <li>Mengembangkan pembelajaran dan pengelolaan sekolah berbasis TIK</li>
                            <li>Mengembangkan sekolah yang berwawasan Adiwiyata Mandiri</li>
                            <li>Mengembangkan usaha dalam berbagai bidang secara optimal</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header bg-primary text-white">
                            <h3 class="mb-0 text-center">Lokasi Sekolah</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="ratio ratio-4x3">
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15852.187990492366!2d106.8250633!3d-6.6410863!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1683016576212!5m2!1sid!2sid"
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                            <div class="p-3">
                                <h5 class="mb-2">Alamat:</h5>
                                <p class="mb-2">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    Jl. Raya Tajur Kp. Buntar, Muarasari, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137
                                </p>
                                <p class="mb-0">
                                    <i class="fas fa-phone text-primary me-2"></i>
                                    (0251) 8242411
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="bg-light">
        <div class="container">
            <h2 class="section-title mb-5">Galeri Sekolah</h2>
            
            <!-- Search Bar -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="input-group">
                        <input type="text" class="form-control" id="searchGallery" 
                               placeholder="Cari foto...">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Gallery Filter Buttons -->
            <div class="text-center mb-4">
                <div class="btn-group flex-wrap" role="group" id="galleryFilter">
                    <button type="button" class="btn btn-outline-primary active" data-filter="all">
                        Semua Gambar 
                        <span class="badge bg-primary rounded-pill ms-2">
                            {{ $galleries->sum(function($albumGalleries) { 
                                return $albumGalleries->sum(function($gallery) { 
                                    return $gallery->images->count(); 
                                }); 
                            }) }}
                        </span>
                    </button>
                    @foreach ($galleries as $albumTitle => $albumGalleries)
                        <button type="button" class="btn btn-outline-primary" 
                                data-filter="{{ Str::slug($albumTitle) }}">
                            {{ $albumTitle }} 
                            <span class="badge bg-primary rounded-pill ms-2">
                                {{ $albumGalleries->sum(function($gallery) { return $gallery->images->count(); }) }}
                            </span>
                        </button>
                    @endforeach
                </div>
            </div>
            
            <!-- Gallery Content -->
            <div class="row g-4" id="galleryGrid">
                @foreach ($galleries as $albumTitle => $albumGalleries)
                    @foreach ($albumGalleries as $gallery)
                        @foreach ($gallery->images as $image)
                            <div class="col-lg-4 col-md-6 gallery-item" 
                                 data-category="{{ Str::slug($albumTitle) }}"
                                 data-title="{{ $image->tittle ?? '' }}">
                                <div class="card h-100 gallery-card">
                                    <div class="card-img-wrapper position-relative overflow-hidden">
                                        <img src="{{ asset('images/' . $image->file) }}" 
                                             class="card-img-top lazy-load" 
                                             alt="{{ $image->tittle ?? 'Gallery Image' }}"
                                             data-bs-toggle="modal" 
                                             data-bs-target="#imageModal{{ $image->id }}">
                                        <div class="card-img-overlay d-flex align-items-end">
                                            <div class="overlay-content text-white w-100 p-3">
                                                <h6 class="text-white-50 mb-1">{{ $albumTitle }}</h6>
                                                <h5 class="card-title mb-0">{{ $image->tittle ?? 'Untitled' }}</h5>
                                                @if($image->description)
                                                    <p class="card-text small mb-0">
                                                        {{ Str::limit($image->description, 50) }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="imageModal{{ $image->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    {{ $image->tittle }} 
                                                    <small class="text-muted">{{ $albumTitle }}</small>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <img src="{{ asset('images/' . $image->file) }}" 
                                                     class="img-fluid w-100" 
                                                     alt="{{ $image->tittle }}">
                                            </div>
                                            @if($image->description)
                                                <div class="modal-footer">
                                                    <p class="text-muted mb-0">{{ $image->description }}</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endforeach
            </div>
        </div>
    </section>

    
    <!-- Information Section -->
    <section id="information">
        <div class="container">
            <h2 class="section-title">Informasi</h2>
            <div class="row g-4">
                @foreach ($informasi as $info)
                    <div class="col-md-4">
                        <div class="card info-card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center mb-3">
                                    <span class="info-icon rounded-circle me-3">
                                        <i class="fas fa-newspaper"></i>
                                    </span>
                                    <div>
                                        <small class="text-muted d-block">{{ $info->created_at->format('d F Y') }}</small>
                                        <h5 class="card-title mb-0">{{ $info->tittle }}</h5>
                                    </div>
                                </div>
                                <p class="card-text flex-grow-1">{{ Str::limit($info->content, 150) }}</p>
                                <button class="btn btn-outline-primary mt-3 align-self-start" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#infoModal{{ $info->id }}">
                                    <i class="fas fa-arrow-right me-2"></i>Baca Selengkapnya
                                </button>
                            </div>
                        </div>

                        <!-- Enhanced Modal -->
                        <div class="modal fade" id="infoModal{{ $info->id }}">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header align-items-center">
                                        <div>
                                            <h5 class="modal-title mb-1">{{ $info->tittle }}</h5>
                                            <small class="text-muted">
                                                <i class="far fa-calendar-alt me-2"></i>
                                                {{ $info->created_at->format('d F Y') }}
                                            </small>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="content-wrapper">
                                            {{ $info->content }}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Agenda Section -->
    <section id="agenda" class="bg-light">
        <div class="container">
            <h2 class="section-title">Agenda Sekolah</h2>
            <div class="row g-4">
                @foreach ($agenda as $event)
                    <div class="col-md-4">
                        <div class="card agenda-card h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="date-badge mb-3">
                                    <span class="month">{{ $event->created_at->format('M') }}</span>
                                    <span class="day">{{ $event->created_at->format('d') }}</span>
                                </div>
                                <h5 class="card-title">{{ $event->tittle }}</h5>
                                <div class="event-details mb-3">
                                    <div class="detail-item">
                                        <i class="far fa-clock me-2"></i>
                                        <span>{{ $event->created_at->format('H:i') }} WIB</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        <span>SMKN 4 Bogor</span>
                                    </div>
                                </div>
                                <p class="card-text flex-grow-1">{{ Str::limit($event->content, 100) }}</p>
                                <button class="btn btn-primary mt-3" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#agendaModal{{ $event->id }}">
                                    <i class="fas fa-calendar-check me-2"></i>Detail Agenda
                                </button>
                            </div>
                        </div>

                        <!-- Enhanced Modal -->
                        <div class="modal fade" id="agendaModal{{ $event->id }}">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div>
                                            <h5 class="modal-title mb-1">{{ $event->tittle }}</h5>
                                            <div class="event-meta">
                                                <span class="me-3">
                                                    <i class="far fa-calendar-alt me-2"></i>
                                                    {{ $event->created_at->format('d F Y') }}
                                                </span>
                                                <span>
                                                    <i class="far fa-clock me-2"></i>
                                                    {{ $event->created_at->format('H:i') }} WIB
                                                </span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="event-content">
                                            {{ $event->content }}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} SMK Negeri 4 Bogor. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Active navigation highlight
        window.addEventListener('scroll', function() {
            let sections = document.querySelectorAll('section');
            let navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            
            sections.forEach(section => {
                let top = section.offsetTop - 100;
                let bottom = top + section.offsetHeight;
                let scroll = window.scrollY;
                let id = section.getAttribute('id');
                
                if (scroll >= top && scroll < bottom) {
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === '#' + id) {
                            link.classList.add('active');
                        }
                    });
                }
            });
        });
    </script>

    <!-- Add this JavaScript before the closing body tag -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lazy loading images
        const lazyImages = document.querySelectorAll('.lazy-load');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => imageObserver.observe(img));

        // Filter and Search functionality
        const searchInput = document.getElementById('searchGallery');
        const filterButtons = document.querySelectorAll('#galleryFilter .btn');
        const galleryItems = document.querySelectorAll('.gallery-item');
        let currentFilter = 'all';

        // Filter function
        function filterGallery() {
            const searchTerm = searchInput.value.toLowerCase();

            galleryItems.forEach(item => {
                const title = item.dataset.title.toLowerCase();
                const category = item.dataset.category;
                const matchesSearch = title.includes(searchTerm);
                const matchesFilter = currentFilter === 'all' || category === currentFilter;

                if (matchesSearch && matchesFilter) {
                    item.style.display = '';
                    setTimeout(() => {
                        item.classList.add('show');
                    }, 50);
                } else {
                    item.style.display = 'none';
                    item.classList.remove('show');
                }
            });
        }

        // Filter button click handlers
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');
                
                currentFilter = button.getAttribute('data-filter');
                filterGallery();
            });
        });

        // Search input handler
        searchInput.addEventListener('input', filterGallery);

        // Initial animation
        galleryItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add('show');
            }, index * 100);
        });
    });
    </script>
</body>

</html>
