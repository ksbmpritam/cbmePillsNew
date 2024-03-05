<?php
include("includes/connection.php");
include("includes/admin_session_check.php");

//Get file name

$currentFile = $_SERVER["SCRIPT_NAME"];

$parts = Explode('/', $currentFile);

$currentFile = $parts[count($parts) - 1];

?>

<!DOCTYPE html>

<html>

<head>

    <meta name="author" content="">

    <meta name="description" content="">

    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo SITE_NAME ?></title>

    <link rel="stylesheet" type="text/css" href="assets/css/vendor.css">

    <link rel="stylesheet" type="text/css" href="assets/css/flat-admin.css">

    <link rel="icon" href="images/logo.jpeg" type="https://cbmepill.com/assets1/images/logo.png">

    <!-- Theme -->

    <link rel="stylesheet" type="text/css" href="assets/css/theme/blue-sky.css">

    <link rel="stylesheet" type="text/css" href="assets/css/theme/blue.css">

    <link rel="stylesheet" type="text/css" href="assets/css/theme/red.css">

    <link rel="stylesheet" type="text/css" href="assets/css/theme/yellow.css">
    <link rel="stylesheet" type="text/css" href="assets/css/theme/cropper.css">


    <script src="assets/ckeditor/ckeditor.js"></script>




</head>

<body>

    <div class="app app-default">

        <aside class="app-sidebar" id="sidebar">

            <div class="sidebar-header"> <a class="sidebar-brand" href="home.php"><img src="http://cbmepill.com/assets1/images/logo.png" alt="app logo" /></a>

                <button type="button" class="sidebar-toggle"> <i class="fa fa-times"></i> </button>

            </div>

            <div class="sidebar-menu">

                <ul class="sidebar-nav">

                    <li <?php if ($currentFile == "home.php") { ?>class="active" <?php } ?>> <a href="home.php">

                            <div class="icon"> <i class="fa fa-dashboard" aria-hidden="true"></i> </div>

                            <div class="title">Dashboard</div>

                        </a>

                    </li>


                    <li <?php if ($currentFile == "manage_category.php" or $currentFile == "add_category.php") { ?>class="active" <?php } ?>> <a href="manage_category.php">

                            <div class="icon"> <i class="fa fa-sitemap" aria-hidden="true"></i> </div>

                            <div class="title">Subjects *</div>

                        </a>
                    </li>

                    <li <?php if ($currentFile == "category.php") { ?>class="active" <?php } ?>>
                        <a href="category.php">

                            <div class="icon"> <i class="fa fa-bell" aria-hidden="true"></i> </div>

                            <div class="title">Lesson *</div>

                        </a>
                    </li>

                    <li <?php if ($currentFile == "lession_plan_title.php" || $currentFile == "lession_plan_title.php") { ?>class="active" <?php } ?>>
                        <a href="lession_plan_title.php">

                            <div class="icon"><i class="fa fa-play" aria-hidden="true"></i></div>

                            <div class="title">Lession Plan Title</div>

                        </a>
                    </li>

                    <li <?php if ($currentFile == "lession_plan_list.php" || $currentFile == "lession_plan_list.php") { ?>class="active" <?php } ?>>
                        <a href="lession_plan_list.php">

                            <div class="icon"><i class="fa fa-list" aria-hidden="true"></i></div>

                            <div class="title">Lession Plan List *</div>

                        </a>
                    </li>

                    <li <?php if ($currentFile == "add_game_intro.php" || $currentFile == "all_game_intro.php") { ?>class="active" <?php } ?>>
                        <a href="all_game_intro.php">

                            <div class="icon"><i class="fa fa-play" aria-hidden="true"></i></div>

                            <div class="title">Game Intro *</div>

                        </a>
                    </li>

                    <li <?php if ($currentFile == "all_user.php") { ?>class="active" <?php } ?>>
                        <a href="all_user.php">

                            <div class="icon"> <i class="fa fa-exchange" aria-hidden="true"></i> </div>

                            <div class="title">All Teacher's</div>

                        </a>

                    </li>

                    <li <?php if ($currentFile == "add_medicine.php" || $currentFile == "all_medicine.php") { ?>class="active" <?php } ?>>
                        <a href="all_medicine.php">

                            <div class="icon"><i class="fa fa-medkit" aria-hidden="true"></i></div>

                            <div class="title">Pills Type</div>

                        </a>
                    </li>

                    <li <?php if ($currentFile == "all_pill.php" || $currentFile == "add_pill.php") { ?>class="active" <?php } ?>>
                        <a href="all_pill.php">

                            <div class="icon"><i class="fa fa-medkit" aria-hidden="true"></i></div>

                            <div class="title">Pills</div>

                        </a>
                    </li>


                    <li <?php if ($currentFile == "add_game.php" || $currentFile == "all_games.php") { ?>class="active" <?php } ?>>
                        <a href="all_games.php">

                            <div class="icon"><i class="fa fa-gamepad" aria-hidden="true"></i></div>

                            <div class="title"> Matching pics </div>

                        </a>
                    </li>




                    <li <?php if ($currentFile == "add_pill_benefits.php" || $currentFile == "all_pill_benefits.php") { ?>class="active" <?php } ?>>
                        <a href="all_pill_benefits.php">

                            <div class="icon"><i class="fa fa-plus-square" aria-hidden="true"></i></div>

                            <div class="title">Pills Benefits *</div>

                        </a>
                    </li>


                    <li <?php if ($currentFile == "assign_pill.php" or $currentFile == "all_asign_pills.php") { ?>class="active" <?php } ?>>
                        <a href="all_asign_pills.php">

                            <div class="icon"><i class="fa fa-film" aria-hidden="true"></i></div>

                            <div class="title"> Assign Pill *</div>

                        </a>

                    </li>

                    <li <?php if ($currentFile == "add_prescription_new.php" || $currentFile == "all_prescription_new.php") { ?>class="active" <?php } ?>>
                        <a href="all_prescription_new.php">

                            <div class="icon"><i class="fa fa-newspaper-o" aria-hidden="true"></i></div>

                            <div class="title">Prescription *</div>

                        </a>
                    </li>

                    <li <?php if ($currentFile == "think_higer_template.php" || $currentFile == "think_higer_template.php") { ?>class="active" <?php } ?>>
                        <a href="think_higer_template.php">

                            <div class="icon"><i class="fa fa-slideshare" aria-hidden="true"></i></div>

                            <div class="title">TH Template</div>

                        </a>
                    </li>

                    <li <?php if ($currentFile == "add_tik_tok.php" || $currentFile == "all_think_high.php") { ?>class="active" <?php } ?>>
                        <a href="all_think_high.php">

                            <div class="icon"><i class="fa fa-slideshare" aria-hidden="true"></i></div>

                            <div class="title">Think High</div>

                        </a>
                    </li>

                    <li <?php if ($currentFile == "add_mcq.php" || $currentFile == "all_mcq.php") { ?>class="active" <?php } ?>>
                        <a href="all_mcq.php">

                            <div class="icon"><i class="fa fa-question-circle" aria-hidden="true"></i></div>

                            <div class="title">MCQ *</div>

                        </a>
                    </li>


                    <li <?php if ($currentFile == "one_minute.php" || $currentFile == "view_one_minute.php" || $currentFile == "edit_one_minute.php") { ?>class="active" <?php } ?>>
                        <a href="one_minute.php">

                            <div class="icon"> <i class="fa fa-list" aria-hidden="true"></i> </div>

                            <div class="title" style="font-size:12px;">One Minute Paper *</div>

                        </a>
                    </li>

                    <li <?php if ($currentFile == "rating.php" || $currentFile == "rating.php") { ?>class="active" <?php } ?>>
                        <a href="rating.php">
                            <div class="icon"><i class="fa fa-star" aria-hidden="true"></i></div>
                            <div class="title">Rating</div>
                        </a>
                    </li>


                    <li <?php if ($currentFile == "mcq_result.php") { ?>class="active" <?php } ?>>

                        <a href="mcq_result.php">

                            <div class="icon"><i class="fa fa-list-alt" aria-hidden="true"></i></div>
                            <div class="title">MCQ Result</div>

                        </a>
                    </li>

                    <li <?php if ($currentFile == "send_notification.php" || $currentFile == "notification_list.php") { ?>class="active" <?php } ?>>
                        <a href="notification_list.php">
                            <div class="icon"> <i class="fa fa-bell" aria-hidden="true"></i> </div>
                            <div class="title">Notification</div>
                        </a>
                    </li>

                    <li <?php if ($currentFile == "mcq_images.php") { ?>class="active" <?php } ?>>
                        <a href="mcq_images.php">

                            <div class="icon"><i class="fa fa-picture-o" aria-hidden="true"></i></div>

                            <div class="title">Media</div>

                        </a>
                    </li>


                    <li <?php if ($currentFile == "home_page.php" || $currentFile == "home_page.php") { ?>class="active" <?php } ?>>
                        <a href="home_page.php">

                            <div class="icon"><i class="fa fa-list-alt" aria-hidden="true"></i></div>

                            <div class="title">Home Page</div>

                        </a>
                    </li>

                </ul>

            </div>



        </aside>

        <div class="app-container">

            <nav class="navbar navbar-default" id="navbar">

                <div class="container-fluid">

                    <div class="navbar-collapse collapse in">

                        <ul class="nav navbar-nav navbar-mobile">

                            <li>

                                <button type="button" class="sidebar-toggle"> <i class="fa fa-bars"></i> </button>

                            </li>

                            <li class="logo"> <a class="navbar-brand" href="#"><?php echo APP_NAME; ?></a> </li>

                            <li>

                                <button type="button" class="navbar-toggle">

                                    <?php if (defined(PROFILE_IMG)) { ?>

                                        <img class="profile-img" src="images/<?php echo PROFILE_IMG; ?>">

                                    <?php } else { ?>

                                        <img class="profile-img" src="assets/images/profile.png">

                                    <?php } ?>



                                </button>

                            </li>

                        </ul>

                        <ul class="nav navbar-nav navbar-left">

                            <li class="navbar-title"><?php echo SITE_NAME ?></li>

                        </ul>

                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown profile"> <a href="profile.php" class="dropdown-toggle" data-toggle="dropdown">

                                    <?php if (defined(PROFILE_IMG)) { ?>

                                        <img class="profile-img" src="images/<?php echo PROFILE_IMG; ?>">

                                    <?php } else { ?>

                                        <img class="profile-img" src="assets/images/profile.png">

                                    <?php } ?>

                                    <div class="title">Profile</div>

                                </a>

                                <div class="dropdown-menu">

                                    <div class="profile-info">

                                        <h4 class="username">Admin</h4>

                                    </div>

                                    <ul class="action">

                                        <li><a href="profile.php">Profile</a></li>

                                        <li><a href="logout.php">Logout</a></li>

                                    </ul>

                                </div>

                            </li>

                        </ul>

                    </div>

                </div>

            </nav>