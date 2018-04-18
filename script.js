var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1;
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
today = yyyy+'-'+mm+'-'+dd;
document.getElementById("dob").setAttribute("max", today);


$(document).ready(function(){

$("#submit").click(function(){
    
var fname = $("#fname").val();
var lname = $("#lname").val();
var age = $("#age").val();
var dob = $("#dob").val();
var contact = $("#contact").val();
var gender = $("#gender").val();
var txtArea = $("#txtArea").val();    
function getAge(dob) {
    var today = new Date();
    console.log(today);
    var birthDate = new Date(dob);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }    
   return age;      
}
var age1=getAge(dob);
var dataString = 'fname1='+ fname + '&lname1='+ lname + '&age1='+ age + '&dob1='+ dob + '&contact1='+ contact + '&gender1='+ gender + '&txtArea1='+ txtArea;
    
if(fname==''||age==''||lname==''||contact==''||dob==''||gender=='None selected')
{
alert("Please Fill All Fields");
 return;  
}
if(/[^A-Za-z\s]/g.test(fname)){     
   alert("Enter correct First Name.");
    return;
   } 
if(/[^A-Za-z]/g.test(lname)){     
   alert("Enter correct Last Name.");
    return;
   }  
if(/[^0-9]/g.test(age)||age<=0||age>=100){                                           
   alert("Enter correct Age.");
    return;
   }   
if(/[^0-9]/g.test(contact)||contact.length!==10){                                           
   alert("Enter 10 digit contact number.");
    return;
   }  
      
if(age != age1){                                           
   alert("Enter correct D-O-B.\nAge doesn't match with D-O-B.");
    return;
   } 
       
else
{

$.ajax({
type: "POST",
url: "ajaxsubmit.php",
data: dataString,
cache: false,
success: function(result){
alert(result);
}
});
}
return false;
});
    
    
});