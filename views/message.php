<?php 
$message = htmlspecialchars($_GET['message']);
$boxClass = '';

if (strpos($message, 'موفقیت') !== false) { 
    $boxClass = 'success'; // Success style
} else {
    $boxClass = 'error'; 
}

include 'header.php';
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Message Box -->
            <div class="message-box <?php echo $boxClass; ?>">
                <div class="icon">
                    <?php if ($boxClass === 'success') : ?>
                        <i class="fas fa-check-circle"></i>
                    <?php else : ?>
                        <i class="fas fa-times-circle"></i>
                    <?php endif; ?>
                </div>
                <h3 class="message-title"><?php echo $message; ?></h3>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to redirect after 3 seconds -->
<script>
    setTimeout(function() {
        window.location.href = 'contact'; // Replace '/home' with your desired URL
    }, 3000); // Redirect after 3 seconds
</script>
