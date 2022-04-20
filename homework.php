<?php 
$homeworknum = $_POST["type"];
$homework1_n = $_POST["homework1_n"];
$homework2_n = $_POST["homework2_n"];
$homework3_n = $_POST["homework3_n"];
$base = $_POST["base"];
$radius = $_POST["radius"];
$altitude = $_POST["altitude"];
$width = $_POST["width"];
$height = $_POST["height"];

$result = "";
if($homeworknum != "")
{
if($homeworknum == "homework1"){
    $quiznum = "--문제 1번--";
    $result1 = 0;
    $result2 = 1;
    for ($i = 1; $i <= $homework1_n; $i++) {
        $result = $result . strval($i) . " ";
        $result1 += $i;
        $result2 *= $i;
    }
    $result = $result . "<br>전체 합: " . strval($result1) . "<br>전체 곱: " . strval($result2);
}
elseif($homeworknum == "homework2"){
    $quiznum = "--문제 2번--";
    $arr = array();

    for ($i = 0; $i < $homework2_n; $i++) {
        $temp = rand(1, 100);
        $arr[$i] = $temp;
        $result = $result . strval($temp) . " ";
    }

    $result = $result . "<br>";

    for ($i = 0; $i < $homework2_n; $i++) {
        for ($j = $i+1; $j < $homework2_n; $j++) {
            if($arr[$i] > $arr[$j]){
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }

    for ($i = 0; $i < $homework2_n; $i++) {
        $result = $result . strval($arr[$i]) . " ";
    }
}
elseif($homeworknum == "homework3"){
    $quiznum = "--문제 3번--";
    $t1 = 1;
    $t2 = 1;
    for ($i = 1; $i <= $homework3_n; $i++) {
        $temp = $t1 + $t2;
        $result = $result . strval($t1) . " " . strval($t2/$t1) . "<br>";
        $t1 = $t2;
        $t2 = $temp;
    }
}
else{
    $quiznum = "--문제 4번--";
    $result = $result . "삼각형: " . strval($base*$altitude/2) . "<br>";
    $result = $result . "직사각형: " . strval($width*$height) . "<br>";
    $result = $result . "원: " . strval(3.14*$radius*$radius) . "<br>";
    $result = $result . "직육면체: " . strval($width*$height*$altitude) . "<br>";
    $result = $result . "원통: " . strval(3.14*$radius*$radius*$altitude) . "<br>";
    $result = $result . "구: " . strval(4/3*3.14*$radius*$radius*$radius) . "<br>";
}

}
?>


<!DOCTYPE HTML>
<html>
<body>

<form action="homework.php" method="post">
<input type = "hidden" name = "type" value ="homework1">
문제1번 <br> N을 입력하시오: <input type="text" name="homework1_n">
<input type="submit"><br>
</form><br><br>

<form action="homework.php" method="post">
<input type = "hidden" name = "type" value ="homework2">
문제2번 <br> N을 입력하시오: <input type="text" name="homework2_n">
<input type="submit"><br>
</form><br><br>

<form action="homework.php" method="post">
<input type = "hidden" name = "type" value ="homework3">
문제3번 <br> N을 입력하시오: <input type="text" name="homework3_n">
<input type="submit"><br>
</form><br><br>

<form action="homework.php" method="post">
<input type = "hidden" name = "type" value ="homework4">
문제4번 <br>
 밑변: <input type="text" name="base"><br>
 반지름: <input type="text" name="radius"><br>
 높이: <input type="text" name="altitude"><br>
 가로: <input type="text" name="width"><br>
 세로: <input type="text" name="height"><br>
<input type="submit"><br>
</form><br><br><br><br>

<?php echo $quiznum;?><br>
<?php echo $result;?>
</body>
</html>