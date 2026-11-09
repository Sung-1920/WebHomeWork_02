<?php
    $products = [
    [
        "id" => 1,
        "name" => "Laptop",
        "category" => "electronics",
        "price" => 1500
    ],
    [
        "id" => 2,
        "name" => "phone",
        "category" => "electronics",
        "price" => 500
    ],
    [
        "id" => 3,
        "name" => "TV",
        "category" => "electronics",
        "price" =>3500
    ],
    [
        "id" => 4,
        "name" => "Coffee Table",
        "category" => "furniture",
        "price" => 600
    ],
    [
        "id" => 5,
        "name" => "bed",
        "category" => "furniture",
        "price" => 2000
    ]
    ];

    $category = $_GET["category"] ?? "";

    foreach($products as $product){
        if($category == "" || $product["category"] == $category){
            echo $product["name"] . "<br>";
            echo $product["id"] . "<br>";
            echo $product["category"] . "<br>";
            echo $product["price"] . "<br>" . "<br>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task_4</title>
</head>
<body>
    
</body>
</html>