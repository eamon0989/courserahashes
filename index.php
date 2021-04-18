<?php
include('header.php');
?>

<section class="section has-text-centered hero is-primary">
    <div class="hero.body">
        <h1 class="title">Md5 pin hasher:</h1>
        <p class="subtitle">Hash your 4 digit pin here: </p>
    </div>
</section>

<div class="container has-text-centered is-max-desktop">
    <section id="invisible2" class="section">
        <form>
            <div class="field">
            <div class="control">
                <input class="input" type="text" name="md5hash" size="60" placeholder="Write in any 4 digits here" />
            </div>
            </div>
            <div class="field">
            <div class="control">
                <input class="button is-primary" type="submit" value="Make MD5"/>
            </div>
            </div>
        </form>
    </section>
   
    <?php
        if ( isset($_GET['md5hash']) ) {
            $md5hash = $_GET['md5hash'];
        }
    ?>
    <div id="invisible">
        <section class="section">
            <p class="notification">Copy and paste this hash into the second box.<br>
            It will check the hashes of every possible option starting from 0000 until it finds your pin.<br><br>
            If your pin contains only numbers will solve in less than 1 second.
            If it contains only letters and numbers it will take less than 5 seconds.
            If it contains common symbols it can take up to 30 seconds.
            </p>
            <div class="notification is-size-4 has-text-weight-medium">
                <?php
                    if ( isset($_GET['md5hash']) ) {
                    print hash('md5', $md5hash);
                    echo '<script> document.getElementById("invisible").style.display = "block"; </script>';
                    echo '<script> document.getElementById("invisible2").style.display = "none"; </script>';
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

    <?php
        if ( isset($_GET['md5']) ) {
            $pass_md5 = $_GET['md5'];
            header("Location:result.php?md5=".$pass_md5);                
        }
    ?>
        </div>
    </div>
</div>

</body>
</html>