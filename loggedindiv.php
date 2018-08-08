<ul class="nav navbar-nav">
    <li class="dropdown nav-item"> 
    
    <a class="dropdown-toggle dropdown-item nav-link  p-0" data-toggle="dropdown" aria-expanded="false"  href="#">

       <img src="upload/img/<?php if($_SESSION['uimage'] != "") { echo $_SESSION['uimage']; } else { echo "avatar_2x.png"; }  ?>" class="bg-primary" style="max-width:30px; max-height:30px; padding:2px; border-radius:10px;">

        <label class="text-primary"><small><?php echo $_SESSION['name'];?></small></label>

    </a>
        <ul class="dropdown-menu dropdown-menu-right text-center" role="menu" >
            <li role="presentation" class="dropdown-item " ><a href="usercredits.php"><i class="fas fa-chart-line shadow" style="color:green !important;"></i> &nbsp;Credits</a>
            </li>
            <li role="presentation" class="dropdown-item "><a href="useractivity.php"><i class="fas fa-chart-pie shadow" style="color:red !important;"></i> &nbsp;Activity</a>
            </li>
            <li role="presentation" class="dropdown-item "><a href="profile.php"> <i class="fas fa-user-alt shadow" style="color:purple !important;"></i> &nbsp; Profile </a>
            </li>
            <li role="presentation" class=" dropdown-item "><a style="color:#039be5 !important;" href="./logout.php"><i class="fas fa-sign-out-alt shadow"></i>&nbsp;Logout </a>
            </li>
        </ul>
    </li>
</ul>


  <!-- <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="upload/img/<?php //echo $_SESSION['uimage']; ?>" class="dropdown-image img-circle img-responsive" style="max-width:30px; max-height:30px;">
            <?php //echo $_SESSION['name'];?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                <li role="presentation" class="dropdown-item"><a href="profile.php">Credits</a>
                </li>
                <li role="presentation" class="dropdown-item"><a href="profile.php">Activity</a>
                </li>
                <li role="presentation" class="dropdown-item"><a href="profile.php">Profile </a>
                </li>
                <li role="presentation" class="active dropdown-item"><a href="./logout.php">Logout </a>
                </li>
            </ul>
        </div>
      </li> -->