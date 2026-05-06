<?php
require_once __DIR__ . '/../src/backend/helpers/auth.php';
startSession();

require_once __DIR__ . '/../src/backend/helpers/actions.php';
require_once __DIR__ . '/../src/backend/helpers/router.php';
?>

<?php include __DIR__ . '/../src/frontend/layouts/header.php'; ?>

<main class="page-wrapper">
    <div class="container">
        <?php include $view_path; ?>
    </div>
</main>

<?php include __DIR__ . '/../src/frontend/layouts/footer.php'; ?>
