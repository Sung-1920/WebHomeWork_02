<?php
    $randomNumbers = [];

    if (isset($_POST["quantity"]) && isset($_POST["maximum"]) && $_POST["quantity"] > 0 && $_POST["maximum"] > 0) {
        $quantity = (int)$_POST["quantity"];
        $maximum = (int)$_POST["maximum"];
        
        for ($i = 0; $i < $quantity; $i++){
            $random = rand(1, $maximum);
            $randomNumbers[] = $random;

          
            

      
    
    }
    $sum = array_sum($randomNumbers);
    $average = $sum / $quantity;
    $log = "რიცხვები: ". implode(", ", $randomNumbers). "საშვალო: ". $average; 
    file_put_contents("test.txt", $log);
    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task_1</title>
</head>
<body>
    <form method="POST">
        <label>რიცხვების რაოდენობა: </label>
        <input type="number" name="quantity" min="1">
        <br><br>
        <label>რიცხვების ზღვარი: </label>
        <input type="number" name="maximum" min="1">
        <br><br>
        <button type="submit">გენერირება</button>
    </form>
    
    <?php 

    if (isset($average)){
            echo "რანდომ რიცხვები: ";
    
      foreach ($randomNumbers as $random) {
      echo $random. " ";
    }
    echo "საშუალო არითმეტიკული: ";
    echo $average;
    }

?>
  

</body>
</html>
