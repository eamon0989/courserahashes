<?php
include('header.php');
?>

<section class="section has-text-centered hero is-primary">
    <div class="hero.body">
        <h1 class="title">Result of brute forcing</h1>
        <p class="subtitle">Your pin should be shown below: </p>
    </div>
</section>

<section class="section">
    <div class="container has-text-centered is-max-desktop">
        <p class="notification">
        <?php
            if ( isset($_GET['md5']) ) {
            codecracker();
            }
        ?>
        </p>

        <div class="field has-text-centered">
        <div class="control">
            <button id="reset" class="button is-primary">Reset</button>
        </div>
        </div>
    </div>
</section>

</body>
<script src="script.js"></script>
</html>