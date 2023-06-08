<?php 
    include_once 'Include/header.php';
    include_once 'db.php';
    include_once 'Controller/StaffController.php';
    $controller = isset($_GET['controller'])?$_GET['controller']: "staff";
    $action = isset($_GET['action'])?$_GET['action']: "index" ;
?>
<body id="page-top">
    <div id="wrapper">
        <?php include_once 'Include/sidebar.php'?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include_once 'Include/nav.php'?>
                <div class="container-fluid">
                    <?php 
                        include_once 'employees/list.php';
                    ?>
                </div>
            </div>
            <?php include_once 'Include/footer.php'?>
        </div>
    </div>