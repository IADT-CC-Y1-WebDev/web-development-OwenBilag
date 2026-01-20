<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statements Exercises - PHP Introduction</title>
    <link rel="stylesheet" href="/exercises/css/style.css">
</head>
<body>
    <div class="back-link">
        <a href="index.php">&larr; Back to PHP Introduction</a>
        <a href="/examples/01-php-introduction/02-statements.php">View Example &rarr;</a>
    </div>

    <h1>Statements Exercises</h1>

    <!-- Exercise 1 -->
    <h2>Exercise 1: Age Classifier</h2>
    <p>
        <strong>Task:</strong> 
        Create a variable for age. Use if/else statements to classify and 
        display the age group: "Child" (0-12), "Teenager" (13-19), "Adult" 
        (20-64), or "Senior" (65+).
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here

        $age = 19;
        $ageGroup;

        if ($age <= 12 && $age >= 0) {
            $ageGroup = "Child";
        } else if($age >= 13 && $age <= 19) {
            $ageGroup = "Teenager";
        } else if($age >= 20 && $age <= 64) {
            $ageGroup = "Adult";
        } else {
            $ageGroup = "Senior";
        }

        echo "Your age is $age and your age group is $ageGroup";
        ?>
    </div>

    <!-- Exercise 2 -->
    <h2>Exercise 2: Day of the Week</h2>
    <p>
        <strong>Task:</strong> 
        Create a variable for the day of the week (use a number 1-7). Use 
        a switch statement to display whether it's a "Weekday" or "Weekend", 
        and the day name.
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here

        $weekDay = rand(1,7);

        switch ($weekDay) {
            case 1: 
                echo "Today is Monday" . " Today is a weekday<br/>";
                break;
            case 2: 
                echo "Today is Tuesday" . " Today is a weekday<br/>";
                break;
            case 3: 
                echo "Today is Wednesday" . " Today is a weekday<br/>";
                break;
            case 4: 
                echo "Today is Thursday" . " Today is a weekday<br/>";
                break;
            case 5: 
                echo "Today is Friday" . " Today is a weekday<br/>";
                break;
            case 6: 
                echo "Today is Saturday" . " Today is a weekend<br/>";
                break;
            case 7: 
                echo "Today is Sunday" . " Today is a weekend<br/>";
                break;
        }
        ?>
    </div>

    <!-- Exercise 3 -->
    <h2>Exercise 3: Multiplication Table</h2>
    <p>
        <strong>Task:</strong> 
        Use a for loop to create a multiplication table for a number of your 
        choice (1 through 10). Display each line in the format "X × Y = Z".
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here

        $x = rand(1, 10);

        for ($i = 0; $i <= 10; $i++) {
            $z = $x * $i;
            echo "<p> $x x $i = $z </p>";
        }
        ?>
    </div>

    <!-- Exercise 4 -->
    <h2>Exercise 4: Countdown Timer</h2>
    <p>
        <strong>Task:</strong> 
        Create a countdown from 10 to 0 using a while loop. Display each number, 
        and when you reach 0, display "Blast off!"
    </p>

    <p class="output-label">Output:</p>
    <div class="output">
        <?php
        // TODO: Write your solution here

        $time = 10;

        while($time > 0) {
            echo "<p>$time!</p>";
            $time = $time - 1;
        } 

        echo "Blast Off!"
        ?>
    </div>

</body>
</html>
