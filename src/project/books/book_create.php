<?php 
    // Require Lib Files
    require_once './lib/config.php';
    require_once './lib/session.php';
    require_once './lib/forms.php';
    require_once './lib/utils.php';

    // Start Session
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
    }
?>