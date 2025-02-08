<?php include 'header.php'; 

// Fetch dynamic data from your backend
$resumeInfo = [
    "name" => htmlspecialchars($about['name']),
    "profession" => htmlspecialchars($about['profession']),
    "email" => htmlspecialchars($about['email']),
    "phone" => htmlspecialchars($about['phone']),
    "address" => htmlspecialchars($about['address']),
    "skills" => $resume['skills'],
    "education" => $resume['education'],
    "experience" => $resume['experience'],
    "projects" => $resume['projects'],
];
?>

<section id="resume" class="container">

    <div class="row mt-4">
        <!-- Personal Info -->
        <div class="col-md-6">
            <div class="resume-card personal-info">
                <h3>اطلاعات شخصی</h3>
                <ul>
                    <li><strong>نام:</strong> <?= $resumeInfo['name']; ?></li>
                    <li><strong>حرفه:</strong> <?= $resumeInfo['profession']; ?></li>
                    <li><strong>ایمیل:</strong> <?= $resumeInfo['email']; ?></li>
                    <li><strong>تلفن:</strong> <?= $resumeInfo['phone']; ?></li>
                    <li><strong>آدرس:</strong> <?= $resumeInfo['address']; ?></li>
                </ul>
            </div>
        </div>
        <!-- Education -->
        <div class="col-md-6">
            <div class="resume-card">
                <h3>تحصیلات</h3>
                <ul class="resume-list">
                    <?php foreach ($resumeInfo['education'] as $edu): ?>
                        <li>
                            <strong><?= $edu['degree']; ?></strong>
                            <p><?= $edu['institution']; ?> (<?= $edu['graduation_year']; ?>)</p>
                            <p>معدل: <?= $edu['grade']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
    <div class="row mt-4">
        <!-- Skills -->
        <div class="col-md-6">
            <div class="resume-card">
                <h3>مهارت‌ها</h3>
                <ul class="skills-list">
                    <?php foreach ($resumeInfo['skills'] as $skill): ?>
                        <li>
                            <span class="skill-name"><?= htmlspecialchars($skill['name']); ?></span>
                            <div class="progress">
                                <div
                                    class="progress-bar"
                                    role="progressbar"
                                    aria-valuenow="<?= $skill['level']; ?>"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    style="width: <?= $skill['level']; ?>%;">
                                    <?= $skill['level']; ?>%
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <!-- Experience -->
        <div class="col-md-6">
            <div class="resume-card">
                <h3>تجربه کاری</h3>
                <ul class="resume-list">
                    <?php foreach ($resumeInfo['experience'] as $exp): ?>
                        <li>
                            <strong><?= $exp['position']; ?></strong>
                            <p><?= $exp['company']; ?> (از <?= $exp['start_date']; ?> الی <?= $exp['end_date']; ?>)</p>
                            <p class="text-muted"><?= $exp['description']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <!-- Projects -->
        <div class="col-md-12">
            <div class="resume-card">
                <h3>پروژه‌ها</h3>
                <ul class="projects-list">
                    <?php foreach ($resumeInfo['projects'] as $project): ?>
                        <li class="project-item">
                            <!-- Project Details -->
                            <div class="project-details">
                                <h4><?= htmlspecialchars($project['title']); ?></h4>
                                <p><?= htmlspecialchars($project['description']); ?></p>
                                <!-- View More Button -->
                                <a href="single-project/<?= urlencode($project['id']); ?>" class="btn project-btn">جزئیات پروژه</a>
                            </div>
                            <!-- Project Image -->
                            <?php if (!empty($project['image'])): ?>
                                <div class="project-image">
                                    <img src="<?= htmlspecialchars($project['image']); ?>" alt="<?= htmlspecialchars($project['title']); ?>" />
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>



<?php include 'footer.php'; ?>