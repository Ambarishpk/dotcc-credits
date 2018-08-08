<?php
/*
 * @author THAYALAN G R
 */
if (isset($_GET["code"])) {
require_once './dbregister.php';
  $code = $_GET["code"];
 
  $sql = "SELECT * from admin where activationcode = :code";
  try {
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":code", $code);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if (count($result) > 0) {
      if ($result[0]["active"] == 1) {
        $msg = "Your account has already been activated.";
        $msgType = "info";
      } else {
        $sql = "UPDATE `admin` SET  `active` = 1 WHERE `activationcode` = :code";
        $stmt = $DB->prepare($sql);
        $stmt->bindValue(":code", $code);
        $stmt->execute();
        $msg = "Your account has been activated.";
        $msgType = "success";
      }
    } else {
      $msg = "No account found";
      $msgType = "warning";
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
}
?>

<?php if ($msg <> "") { ?>
  <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
  
    <p><?php echo $msg; ?></p>
  </div>
<?php } ?>
<div class="container">
  <div class="row">
    <div class="col-lg-9">
     <a href="admin/index.php" <h1>Thank you for registering with us.</h1></a>
    </div>
  </div>
</div>
<a href="#myBtn" onclick="window.open('admin/index.php')">
  <h2>login</h2>
</a>


<script>

 $(document).ready(function(){
                                $("#myBtn").click(function(){
                                    $("#myModal").modal();
                                });
                            });
</script>