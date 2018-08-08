<footer class="container-fluid text-center" style=" width:100%;">
    <div class="row">
        <div class="col-lg-4 col-md-6 footer-navigation" style="display:grid;">
             <h3><a href="#"><span><img src="assets/img/dccLogo.svg" alt="Dot" style="width:40px; margin-top:-11px; margin-right:5px; background-color:white; border-radius:10px;">CodeCommunity </span></a></h3>
            <p class="links"><a href="#">Home</a><strong> &#xB7; </strong><a href="#">About</a><strong> &#xB7; </strong>
                <a
                href="#">Faq</a><strong> &#xB7; </strong><a href="#">Contact</a>
            </p>
            <p class="company-name">dotcodecommunity&#xA9; 2018</p>
        </div>
        <div class="col-lg-4 col-md-6 footer-contacts">
            <div><span class="fa fa-map-marker footer-contacts-icon"> </span>
                <p style="font-weight:normal; font-size:12px;"><b style="letter-spacing: 5px;">DotCodeCommunity</b>
                    <br>Saranathan College of Engineering
                    <br>Computer Science Department</p>
            </div>
            <!-- <div><i class="fa fa-phone footer-contacts-icon"></i>

                    <p class="footer-center-info email text-left"></p>

                </div> -->
            <div><i class="fa fa-envelope footer-contacts-icon"></i>
                <p> <a href="#" target="_blank">dotcodecommunity@gmail.com</a>
                </p>
            </div>
        </div>
        <div class="clearfix d-none d-sm-block d-md-none-block"></div>
        <div class="col-lg-4 footer-about">
             <h4>About </h4>
            <p style="font-size:20px;">
                <img src="assets/img/dccLogo.svg" alt="Dot" style="width:25px; background-color:white; border-radius:8px; margin-top:-5px; margin-right:5px;  ">CodeCommunity</p>
                <div class="social-links social-icons">
                <a href="https://www.facebook.com/dotcodecommunity/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/dotcodecommunity/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://github.com/dotcodecommunity" target="_blank"><i class="fab fa-github"></i></a>
                <a href="https://www.youtube.com/channel/UCpz3ZDxmYLnLAbt6ptf5W9Q" target="_blank"><i class="fab fa-youtube" alt="Youtube"></i></a>
            </div>
        </div>
    </div>
</footer>

    <!--all java scripts are downgraded here -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/js/mdb.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
  
    <script>
        
        $(document).ready(function(){
        $("#myBtn").click(function(){
        $("#myModal").modal();
        });
        });

        // When the user scrolls down 20px from the top of the document, show the button
        // window.onscroll = function() {scrollFunction()};
        // function scrollFunction() {
        // if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        // document.getElementById("myBtn12").style.display = "block";
        // } else {
        // document.getElementById("myBtn12").style.display = "none";
        // }
        // }

        // When the user clicks on the button, scroll to the top of the document
        // function topFunction() {
        // document.body.scrollTop = 0;
        // document.documentElement.scrollTop = 0;
        // }


        function validateForm1(){
        var your_email = $.trim($("#email").val());
        if (!isValidEmail(your_email)) {
        alert("Enter valid email.");
        $("#email").focus();
        return false;
        }
        }
        function validateForm() {
        var your_name = $.trim($("#uname").val());
        //var your_email = $.trim($("#email").val());
        var pass1 = $.trim($("#pass1").val());
        var pass2 = $.trim($("#pass2").val());
        // validate name
        if (your_name == "") {
        alert("Enter your name.");
        $("#uname").focus();
        return false;
        } else if (your_name.length < 3) {
        alert("Name must be atleast 3 character.");
        $("#uname").focus();
        return false;
        }

        // validate email
        if (!isValidEmail(your_email)) {
        alert("Enter valid email.");
        $("#email").focus();
        return false;
        }

        // validate subject
        if (pass1 == "") {
        alert("Enter password");
        $("#pass1").focus();
        return false;
        } else if (pass1.length < 6) {
        alert("Password must be atleast 6 character.");
        $("#pass1").focus();
        return false;
        }

        if (pass1 != pass2) {
        alert("Password does not matched.");
        $("#pass2").focus();
        return false;
        }

        return true;
        }

        function isValidEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
        }

        $(function() {  
            $("body").niceScroll();
        });
    </script>
     <!-- <script src="./assets/js/youtube.js"></script> -->
</body>
</html>
