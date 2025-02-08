<?php
include('header.php');
?>

<section id="about-me" class="py-5">
    <div class="container">
        <div class="row">
            <!-- Left Column: Profile Section -->
            <div class="col-lg-4 profile-section">
                <div class="text-center">
                    <!-- Profile Picture -->
                    <div class="profile-img mb-4">
                        <img src="assets/images/profile_pic.jpg" alt="عکس پروفایل <?= htmlspecialchars($about['name'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid rounded-circle" loading="lazy">
                    </div>
                    <!-- Profile Name and Description -->
                    <h2 class="profile-name"><?= htmlspecialchars($about['name'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <p class="profile-description"><?= htmlspecialchars($about['aboutme_description'], ENT_QUOTES, 'UTF-8') ?></p>
                    <!-- Social Media Links -->
                    <div class="social-links">
                        <a href="<?= htmlspecialchars($about['linkedin'], ENT_QUOTES, 'UTF-8') ?>" class="social-icon" target="_blank" aria-label="LinkedIn profile"><i class="fab fa-linkedin"></i></a>
                        <a href="<?= htmlspecialchars($about['telegram'], ENT_QUOTES, 'UTF-8') ?>" class="social-icon" target="_blank" aria-label="Telegram profile"><i class="fab fa-telegram"></i></a>
                        <a href="<?= htmlspecialchars($about['github'], ENT_QUOTES, 'UTF-8') ?>" class="social-icon" target="_blank" aria-label="Github profile"><i class="fab fa-github"></i></a>
                        <a href="<?= htmlspecialchars($about['discord'], ENT_QUOTES, 'UTF-8') ?>" class="social-icon" target="_blank" aria-label="Discord profile"><i class="fab fa-discord"></i></a>
                    </div>
                </div>
            </div>
            <!-- Right Column: info Content Section -->
            <div class="col-lg-8 info-section">
                <!-- Biography Section -->
                <div class="biography-section mb-5">
                    <h3 class="section-title">بیوگرافی</h3>
                    <p><?= htmlspecialchars($about['bio'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>

                <!-- Skills Section -->
                <div class="skills-section mb-5">
                    <h3 class="section-title text-center">مهارتها و توانایی های من</h3>
                    <div class="row">
                        <?php foreach ($skills as $skill): ?>
                            <div class="col-md-6">
                                <h5 class="skill-name"><?= htmlspecialchars($skill['name'], ENT_QUOTES, 'UTF-8') ?></h5>
                                <p class="skill-description"><?= htmlspecialchars($skill['description'], ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Personal Interests Section -->
                <div class="interests-section mb-5">
                    <h3 class="section-title">علایق شخصی</h3>
                    <p class="section-description">مواردی که به آن‌ها علاقه دارم و من را بیشتر به یادگیری و پیشرفت ترغیب می‌کنند:</p>
                    <div class="row">
                        <?php foreach ($interests as $interest): ?>
                            <div class="col-md-6 mb-3">
                                <div class="interest-card p-3 border rounded">
                                    <h5 class="interest-title"><?= htmlspecialchars($interest['title'], ENT_QUOTES, 'UTF-8'); ?></h5>
                                    <p class="interest-description"><?= htmlspecialchars($interest['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Testimonials Section -->
                <div class="testimonials-section mb-5">
                    <h3 class="section-title">نظرات همکاران و مشتریان</h3>
                    <div class="row">
                        <?php if (!empty($testimonials) && count($testimonials) > 2): ?>
                            <?php foreach ($testimonials as $testimonial): ?>
                                <div class="col-md-4">
                                    <div class="testimonial-card">
                                        <p class="testimonial-message">"<?= htmlspecialchars($testimonial['message'], ENT_QUOTES, 'UTF-8') ?>"</p>
                                        <h5 class="testimonial-author"><?= htmlspecialchars($testimonial['name'], ENT_QUOTES, 'UTF-8') ?></h5>
                                        <p class="testimonial-role"><?= htmlspecialchars($testimonial['role'], ENT_QUOTES, 'UTF-8') ?>, <?= htmlspecialchars($testimonial['url'], ENT_QUOTES, 'UTF-8') ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="col-md-12">
                                <p class="text-center text-muted">
                                    در حال حاضر هیچ نظری وجود ندارد. اولین نفری باشید که نظر خود را ثبت می‌کنید!
                                </p>
                                <div class="text-center mt-3">
                                    <a href="testimonials" class="btn btn-primary">ثبت نظر</a>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php
include('footer.php');
?>