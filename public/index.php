<?php
require_once __DIR__ . '/../src/backend/helpers/auth.php';
startSession();

require_once __DIR__ . '/../src/backend/helpers/actions.php';
require_once __DIR__ . '/../src/backend/helpers/router.php';
require_once __DIR__ . '/../src/backend/models/Support.php';

// HANDLE SUPPORT TICKET BEFORE HTML OUTPUT
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'send_ticket') {
    $name     = trim($_POST['ticket_name'] ?? '');
    $email    = trim($_POST['ticket_email'] ?? '');
    $category = trim($_POST['ticket_category'] ?? '');
    $message  = trim($_POST['ticket_message'] ?? '');

    if (!empty($name) && !empty($email) && !empty($category) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $uid = isLoggedIn() ? getCurrentUser()['id'] : null;

        createTicket($uid, $name, $email, $category, $message);

        header('Location: /?page=support&tab=contact&sent=1');
        exit;
    }
}
?>

<?php include __DIR__ . '/../src/frontend/layouts/header.php'; ?>

<?php include $view_path; ?>

<?php include __DIR__ . '/../src/frontend/layouts/footer.php'; ?>