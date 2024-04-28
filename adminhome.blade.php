<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.navbar')
      <!-- Sidebar Navigation end-->
      @include('admin.bodypart')
      @include('admin.fotter')
  </body>
</html>