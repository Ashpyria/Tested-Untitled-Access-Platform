<?php
require_once __DIR__ . '/../src/backend/helpers/auth.php';
startSession();

require_once __DIR__ . '/../src/backend/helpers/actions.php';
require_once __DIR__ . '/../src/backend/helpers/router.php';
?>

<?php include __DIR__ . '/../src/frontend/layouts/header.php'; ?>

<?php include $view_path; ?>

<?php include __DIR__ . '/../src/frontend/layouts/footer.php'; ?>
