<?php 
session_start();
include("connectionINPUT.php");
	include("functionsINPUT.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$skills = $_POST['skills'];
        $domain = $_POST['domain'];
        $linkedin = $_POST['linkedin'];

		// Check if the username already exists
		$check_username_query = "SELECT * FROM participater WHERE user_name = '$user_name'";
		$check_username_result = mysqli_query($con, $check_username_query);

		if (mysqli_num_rows($check_username_result) > 0)
		{
			echo "Username already exists. Please choose a different username.";
		}
		elseif(!empty($user_name) && !empty($skills) && !empty($domain) && !empty($linkedin) && !is_numeric($user_name))
		{

			//save to database
			//$user_id = random_num(20);
			//$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
			//$query = "insert into users (user_id,user_name,password,date) values (NULL,'$user_name','$password',NOW())";
            //INSERT INTO `participater` (`user_id`, `user_name`, `skills`, `domain`) VALUES (NULL, 'mm', 'python', 'frontend');
            $query = "insert into participater (user_id,user_name,skills,domain,linkedin) values (NULL,'$user_name','$skills','$domain','$linkedin')";

			if(mysqli_query($con, $query))
			{
				echo "<script>alert('User created successfully!');</script>";
				header("Location: userOUTPUT.php");
				die;
			
		}else
		{
			echo "Please enter some valid information!";
		}
	    }
	}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    
<body class="container">
	<style>

.container{
    width: 90vw;
    height: 70vw;
    background-image:url("Sign_up.png");
    background-position: center;
    background-size: cover;
    position: relative;
    align-items: center;
    justify-content: center;
    text-align: center;

}

.form-box{
    width: 35vw;
    height: 30vw;
    background-image: linear-gradient(3deg,rgba(255, 255, 255, 0) 0%, #1a0232 100% ); box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    min-height: 50vw; 
    font-size: 9px;
    text-align: center;
    align-items: center;
    justify-content: center;
    position: absolute;
    margin:5vw;
    left: 26vw; 
}
::placeholder{
    font-size: 10px;
    font-family:'Times New Roman', Times, serif;

}
h2{
    text-align: center;
    font-size: 30px;
    border-radius: 10px;
    color: #ffff;
    border: #080917;
    text-shadow: #1b1d46;
}
h1{
    margin: 40px;
    margin-bottom: 5vw;
    font-weight:100;
    text-align: start;
    color: #ffff;
    font-size: 16px;
    font-family:'Courier New', Courier, monospace;
    margin-left: 40px;
    margin-bottom: 2px;
}
input{
    height: 2.3vw;
    width: 17vw;
    border-style:hidden;
    border-radius: 7px;

}
p{
    color: #ffff;
    opacity: 0.8;
    align-items: center;
    font-size:medium;
}
.button{
    background-color: #3faa42;
    color: white;
    border-style: hidden;
    border-radius: 5vw;
    text-align: center;
    font-size:1.5vw;
    cursor: pointer;
    padding: 0.5vw 0.5vw;
}
.box{
    background-color: #ffffff;
    color: rgb(0, 0, 0);
    border-style: hidden;
    border-radius: 1vw;
    text-align:center;
    font-size:1.5vw;
    cursor: pointer;
    padding: 0.5vw 2vw;

}
img{
    margin:-2px;
    margin-right: 4px;
}
#mainbtn{
    margin-right: 40vw;
    margin-left: 2vw;
    color:#ffffff;
    font-size: 1.5vw;
}
#helpbtn{
    margin-left: 10vw;
    color: #3faa42;
    font-size: 1.5vw;
}
#pass{
    color: red;
    font-size: small;
}
#signin{
    font-size: 1vw;
}
#signup{
    font-size: 1vw;
    text-align: center;
}

	</style>

<div class="form-box">
        <h2 id="title">Sign up</h2>
		
		<form method="post">
			<div class="input">
				<div class="inputdata">
					<h1>Name:</h1>

			<input id="text" type="text" name="user_name" placeholder=" Username" required>
				</div>
			<div class="inputdata">
				<h1>skills:</h1>	
			    <input id="text" type="text" name="skills" placeholder=" skills" required>
			</div>
            <div class="inputdata">
				<h1>domain:</h1>	
			    <input id="text" type="text" name="domain" placeholder="domain" required>
			</div>
            <div class="inputdata">
				<h1>linkedin:</h1>	
			    <input id="text" type="text" name="linkedin" placeholder="linkedin" required>
			</div>
			<br>
			<br>
			<button class="button" id="signupbtn">Sign up</button>

			<a href="loginINPUT.php"><p id="signin">Already have an account?</p></a>
				
</body>
</html>