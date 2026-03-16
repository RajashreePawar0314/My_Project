<!doctype html>
<html>
<head>
<title>Admin Login</title>

<meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">

<style>

body{
margin:0;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
font-family:Arial;

/* tech gradient background */
background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
background-size:400% 400%;
animation:bgmove 10s ease infinite;
}

/* background animation */

@keyframes bgmove{
0%{background-position:0% 50%;}
50%{background-position:100% 50%;}
100%{background-position:0% 50%;}
}

/* login card */

.login-box{

width:350px;
padding:40px;
text-align:center;
border-radius:15px;

background:rgba(255,255,255,0.1);
backdrop-filter:blur(10px);
-webkit-backdrop-filter:blur(10px);

box-shadow:0 10px 40px rgba(0,0,0,0.4);

animation:fade 1.2s ease;
}

/* card animation */

@keyframes fade{
from{
opacity:0;
transform:translateY(40px);
}
to{
opacity:1;
transform:translateY(0);
}
}

h2{
color:white;
margin-bottom:20px;
}

input{
width:100%;
padding:10px;
margin:10px 0;
border:none;
border-radius:6px;
outline:none;
}

/* button */

button{
width:100%;
padding:12px;
border:none;
border-radius:6px;
background:#00c6ff;
color:white;
font-size:16px;
cursor:pointer;
transition:0.3s;
}

button:hover{
background:#0072ff;
transform:scale(1.05);
}

.error{
color:red;
margin-bottom:10px;
}

</style>

</head>

<body>



<div class="login-box">

<h2>Admin Login</h2>

@if(session('error'))
<p class="error">{{ session('error') }}</p>
@endif

<form action="/admin_login" method="POST">
@csrf

<input type="email" name="email" placeholder="Admin Email" autocomplete="off" required>

<input type="password" name="password" placeholder="Password" autocomplete="off" required>

<button type="submit">Login</button>

</form>

</div>
<script>
window.onload = function () {
    document.querySelectorAll("form").forEach(form => form.reset());
}
</script>
</body>
</html>