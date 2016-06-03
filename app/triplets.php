<?php
echo "Enter no of elements\n";  //taking user inputs
        $no = readline("");
echo "Enter elements in the array\n";
for($i=0;$i<$no;$i++)
{
  $a[$i]=readline("");
}
sort($a);
$starttime = microtime(true);
  for($j=0;$j<$no;$j++)
  {


			  $k= $j+1 ; // Start right after i.
			  $l = $no-1  ;  // Start at the end of the array.

			  while ($l >= $k) {
          if($a[$j]+$a[$k]+$a[$l]==0)
          {
            echo " ".$a[$j]." ".$a[$k]." ".$a[$l]."\n";
            $k++;
          }
          else {
            $z=$a[$j]+$a[$k]+$a[$l];
            if($z>0)
            {
              $k++;

            }
            else{
              $l--;

            }
          }
        }
  }
  $endtime = microtime(true);
  $timediff = $endtime - $starttime;
  echo "time taken by for".$timediff;
  ?>
