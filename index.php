<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>md5 pin hasher:</h1>
<p>Hash your 4 digit pin here: (numbers only)</p>

<form>
    <input type="text" name="md5hash" size="60" />
    <input type="submit" value="Make MD5"/>
</form>

<?php
    if ( isset($_GET['md5hash']) ) {
$md5hash = $_GET['md5hash'];
    }
?>
<pre>
Copy and paste this hash into the second box.

It will check the hashes of the numbers 0000 to 1000 to see which matches your pin.
</pre>
<?php
    if ( isset($_GET['md5hash']) ) {
    print hash('md5', $md5hash);
    }
    
    ?>
<pre>



</pre>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<h2>First 15 attempts:</h2>
<pre>
<?php

$goodtext = "Not found";

    if ( isset($_GET['md5']) ) {
        $time_pre = microtime(true);
        $md5 = $_GET['md5']; 

        $numbers = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $show = 15;
        $checks = 0;

        
        for($i = 0; $i < strlen($numbers); $i++) {
            $ch1 = $numbers[$i];
           for($j = 0; $j < strlen($numbers); $j++) {
            $ch2 = $numbers[$j];
           for($k = 0; $k < strlen($numbers); $k++) {
            $ch3 = $numbers[$k];
           for($l = 0; $l < strlen($numbers); $l++) {
            $ch4 = $numbers[$l];
            $checks++;
        

        $guess = $ch1.$ch2.$ch3.$ch4;

        $check = hash('md5', $guess);
        if ($check == $md5) {
            $goodtext = $guess;
            print "Total number of hashes checked: $checks";
            print "\n";
            break;
        }
 
        if ($show > 0) {
            print "$check $guess\n";
            $show = $show - 1;
        }
    }
}
           }
        }
           $time_post = microtime(true);
           print "Elapsed time: ";
           print $time_post-$time_pre;
           print "\n";
        
    }

?>
</pre>

<p><strong>Your Pin was: <?= htmlentities($goodtext); ?></strong></p>

</body>
</html>