<!DOCTYPE html>
<html>

<head>

<title>Categories</title>

<style>

body{
font-family:Arial;
background:#f4f6f9;
margin:0;
}

.header{
background:#343a40;
color:white;
padding:15px;
font-size:20px;
display:flex;
justify-content:space-between;
align-items:center;
}

.container{
width:90%;
margin:auto;
margin-top:30px;
}

.btn{
background:#007bff;
color:white;
padding:8px 14px;
text-decoration:none;
border-radius:5px;
transition:0.3s;
}

.dashboard-btn{
background:green;
}

.dashboard-btn:hover{
    background:blue;;
}

.add-btn{
margin-left:10px;
}


table{
width:100%;
border-collapse:collapse;
background:white;
margin-top:20px;
}

th,td{
padding:12px;
border-bottom:1px solid #ddd;
text-align:center;
}

th{
background:#007bff;
color:white;
}

tr:hover{
background:#f1f1f1;
}

.delete-btn{
background:red;
color:white;
border:none;
padding:6px 10px;
border-radius:4px;
}

</style>

</head>

<body>

<!--<div class="header">

Categories

<a class="btn" style="float:right" href="{{ route('categories.create') }}">
Add Category
</a>

</div>-->
<div class="header">

<a class="btn dashboard-btn" href="{{ url('admin_dashboard') }}">
Dashboard
</a>

<a class="btn add-btn" href="{{ route('categories.create') }}">
Add Category
</a>

</div>
<div class="container">

<table>

<tr>
<th>Name</th>
<th>Parent Category</th>
<th>Date</th>
<th>Action</th>
</tr>

@foreach($categories as $cat)

<tr>

<td>{{ $cat->name }}</td>

<td>{{ $cat->parent->name ?? '-' }}</td>

<td>{{ $cat->created_at }}</td>

<td>

<a class="btn" href="{{ route('categories.edit',$cat->id) }}">
Edit
</a>

<form action="{{ route('categories.destroy',$cat->id) }}" method="POST" style="display:inline">

@csrf
@method('DELETE')

<button class="delete-btn">Delete</button>

</form>

</td>

</tr>

@endforeach

</table>

</div>

</body>

</html>