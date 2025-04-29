<!-- footer.php -->
</div> <!-- Penutup container -->

<!-- <footer class="footer mt-5 py-4 bg-dark text-white"> -->
    <!-- <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5><i class="bi bi-book me-2"></i> Sistem Akademik</h5>
                <p class="mb-0">Aplikasi manajemen data akademik berbasis web dengan PHP OOP dan MySQL</p>
            </div>
            <div class="col-md-3">
                <h5>Menu</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-muted">Mahasiswa</a></li>
                    <li class="nav-item mb-2"><a href="index_jurusan.php" class="nav-link p-0 text-muted">Jurusan</a></li>
                    <li class="nav-item mb-2"><a href="index_matkul.php" class="nav-link p-0 text-muted">Mata Kuliah</a></li>
                    <li class="nav-item mb-2"><a href="index_nilai.php" class="nav-link p-0 text-muted">Nilai</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Kontak</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">
                            <i class="bi bi-envelope me-2"></i> email@example.com
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">
                            <i class="bi bi-telephone me-2"></i> +62 123 4567 890
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-muted">
                            <i class="bi bi-geo-alt me-2"></i> Kota, Indonesia
                        </a>
                    </li>
                </ul>
            </div> -->
        <!-- </div>
        
        <div class="d-flex justify-content-between pt-4 mt-4 border-top">
            <p>&copy; <?= date('Y') ?> Sistem Akademik. All rights reserved.</p>
            <div class="social-icons">
                <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white"><i class="bi bi-github"></i></a>
            </div>
        </div>
    </div> -->
<!-- </footer> -->

<!-- Back to Top Button -->
<a href="#" class="btn btn-primary back-to-top" id="backToTop">
    <i class="bi bi-arrow-up"></i>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Back to top button
    const backToTop = document.getElementById('backToTop');
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });
    
    // Tooltip initialization
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>
</body>
</html>