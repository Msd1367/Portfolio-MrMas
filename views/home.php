<?php
include('header.php');
?>

<!-- Hero Section -->
<section id="hero" class="hero text-white py-5">
    <div class="container">
        <div class="row">
            <!-- Left Column: Empty for spacing -->
            <div class="col-lg-6 d-none d-lg-block"></div>
            <!-- Right Column: Content -->
            <div class="col-lg-6 text-lg-center ">
                <h1 class="display-3 hero-title">ساخت وبسایت‌های مدرن و واکنش‌گرا</h1>
                <p class="lead hero-subtitle">تخصص من طراحی و توسعه وبسایت‌های حرفه‌ای با استفاده از HTML, CSS, JavaScript, PHP، و تکنولوژی‌های مدرن برای رشد کسب‌وکار شما است.</p>
                <a href="contact" class="btn btn-primary btn-lg hero-btn">شروع همکاری</a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container">
        <!-- Section Title -->
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h3 class="about-title">مختصر اطلاعاتی درباره من</h3>
                <p class="about-lead"><?= htmlspecialchars($about['home_summary'], ENT_QUOTES, 'UTF-8') ?></p>
            </div>
        </div>
        <!-- Cards -->
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="about-card">
                    <i class="fa fa-bullseye about-icon"></i>
                    <h4 class="about-heading">اهداف</h4>
                    <p><?= htmlspecialchars($about['home_mission_statement'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="about-card">
                    <i class="fa fa-eye about-icon"></i>
                    <h4 class="about-heading">چشم‌انداز</h4>
                    <p><?= htmlspecialchars($about['home_vision'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
            </div>
        </div>
        <!-- Call-to-Action Button -->
        <div class="row mt-4">
            <div class="col-lg-12">
                <a href="contact" class="btn btn-primary btn-lg cta-button"> تماس با من</a>
            </div>
        </div>
    </div>
</section>

<!-- Resume Section -->
<section id="resume" class="py-5">
    <div class="container">
        <h2 class="text-right mb-4">رزومه کاری من در یک نگاه:</h2> <br/>
        <div class="row justify-content-center">
            <!-- Education -->
            <div class="col-md-4">
                <div class="resume-card">
                    <h4>تحصیلات</h4>
                    <ul>
                        <?php foreach ($shortResume["education"] as $edu) : ?>
                            <li>
                                <strong><?= htmlspecialchars($edu["degree"], ENT_QUOTES, 'UTF-8') ?></strong><br>
                                <em>موسسه: <?= htmlspecialchars($edu["institution"], ENT_QUOTES, 'UTF-8') ?></em><br>
                                <span>سال اتمام: <?= htmlspecialchars($edu["graduation_year"], ENT_QUOTES, 'UTF-8') ?></span><br>
                                <p>معدل: <?= htmlspecialchars($edu["grade"], ENT_QUOTES, 'UTF-8') ?></p>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <!-- Experience -->
            <div class="col-md-4">
                <div class="resume-card">
                    <h4>تجربیات کاری</h4>
                    <ul>
                        <?php foreach ($shortResume["experience"] as $xp) : ?>
                            <li>
                                <strong><?= htmlspecialchars($xp["position"], ENT_QUOTES, 'UTF-8') ?></strong><br>
                                <em>شرکت: <?= htmlspecialchars($xp["company"], ENT_QUOTES, 'UTF-8') ?></em><br>
                                <span>مدت همکاری: <?= htmlspecialchars($xp["start_date"], ENT_QUOTES, 'UTF-8') . " - " . htmlspecialchars($xp["end_date"], ENT_QUOTES, 'UTF-8') ?></span><br>
                                <p>توضیحات: <?= htmlspecialchars($xp["description"], ENT_QUOTES, 'UTF-8') ?></p>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <!-- Skills Section -->
            <div class="col-md-4">
                <div class="resume-card">
                    <h4>مهارت‌ها</h4><br />
                    <div class="skills">
                        <?php foreach ($shortResume["skills"] as $skill) : ?>
                            <div class="progress" role="progressbar"
                                aria-label="<?= htmlspecialchars($skill['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                aria-valuenow="<?= htmlspecialchars($skill['level'], ENT_QUOTES, 'UTF-8'); ?>"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                style="height: 25px">
                                <div class="progress-bar"
                                    style="width: <?= htmlspecialchars($skill['level'], ENT_QUOTES, 'UTF-8') . "%"; ?>">
                                    <?= htmlspecialchars($skill['name'], ENT_QUOTES, 'UTF-8') . " - " . htmlspecialchars($skill['level'], ENT_QUOTES, 'UTF-8') . "%"; ?>
                                </div>
                            </div><br />
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container projects " >
        <h2 class="mb-4">پروژه‌ها</h2>
        <div class="row">
            <?php foreach ($shortResume["projects"] as $project) : ?>
                <?php
                $image_path = 'assets/images/projects/' . $project['pic_name'];
                if (!file_exists($image_path)) {
                    error_log("Image not found: " . $project['pic_name']);
                    $image_path = 'assets/images/projects/error_loading_project_img.jpg';
                }
                ?>
                <div class="col-md-5">
                    <div class="project-card">
                        <img src="<?= htmlspecialchars($image_path, ENT_QUOTES, 'UTF-8') ?>" class="card-img-top" alt="<?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?></h5>
                            <p class="card-text"><?= htmlspecialchars($project['description'], ENT_QUOTES, 'UTF-8') ?></p>
                            <?php if (isset($project['url'])) : ?>
                                <p class="card-text">لینک پروژه: <a href="<?= htmlspecialchars($project['url'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" class="project-links"><?= htmlspecialchars($project['url'], ENT_QUOTES, 'UTF-8') ?></a></p>
                            <?php endif ?>
                            <a href="single-project/<?= htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8') ?>" class="btn btn-primary">مشاهده پروژه</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <a href="resume" class="colored-box">برای مطالعه کامل رزمه اینجا کلیک کنید</a>
</section>
<?php if (!empty($testimonials) && count($testimonials) > 2): ?>
    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">نظرات مشتریان</h2>
            <div class="row">
                <?php foreach ($testimonials as $testimonial): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <blockquote class="blockquote">
                                    <p class="mb-0"><?= htmlspecialchars($testimonial['message'], ENT_QUOTES, 'UTF-8'); ?></p><br />
                                    <h3 class="blockquote-footer"><?= htmlspecialchars($testimonial['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                    <h6 class="blockquote-footer">
                                        <?= htmlspecialchars($testimonial['role'], ENT_QUOTES, 'UTF-8'); ?>
                                        <?= htmlspecialchars($testimonial['url'], ENT_QUOTES, 'UTF-8'); ?>
                                    </h6>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="text-center mt-3">
                <a href="testimonials" class="btn btn-primary">ثبت نظر</a>
        </div>
    </section>
<?php else: ?>
    <!-- No Testimonials Message -->
    <section id="testimonials" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">نظرات مشتریان</h2>
            <p class="text-center text-muted">
                در حال حاضر هیچ نظری وجود ندارد. اولین نفری باشید که نظر خود را ثبت می‌کنید!
            </p>
            <div class="text-center mt-3">
                <a href="testimonials" class="btn btn-primary">ثبت نظر</a>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php include('footer.php'); ?>