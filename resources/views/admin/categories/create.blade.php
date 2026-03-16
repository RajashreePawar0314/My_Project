<!DOCTYPE html>
<html>

<head>

<title>Add Category</title>

<style>

body{
font-family:Arial;
background:#f4f6f9;
}

.form-box{
width:500px;
margin:auto;
margin-top:50px;
background:white;
padding:30px;
border-radius:6px;
box-shadow:0 3px 8px rgba(0,0,0,0.1);
}

h2{
text-align:center;
margin-bottom:20px;
}

input,select{
width:100%;
padding:10px;
margin-bottom:15px;
border:1px solid #ccc;
border-radius:4px;
}

button{
width:100%;
background:#28a745;
color:white;
padding:10px;
border:none;
border-radius:4px;
}

.back-btn{

color:blue;

text-decoration:none;
border-radius:4px;
transition:0.3s;
}

.back-btn:hover{
background:#D3D3D3;
}
</style>

</head>

<body>

<div class="form-box">

<h2>Add Category</h2>

<form action="{{ route('categories.store') }}" method="POST">

@csrf

<label>Category Name</label>
<input type="text" name="name">

<label>Parent Category</label>

<select name="parent_id">

<option value="">None</option>

@foreach($categories as $cat)

<option value="{{ $cat->id }}">
{{ $cat->name }}
</option>

@endforeach

</select>

<button>Add Category</button><br><br>
<a class="back-btn" href="{{ route('categories.index') }}">
← Back to Categories
</a>
</form>

</div>

</body>

</html>