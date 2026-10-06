<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post">

    1.რომელია მსოფლიოში ყველაზე გრძელი მდინარე?
    <br>
    <input type="radio" name="Q1" value="amazoni"> A. ამაზოინი
    <input type="radio" name="Q1" value="misisipi"> B. მისისიპი
    <input type="radio" name="Q1" value="nilosi"> C. ნილოსი
    <input type="radio" name="Q1" value="iandzi"> D. იანძი
    <br><br>

    2.ვინ არის გენიალური პოემის „ვეფხისტყაოსანი“ ავტორი?
    <br>
    <input type="radio" name="Q2" value="vaja"> A. ვაჟა-ფშაველა 
    <input type="radio" name="Q2" value="ilia"> B. ილია ჭავჭავაძე
    <input type="radio" name="Q2" value="akaki"> C. აკაკი წერეთელი
    <input type="radio" name="Q2" value="shota"> D. შოთა რუსთაველი
    <br><br>

    3.რომელი პლანეტაა მზის სისტემაში მზესთან ყველაზე ახლოს?
    <br>
    <input type="radio" name="Q3" value="venera"> A. ვენერა
    <input type="radio" name="Q3" value="merkuri"> B. მერკური
    <input type="radio" name="Q3" value="marsi"> C. მარსი
    <input type="radio" name="Q3" value="dedamiwa"> D. დედამიწა
    <br><br>

    4.რა არის საქართველოს დედაქალაქი?
    <br>
    <input type="text" name="Q4">
    <br><br>

    5.რამდენი კონტინენტია დედამიწაზე.
    <br>
    <input type="text" name="Q5">
    <br><br><br>

    <button type="submit">გაგზავნა</button>
    </form>


    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $answer_1 = $_POST["Q1"] ?? "";
        $answer_2 = $_POST["Q2"] ?? "";
        $answer_3 = $_POST["Q3"] ?? "";
        $answer_4 = $_POST["Q4"] ?? "";
        $answer_5 = $_POST["Q5"] ?? ""  ;

        $score = 0;

        if($answer_1 == "nilosi"){
            $score++;
        }
        
        if($answer_2 == "shota"){
            $score++;
        }
        
        if($answer_3 == "merkuri"){
            $score++;
        }
        if($answer_4 == "თბილისი"){
            $score++;
        }    
        if($answer_5 == "შვიდი" && "7"){
            $score++;
        }
    
    
    echo "სწორი პასუხების რაოდეობა: $score/5";
    
    }



?>

</body>
</html>