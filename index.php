<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>iokokok</title>
</head>
<body>
<form>
	<input type="text" name="id" id="id_user">
	<input type="text" name="username" id="username">
	<input type="text" name="password3" id="password">
	<input type="button" value="submit" id="submit_value">
 </form>

 <table>
 	<tr>
 	<th>sr.no</th>
 	<th>Username</th>
 	<th>Password</th>
 	<th>edit</th>
 	<th>Delete</th>
</tr>

<?php
require "connection.php";

$si=1;
$stmt = $conn->prepare("SELECT * FROM login"); 
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
if($stmt->rowCount()>0){
foreach(($stmt->fetchAll()) as $k=>$row) {
echo '
		<tr>
			<td>'.$si.'</td>
			<td>'.$row['username'].'</td>
			<td>'.$row['password'].'</td>
			<td><input type="button" value="edit" onclick=\'edit_product("' .$row["id"]. '","' .$row["username"]. '","' .$row["password"]. '")\'></td>
			<td><input type="button" value="delete" onclick=\'delete_product("' .$row["id"]. '")\'></td>
		</tr>
	';

	$si++;
	}

}
else{
	echo 'no data';
}

?>

 </table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script type="text/javascript">

    function edit_product(id,username,password)
    { 
// the id or code proname or pro des names can be anything but after entering in the loop u should use those variables
$("#id_user").val(id);
$("#username").val(username);
   $("#password").val(password);


             // Change text of input button 
                $("#submit_value").prop("value", "Update");

 // window.open('create_user_login.php?pkid='+id);

    }; 


    function delete_product(id_user)
    { 
 
 
      var dataString = "id_user="+id_user;


    $.ajax({  
    type: 'POST',  
    url: 'delete_user.php', 
    data: dataString,
    success: function(response) {

        if (response==1) {
           alert("Deleted successfully"); 
            
           location.reload();
        } 


    }
});

    }; 




 	$(document).ready(function() {
$('#submit_value').on('click', function() {

	if($('#submit_product').val() == 'Submit'){
// $("#butsave").attr("disabled", "disabled");
var username = $('#username').val();
var password = $('#password').val();

datastring = "username="+username+"&password="+password;

if(username!="" && password!=""){
	$.ajax({
		url: "save.php",
		type: "POST",
		data: datastring,
		success: function(response){
			if(response==1){
				alert("added successfully"); 						
			}
			else{
				alert("Error occured !");
			}
			
		}
	});
	}
	else{
		alert('Please fill all the field !');
	}

}
else{

	var id_user = $('#id_user').val();

	var username = $('#username').val();
var password = $('#password').val();

datastring = "username="+username+"&password="+password+"&id_user="+id_user;

if(username!="" && password!=""){
	$.ajax({
		url: "update.php",
		type: "POST",
		data: datastring,
		success: function(response){
			if(response==1){
				alert("updated successfully"); 
				location.reload();						
			}
			else{
				alert("Error occured !");
			}
			
		}
	});
	}
	else{
		alert('Please fill all the field !');
	}

}
});
});
 </script>
</body>
</html>