<!DOCTYPE html>
<html lang="en">

<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>    
    
    
<style>
    
.navbar {
  overflow: hidden;
  background-color: #FAFAFA;
  opacity: 0.8;
  top: 0;
  width: 100%;
  height: 60px;
  text-align: center;
}

body {
  background-image: url("https://image.ibb.co/fqkgMw/dust_scratches.png");
}

.horizontal-center-row {
  display: flex;
  justify-content: center;
}

    .data {
  padding: 10px 100px 10px 100px;
  background-color: floralwhite;
}
    
</style>

    
<div class="navbar">
    
	<h1>
		<b>Patient Details</b>
	</h1>
</div>
<div class="container">
    
	<div class = "row text-center horizontal-center-row">
        <button class="btn btn-primary" onclick="window.location.href='./index.html'">Add New Patient Details</button>
		<div class="col-xs-4 col-md-4">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search by Patient Name" id="txtSearch"/>
				<div class="input-group-btn">
					<button class="btn btn-primary" type="submit" id="getMessage">Find</button>
				</div>
			</div>
		</div>
	</div>
	<div >
		<div class = "message" style="margin-top: 20px;"></div>
	</div>
</div>
</html>


<?php

$connection = pg_connect("host=ec2-54-243-213-188.compute-1.amazonaws.com port="5432" dbname=ddumt0gva15vru user=kzbjkpldmhhtzn password=a09feda452b67d73e16cca067982a3c636db872b5457fdb35aa732336d292325");

$query = "SELECT * FROM form_element";
$res = pg_query($connection, $query);
$data_array = array();
while($rows =pg_fetch_assoc($res)) {
    $data_array[] = $rows; 
} 
$dataA =json_encode($data_array);
echo "<script>var data='".$dataA."'</script>";
pg_close($connection); 

?>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<script>
$(document).ready(function() {
   var html = "";
   var newData=JSON.parse(data);
    newData.forEach(function(val) {    
    html += "<div><div class='data text-center'>";
    html += "<h3><strong>Patient Name</strong>: " + val.fname +" " + val.lname + "</h3>";
    html += "<strong>Age</strong>: " + val.age + "<br>";
    html += "<strong>D-O-B</strong>: " + val.dob + "<br>";
    html += "<strong>Contact</strong>: " + val.contact + "<br>";
    html += "<strong>Gender</strong>: " + val.gender + "<br>";
    html += "<strong>Message/Information</strong>: " + val.txtArea + "<br>"; 
    html += "</div><br></div>";
   }); 
   $(".message").html(html);
    

     function searchText() { 
            var searchField = $('#txtSearch').val();
                var html = "";
                nwData = newData.filter(function(val) {
                    var lowcase1=val.fname.toLowerCase();
                    var lowcase2=val.lname.toLowerCase();
                    var lowcase3=searchField.toLowerCase();
                   if(~lowcase1.indexOf(lowcase3)||~lowcase2.indexOf(lowcase3)){
       return val.fname;
     }
});
                     nwData.forEach(function(val) {
                      html += "<div><div class='data text-center'>";
    html += "<h3><strong>Patient Name</strong>: " + val.fname +" " + val.lname + "</h3>";
    html += "<strong>Age</strong>: " + val.age + "<br>";
    html += "<strong>D-O-B</strong>: " + val.dob + "<br>";
    html += "<strong>Contact</strong>: " + val.contact + "<br>";
    html += "<strong>Gender</strong>: " + val.gender + "<br>";
    html += "<strong>Message/Information</strong>: " + val.txtArea + "<br>"; 
    html += "</div><br></div>";
                     });
        $(".message").html(html); 
    }
    
    $("#getMessage").on("click", function(){ 
             searchText();
         });
    
});
</script>