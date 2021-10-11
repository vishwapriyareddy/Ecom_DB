@extends('layout')
@section('dashboard-content')
<h1>Update Slider form</h1>
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


<form action="{{ URL::to('post-slider-edit-form') }}/{{ $slider->id }}" method="post" enctype="multipart/form-data">
    @csrf

      <div class="form-group">
      <label style="margin:2Opx!important" for="exampleInputEmail1">Slider title</label>
      <input style="margin:2Opx!important" type="text" value="{{ $slider->title }}"class="form-control pt-20"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Slider title" name="sliderTitle">
      </div>

      <div class="form-group">
        <label style="margin:2Opx!important" for="exampleInputEmail1"></label>
        <textarea id="editor1" name="sliderMessage" style="width:300px; height:150px;">{{  $slider->message  }}</textarea>
    </div>

    <div class="form-group">
        <label style="margin:2Opx!important" for="exampleInputEmail1">Slider image</label>
        <input style="margin:2Opx!important" type="file" class="form-control pt-20" name="sliderImage" onchange="loadPhoto(event)">
        </div>
        <div>
          <img id="photo" height="100" width="100">
        </div>
    <button type="submit" class="btn btn-primary">Update</button>
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