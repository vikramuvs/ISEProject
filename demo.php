<!doctype html> 
<html>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<button id="myBtn" value="click me" class="btn btn-primary" >Click me</button>
<div id="phase" style="height: auto; color: black;">
</div>
<div id="phase1" style="height: auto; color: black;">
</div>
</html>

 <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>

 <script>
 	$(document).ready(function()
 				{
 						$.ajax({           url:"demo1.php",
                                           method:"GET",
                                           data:{get1:"Yes"},
                                           dataType:"json",
                                           success:function(data)
                                           {
                                            $('#phase').html(data.source);
                                            $('#phase1').html(data.get);
                                           },
                                           error:function(d)
                                           {
                                           	$('#phase').html("Request Failed");
                                           }
 								});
 				});
 </script>


<!--  $("button").click(function(){
        $.ajax({url: "demo_test.txt", success: function(result){
            $("#div1").html(result);
        }});
    }); -->