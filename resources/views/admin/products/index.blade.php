<!DOCTYPE html>
<html>

<head>

<title>Products</title>

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
background:orange;
color:white;
border:none;
padding:6px 10px;
border-radius:4px;
}
.dashboard-btn{
background:green;
}

.dashboard-btn:hover{
    color:#006400;
}

.add-btn{
margin-left:10px;
}

.btn:hover{
    background:blue;
}
.delete-btn:hover{
    background:red;
}
</style>

</head>

<body>

<!--<div class="header">

Products

<a class="btn" style="float:right" href="{{ route('products.create') }}">
Add Product
</a>

</div>-->


<div class="header">

<a class="btn dashboard-btn" href="{{ url('admin_dashboard') }}">
Dashboard
</a>

<a class="btn add-btn" href="{{ route('products.create') }}">
Add Product
</a>

</div>



<div class="container">

<table>

<tr>
<th>Name</th>
<th>Category</th>
<th>Subcategory</th>
<th>Price</th>
<th>Date</th>
<th>Action</th>
</tr>

@foreach($products as $p)

<tr>

<td>{{ $p->name }}</td>

<td>{{ $p->category->name ?? '' }}</td>

<td>{{ $p->subcategory->name ?? '-' }}</td>

<td>{{ $p->price }}</td>

<td>{{ $p->created_at }}</td>

<td>

<a class="btn" href="{{ route('products.edit',$p->id) }}">
Edit
</a>

<form action="{{ route('products.destroy',$p->id) }}" method="POST" style="display:inline">

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