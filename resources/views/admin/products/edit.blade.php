<!DOCTYPE html>
<html>

<head>

<title>Edit Product</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body{
font-family:Arial;
background:#f4f6f9;
margin:0;
}

.form-box{
width:90%;
max-width:500px;
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

label{
font-weight:bold;
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
background:#007bff;
color:white;
padding:10px;
border:none;
border-radius:4px;
}

.back-btn{
display:block;
text-align:center;
margin-top:10px;
text-decoration:none;
color:#333;
}

.product-img{
width:60px;
height:60px;
object-fit:cover;
margin:3px;
border-radius:5px;
border:1px solid #ddd;
}

</style>

</head>

<body>

<div class="form-box">

<h2>Edit Product</h2>

<!--<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

 Product Name -->
<label>Product Name</label>
<input type="text" name="name" value="{{ $product->name }}">

<!-- Category 
<label>Category</label>
<select name="category_id" id="category">

<option value="">Select Category</option>

@foreach($categories as $cat)
<option value="{{ $cat->id }}"
@if($product->category_id == $cat->id) selected @endif>
{{ $cat->name }}
</option>
@endforeach

</select>

<!-- Subcategory 
<label>Subcategory</label>
<select name="subcategory_id" id="subcategory">
<option value="">Select Subcategory</option>
</select>

<!-- Price 
<label>Price</label>
<input type="text" name="price" value="{{ $product->price }}">

<!-- Description 
<label>Description</label>
<textarea name="description">{{ $product->description }}</textarea>

<!-- Existing Images 
<label>Existing Images</label>
<div>
@foreach($product->images as $img)
    <img src="{{ asset('storage/'.$img->image) }}" class="product-img">
@endforeach
</div>

<!-- Upload New Images 
<label>Add More Images</label>
<input type="file" name="images[]" multiple>
@foreach($product->images as $img)
    <div style="display:inline-block; margin:10px;">
        <img src="{{ asset('storage/'.$img->image) }}" width="80"><br>

        <form action="{{ route('product.image.delete',$img->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button style="background:red;color:white;border:none;padding:5px;" onclick="return confirm('Are you sure?')">
                Delete
            </button>
        </form>
    </div>
@endforeach
<button>Update Product</button>

</form>-->


<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<label>Product Name</label>
<input type="text" name="name" value="{{ $product->name }}">

<label>Category</label>
<select name="category_id" id="category">
<option value="">Select Category</option>

@foreach($categories as $cat)
<option value="{{ $cat->id }}" 
@if($product->category_id == $cat->id) selected @endif>
{{ $cat->name }}
</option>
@endforeach
</select>

<label>Subcategory</label>
<select name="subcategory_id" id="subcategory">
<option value="">Select Subcategory</option>
</select>

<label>Price</label>
<input type="text" name="price" value="{{ $product->price }}">

<label>Description</label>
<textarea name="description">{{ $product->description }}</textarea>

<label>Add More Images</label>
<input type="file" name="images[]" multiple>

<button type="submit">Update Product</button>

</form>


<label>Existing Images</label>

@foreach($product->images as $img)
<div style="display:inline-block; margin:10px; text-align:center;">
    
    <img src="{{ asset('storage/'.$img->image) }}" width="80"><br>

    <form action="{{ route('product.image.delete',$img->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button 
        style="background:red;color:white;border:none;padding:5px;"
        onclick="return confirm('Are you sure?')">
            Delete
        </button>
    </form>

</div>
@endforeach

<a class="back-btn" href="{{ route('products.index') }}">
← Back to Products
</a>

</div>

<script>

// Load subcategories on page load (IMPORTANT FIX)
window.onload = function(){
    loadSubcategories({{ $product->category_id }}, {{ $product->subcategory_id ?? 'null' }});
};

// On category change
document.getElementById('category').addEventListener('change',function(){
    loadSubcategories(this.value, null);
});

// Function to load subcategories
function loadSubcategories(categoryId, selectedSubId){

fetch('/get-subcategories/'+categoryId)

.then(response=>response.json())

.then(data=>{

var sub = document.getElementById('subcategory');

sub.innerHTML='<option value="">Select Subcategory</option>';

data.forEach(function(item){

let selected = (selectedSubId == item.id) ? 'selected' : '';

sub.innerHTML += `<option value="${item.id}" ${selected}>${item.name}</option>`;

});

});

}

</script>

</body>

</html>