<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
    <!-- Required meta tags -->
    @include("admin.admincss") 

  </head>
  <body>
    
  <div class="container-scroller">

     @include("admin.navbar")
     
<form action="{{url('/updatefoodchef',$data->id)}}" method="post" enctype="multipart/form-data">
    
@csrf
<div>
        <label>Chef Name</label>
        <input style="color:blue;" type="text" name="name" value="{{$data->name}}">
    </div>

    </br>


    <div>
        <label>Speciality</label>
        <input style="color:blue;" type="text" name="speciality" value="{{$data->speciality}}">
    </div>

    </br>


    <div>
        <label>Old Image</label>
        <img hight="300" width="300" src="/chefimage/{{$data->image}}">
    </div>

    </br>



    <div>
        <label>New Image</label>
        <input type="file" name="image">
    </div>

    </br>



    <div>
        <input type="submit" class="btn btn-success" value="Update Chef"required="">
    </div>

</form>  
  </div>
     @include("admin.adminscript")  

  </body>
</html>