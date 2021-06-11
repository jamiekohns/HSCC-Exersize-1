<div style="z-index:1000;" class="container col-md-12 p-0 m-0  sticky-top">
    <nav class="navbar navbar-expand-md navbar-light bg-light rounded-bottom">

        <!-- <img src="/web-assets/images/BDPA-Flights-Black.jpeg" class="rounded" width="44" height="44" alt="" loading="lazy"> -->

        <span class="navbar-brand mb-0 h1 ml-3">BDPA Weather</span> <!-- Make name Airlanta -->

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?=$_ENV['BASE_URL'] .  '/' ?>">Home</a>
                <!-- <a class="nav-item nav-link" href="/">Checkout</a> -->

            </div>
            <div class="navbar-nav ml-auto">

                <?php
                    $session_status = session_status();
                    if(isset($_SESSION['user'])|| isset($_COOKIE['user'])){
                        $status = 2;
                    } else{
                        $status = 1;
                    }
                    switch ($status) {
                        case 0:
                            echo "Session is disabled!";
                            break;
                        case 1:
                        ;
                            ?>
                            <a class="nav-item nav-link" href="<?= $_ENV['BASE_URL'] .  '/user_signup.php'?>
                            ">Signup</a>
                            <a class="nav-item nav-link" href="<?= $_ENV['BASE_URL'] . '/login.php' ?>">Login</a>
                            <?php
                            break;
                        case 2:
                            $showSideBar = true;
                            ?>
                                 <a class="nav-item nav-link" href="<?= $_ENV['BASE_URL'] .  '/user_signup.php'?>"> My Locations </a>
                            <?php
                            break;
                    }?>
            </div>
        </div>
    </nav>
</div>
<?php //if (isset($showSideBar) AND $showSideBar == true) {
    //include_once $_ENV['BASE_DIRECTORY'] . '/web-assets/tpl/app_sidenav.php';
//}
?>
