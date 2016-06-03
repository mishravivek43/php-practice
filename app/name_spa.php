<?php
namespace array2;
class arrays3{
function getArray(){
echo "Enter the number of terms in the array\n";
$no = readline("");
echo "Enter ".$no. " terms in the array\n";
for($i=0;$i<$no;$i++){
  $arr[$i]= readline("");
}
return $arr;
}
function showArray($arr){
  echo "Your Array :\n";
  foreach($arr as $values){
  echo $values."\n";
}
}
function getAArray(){
  echo "Enter the number of terms in the array\n";
  $no = readline("");
  echo "Enter ".$no. " keys and its values in the array\n";
  for($i=0;$i<$no;$i++){
    $key1= readline("");
    $val1= readline("");
    $arr3[$key1]=$val1;
  }
  return $arr3;
}
function showAArray($arr2){
  echo "Your Array :\n";
  foreach($arr2 as $x=>$x_values){
  echo "key: ".$x."values:".$x_values."\n";
}
}
}

?>
