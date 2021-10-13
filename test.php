<?php
$fizz=1;
$buzz=1;
for($i=0;$i<=100;$i++)
{
    if($fizz==3 && $buzz ==5)
    {
        echo 'fizzbuzz <br/>';
        $fizz=1;
        $buzz=1;

    }
    else if($fizz==3)
     {
         echo "fizz<br/>";
         $fizz=1;
         $buzz++;
     }
    else if($buzz==5)
    {
        echo 'buzz<br/>';
        $fizz++;
        $buzz=1;
    }
    else{
        echo $i."<br/>";
        $fizz++;
        $buzz++;
    }
}




?>