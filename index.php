<?php
include('header.php');
?>

<section class="section has-text-centered hero is-primary">
    <div class="hero.body">
        <h1 class="title"><a href="index.php">Md5 pin hasher</a></h1>
        <p id="changeText" class="subtitle">Hash your 4 digit pin here: </p>
    </div>
</section>

<div class="container has-text-centered is-max-desktop">
    <section id="invisible2" class="section">
        <form>
            <div class="field">
            <div class="control">
                <input class="input" type="text" name="md5hash" value="<?= $md5hash = htmlentities($_GET['md5hash']) ?>" minlength="4" maxlength="4" required="required" placeholder="Write in any 4 digits here, letters or numbers only" />
            </div>
            </div>
            <div class="field">
            <div class="control">
                <input id="submitPin" class="button is-primary" type="submit" value="Make MD5"/>
            </div>
            </div>
        </form>
        <p id="invalid">Invalid symbol</p>

    </section>

<?php



?>
    </div>
    <div class="container has-text-centered is-max-desktop">

    <div id="invisible">
        <section class="section">
            <div id="centerText" class="notification has-text-centered">
            <p>Copy and paste this hash into the second box.<br>
            It will check the hashes of every possible option starting from 0000 until it finds your pin.<br><br>
            If your pin contains only numbers will solve in less than 1 second.
            If it contains only letters and numbers it will take less than 5 seconds.
            If it contains common symbols it can take up to 30 seconds.
            </p>
            </div>
            <div class="notification is-size-4 has-text-weight-medium">
                <?php

// if (empty($md5hash))
// {
//     echo "<script>alert('Please fill all input fields to register!');</script>";
// }
                    $input1 = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    $continue = true; //problem with <>, check
                    if (( isset($_GET['md5hash']) ) && ((strlen($md5hash)) != 0)) {
                            for($i = 0; $i < strlen($md5hash); $i++) {
                              $ch = $md5hash[$i];
                              if ((strpos($input1, $ch)) === false) { //check if current char is not found in $input1, needs strict equality, otherwise char pos 0 returns a false positive
                                echo '<script> document.getElementById("invalid").style.display = "block"; </script>';
                                $continue = false;
                                break;
                              } 
                    } if ($continue) {
                        print hash('md5', $md5hash);
                        echo '<script> document.getElementById("invisible").style.display = "block"; </script>';
                        echo '<script> document.getElementById("invisible2").style.display = "none"; </script>';
                        echo '<script> document.getElementById("changeText").textContent = "Decode your md5 hash here:"; </script>';
                        

                    }
                    }
                ?>
            </div>

            <form>
                <div class="field">
                <div class="control">
                    <input class="input" type="text" name="md5" size="60" placeholder="Paste in the hash from above"/>
                </div>
                </div>  
                <div class="field">
                <div class="control">
                    <input class="button is-primary" type="submit" value="Crack MD5"/>
                </div>
                </div>    
                </form>
        </section>
    </div>
            <div id="invisible3">
                <section class="section">
                    <p class="notification">
                        <?php
                            if ( isset($_GET['md5']) ) {
                                echo '<script> document.getElementById("invisible2").style.display = "none"; </script>';
                                echo '<script> document.getElementById("invisible3").style.display = "block"; </script>';
                                echo '<script> document.getElementById("changeText").textContent = "Your results:"; </script>';

                                codecracker();
                            }
                        ?>
                    </p>
                    
                    <div class="field has-text-centered">
                    <div class="control">
                        <button id="reset" class="button is-primary">Reset</button>
                    </div>
                    </div>   
                </section>    
            </div> 
    </div>                


        </div>
    </div>

</div>

</body>
<script src="script.js"></script>

</html>