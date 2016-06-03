<?php
namespace array2;
function bubble_sort($arr) {
    $size = count($arr);
    for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-1-$i; $j++) {
            if ($arr[$j+1] < $arr[$j]) {
                swap($arr, $j, $j+1);
            }
        }
    }
    return $arr;
}

function swap(&$arr, $a, $b) {
    $tmp = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $tmp;
}

/* test bubble sort */

echo "Enter no of elements\n";  //taking user inputs
        $no = readline("");
echo "Enter elements in the array\n";
for($i=0;$i<$no;$i++)
{
  $arr[$i]=readline("");
}

print("Before sorting\n");
print_r($arr);
echo "\n";
$starttime = microtime(true);
$arr = bubble_sort($arr);
$endtime = microtime(true);
$timediff = $endtime - $starttime;
print("After sorting by using bubble sort\n");
print_r($arr);
echo "total time taken by bubble sort".$timediff;
echo "\n";
?>
