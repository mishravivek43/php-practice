<?php
namespace array2;
require '/var/www//html/app/name_spa.php';
class sort2 extends \array2\arrays3
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
?>
