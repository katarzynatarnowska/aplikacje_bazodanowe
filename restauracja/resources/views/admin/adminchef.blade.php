<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include("admin.admincss") 
    

  </head>
  <body>
    
  <div class="container-scroller">

     @include("admin.navbar")  

     <div style="position: relative; top: 60px; right: -150px">

<form action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data">
   
@csrf

<div>
        <label>Name</label>
        <input style="color:blue;" type="text" name="name" required="" placeholder="Enter name">
    </div>
</br>
    <div>
        <label>Speciality</label>
        <input style="color:blue;" type="text" name="speciality" required="" placeholder="Enter the speciality">
    </div>

    </br>

    <div>
        <input type="file" name="image" required="">
    </div>

    </br>

    <div>
   
        
        <input style="color:blue;" class="btn btn-success" type="submit" value="Save">
    </div>

</form>  

<table >
    <tr>
        <th style="padding: 30px; ">Chef Name</th>
        <th style="padding: 30px; ">Speciality</th>
        <th style="padding: 30px; ">Image</th>
        <th style="padding: 30px; ">Action</th>
        <th style="padding: 30px; ">Action2</th>

    </tr>

@foreach($data as $data)

    <tr align="center">
        <td>{{$data->name}}</td>
        <td>{{$data->speciality}}</td>
        <td><img height="200" width="200" src="/chefimage/{{$data->image}}"></td>
        <td><a href="{{url('/updatechef', $data->id)}}" class="btn btn-success">Update</a></td>

        <td><a href="{{url('/deletechef', $data->id)}}" class="btn btn-danger">Delete</a></td>


    </tr>

    @endforeach
</table>

  </div>
     @include("admin.adminscript")  

  </body>
</html>