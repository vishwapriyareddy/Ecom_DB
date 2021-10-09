@extends('layout')
@section('dashboard-content')
<h1>Create Product form</h1>
@if(Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
<strong>{{ Session::get('success') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


@elseif (Session::get('failed'))
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
<strong>{{ Session::get('failed') }}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
@endif


<form action="{{ URL::to('post-product-form') }}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
      <label style="margin:2Opx!important" for="exampleInputEmail1">Product name</label>
      <input style="margin:2Opx!important" type="text" class="form-control pt-20"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product name" name="productName">
      </div>
      <div class="form-group">
        <label style="margin:2Opx!important" for="exampleInputEmail1">Product price</label>
        <input style="margin:2Opx!important" type="number" class="form-control" name="productPrice" placeholder="0.0">
        </div>
        <div class="form-group">
            <label style="margin:2Opx!important" for="exampleInputEmail1">Product discount</label>
            <input style="margin:2Opx!important" type="number" class="form-control" name="productDiscount" placeholder="0.0">
            </div>
      <div class="form-group">
          <label for="exampleInputEmail1">
           Select product Category
          </label>
          <select class="form-control" name="category">
              <option>
                  Select
              </option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
        <label style="margin:2Opx!important" for="exampleInputEmail1">Product photo</label>
        <input style="margin:2Opx!important" type="file" class="form-control" name="productPhoto" onchange="loadPhoto(event)">
        </div>
        <div>
          <img id="photo" height="100" width="100">
        </div>

        
      <div class="form-group">
        <label style="margin:2Opx!important" for="exampleInputEmail1">Is Hot Product</label>
        <input type="checkbox" name="isHotProduct"/>
      </div>

      <div class="form-group">
        <label style="margin:2Opx!important" for="exampleInputEmail1">Is New Arrival</label>
        <input type="checkbox" name="isNewArrival"/>
      </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <script>
    function loadPhoto(event){
   var reader = new FileReader();
   reader.onload = function() {
  var output = document.getElementById('photo');
  output.src = reader.result;
   };
   reader.readAsDataURL(event.target.files[0]);
    }
  </script>
@stop