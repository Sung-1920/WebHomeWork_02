<?php

$message = "";

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $users = file("users.txt");

    $found = false;

        foreach ($users as $user){
            $data = explode(",", trim($user));
            if ($data[0] == $username && $data[1] == $password){
                $message = "მოგესალმებით,". $username. "!";
                $found = true;
            }
        }
    }

    if (!$found){
        $message = "მომხმარებელი ან პაროლი არასწორია!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task_2</title>
</head>
<body>
    <form method="POST">

    <label>მომხმრებლის სახელი: </label>
    <input type="text" name="username">
    <br><br>

    <label>პაროლი: </label>
    <input type="password" name="password">
    <br><br>

    <button type=submit>გაგზავნა</button>

<p><?php echo $message; ?></p>


    </form>
</body>
</html>
