<!DOCTYPE html>
<html>

<head>

<title>Add Product</title>

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

input,select,textarea{
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

<h2>Add Product</h2>

<form action="{{ route('products.store') }}" method="POST">

@csrf

<label>Product Name</label>
<input type="text" name="name">

<label>Category</label>

<select name="category_id" id="category">

<option value="">Select Category</option>

@foreach($categories as $cat)

<option value="{{ $cat->id }}">
{{ $cat->name }}
</option>

@endforeach

</select>

<label>Subcategory</label>

<select name="subcategory_id" id="subcategory">

<option value="">Select Subcategory</option>

</select>

<label>Price</label>

<input type="text" name="price">

<label>Description</label>

<textarea name="description"></textarea>

<button>Add Product</button><br><br>
<a class="back-btn" href="{{ route('products.index') }}">
← Back to Products
</a>
</form>

</div>

<script>

document.getElementById('category').addEventListener('change',function(){

var categoryId = this.value;

fetch('/get-subcategories/'+categoryId)

.then(response=>response.json())

.then(data=>{

var sub = document.getElementById('subcategory');

sub.innerHTML='<option value="">Select Subcategory</option>';

data.forEach(function(item){

sub.innerHTML += `<option value="${item.id}">${item.name}</option>`;

});

});

});

</script>

</body>

</html>