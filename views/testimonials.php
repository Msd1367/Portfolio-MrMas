<?php include 'header.php'; ?>

<section id="testimonials-page" class="py-5">
    <div class="container">
        <!-- Section Header -->
        <div class="row mb-5 text-center">
            <h2 class="section-title">نظرات مشتریان</h2>
            <p class="section-description">
                در این بخش می‌توانید نظرات مشتریان را مشاهده کنید.
            </p>
        </div>

        <!-- Testimonials -->
        <div class="testimonials-wrapper">
            <?php if (!empty($testimonials)): ?>
                <?php
                // Pagination Logic
                $testimonialsPerPage = 3;
                $totalTestimonials = count($testimonials);
                $totalPages = ceil($totalTestimonials / $testimonialsPerPage);
                $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $currentPage = max(1, min($totalPages, $currentPage));
                $startIndex = ($currentPage - 1) * $testimonialsPerPage;

                // Fetch Testimonials for Current Page
                $pageTestimonials = array_slice($testimonials, $startIndex, $testimonialsPerPage);
                ?>

                <?php foreach ($pageTestimonials as $index => $testimonial): ?>
                    <div class="testimonial-row <?= $index % 2 === 0 ? 'odd' : 'even' ?>">
                        <!-- Photo & Info -->
                        <div class="photo-side text-center">
                            <img src="assets/images/testimonials/<?= htmlspecialchars($testimonial['photo'], ENT_QUOTES, 'UTF-8') ?>" 
                                 alt="<?= htmlspecialchars($testimonial['name'], ENT_QUOTES, 'UTF-8') ?>" 
                                 class="testimonial-photo">
                            <div class="testimonial-info">
                                <p class="testimonial-role"><?= htmlspecialchars($testimonial['position'], ENT_QUOTES, 'UTF-8') ?></p>
                                <p class="testimonial-company"><?= htmlspecialchars($testimonial['company'], ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="content-side text-center">
                            <div class="testimonial-message scrollable">
                                "<?= htmlspecialchars($testimonial['message'], ENT_QUOTES, 'UTF-8') ?>"
                            </div>
                            <div class="testimonial-rating" data-rating="<?= htmlspecialchars($testimonial['rating'], ENT_QUOTES, 'UTF-8') ?>"></div>
                            <p class="testimonial-date"><?= htmlspecialchars($testimonial['created_at'], ENT_QUOTES, 'UTF-8') ?></p>
                            <a href="<?= htmlspecialchars($testimonial['link'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" class="testimonial-link">
                                <?= htmlspecialchars($testimonial['link'], ENT_QUOTES, 'UTF-8') ?>
                            </a>
                        </div>
                    </div>
                    <!-- Divider Line -->
                    <?php if ($index < count($pageTestimonials) - 1): ?>
                        <div class="divider-line"></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-muted">
                    در حال حاضر هیچ نظری وجود ندارد. اولین نفری باشید که نظر خود را ثبت می‌کنید!
                </p>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
            <nav class="pagination-nav mt-4">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i === $currentPage ? 'active' : ''; ?>">
                            <a class="page-link" href="testimonials/<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</section>

<?php include 'footer.php'; ?>
