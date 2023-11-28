<html>
<head>
<style>
input[type=text], input[type=password],input[type=email], textarea {  
  width: 100%;  
  padding: 15px;  
  margin: 5px 0 22px 0;  
  display: inline-block;  
  border: none;  
  background: #f1f1f1;  
}  
.container{
padding:25px;
}
button{
background-color:dodgerblue;
color:white;
width:30%;
padding:15px;
}
</style>
</head>
<body>
<form method="get" action="ownerregisterupload.php">
<div class="container">
ID:<input type="text" name="id"><br><br>
Full Name:<input type="text" name="name"><br><br>
User Name:<input type="text" name="uname"><br><br>
Password:<input type="password" name="pwd"><br><br>
Email Address:<input type="email" name="email"><br><br>
Mobile Number:<input type="text" name="mno"><br><br>
<a href="ownerlogin.php" >sign in</a><br><br>
<center><button type="submit" name="submit">sign up</button><br><br></center>
</div>
</form>
</body>
</html>