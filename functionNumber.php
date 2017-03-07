<?php
$myarray = array(1,2,3,4,5,6,7,8,9,10);

function isEven($myarray) {
for ($i = 0; $i < count($myarray); $i++) {
  echo "Index ", $i, ", value ", $myarray[$i], ": ";
  // A value is even if there's no remainder when you divide it by 2.
  if ($myarray[$i] % 2 == 0) {
     echo "even\n <br>";
  }
  else {
     echo "odd\n <br>";
  }
}
}

isEven($myarray);
?>
