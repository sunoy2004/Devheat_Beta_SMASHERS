<?php 

session_start();

	include("connectionMAIN.php");
	include("functionsMAIN.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: dev_heat.html");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="signin_up.css">
    <script src="login.js"></script>
</head>
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
        <h2 id="title">Sign in</h2>
		
		<form method="post">
		<div class="input">
                <div class="inputdata">
                    <h1>Name:</h1>		
			<input id="text" type="text" name="user_name" placeholder=" Username" required><br><br>
			</div>
                <div class="inputdata">
                    <h1>Password:</h1>
			<input id="text" type="password" name="password"  placeholder=" **********" required><br><br>
			</div>
                <br>
                <br>
				<button class="button" id="signinbtn" onclick="sibtn()">Sign in</button>

			<a href="signupMAIN.php"><p id="signup">New Member?</p></a>
			<p>--------------------------- OR --------------------------</p>
                <br>
                <git class="box"><a href="https://github.com/sunoy2004/Devheat_Beta_SMASHERS"><img src="git.png" height="12" width="12">Continue with GitHub</git>
                <br><br><br>
                <a href="https://github.com/sunoy2004/Devheat_Beta_SMASHERS/blob/main/Help"><p id="pass">Forgot Password ?</p></a>
                
            </div>
		</form>
	</div>
	<a href="dev_heat.html"  id="mainbtn"><img src="arrow.png" height="12vw">Back to main page</button>
<a href="https://github.com/sunoy2004/Devheat_Beta_SMASHERS/blob/main/Help"  id="helpbtn"><img src="help.png" height="12vw">Help</button>
</body>
</html>