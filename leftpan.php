<div id=wrapper>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <div class="panel" style="box-shadow: 5px 5px 5px 10px #f3f3f3"  >
        <div class="panel-heading"> <strong><span class="glyphicon glyphicon-list-alt"></span><b>OnGoingProjects</b></strong></div>
          <div class="panel-body">
            <div class="row">
              <div class="col-12" align="left" >
                <ul class="demo1">
                  <?php include('./dbconnection.php');
                    $ret=mysqli_query($DB,"select * from news ORDER BY news_id desc limit 5");
                  while($row=mysqli_fetch_array($ret))
                  {?>
                
                  <li class="news-item">
                  <table > 
                  
                  <tr  >
                  
                  <?php if($row['imagefilepath']){ ?>
                      <td>
                      <img src="./newsandevents/newsimages/<?php echo $row['imagefilepath']; ?>" style="margin-right:10px;" width="" height="50" class="img-rectangle" /></td>
                      <?php } ?>
                      <td ><a href="./news&events.php"><?php echo $row['title']; ?></a></td>
                  </tr>
                  </table>
                  </li>
                  <?php } ?>
                </ul>
              </div>
             </div>
            </div>
          </div>
        </div>
  <!-- <container>
    <div class="jumbotron">
      <h2 style="text-align:center;">ADDs</h2>
    </div>
  </container>
  <container>
      <div class="jumbotron">
        <h2 style="text-align:center;">ADDs</h2>
       </div>
  </container>
  <container>
      <div class="jumbotron">
        <h2 style="text-align:center;">ADDs</h2>
      </div>
  </container>
  <container>
      <div class="jumbotron">
        <h2 style="text-align:center;">ADDs</h2>
      </div>
  </container>
  <container>
      <div class="jumbotron">
        <h2 style="text-align:center;">ADDs</h2>
      </div>
  </container> -->

