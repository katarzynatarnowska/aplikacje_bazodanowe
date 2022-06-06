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
     <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">

     @csrf
       <div>
         <label>Title</label>
         <input style="color:blue" type="text" name="title" placeholder="Write a title" required>
       </div>

       </br>


       <div>
         <label>Price</label>
         <input style="color:blue" type="number" name="price" placeholder="price" required>
       </div>

       </br>


       <div>
         <label>Image</label>
         <input type="file" name="image"  required>
       </div>

       </br>


       <div>
         <label>Description</label>
         <input style="color:blue" type="text" name="description" placeholder="Description" required>
       </div>

       </br>


       <div>

         <input type="submit" class="btn btn-success" value="Save" > 
       </div>

     </form>

     <div>

<table>
  <tr>
    <th style="padding :30px">Food Name</th>
    <th style="padding :30px">Price</th>
    <th style="padding :30px">Description</th>
    <th style="padding :30px">Image</th>
    <th style="padding :30px">Action</th>
    <th style="padding :30px">Action2</th>



  </tr>

@foreach($data as $dataa)

  <tr align="center">
    <td>{{$dataa->title}}</td>
    <td>{{$dataa->price}}</td>
    <td>{{$dataa->description}}</td>
    <td><img height="200" width="200" src="/foodimage/{{$dataa->image}}"></td>
  <td><a href="{{url('/deletemenu',$dataa->id)}}" class="btn btn-danger">Delete</a></td>
  <td><a href="{{url('/updateview',$dataa->id)}}"class="btn btn-success">Update</a></td>
  
</tr>

  @endforeach

  <div class="menu" style="position: relative;">

  {{ $data->links() }}

  </div>

</table>

     </div>
   </div>
     



  </div>

     @include("admin.adminscript")  

  </body>
</html>