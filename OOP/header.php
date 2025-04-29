<!-- header.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Akademik' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 700;
            color: #2c3e50 !important;
        }
        .nav-link {
            position: relative;
            margin: 0 5px;
            font-weight: 500;
            color: #34495e !important;
        }
        .nav-link:hover {
            color: #2980b9 !important;
        }
        .nav-link.active {
            color: #2980b9 !important;
            font-weight: 600;
        }
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #2980b9;
            border-radius: 3px;
        }
        .navbar-toggler {
            border: none;
            box-shadow: none !important;
        }
        .dropdown-menu {
            border: none;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        }
        .footer {
        background-color: #2c3e50;
    }
    
    .back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.3s;
        z-index: 99;
    }
    
    .back-to-top.show {
        opacity: 1;
    }
    
    .nav-link.text-muted:hover {
        color: #fff !important;
    }
    
    .social-icons a {
        transition: all 0.3s;
    }
    
    .social-icons a:hover {
        transform: translateY(-3px);
        color: #3498db !important;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="bi bi-book me-2"></i>
                <span>Sistem Akademik</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" 
                           href="index.php">
                           <i class="bi bi-people-fill me-1"></i> Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index_jurusan.php' ? 'active' : '' ?>" 
                           href="index_jurusan.php">
                           <i class="bi bi-building me-1"></i> Jurusan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index_matkul.php' ? 'active' : '' ?>" 
                           href="index_matkul.php">
                           <i class="bi bi-journal-bookmark-fill me-1"></i> Mata Kuliah
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index_nilai.php' ? 'active' : '' ?>" 
                           href="index_nilai.php">
                           <i class="bi bi-clipboard-data me-1"></i> Nilai
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex">
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="https://www.ancient.web.id/"><i class="bi bi-person me-2"></i> Profil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">