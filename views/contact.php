<?php 

include 'header.php'; 

// Start session to store the form load time
session_start();
if (!isset($_SESSION['form_load_time'])) {
    $_SESSION['form_load_time'] = time();
}

?>

<section id="contact">
  <div class="container">
    <div class="row justify-content-center contact-form">
      <div class="col-md-12 text-center mb-4">
        <h2 class="contact-title">ارتباط با من</h2>
        <p class="contact-lead">
          اگر سوالی دارید یا می‌خواهید پیام دهید، فرم زیر را پر کنید و یا از طریق یکی از راه‌های ارتباطی زیر با من تماس بگیرید. من در اسرع وقت پاسخ می‌دهم.
        </p>
      </div>
      <!-- Contact Info -->
      <div class="col-md-4 contact-info text-end">
        <h3>اطلاعات تماس</h3>
        <p><strong>آدرس: </strong><?= htmlspecialchars($about['address']); ?></p>
        <p><strong>تلفن: </strong><?= htmlspecialchars($about['phone']); ?></p>
        <p><strong>ایمیل: </strong><?= htmlspecialchars($about['email']); ?></p>
        <p><strong>شبکه‌های اجتماعی:</strong></p>
        <div class="social-links text-center">
          <a href="<?= htmlspecialchars($about['linkedin'], ENT_QUOTES, 'UTF-8') ?>" class="social-icon" target="_blank" aria-label="LinkedIn profile"><i class="fab fa-linkedin"></i></a>
          <a href="<?= htmlspecialchars($about['telegram'], ENT_QUOTES, 'UTF-8') ?>" class="social-icon" target="_blank" aria-label="Telegram profile"><i class="fab fa-telegram"></i></a>
          <a href="<?= htmlspecialchars($about['github'], ENT_QUOTES, 'UTF-8') ?>" class="social-icon" target="_blank" aria-label="Github profile"><i class="fab fa-github"></i></a>
          <a href="<?= htmlspecialchars($about['discord'], ENT_QUOTES, 'UTF-8') ?>" class="social-icon" target="_blank" aria-label="Discord profile"><i class="fab fa-discord"></i></a>
        </div>
      </div>
      <!-- Contact Form -->
      <div class="col-md-8">
        <form action="contact/submit" method="POST">
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="name">نام</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="نام خود را وارد کنید" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="email">ایمیل</label>
              <input type="email" id="email" name="email" class="form-control" placeholder="ایمیل خود را وارد کنید" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="phone">شماره تماس</label>
              <input type="tel" id="phone" name="phone" class="form-control text-end" placeholder="شماره خود را وارد کنید" pattern="^[0-9]{11}$" title="لطفا شماره  تلفن همراه خود را بدون کد کشور وارد کنید">
            </div>
            <div class="col-md-12 form-group">
              <label for="message">پیام</label>
              <textarea id="message" name="message" class="form-control" rows="12" placeholder="پیام خود را اینجا بنویسید" required></textarea>
            </div>
          </div>
          <input type="hidden" name="FLT" value="<?php echo $_SESSION['FLT']; ?>">
          <div class="text-center mt-3">
            <button type="submit" class="btn contact-btn btn-primary">ارسال پیام</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>