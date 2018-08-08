<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <title>DotCodeCommunity</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie"> -->
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/Pretty-Header.css"> -->
    <link rel="stylesheet" href="assets/css/Pretty-Footer.css">
    <!-- <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">   -->
    <!-- <link href="./assets/css/site.css" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
        <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <!-- <script src="./assets/js/jquery.min.js"></script> -->
    <!-- <script src="./assets/bootstrap/js/bootstrap.min.js"></script> -->

    <style>

        /* .modal-header{
            font-size:20px;

        } */

        #header {
            position: fixed;
            top: 0;
            left: 0;
            background-color: #039be5;
            width: 100%;
            z-index: 20;
            padding: 0px 10px;
            text-align:center;
        }


        #myBtn12 {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        border: none;
        outline: none;
        background-color: red;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 10px;
        }
        #myBtn12:hover {
        background-color: #555;
        }
        #wrapper{
            width:100%;
            min-height:700px;
            margin-top:55px;
        }
    </style>
</head>
<body style="background-color:#f3f3f3;">


    <button onclick="topFunction()" id="myBtn12" style="background-color: transparent; color: lightblue;" title="Go to top"><i class="fa fa-arrow-circle-o-up fa-3x"></i></button>
    <nav class="navbar shadow bg-white navbar-expand-lg" id="header">
        <a class="navbar-brand" href="home.php">
            <img src="assets/img/dccLogo.svg" style="" width="27" height="27" class="d-inline-block align-bottom " alt="">
                
            <strong style="font-family: trajan-pro-3, serif; color: #039be5; letter-spacing:2px;">CodeCommunity</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon text-primary"></span> -->
            <i class="fas fa-bars text-primary"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link dropdown-item text-warning" href="home.php"><small>Home</small></a>
            </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle dropdown-item text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small> Courses</small>
                </a>
                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="android.php"><i class="fab fa-android shadow text-primary fa-1x "></i> &nbsp;Android Development</a>
                    <a class="dropdown-item" href="web.php"><i class="fab fa-html5 shadow text-danger "></i> &nbsp;Web Development</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item disabled" data-toggle="tooltip" data-placement="top" href="#" title="Coming Soon"> <i class="fab fa-python"></i> &nbsp;Python Development</a>
                    <a class="dropdown-item disabled" data-toggle="tooltip" data-placement="top" href="#" title="Coming Soon"> <i class="fas fa-user-secret"></i> &nbsp;Ethical Hacking</a>
                    <a class="dropdown-item disabled" data-toggle="tooltip" data-placement="top" href="#" title="Coming Soon"> <i class="fas fa-robot"></i> &nbsp;Machine Learning</a>
                </div>
            <li class="nav-item">
                <a class="nav-link dropdown-item text-warning" href="projectidea.php"><small>suggest-projects</small></a>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-item text-warning" href="myprojects.php"><small>My Projects</small></a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-item text-warning" href="#"><small>About</small></a>
            </li>
            </ul>
            <div class="my-2 my-lg-0">
                <?php maindiv();?>
            </div>
        </div>


    
    </nav>
 