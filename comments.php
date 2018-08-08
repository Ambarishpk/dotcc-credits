<?php
if (isset($_POST["comment"])) {
    require_once "dbregister.php";
    $path="";
    if($_FILES["attachment"]["name"]){
    $target_dir = "./commentsattachment/attachment/";
    $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
    $path=$_FILES["attachment"]["name"];
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" && $imageFileType != "bmp" && $imageFileType != "mp4" 
      && $imageFileType != "3gp" && $imageFileType != "flv" && $imageFileType != "mov"
      && $imageFileType != "pdf" && $imageFileType != "txt" && $imageFileType != "vcf"
      && $imageFileType != "mkv" && $imageFileType != "avi" && $imageFileType != "pptx"
      && $imageFileType != "xlsx" && $imageFileType != "docx" && $imageFileType != "doc" ) {
        echo "uploaded attachment is not supported by our system";
        exit();
      }else{
      move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file); 
      }
    }
    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $id=$_SESSION['id'];
    $email=$_SESSION['userlogin'];
    $sql = "SELECT COUNT(*) AS count from user where email = :email_id";
    try {
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":email_id", $email);
      $stmt->execute();
      $result = $stmt->fetchAll();
      if ($result[0]["count"] > 0) {
        $sql = "INSERT INTO `comments` (`user_id`,`subject`, `content`,`attachment`) VALUES " . "(:user_id ,:subject,:content,:attachment)";
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":user_id", $id);
        $stmt->bindValue(":subject", $subject);
        $stmt->bindValue(":content", $content); 
        $stmt->bindValue(":attachment", $path);
        $stmt->execute();
        $result = $stmt->rowCount();
        if ($result > 0) {
            $msg = "commented successfully";
            $msgType = "warning";  
        } else {
          $msg = "Failed to create User";
          $msgType = "warning";
        }
      }
    } catch (Exception $ex) {
      $msg= $ex->getMessage();
      $msgtype="warning";
    }
}
?>