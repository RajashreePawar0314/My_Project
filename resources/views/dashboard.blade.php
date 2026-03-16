<!doctype html>
<html>
<head>
<title>Dashboard</title>

<style>

body{
margin:0;
font-family:Arial;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background: linear-gradient(270deg,#6a11cb,#2575fc,#6a11cb);
background-size:600% 600%;
animation: gradientMove 8s ease infinite;
}

/* Background animation */

@keyframes gradientMove{
0%{background-position:0% 50%;}
50%{background-position:100% 50%;}
100%{background-position:0% 50%;}
}

.container{
background:white;
padding:40px;
border-radius:12px;
box-shadow:0 10px 30px rgba(0,0,0,0.2);
text-align:center;
animation: fadeIn 1.5s ease;
}

/* Fade animation */

@keyframes fadeIn{
from{
opacity:0;
transform:translateY(30px);
}
to{
opacity:1;
transform:translateY(0);
}
}

h1{
color:#333;
margin-bottom:20px;
}

.btn{
display:inline-block;
padding:10px 20px;
background:#2575fc;
color:white;
text-decoration:none;
border-radius:5px;
transition:0.3s;
}

/* Button hover animation */

.btn:hover{
background:#6a11cb;
transform:scale(1.1);
}

</style>

</head>

<body>

<div class="container">

<h1>Welcome {{ session('user_name') }}</h1>

<p>You are successfully logged in</p>

<a href="/logout" class="btn">Logout</a>

</div>

</body>
</html>