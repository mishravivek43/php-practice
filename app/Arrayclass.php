<?php

class arrays2{
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

class sort2 extends arrays2
{
  //$newobj2= new arrays2();
  function bubble_sort($arr) {
    //$arr=$newobj2->getArray();
      $size = count($arr);
      for ($i=0; $i<$size; $i++) {
          for ($j=0; $j<$size-1-$i; $j++) {
              if ($arr[$j+1] < $arr[$j]) {
                  sort2::swap($arr, $j, $j+1);
              }
          }
      }
      //$newobj2->showArray($arr);
      return $arr;
  }

  static function  swap(&$arr, $a, $b) {
      $tmp = $arr[$a];
      $arr[$a] = $arr[$b];
      $arr[$b] = $tmp;
  }

  function sortInsertion($array) {
     //$array=$newobj2->getArray();
      $sortedArray = array();

      for ($i = 0 ; $i < count($array); $i++) {

          $element = $array[$i];
          $j = $i;

          while($j > 0 && $sortedArray[$j-1] > $element) {

              $sortedArray[$j] = $sortedArray[$j-1];
              $j = $j-1;
          }
          $sortedArray[$j] = $element;
      }
      //$newobj2->showArray($sortedArray);
      return $sortedArray;
  }

}
$newobj= new sort2();
$arr1=$newobj->getArray();
$arr1=$newobj->bubble_sort($arr1);
$newobj->showArray($arr1);

//$arr2=$newobj->getAArray();
//$newobj->showAArray($arr2);
//print_r($arr2);
//$newobj->bubble_sort();
//$newobj->sortInsertion();

?>
