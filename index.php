<?php include('header.php') ?>
<div class="main-wrapper">

    <div class="header">

        <div class="header-left">
            <a href="index.html" class="logo">
                <img src="assets/img/logo.png" alt="Logo">
            </a>
            <a href="index.html" class="logo logo-small">
                <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
            </a>
        </div>

        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-left"></i>
        </a>
        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars"></i>
        </a>


        <ul class="nav user-menu">

            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg"
                            width="31" alt="Seema Sisty"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="assets/img/profiles/avatar-01.jpg" alt="User Image"
                                class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>Seema Sisty</h6>
                            <p class="text-muted mb-0">Administrator</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>

        </ul>

    </div>

    <?php include('sidebar.php') ?>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <?php
            if (empty($_GET["page"])) {
                include "view/home.php";
            } elseif ($_GET['page'] == 'logout') {
                include "logout.php";
            } elseif ($_GET['page'] == 'user') {
                include "view/user.php";
            } elseif ($_GET['page'] == 'adduser') {
                include "view/add.php";
            } elseif ($_GET['page'] == 'edituser') {
                include "view/edit.php";
            } ?>
        </div>
    </div>

</div>
<?php include('footer.php') ?>