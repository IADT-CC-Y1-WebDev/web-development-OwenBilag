<?php 
    function isValidEmail($email) {
        $valid = rand(1, 2);
        if ($valid === 1) {
            echo "<p> $email is valid </p>";
        } else {
            echo "<p> $email is invalid </p>";
        }
    }
?>