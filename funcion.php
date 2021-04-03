<?php

$password; //the correct pin will be stored here and returned to user
$show = 15; //amount of attempts to print
$checks = 0; //how many hashes were checked

function codecracker($input) {
    global $show, $password, $checks;

    if ( isset($_GET['md5']) ) {
        $time_pre = microtime(true);
        $md5 = $_GET['md5'];

        for($i = 0; $i < strlen($input); $i++) {
            $ch1 = $input[$i];
                for($j = 0; $j < strlen($input); $j++) {
                    $ch2 = $input[$j];
                        for($k = 0; $k < strlen($input); $k++) {
                            $ch3 = $input[$k];
                                for($l = 0; $l < strlen($input); $l++) {
                                    $ch4 = $input[$l];
                                    $checks++; // adds to counter ever time a hash is checked
                                
                                    $guess = $ch1.$ch2.$ch3.$ch4; //concatinates 4 chars together
                                    $attempt = hash('md5', $guess);// checks current string's hash against user's md5 hash
                                
                                    if ($attempt == $md5) {
                                        $password = $guess; //stores the current (correct) guess as the password
                                        print "\n";
                                        print "Your pin was: $password"; //working
                                        print "\n";
                                        return $password;
                                        break;
                                        }
                                    if ( $show > 0 ) {
                                        print "$attempt $guess\n"; // prints the first few attempts until counter reaches 0
                                        $show = $show - 1;
                                        }
                                    
                                    }
                            }
                    }
            }
            $time_post = microtime(true);
            print "Elapsed time: ";
            print $time_post-$time_pre; //working
            print "\n";  
        
            if ($password !=false) {
                print "Total number of hashes checked: $checks"; //not working
                print "\n"; 
                print "<strong>Your pin was: $password</strong>"; 
            }
    }
}

