<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php    require'function2.php'; ?>
</head>
<body>

    <h1>md5 pin hasher:</h1>
    <p>Hash your 4 digit pin here: </p>

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

    It will check the hashes of the numbers 0000 to 9999 to see which matches your pin.
    Only numbers will solve in less than 1 second.
    Letters and numbers will take less than 5 seconds.
    Letters and common symbols will take up to 30 seconds.
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
        if ( isset($_GET['md5']) ) {
            codecracker();
        }
        ?>
    </pre>

    <div style="height: 15rem; overflow:auto;">
    <?php

    ?>
    </div>


</body>
</html>