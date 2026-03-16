<!doctype html>
<html>
<head>
<title>Register</title>

<style>

body{
margin:0;
padding:0;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
font-family:Arial;

background-image:url('https://img.freepik.com/free-vector/geometric-science-education-background-vector-gradient-blue-digital-remix_53876-125993.jpg?semt=ais_rp_50_assets&w=740&q=80');
background-size:cover;
background-position:center;
}

/* Glass form */

.register-container{
width:380px;
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

</style>

</head>

<body>

<div class="register-container">

<h1>Registration</h1>

<form method="POST" action="/register">
@csrf

<input type="text" name="name" placeholder="Enter Username" autocomplete="off" required>

<input type="email" name="email" placeholder="Enter Email" autocomplete="off" required>

<input type="password" name="password" placeholder="Enter Password" autocomplete="off" required>

<input type="submit" value="Register">

</form>

<p style="color:white;margin-top:10px;">
Already have account?  
<a href="{{ route('login') }}">Login</a>
</p>

</div>

</body>
</html>