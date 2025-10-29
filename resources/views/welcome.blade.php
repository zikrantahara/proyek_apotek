<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Aplikasi Apotek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f4f7f6;
        }
        .content-wrapper {
            flex: 1;
        }
        .navbar-brand {
            font-weight: 600;
        }
        .card-link {
            text-decoration: none;
            color: inherit;
        }
        .card-link:hover .card {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            height: 100%;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .card-title {
            color: #0d6efd;
        }
        
        /* Style untuk link ikon sosial media */
        .footer-social-icon {
            text-decoration: none; 
            transition: color 0.2s;
        }
        .footer-social-icon:hover {
            color: #adb5bd !important;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Sistem Informasi Apotek
            </a>
        </div>
    </nav>

    <div class="content-wrapper">
        <div class="container mt-5">
            
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2>Selamat Datang di Dasbor Utama</h2>
                    <p class="text-muted">Proyek Tengah Semester - Teknologi Sistem Terintegrasi</p>
                </div>
            </div>

            <div class="row g-4">
                
                <div class="col-md-4">
                    <a href="{{ route('pelanggan.index') }}" class="card-link">
                        <div class="card text-center shadow-sm">
                            <div class="card-body py-5">
                                <h4 class="card-title">Data Pelanggan</h4>
                                <p class="card-text">Kelola data pelanggan apotek.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('staf.index') }}" class="card-link">
                        <div class="card text-center shadow-sm">
                            <div class="card-body py-5">
                                <h4 class="card-title">Data Staf Apotek</h4>
                                <p class="card-text">Kelola data staf dan karyawan.</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('obat.index') }}" class="card-link">
                        <div class="card text-center shadow-sm">
                            <div class="card-body py-5">
                                <h4 class="card-title">Data Obat</h4>
                                <p class="card-text">Kelola daftar dan stok obat.</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div> 
        </div> 
    </div> 


    <footer class="bg-dark text-white pt-4 pb-3 mt-auto">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-md-7 mb-3 mb-md-0">
                    <h5 class="mb-1">Sistem Informasi Apotek</h5>
                    <p class="mb-0 small text-white-50">© 2025 Proyek Tengah Semester - TST</p>
                </div>
                
                <div class="col-md-5 text-md-end">
                    <a href="https://www.instagram.com/zikrantahara/" class="text-white me-3 fs-2 footer-social-icon" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://id.linkedin.com/in/zikrantahara" class="text-white me-3 fs-2 footer-social-icon" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="https://wa.me/6288262653778" class="text-white fs-2 footer-social-icon" title="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>