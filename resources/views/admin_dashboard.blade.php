<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<style>

body{
margin:0;
font-family:Arial;
background:#f4f6f9;
}

.header{
background:#343a40;
color:white;
padding:15px;
font-size:22px;
}

.container{
width:90%;
margin:auto;
margin-top:40px;
}

.cards{
display:flex;
gap:30px;
}

.card{
background:#D3D3D3;
padding:30px;
flex:1;
border-radius:8px;
box-shadow:0 3px 8px rgba(0,0,0,0.1);
text-align:center;
}

.card h3{
margin-bottom:20px;
}

.btn{
background:#007bff;
color:white;
padding:10px 18px;
text-decoration:none;
border-radius:5px;
}

.logout{
float:right;
color:white;
text-decoration:none;
font-size:16px;
}
.logout:hover{
    color:red;
}
.btn:hover{
    background:blue;
}
</style>

</head>

<body>

<div class="header">

Admin Dashboard

<a class="logout" href="{{ url('admin/logout') }}">Logout</a>

</div>

<div class="container">

<div class="cards">

<div class="card">

<h3>Category Management</h3>

<p>Add, edit or delete categories</p>

<a class="btn" href="{{ url('admin/categories') }}">
Manage Categories
</a>

</div>

<div class="card">

<h3>Product Management</h3>

<p>Add, edit or delete products</p>

<a class="btn" href="{{ url('admin/products') }}">
Manage Products
</a>

</div>

</div>

</div>

</body>
</html>