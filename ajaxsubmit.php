<?php

$connection = pg_connect("host=ec2-54-243-213-188.compute-1.amazonaws.com port="5432" dbname=ddumt0gva15vru user=kzbjkpldmhhtzn password=a09feda452b67d73e16cca067982a3c636db872b5457fdb35aa732336d292325"); // Establishing Connection with Server..


//Fetching Values from URL
$fname2=$_POST['fname1'];
$lname2=$_POST['lname1'];
$age2=$_POST['age1'];
$dob2=$_POST['dob1'];
$contact2=$_POST['contact1'];kzbjkpldmhhtzn
$gender2=$_POST['gender1'];
$txtArea2=$_POST['txtArea1'];

//Insert query
$query = pg_query($connection, "insert into form_element(fname, lname, age, dob, contact, gender, txtArea) values ('$fname2', '$lname2', '$age2','$dob2','$contact2','$gender2','$txtArea2')");
echo "Form Submitted Succesfully";
pg_close($connection); // Connection Closed

?>