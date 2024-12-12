@extends('layouts.app')
@section('content')


<div class="list-group mx-4">
  <a href="/library" class="list-group-item list-group-item-action active" aria-current="true">
  Select a Category
  </a>
  <a href="/library/1/" class="list-group-item list-group-item-action ">Programming</a>
  <a href="/library/2" class="list-group-item list-group-item-action ">Database</a>
  <a href="/library/3" class="list-group-item list-group-item-action ">Web Design</a>
  <a href="/library/4" class="list-group-item list-group-item-action ">Web Development</a>
</div>


  
  <?php
if (isset($books)) { 
?>
<div class="card mx-4 mt-4">
  <form action="insert.php" method="post">
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th scope="col">Author</th>
      <th scope="col">Name</th>
      <th scope="col">ISBN</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
   
    <?php
foreach ($books as $book) {
  echo "
  <tr>
      <td>{$book['book_author']}</td>
 
      <td>{$book['book_name']}</td>

      <td>{$book['book_isbn']}<br/></td>
  
      <td>{$book['book_status']}<a class=\"btn btn-primary ml-4\" href=\"/checkout/{$book['id']}\">Check this book out</a></td>

  </tr>

    ";
  }
?>

  </tbody>
</table>
</form>
</div>
<?php
 } else {
  
 }
?>
@endsection

