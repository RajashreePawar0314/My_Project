<!doctype html>
<html>
<head>
<title>Select Login</title>

<style>

body{
margin:0;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
font-family:Arial;

/* background */
background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
background-size:400% 400%;
animation:bgmove 8s infinite alternate;
}

@keyframes bgmove{
0%{background-position:left;}
100%{background-position:right;}
}

.container{
text-align:center;
background:rgba(255,255,255,0.1);
backdrop-filter:blur(10px);
padding:50px;
border-radius:15px;
box-shadow:0 10px 40px rgba(0,0,0,0.4);
animation:fade 1.2s ease;
}

@keyframes fade{
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
color:white;
margin-bottom:30px;
}

/* buttons */

.btn{
display:inline-block;
padding:12px 30px;
margin:10px;
background:#00c6ff;
color:white;
text-decoration:none;
border-radius:6px;
font-size:16px;
transition:0.3s;
}

.btn:hover{
background:#0072ff;
transform:scale(1.08);
}

</style>

</head>

<body>

<div class="container">

<h1>Select Login Type</h1>

<a href="/admin_login" class="btn">Admin</a>

<a href="/login" class="btn">Web User</a>

</div>

</body>
</html>