<?php
include 'componen/top.php';

include 'componen/sidebar.php';

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <?php
            //algoritma menangkap url agar masuk kedalam index
            $url = $_GET['url'];
            if ($url == 'dashboard') {
                include_once 'dashboard.php';
            } else if (!empty($url)) {
                include_once '' . $url . '.php';
            } else {
                'dashboard.php';
            }

            ?>

        </div>
    </main>


    <?php
    include 'componen/bottom.php';
    ?>