<?php
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".\n";
$arrlength = count($cars);//length of an array
echo "\n";
for($x = 0; $x < $arrlength; $x++) {
    echo $cars[$x];
    echo "\n";
  }
  echo "\n";
//associative array
    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Peter is " . $age['Peter'] . " years old.\n";
//loop through associative array
echo "\n";
foreach($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "\n";
  }
echo "\n";
  sort($cars);//sorting array ascending
  $clength = count($cars);
for($x = 0; $x <  $clength; $x++) {
     echo $cars[$x];
     echo "\n";
}
rsort($cars);//sorting descending
echo "\n";
for($x = 0; $x <  $clength; $x++) {
     echo $cars[$x];
     echo "\n";
}
echo "\n";
  $numbers = array(4, 6, 2, 22, 11);
sort($numbers);//sorting numeric arrray ascending
$clength = count($numbers);
echo "\n";
for($x = 0; $x <  $clength; $x++) {
     echo $numbers[$x];
     echo "\n";
   }
     asort($age);//sorting associative array
echo "\n";
   foreach($age as $x => $x_value) {
        echo "Key=" . $x . ", Value=" . $x_value;
        echo "\n";
   }
   ksort($age);//sorting key value wise
echo "\n";
foreach($age as $x => $x_value) {
   echo "Key=" . $x . ", Value=" . $x_value;
   echo "\n";
}
echo "\n";
   arsort($age);//sorting asso. descending
   foreach($age as $x => $x_value) {
      echo "Key=" . $x . ", Value=" . $x_value;
      echo "\n";
   }
   echo "\n";
    krsort($age);
    foreach($age as $x => $x_value) {
       echo "Key=" . $x . ", Value=" . $x_value;
       echo "\n";
    }

    $cars2 = array
       (
       array("Volvo",22,18),
       array("BMW",15,13),
       array("Saab",5,2),
       array("Land Rover",17,15)
       );

    echo $cars2[0][0].": In stock: ".$cars2[0][1].", sold: ".$cars2[0][2].".\n";
    echo $cars2[1][0].": In stock: ".$cars2[1][1].", sold: ".$cars2[1][2].".\n";
    echo $cars2[2][0].": In stock: ".$cars2[2][1].", sold: ".$cars2[2][2].".\n";
    echo $cars2[3][0].": In stock: ".$cars2[3][1].", sold: ".$cars2[3][2].".\n";
    ?>


?>
