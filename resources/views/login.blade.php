<!doctype html>
<html>
<head>
<title>Login</title>

<style>

body{
margin:0;
padding:0;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
font-family:Arial;

background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCcVgkS8DHVP6Ni8Ebzm3KJytvOE80P4uFTg&s');
background-size:cover;
background-position:center;
}

/* Glass form */

.login-container{
width:350px;
padding:40px;
border-radius:12px;

background:rgba(255,255,255,0.15);
backdrop-filter:blur(12px);
-webkit-backdrop-filter:blur(12px);

box-shadow:0 8px 32px rgba(0,0,0,0.3);

text-align:center;
animation:fadeIn 1.2s ease;
}

@keyframes fadeIn{
from{
opacity:0;
transform:translateY(40px);
}
to{
opacity:1;
transform:translateY(0);
}
}

h1{
color:white;
margin-bottom:20px;
}

input{
width:100%;
padding:10px;
margin:10px 0;
border:none;
border-radius:5px;
outline:none;
}

input[type="submit"]{
background:#00c6ff;
color:white;
cursor:pointer;
transition:0.3s;
}

input[type="submit"]:hover{
background:#0072ff;
transform:scale(1.05);
}

a{
color:#00c6ff;
text-decoration:none;
}

a:hover{
text-decoration:underline;
}

</style>

</head>

<body>

<div class="login-container">

<h1>LOGIN</h1>

@if(session('error'))
<p style="color:red">{{ session('error') }}</p>
@endif

<form action="/login" method="POST">
@csrf

<input type="email" name="email" placeholder="Enter Email" autocomplete="off" required>

<input type="password" name="password" placeholder="Enter Password" autocomplete="off" required>

<input type="submit" value="Login">

</form>

<p style="color:white;margin-top:10px;">
Don't have account?  
<a href="{{ route('register') }}">Register</a>
</p>

</div>

</body>
</html>