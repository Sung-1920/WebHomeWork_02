<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post"> 
        სახელი: <input type="text" name="name" required>
        <br><br>
        გვარი: <input type="text" name="surname" required>
        <br><br>
        კურსი: <input type="text" name="course" required>
        <br><br>
        სემესტრი: <input type="text" name="semestre" required>
        <br><br>
        სასწავლო კურსი: <input type="text" name="subject" required>
        <br><br>
        მიღებული ნიშანი: <input type="number" name="points" required>
        <br><br>    
        ლექტორის სახელი და გვარი: <input type="text" name="lecturer" required>
        <br><br>
        დეკანის სახელი და გვარი: <input type="text" name="dean" required>
        <br><br>
        <button type="submit">გაგზავნა</button>
</form>

        <?php 
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $name = $_POST["name"];
                $surname = $_POST["surname"];
                $course = $_POST["course"];
                $semestre = $_POST["semestre"];
                $subject = $_POST["subject"];
                $points = $_POST["points"];
                $lecturer = $_POST["lecturer"];
                $dean = $_POST["dean"];
                
                if ($points >= 91){
                    $grade = "A";
                    $description = "ფრიადი";
                }elseif ($points >= 81){
                    $grade = "B"; 
                    $description = "ძალიან კარგი";
                }elseif ($points >= 71){
                    $grade = "C";
                    $description = "კარგი";
                } elseif ($points >= 61){
                    $grade = "D";
                    $description = "დამაკმაყოფილებელი";
                }elseif ($points >= 51){
                    $grade = "E";
                    $description = "საკმარისი";
                }elseif ($points >= 41){
                    $grade = "FX";
                    $description = "საკმარისია გადაბარებისთვის";
                }else{
                    $grade = "F";
                    $description = "ქულა არგეყოთ";
                }

              echo "<table border='1'>";

    echo "<tr><th>ინფორმაცია</th><th>მონაცემი</th></tr>";

        echo "<tr><td>სტუდენტი</td><td>$name $surname</td></tr>";
        echo "<tr><td>კურსი</td><td>$course</td></tr>";
        echo "<tr><td>სემესტრი</td><td>$semestre</td></tr>";
        echo "<tr><td>სასწავლო კურსი</td><td>$subject</td></tr>";
        echo "<tr><td>მიღებული ნიშანი</td><td>$points</td></tr>";
        echo "<tr><td>შეფასება</td><td>$grade - $description</td></tr>";
        echo "<tr><td>ლექტორი</td><td>$lecturer</td></tr>";
        echo "<tr><td>დეკანი</td><td>$dean</td></tr>";

    echo "</table>";  

            
                }
        ?>

</body>
</html>