            <!-- Right Column: Form -->
            <div class="col-md-4 form-column">
                <div class="sticky-form">
                    <h3 class="section-title text-center">ارسال نظر شما</h3>
                    <form action="testimonials/submit" method="POST" enctype="multipart/form-data" class="testimonial-form">
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="نام خود را وارد کنید" required>
                        </div>
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="ایمیل خود را وارد کنید" required>
                        </div>
                        <div class="form-group">
                            <label for="photo">عکس</label>
                            <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="position">موقعیت</label>
                            <input type="text" id="position" name="position" class="form-control" placeholder="موقعیت شغلی خود را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="company">شرکت</label>
                            <input type="text" id="company" name="company" class="form-control" placeholder="نام شرکت را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="link">لینک</label>
                            <input type="url" id="link" name="link" class="form-control" placeholder="لینک مرتبط را وارد کنید">
                        </div>
                        <div class="form-group">
                            <label for="rating">رتبه</label>
                            <select id="rating" name="rating" class="form-control">
                                <option value="5">5 - عالی</option>
                                <option value="4">4 - خیلی خوب</option>
                                <option value="3">3 - خوب</option>
                                <option value="2">2 - متوسط</option>
                                <option value="1">1 - ضعیف</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">نظر شما</label>
                            <textarea id="message" name="message" rows="4" class="form-control" placeholder="نظر خود را وارد کنید" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn testimonial-btn">ارسال نظر</button>
                        </div>
                    </form>
                </div>
            </div>





            <?php include 'header.php'; ?>

<section id="testimonials-page" class="py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="section-title">نظرات مشتریان</h2>
                <p class="section-description">
                    در این بخش می‌توانید نظرات مشتریان را مشاهده کنید و نظر خود را نیز ارسال نمایید.
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="owl-scroll-wrapper">
                    <div class="owl-scroll-content">
                        <?php if (!empty($testimonials)): ?>
                            <?php foreach ($testimonials as $testimonial): ?>
                                <div class="testimonial-card">
                                    <img src="assets/images/testimonials<?= htmlspecialchars($testimonial['photo'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($testimonial['name'], ENT_QUOTES, 'UTF-8') ?>" class="testimonial-photo mb-3">
                                    <p class="testimonial-message">"<?= htmlspecialchars($testimonial['message'], ENT_QUOTES, 'UTF-8') ?>"</p>
                                    <h5 class="testimonial-author"><?= htmlspecialchars($testimonial['name'], ENT_QUOTES, 'UTF-8') ?></h5>
                                    <p class="testimonial-role"><?= htmlspecialchars($testimonial['position'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <p class="testimonial-company"><?= htmlspecialchars($testimonial['company'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <p class="testimonial-date"><?= htmlspecialchars($testimonial['created_at'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <p class="testimonial-rating">Rating: <?= htmlspecialchars($testimonial['rating'], ENT_QUOTES, 'UTF-8') ?>/5</p>
                                    <p class="testimonial-link"><a href="<?= htmlspecialchars($testimonial['link'], ENT_QUOTES, 'UTF-8') ?>" target="_blank"><?= htmlspecialchars($testimonial['link'], ENT_QUOTES, 'UTF-8') ?></a></p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-center text-muted">
                                در حال حاضر هیچ نظری وجود ندارد. اولین نفری باشید که نظر خود را ثبت می‌کنید!
                            </p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>



/* Testimonials Page Layout */
#testimonials-page {
    background-color: #f9f9f9;
    color: #333;
}

/* Section Title */
#testimonials-page .section-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #007bff;
    margin-bottom: 1.5rem;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
}

/* Section Description */
#testimonials-page .section-description {
    font-size: 1.2rem;
    color: #555;
    margin-bottom: 2.5rem;
    text-align: center;
}

/* Owl Scroll Container */
.owl-scroll-wrapper {
    position: relative;
    overflow-x: auto;
    display: flex;
    scroll-behavior: smooth;
}

.owl-scroll-content {
    display: flex;
    padding: 10px 0;
}

.testimonial-card {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin-right: 20px; /* Spacing between items */
    transition: transform 0.3s ease-in-out;
    width: 300px; /* Fixed width for each item */
}

.testimonial-card:hover {
    transform: translateY(-10px);
}

.testimonial-card::before {
    content: "“";
    font-size: 4rem;
    color: #007bff;
    position: absolute;
    top: -20px;
    left: 20px;
    opacity: 0.1;
}

/* Testimonial Photo */
.testimonial-photo {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px;
}

.testimonial-message {
    font-style: italic;
    color: #555;
    margin-bottom: 10px;
}

.testimonial-author {
    font-weight: bold;
    color: #333;
}

.testimonial-role,
.testimonial-company,
.testimonial-date,
.testimonial-rating,
.testimonial-link a {
    font-size: 0.9rem;
    color: #777;
}

.testimonial-link a {
    color: #007bff;
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
    .testimonial-card {
        padding: 15px;
        width: 250px; /* Adjust size for mobile */
    }

    .testimonial-photo {
        width: 60px;
        height: 60px;
    }
}
