<footer class="bg-dark text-white py-3">
    <script src="assets/js/main.js"></script>
    <script src="assets/js/<?= htmlspecialchars($current_page) ?>.js"></script>
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <!-- Logo -->
        <div class="text-center">
            <a href="home" class="navbar-brand d-flex flex-column align-items-center mb-2">
                <span class="logo-text">
                    <span class="logo-primary">MR</span><span class="logo-secondary">Mas.com</span>
                </span>
            </a>
        </div>

        <!-- Personal Info -->
        <div class="text-center">
            <p class="mb-1"><?= htmlspecialchars($about['name']); ?></p>
            <p class="mb-1 small"><a href="mailto:<?= htmlspecialchars($about['email']); ?>" class="text-white"><?= htmlspecialchars($about['email']); ?></a></p>
            <p class="mb-0 small"><a href="tel:<?= htmlspecialchars($about['phone']); ?>" class="text-white"><?= htmlspecialchars($about['phone']); ?></a></p>
        </div>

        <!-- Social Links -->
        <div class="social-links d-flex justify-content-center">
            <a href="<?= htmlspecialchars($about['discord']); ?>" class="text-white mx-2"><i class="fab fa-discord"></i></a>
            <a href="<?= htmlspecialchars($about['github']); ?>" class="text-white mx-2"><i class="fab fa-github"></i></a>
            <a href="<?= htmlspecialchars($about['telegram']); ?>" class="text-white mx-2"><i class="fab fa-telegram"></i></a>
            <a href="<?= htmlspecialchars($about['linkedin']); ?>" class="text-white mx-2"><i class="fab fa-linkedin"></i></a>
        </div>
    </div>
    </br>
    <!-- Copyright -->
    <div class="text-center mt-2">
        <p class="mb-0">تمام حقوق محفوظ است &copy; 2024</p>
    </div>
</footer>