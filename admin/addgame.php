    <?php
    session_start();
    include('dbconnection.php');
    include("checklogin.php");
    check_login();
    if (isset($_POST["sub"])) {
    require_once "dbregister.php";
    $gname=$_POST['gname'];
    $catid=$_POST['category'];
    $level=$_POST['level'];
    $target_dir = "../games/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $path1=$_FILES["image"]["name"];
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "bmp" ) {
    $msg= "Sorry, only JPG, JPEG, PNG, GIF & BMP files are allowed.";
    echo "<script>alert( '$msg');</script>";
    }else{
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    //file uploading script
    if($_FILES["game"]["name"]) {
    $file = $_FILES["game"];
    $filename = $file["name"];
    $tmp_name = $file["tmp_name"];
    $type = $file["type"];    
    $name = explode(".", $filename);
    $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed','application/rar');

    if(in_array($type,$accepted_types)) { //If it is Zipped/compressed File
    $okay = true;
    } 

    $continue = strtolower($name[1]) == 'zip' ? true : false; //Checking the file Extension

    if(!$continue) {
    $message = "The file you are trying to upload is not a .zip file. Please try again.";
    echo "<script>alert( '$message');</script>";
    }


    /* here it is really happening */
    //$ran = $name[0]."-".time()."-".rand(1,time());
    $ran = $name[0];
    $targetdir = "../games/gamefiles/".$ran;
    $targetzip = "../games/gamefiles/".$ran.".zip";
    //$datee=date("Y-m-d", strtotime($Date. ' + 0 day'));
    if(move_uploaded_file($tmp_name, $targetzip)) { //Uploading the Zip File

    /* Extracting Zip File */

    $zip = new ZipArchive();
    $x = $zip->open($targetzip);  // open the zip file to extract
    if ($x === true) {
    $zip->extractTo($targetdir); // place in the directory with same name  
    $zip->close();

    unlink($targetzip); //Deleting the Zipped file
    }
    $message = "Your file was uploaded and unpacked.";
    echo "<script>alert( '$message');</script>";
    $filename = "../games/gamefiles/".$ran."/index.html";
    $filenamephp = "../games/gamefiles/".$ran."/index.php";
    if (file_exists($filename) || file_exists($filenamephp)) {
    $message="The index file exists";
    echo "<script>alert( '$message');</script>";
    if (file_exists($filename)) {
    $path=$filename;
    }else{
    $path=$filenamephp;
    }
    }else{
    $message="index file does not exist please make sure that the zip archive has index file directly in the root folder ";
    echo "<script>alert( '$message');</script>";
    $_SESSION['alert']=$message;
    $extra="/addgame.php";
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri$extra");
    }
    }else{
        $message="file cannot be uploaded please try again with correct parameters ";
        echo "<script>alert( '$message');</script>";
    $_SESSION['alert']=$message;
        $extra="/addgame.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri$extra");

    }
    }
    $sql = "INSERT INTO `games` (`gamename`,`category_id`,`ftppath`,`image`,`levels`,`adddate`,`editdate`,`active`) VALUES " . "(:gamename ,:categoryid,:ftppath,:image,:levels,:adddate,:editdate,:active)";
    try{
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":gamename", $gname);
    $stmt->bindValue(":categoryid", $catid);
    $stmt->bindValue(":ftppath",$path);
    $stmt->bindValue(":image",$path1);
    $stmt->bindValue(":levels",$level);
    $stmt->bindValue(":adddate",date("Y-m-d H:i:s"));
    $stmt->bindValue(":editdate",date("Y-m-d H:i:s"));
    $stmt->bindValue(":active", 1);
    $stmt->execute();
    $result = $stmt->rowCount();
    if ($result > 0) {
    $message="success game added:-)";
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
    <h3><i class="fa fa-angle-right"></i>ADD Games</h3>                  
    <form id="form_container" class="bootstrap-form-with-validation"  action="addgame.php" method="post" name="sub"  enctype="multipart/form-data">

    <div class="form-group has-success">
    <label class="control-label">Game-Name </label>
    <input class="form-control"  required="" type="text" name="gname" id="gname">
    </div>

    <div class="form-group has-success">
    <label class="control-label" for="category1">Select Game Category:-</label>
    <div class="form-group" id="category1"> 
    <select class="form-control" id="category" name="category"  required="">
    <?php
    $sql = "SELECT * FROM category";
    $resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
    while( $rows = mysqli_fetch_assoc($resultset) ) {
    ?>
    <option style="color:black;" value="<?php echo $rows["category_id"]; ?>"><?php echo $rows["categoryname"]; ?></option>
    <?php }	?>
    </select>
    </div>
    </div>

    <div class="form-group has-success">
    <label class="control-label" for="category2"  required="">Enter No levels:-</label>
    <div class="form-group" id="category2"> 
    <input type="number" name="level" placeholder="1">
    </div>
    </div>


    <div class="form-group has-success">
    <label class="control-label" for="image"  required="">upload Picture related to the game for icon:-</label>
    <input type="file" name="image" id="image">
    <div>

    <div class="form-group has-success">
    <label class="control-label" for="game" >upload Games in zip format:-</label>
    <input type="file" name="game" id="game">
    <div>

    <div class="form-group has-warning">
    <p class="form-static-control text-lowercase text-center text-info bg-danger" style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-seri;">The uploaded zip will be automatically uploaded and unziped ftp path will be automatically updated and index file will be automatically traced:-) </p>
    </div>

    <div class="form-group has-warning">
    <input class="btn btn-success btn-block" id="sub" name="sub" type="submit" value="Register" >
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

