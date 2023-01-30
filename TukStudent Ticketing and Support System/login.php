<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TUK STMS</title>
 	

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<style style="background-color: #008080">
	body{
		width: 100%;
	    height: calc(100%);
	    position: fixed;
	    top:0;
	    left: 0
	    background-color: #008080
		}
	main#main{
		width:100%;
		height: calc(100%);
		display: flex;
	}

</style>

<body class="bg-#008080" style="background-color: #008080">


  <main id="main" >
  	
  		<div class="align-self-center w-100" >
			<div class="align-self-center w-100" style="margin-left: 47%;" > <img src="./assets/images/tuklogo.png" alt="tuk logo" > </div>
		  
		<h4 class=" text-size-40 text-center pb-4 mb-10" style="color:#cea775; font-size:80px;" ><b>TECHNICAL UNIVERSITY OF KENYA</b></h4>
		<h4 class="text-white text-center pb-4 mb-10"><b>TUK STUDENT TICKETING SUPPORT SYSTEM</b></h4>
  		<div id="login-center" class="bg-#008080 row justify-content-center">
  			<div class="card col-md-4 ">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label text-dark">Email</label>
  							<input type="text" id="username" name="username" class="form-control form-control-sm">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label text-dark">Password</label>
  							<input type="password" id="password" name="password" class="form-control form-control-sm">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label text-dark">Select your Role</label>
  							<select class="custom-select custom-select-sm" name="type">
  								<option value="3">Student</option>
  								<option value="2">Staff</option>
  								<option value="1">Admin</option>
  								
  							</select>
  						</div>
  						<center><button class=" bg-#008080 btn-sm btn-block btn-wave col-md-9 row-mt-6 btn-dark" style="background-color: 		#4CAF50; border: none;
							color: white;
							padding: 10px 30px;
							text-align: center;
							text-decoration: none;
							display: inline-block;
							font-size: 16px;">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
  		</div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
	$('.number').on('input',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9 \,]/, '');
        $(this).val(val)
    })
</script>	
</html>