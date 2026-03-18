<!DOCTYPE html>
<html>

<head>

<title>Products</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

.product-img{
width:50px;
height:50px;
object-fit:cover;
border-radius:5px;
margin:2px;
border:1px solid #ddd;
transition:0.3s;
}

.product-img:hover{
transform:scale(1.2);
}

form input, form select{
padding:8px;
border:1px solid #ccc;
border-radius:4px;
}

form button{
background:#28a745;
color:white;
border:none;
padding:8px 15px;
border-radius:4px;
cursor:pointer;
}

form button:hover{
background:#218838;
}

.search-box{
    width: 100%;         /* full width of container */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;  /* include padding in width */
}
.product-img{
    width:50px;
    height:50px;
    object-fit:cover;
    border-radius:5px;
    transition:0.3s;
    cursor:pointer;
}

.product-img:hover{
    transform:scale(1.3);
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
<form method="GET" style="margin-bottom:20px;">
<input type="text" name="search" class="search-box" placeholder="Search Product..." value="{{ request('search') }}">
<input type="number" name="min_price" placeholder="Min Price">

<input type="number" name="max_price" placeholder="Max Price">

<select name="sort">
<option value="">Sort</option>
<option value="latest">Latest</option>
</select>

<button>Filter</button>

</form>

<!--<form method="GET" style="margin-bottom:15px; display:flex; gap:10px; flex-wrap:wrap;">

<input type="text" name="search" placeholder="Search Product..."
value="{{ request('search') }}">

<select name="price">
<option value="">Sort by Price</option>
<option value="low">Low to High</option>
<option value="high">High to Low</option>
</select>

<select name="latest">
<option value="">Sort</option>
<option value="1">Latest</option>
</select>

<button type="submit">Filter</button>

</form>-->

<table>

<tr>
<th>Images</th>
<th>Name</th>
<th>Category</th>
<th>Subcategory</th>
<th>Price</th>
<th>Date</th>
<th>Action</th>
</tr>

@foreach($products as $p)

<tr>
<td>
@foreach($p->images as $img)
<!--<img src="{{ asset('storage/'.$img->image) }}" width="50">
<a href="{{ asset('storage/'.$img->image) }}" target="_blank">-->
    <img src="{{ asset('storage/'.$img->image) }}" class="product-img"
    onclick="openGallery({{$loop->index}},{{json_encode($p->images->pluck('image'))}})">

@endforeach
</td>
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
<div id="galleryModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:black; text-align:center; z-index:1000;">

    <span onclick="closeGallery()" style="color:white; font-size:30px; position:absolute; top:10px; right:20px; cursor:pointer;">&times;</span>

    <img id="galleryImage" style="max-width:95%; max-height:90vh; margin-top:20px; cursor:zoom-in; transition:0.3s;">
    <br><br>

    <button onclick="prevImage()">⬅ Prev</button>
    <button onclick="nextImage()">Next ➡</button>

</div>
<div style="margin-top:20px;">
{{ $products->links() }}
</div>

</div>

<script>
let images = [];
let currentIndex = 0;
let zoomed = false;

function openGallery(index, imgArray){
    images = imgArray;
    currentIndex = index;
    document.getElementById('galleryModal').style.display = 'block';
    showImage();
}

function showImage(){
    let img = document.getElementById('galleryImage');
    img.src = '/storage/' + images[currentIndex];

    // 🔥 reset zoom when image changes
    img.style.transform = "scale(1)";
    img.style.cursor = "zoom-in";
    zoomed = false;
}

function nextImage(){
    currentIndex = (currentIndex + 1) % images.length;
    showImage();
}

function prevImage(){
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showImage();
}

function closeGallery(){
    document.getElementById('galleryModal').style.display = 'none';
}

// ✅ ADD THIS (zoom feature)
document.addEventListener("DOMContentLoaded", function(){
    let img = document.getElementById('galleryImage');

    img.addEventListener('click', function(){
        if(!zoomed){
            this.style.transform = "scale(2)";
            this.style.cursor = "zoom-out";
            zoomed = true;
        } else {
            this.style.transform = "scale(1)";
            this.style.cursor = "zoom-in";
            zoomed = false;
        }
    });
});
</script>


</body>

</html>