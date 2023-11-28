<!DOCTYPE html> 
<html> 
<head>
<title> Login Page </title>
<style> 
Body {
  font-family: Calibri, Helvetica, sans-serif;
}
button { 
       background-color: dodgerblue; 
       width: 30%;
        color: orange; 
        padding: 15px; 
        margin: 10px 0px; 
        border: none; 
        cursor: pointer;	
         } 
 form { 
        border: 3px solid grey;
	  width:50%;
 
    } 
 input[type=text], input[type=password] { 
        width: 50%; 
        margin: 8px 0;
        padding: 12px 20px; 
        display: inline-block; 
        border: 2px solid green; 
        box-sizing: border-box; 
    }
 button:hover { 
        opacity: 0.7; 
    }  
 .container { 
        padding: 25px; 
    } 
</style> 
</head>  
<body>  
    <center> <h1> Admin Login Form </h1> </center> 
    <form action="checkadminlogin.php">
        <div class="container"> 
            <label>Username : </label> 
            <input type="text" placeholder="Enter Username" name="username" required><br>
            <label>Password : </label> 
            <input type="password" placeholder="Enter Password" name="password" required><br>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit">Login</button><br>
            <input type="checkbox" checked="checked"> Remember me 
            <a href="adminresetpassword.php">Forgot password? </a><br>
		<a href="main.php">Back Home</a>
        </div> 
    </form>   
</body>   
</html>

 
