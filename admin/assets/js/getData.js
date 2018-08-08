$(document).ready(function(){
    // code to get all records from table via select box
    $("#category").change(function() {
    var id = $(this).find(":selected").val();
    var dataString = 'empid='+ id;
    $.ajax({
    url: 'addgame.php',
    dataType: "json",
    data: dataString,
    cache: false,
    success: function(employeeData) {
    if(employeeData) {
    $("#heading").show();
    $("#no_records").hide();
    $("#cat_id").text(employeeData.category_id);
    $("#cat_name").text(employeeData.categoryname);
    $("#records").show();
    } else {
    $("#heading").hide();
    $("#records").hide();
    $("#no_records").show();
    }
    }
    });
    })
    });