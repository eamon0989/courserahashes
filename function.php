<?php

$password; //the correct pin will be stored here and returned to user
$show = 15; //amount of attempts to print
$checks = 0; //how many hashes were checked



function codecracker1($input, $md5) { //this function takes the input and cracks the code, then returns it to the other function
    global $show, $password, $checks;
    for($i = 0; $i < strlen($input); $i++) {
        $ch1 = $input[$i];
            for($j = 0; $j < strlen($input); $j++) {
                $ch2 = $input[$j];
                    for($k = 0; $k < strlen($input); $k++) {
                        $ch3 = $input[$k];
                            for($l = 0; $l < strlen($input); $l++) {
                                $ch4 = $input[$l];
                                $checks++; // adds to counter every time a hash is checked
                            
                                $guess = $ch1.$ch2.$ch3.$ch4; //concatinates 4 chars together
                                $attempt = hash('md5', $guess);// checks current string's hash against user's md5 hash
                            
                                if ($attempt == $md5) {
                                    $password = $guess; //stores the current (correct) guess as the password
                                    return $password;
                                    break;
                                    }
                                if ( $show > 0 ) {
                                    print nl2br("$attempt $guess\n"); // prints the first few attempts until counter reaches 0
                                    $show = $show - 1;
                                    }
                                
                                }
                        }
                }
        }
}
/*
This function is here to optimize the overall workings, if it checks the pin for symbols it takes a long time, even if
the pin is simple and only contains numbers. It checks in increasing order of complexity, first numbers, then letters, then symbols.
It alse keeps track of the total time and returns the correct password to the user
*/
function codecracker() { 
    global $password, $checks;

    $numbers ="0123456789";
    $numbersandletters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numletandsymb = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&/()=?¿'¡*+[]}{;:_,.-<>|";

    $time_pre = microtime(true);
    $md5 = $_GET['md5'];
    codecracker1($numbers, $md5);
        if ($password != true) {
            codecracker1($numbersandletters, $md5);
                if ($password != true) {
                    codecracker1($numletandsymb, $md5);
                    if ($password != true) {
                        print nl2br("I can't crack this pin\n");
                        // print "\n";  
                    }
            }
        }
    $time_post = microtime(true);
    print nl2br("Elapsed time: ");
    print $time_post-$time_pre; //working
    print "\n";  

    if ($password !=false) {
        print nl2br("\n");  
        print nl2br("Total number of hashes checked: $checks\n");
        print nl2br("<strong>Your pin was: $password</strong>"); 
    }
}

