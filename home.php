<?php
  session_start();
  require_once('dbconnection.php');

  include('checklogin1.php');
  check_login1();
  //register code
  // include('register.php');
  //login code
  // include('login.php');
  //deciding whether div in login or loggedin
  include('decidelogin.php');
  //including header
  include('header.php');
  //including login register popup module as modal
  // include('loginlogoutmodel.php');
  //forget password code
  // include('forgetpasswordcode.php');
  //including leftpan
  // include('leftpan.php');
  //code for comments
  // include('comments.php');

?>
<style>
#paneluserimage {
  width:200px;
}

@media screen and (max-width:500px) {
  #paneluserimage {
    width:100px;
  }
  .panelusertext {
    font-size: 10px;

  }
}
  
</style>
<div id="wrapper">
<!-- all main contents over here -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 offset-md-2 col-sm-12 offset-sm-0">
        <div class="row justify-content-center">
          <div class="col">
            <div class="view zoom ">
                <img src="assets/img/panel1img.jpg" width="100%" class="img-fluid z-depth-1" alt="bgimage">
                <div class="mask rgba-blue-slight text-center pt-5" >
                  <div class="container-fluid ">
                      <div class="row  ">
                        <div class="col">
                        <img src="upload/img/<?php echo $_SESSION['uimage']; ?>"   class="img-fluid shadow-lg rounded-circle mx-auto" id="paneluserimage" alt="Responsive image">
                        </div>
                          
                      </div>
                      <div class="row">
                        <div class="col">
                            <h3 class="animated bounceInDown h3-responsive pt-3 white-text panelusertext"><strong>Hello <span class="yellow-text"><?php echo $_SESSION['name']; ?></span> !</strong></h3>                     
                            <h3 class="text-center h3-responsive pt-3 white-text panelusertext animated fadeInUpBig "><strong> Welcome to DotCodeCommunity! </strong></h3>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col">
              <div class="card mb-3 hoverable view zoom">
                  <img class="card-img-top" src="assets/img/panel2img.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title yellow-text h3-responsive">DotCodeCommunity</h5>
                    <p class="card-text">We at DCC are a team of passionate Coders, determined to build a technological edifice with the mixture of skills and knowledge. We are geared towards building solutions to problems unsolved and creating opportunities for people who have just started their journey in Coding!</p>
                    <p class="card-text"><small class="text-muted">Last updated today</small></p>
                  </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
              <div class="card-group">
                  <div class="card view zoom hoverable">
                    <img class="card-img-top" src="assets/img/android.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title yellow-text h4-responsive ">Android Development</h5>
                      <!-- <p class="card-text h5-responsive">Sit on your saddle...Ride on Gradle.</p>     -->
                      <blockquote class="blockquote text-left">
                          <p class="mb-0">Sit on your saddle...<br>Ride on Gradle.</p>
                          <!-- <footer class="blockquote-footer bg-white"><cite title="Source Title">Linus Torvalds</cite></footer> -->
                        </blockquote>            
                      <div class="card-text text-center">
                        <button type="button" class="btn btn-warning shadow-lg" center style="border-radius:30px;">view courses</button>
                      </div>
                      
                    </div>
                  </div>
                  <div class="card view zoom hoverable">
                    <img class="card-img-top" src="assets/img/webdev.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title red-text">Web Development</h5>
                     
                      <p class="card-text">
                        <blockquote class="blockquote text-right">
                          <p class="mb-0">Talk is Cheap <br> Show me the Code</p>
                          <footer class="blockquote-footer bg-white"><cite title="Source Title">Linus Torvalds</cite></footer>
                        </blockquote>
                      </p>
                      <div class="card-text text-center">
                        <button type="button" class="btn btn-info shadow-lg" center style="border-radius:30px;">view courses</button>
                      </div>
                      
                    </div>
                  </div>
                  <div class="card view zoom hoverable">
                    <img class="card-img-top" src="assets/img/upcoming.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title blue-text">Upcoming Courses</h5>
                      <p class="card-text">
                        <style>
                          #ulli > li {
                            padding-bottom: 5px;
                            font-size:18px;
                          }
                        </style>
                       
                      </p>
                      <blockquote class="blockquote text-left">
                        <ul style="list-style:none;" id="ulli">
                            <li><i class="fab fa-python text-warning"></i> &nbsp;Python Development</li>
                            <li><i class="fas fa-user-secret blue-text"></i> &nbsp;Ethical Hacking</li>
                            <li><i class="fas fa-robot red-text"></i> &nbsp;Machine Learning</li>
                            <li><i class="fas fa-headset text-success"></i>&nbsp;ChatBot with Ruby</li>                          
                          </ul>
                        <footer class="blockquote-footer bg-white text-center"><cite title="Source Title">Stay Update</cite></footer>
                      </blockquote>  
                      <!-- <p class="card-text text-center"><small class="text-muted">***Stay Update***</small></p> -->
                    </div>
                  </div>
                </div>
          </div>
        </div>
        <div class="row justify-content-center mt-5 view zoom " >
          <div class="container">
            <div class="row" style="z-index:10; position:relative;">
              <div class="col text-center">
                <h4 class="h4-responsive">DotCC for teams</h4>
                <h3 class="h3-responsive "><b>A better way to work together</b></h3>
                <h5 class="h5-responsive">DotCodeCommunity brings teams together <br> to work through problems, move ideas forward, and learn from each other along the way.</h5>
              </div>
            </div>
            <div class="row" style="z-index:-1; position:relative;">
              <div class="col">
                <img src="assets/img/collabrative.svg" width="100%" class="img-fluid" alt="bgimage">   
              </div>
            </div>
            <div class="row" style="z-index: 5; position:relative;">
              <div class="col">
                <blockquote class="blockquote text-center">
                  <p class="mb-0">Alone we can do so little; together we can do so much.</p>
                  <footer class="blockquote-footer text-center" style="background-color:transparent;"><cite title="Source Title">Helen Keller</cite></footer>
                </blockquote>
              </div>
            </div>
            <div class="row" style="z-index: 5; position:relative;">
              <div class="col">
                <blockquote class="blockquote text-center">
                  <p class="mb-0">Teamwork is the ability to work together toward a common vision. The ability to direct individual accomplishments toward organizational objectives. It is the fuel that allows common people to attain uncommon results.</p>
                  <footer class="blockquote-footer text-center" style="background-color:transparent;"><cite title="Source Title">Andrew Carnegie</cite></footer>
                </blockquote>
              </div>
            </div>
            <div class="row" style="z-index: 5; position:relative;">
              <div class="col">
                <blockquote class="blockquote text-center">
                  <p class="mb-0">Great things in business are never done by one person; they're done by a team of people.</p>
                  <footer class="blockquote-footer text-center" style="background-color:transparent;"><cite title="Source Title">Steve Jobs </cite></footer>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row justify-content-center" style="z-index: -1; position:relative; ">
            <div class="col ">
          
            </div>
        </div>  -->
      </div>
    </div>  
  </div>
</div>


<?php include('./footer.php'); ?>




