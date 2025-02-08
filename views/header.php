<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo isset($pageTitle) ? $pageTitle : 'Home'; ?></title>

    <base href="http://localhost/mrmas.com/public/">

    <!-- meta tags for SEO -->
    <meta name="description" content="وبسایت شخصی یک برنامه‌نویس وب، شامل پروژه‌ها، رزومه، و نظرات مشتریان. Personal website of a web developer, showcasing projects, resume, and testimonials.">
    <meta name="keywords" content="برنامه‌نویس وب, نمونه کار, رزومه, پروژه‌ها, Web Developer, Portfolio, Resume, Projects">
    <meta name="author" content="مسعود سیاح پور ، Masoud Sayahpour">

    <!-- Links -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/aria/css/all.min.css">
    <?php if (isset($current_page)): ?>
        <link href="assets/css/<?= htmlspecialchars($current_page) ?>.css" rel="stylesheet">
    <?php endif ?>


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container d-flex justify-content-between align-items-center">

            <!-- Left Section: Logo or Site Name -->
            <a href="home" class="navbar-brand d-flex flex-column align-items-center">
                <span class="logo-text">
                    <span class="logo-primary">MR</span><span class="logo-secondary">Mas.com</span>
                </span>
                <small class="logo-subtitle">A Web Developer</small>
            </a>


            <!-- Middle Section: Navbar Links -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="about">درباره من</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="resume">رزومه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">تماس با من</a>
                    </li>
                </ul>
            </div>

            <!-- Right Section: Social Media Icons -->
            <div class="d-none d-lg-flex">
                <a href="<?= htmlspecialchars($about['discord']); ?>" class="nav-link mx-1" target="_blank">
                    <i class="fab fa-discord"></i>
                </a>
                <a href="<?= htmlspecialchars($about['github']); ?>" class="nav-link mx-1" target="_blank">
                    <i class=" fab fa-github"></i>
                </a>
                <a href="<?= htmlspecialchars($about['telegram']); ?>" class="nav-link mx-1" target="_blank">
                    <i class="fab fa-telegram"></i>
                </a>
                <a href="<?= htmlspecialchars($about['linkedin']); ?>" class="nav-link mx-1" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="mailto:<?= htmlspecialchars($about['email']); ?>" class="nav-link mx-1" target="_blank">
                    <i class="fas fa-envelope"></i>
                </a>

            </div>

            <!-- Toggler for Small Screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>
    <div style="height: 75px;"></div>