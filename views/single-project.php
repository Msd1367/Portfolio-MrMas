<?php include 'header.php'; ?>

<div class="project-container">

    <!-- Content Section -->
    <div class="project-content">
        <!-- Scrollable Description -->
        <div class="description">
            <h2>توضیحات</h2>
            <p><?= htmlspecialchars($project['description'], ENT_QUOTES, 'UTF-8') ?></p>
        </div>

        <!-- Container for project details -->
        <div class="project-details">
            <!-- Top part: Title and Links -->
            <div class="top-section">
                <h1><?= htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') ?></h1>
                <div class="links">
                    <a href="<?= htmlspecialchars($project['url'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" class="btn">لینک پروژه</a>
                </div>
            </div>

            <!-- Bottom part: Screenshot -->
            <div class="bottom-section">
                <img src="assets/images/projects/<?= htmlspecialchars($project['pic_name'], ENT_QUOTES, 'UTF-8') ?>" alt="Project Screenshot" class="screenshot">
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>