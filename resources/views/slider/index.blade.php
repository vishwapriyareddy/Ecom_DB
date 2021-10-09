@extends('layout')
@section('dashboard-content')
@if(Session::get('deleted'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
<strong>{{ Session::get('deleted') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


@elseif (Session::get('delete-failed'))
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
<strong>{{ Session::get('delete-failed') }}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
@endif
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Category Icon</th>
                    <th>Actions</th>
              
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Category Name</th>
                    <th>Category Icon</th>
                    <th>Actions</th>
             
                </tr>
            </tfoot>
            <tbody>
                @foreach ($sliders as $slider )
                <tr>
                    <td>{{$slider->title}}</td>
                    <td> <img src="{{ $slider->image_url }}" width="100" height="100"></td>
                        <td>
                            <a href="{{ URL::to('edit-slider') }}/{{ $slider->id }}" class="btn btn-outline-primary btn-sm" >Edit</a>
                            |
                            <a href="{{ URL::to('delete-slider') }}/{{ $slider->id }}" class="btn btn-outline-danger btn-sm" onclick="checkDelete()">Delete</a>
                        </td>
                    
                </tr>
          @endforeach
                
            </tbody>
        </table>
    </div>
</div>

<script>
    function checkDelete(){
   var check = confirm('Are you sure you want to delete this ?');
   if(check){return true;}
   return false;
    }
</script>

@stop