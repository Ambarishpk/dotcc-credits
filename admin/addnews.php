<?php
    session_start();
    include('dbconnection.php');
    include("checklogin.php");
    check_login();
    if (isset($_POST["sub"])) {
    require_once "dbregister.php";
    $title=$_POST['title'];
    $content=$_POST['content'];
    if(isset($_FILES["image"]["name"])){
    $target_dir = "../newsandevents/newsimages/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    //path to image
    $path1=$_FILES["image"]["name"];
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }
    if(isset($_FILES["video"]["name"])){
        $target_dir = "../newsandevents/newsvideos/";
        $target_file = $target_dir . basename($_FILES["video"]["name"]);
        //path to video
        $path=$_FILES["video"]["name"];
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        echo "success";
        move_uploaded_file($_FILES["video"]["tmp_name"], $target_file);
}
    $sql = "INSERT INTO `news` (`title`,`content`,`imagefilepath`,`videofilepath`,`active`) VALUES " . "(:title ,:content,:imagefilepath,:videofilepath,:active)";
    try{
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":title", $title);
    $stmt->bindValue(":content", $content);
    $stmt->bindValue(":imagefilepath",$path1);
    $stmt->bindValue(":videofilepath",$path);
    $stmt->bindValue(":active", 1);
    $stmt->execute();
    $result = $stmt->rowCount();
    if ($result > 0) {
    $message="success news added:-)";
    echo "<script>alert(' $message');</script>";
    }
    else{
    $message="sorry something went wrong:-(";

    echo "<script>alert( '$message');</script>";
    }
    }catch(Exception $ex){
    echo $ex->getMessage();
    die;
    }
}
    ?><!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    </head>

    <body>

    <section id="container" >
    <?php include('./header.php'); ?>
    <?php include('./sidebar.php'); ?>
    <section id="main-content">
    <section class="wrapper">
        <?php echo $_SESSION['alert']; 
        $_SESSION['alert']="";
        ?>
    <h3><i class="fa fa-angle-right"></i>ADD NEWS and EVENTS</h3>                  
    <form id="form_container" class="bootstrap-form-with-validation"  action="addnews.php" method="post" name="sub"  enctype="multipart/form-data">

    <div class="form-group has-success">
    <label class="control-label">NEWS-TITLE </label>
    <input class="form-control"  required="" type="text" name="title" id="titlee">
    </div>

    <div class="form-group has-success">
    <label class="control-label">NEWS-CONTENT </label>
    <input type="text" require="" class="form-control" name="content" style="height:100px;"  placeholder="type news contents...">
    </div>

    <div class="form-group has-success">
    <label class="control-label" for="image"  required="">upload Picture related to the NEWS or event:-</label>
    <input type="file" name="image" id="image">
    <div>

    <div class="form-group has-success">
    <label class="control-label" for="video" >upload videos related to news and events :-</label>
    <input type="file" name="video" id="video">
    <div>

    <div class="form-group has-warning">
    <p class="form-static-control text-lowercase text-center text-info bg-danger" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-seri;">Make sure that the uploaded image and videos in smaller size for faster website :-) </p>
    </div>

    <div class="form-group has-warning">
    <input class="btn btn-success btn-block" id="sub" name="sub" type="submit" value="ADD" >
    </div>
    </form>
    </section>
    </section>
    </section>


    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/getData.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    <script>
    $(function(){
    $('select.styled').customSelect();
    });

    </script>

    </body>
    </html>

