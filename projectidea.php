<?php
  session_start();
  include('dbconnection.php');
  //checking login and redirecting to index page
  //below 2 lines are hidden because public users can also view this page without restriction for user login
  include('checklogin1.php');
  check_login1();
  //register code
//   include('register.php');
  //login code
//   include('login.php');
  //deciding whether div in login or loggedin
  include('decidelogin.php');
  //including header
  include('header.php');
  //including login register popup module as modal
//   include('loginlogoutmodel.php');
  //forget password code
//   include('forgetpasswordcode.php');
  //including leftpan
//   include('leftpan.php');
include('comments.php');
?>
<div id="wrapper">
  <link rel="stylesheet" href="assets/css/ideas.css">
<!-- all main contents over here -->
  <div class="container-fluid" id="ideacontainer">
    <div class="row">
      <div class="col text-center">
        <p class="ideaheading">Suggest creative start up project ideas</p> 
      </div>
      <?php if ($msg <> "") { ?>
                  <div class="alert alert-dismissable alert-<?php echo $msgType; ?>">
                      <button data-dismiss="alert" class="close" type="button">x</button>
                      <p><?php echo $msg; ?></p>
                  </div>
      <?php } ?>
    </div>
    <div class="row">1
      <div class="col text-center container-fluid">
        <form class="" style="max-width:50%; margin-left:25%;" action="" method="post" name="comment" enctype="multipart/form-data">
          <div class="row"><div class="col">
          <input type="text" class="form-control"   id="name" required="" name="subject" placeholder="Enter Subject..">
          </div>
            
          </div>
          <div class="row"><div class="col">
          <textarea id="subject" class="form-control"  name="content" required="" placeholder="Write something.." style="height:150px"></textarea>  
          </div>
          
          </div>
          <div class="row" ><div class="col">
            <input type="file" class="form-control" id="attachment" class="btn-primary " name="attachment" style="">  
          </div>
          
          </div>
          <div class="row"><div class="col">
          <input type="submit" class="form-control btn btn-primary text-white" value="Suggest" name="comment">
          </div>
            
          </div>
        </form>
      </div>     
    </div>
  </div>        
</div>

<?php 
    // include('./rightpan.php');      
    include('./footer.php');
    ?>
</body>

</html>