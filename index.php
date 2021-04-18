<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css"> 
    <link rel="stylesheet" href="style.css">   
    <?php    require'function.php'; ?>
</head>
<body>
    <section class="section has-text-centered hero is-primary">
    <div class="hero.body">
    <h1 class="title">Md5 pin hasher:</h1>
    <p class="subtitle">Hash your 4 digit pin here: </p>
    </div>
    </section>

    <div class="container has-text-centered is-max-desktop">
    <section class="section">
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
    <section class="section notification">
    <p>Copy and paste this hash into the second box.
    It will check the hashes of the numbers 0000 to 9999 to see which matches your pin.
    Only numbers will solve in less than 1 second.
    Letters and numbers will take less than 5 seconds.
    Letters and common symbols will take up to 30 seconds.
    </p>
    </section>
    <div id="invisible" class="notification is-size-4 has-text-weight-medium">

    <?php
        if ( isset($_GET['md5hash']) ) {
        print hash('md5', $md5hash);
        echo '<script> document.getElementById("invisible").style.display = "block"; </script>';
        }

    ?>
        </div>

    <section class="section">
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
    <section class="section">

        
    <h2 class="notification is-primary">First 15 attempts:</h2>

    <p class="notification">
        <?php
            if ( isset($_GET['md5']) ) {
            codecracker();
            }
        ?>
    </p>

    <div style="height: 15rem; overflow:auto;">
    <?php

    ?>
        </section>

    </div>
</div>

</body>
</html>