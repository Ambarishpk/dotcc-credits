<aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/dccLogo.svg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['adminlogin'];?></h5>              	  	

                  <li class="sub-menu">
                      <a href="manage-users.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Users</span>
                      </a>
                  </li>


                  <li class="sub-menu">
                  <a   id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true"  href="addgames.php">
                     <i class="fa fa-play"></i> <span>Games</span>
                      </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="./allgames.php">All Games </a>
                  <a class="dropdown-item" href="./addgame.php">Add game</a>
                  <a class="dropdown-item" href="./addgamecategory.php">Add Game Category</a>
                </div>
                </li>
                <li class="sub-menu">
                <a   id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true"  href="addgames.php">
                   <i class="fa fa-play"></i> <span>NEWS and EVENTS</span>
                    </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="./allnews.php">All NEWS </a>
                <a class="dropdown-item" href="./addnews.php">Add NEWS</a>
              </div>
              </li>
                <li class="sub-menu">
                      <a href="addmanagement.php">
                          <i class="fa fa-asterisk"></i>
                          <span>ADDs Management</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="addcredits.php">
                          <i class="fa fa-line-chart"></i>
                          <span>ADD Credits</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="addgifts.php">
                          <i class="fa fa-trophy"></i>
                          <span>ADD Gifts</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="giftsapproval.php">
                          <i class="fa fa-gift"></i>
                          <span>Gifts Approval</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="comments.php">
                          <i class="fa fa-mail-reply-all"></i>
                          <span>Project Ideas</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="change-password.php">
                          <i class="fa fa-power-off"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

              </ul>
          </div>
      </aside>