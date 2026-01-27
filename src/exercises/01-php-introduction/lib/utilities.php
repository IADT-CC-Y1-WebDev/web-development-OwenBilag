<?php
function truncate($text, $length) {
    echo '<p>' . substr($text, $length) . '</p>';
}

function formatPrice($amount) {
    echo "<p> £" . $amount . '</p>';
}

function getCurrentYear() {
    echo "<p> 2026 </p>";
}
?>