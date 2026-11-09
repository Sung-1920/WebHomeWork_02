
<?php
    date_default_timezone_set("Asia/Tbilisi");
    session_start();

    if (!isset($_SESSION["questions"])) {
        $_SESSION["questions"] = [];

        for ($i = 0; $i < 3; $i++) {
            $_SESSION["questions"][] = [
                "a" => rand(1, 10),
                "b" => rand(1, 10),
            ];
        }
    }

    $questions = $_SESSION["questions"];
    $message = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"]);
        $score = 0;

        for ($i = 0; $i < 3; $i++) {
            $userAnswer = (int)$_POST["answer" . $i];
            $correctAnswer = $questions[$i]["a"] + $questions[$i]["b"];

            if ($userAnswer === $correctAnswer) {
                $score++;
            }
        }

        $result = date("Y-m-d H:i") . " | " . $username . " | " . $score . "/3";

        $save = file_put_contents(
            __DIR__ . "/results.txt",
            $result . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );

        if ($save !== false) {
            $message = "შენი შედეგია: " . $score . "/3";
        } else {
            $message = "შედეგის შენახვა ვერ მოხერხდა!";
        }

        $_SESSION["questions"] = [];

        for ($i = 0; $i < 3; $i++) {
            $_SESSION["questions"][] = [
                "a" => rand(1, 10),
                "b" => rand(1, 10),
            ];
        }

        $questions = $_SESSION["questions"];
    }
?>

<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task_3</title>
</head>
<body>

    <?php
        if ($message != "") {
            echo "<h3>" . htmlspecialchars($message) . "</h3>";
        }
    ?>

    <form method="POST">

        <label>სახელი:</label>
        <input type="text" name="username" required>
        <br><br>

        <?php
            foreach ($questions as $i => $question) {
                echo $question["a"] . " + " . $question["b"] . " = ?<br>";
                echo '<input type="number" name="answer' . $i . '" required>';
                echo "<br><br>";
            }
        ?>

        <button type="submit">გაგზავნა</button>

    </form>

</body>
</html>
