<?php
// public/.router.php
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|ico)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // Serve the requested resource as-is.
} else {
    require_once 'index.php';
}
