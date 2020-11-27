<?php require('./shared/header.php') ?>
<?php
session_start();
$_SESSION['user'] = 'none';
?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                col 50%
                <?php echo $_SESSION['user'] ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                col 50%
            </div>
        </div>
    </div>
<?php require('./shared/footer.php') ?>
