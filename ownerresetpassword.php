<html>
<head>
<title>
Reset Password
</title>
<style>
input[type=text],input[type=password],input[type=email]{
width:50%;
padding:15px;
margin: 5px 0 22px 0;
}
button{
background-color:dodgerblue;
color:white;
border:1px solid dodgerblue;
width:50%;
height:5%;
}
</style>
</head>
<body>
<h2 style="color:grey">Forgot Password!!!</h2>
<h4>Reset Your Password</h4>
<form method="get" action="ownerreset.php" >
UserName<br>
<input type="text" name="uname"><br><br>
New Password<br>
<input type="password" name="password1"><br><br>
Confirm Password<br>
<input type="password" name="password2"><br><br>
<button type="submit">RESET</button><br><br>
<a href="main.php" style="text-decoration:none">Back Home</a>
</form>
</body>
</html>


 