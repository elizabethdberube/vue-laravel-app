@extends('layouts.app')
@section('content')


<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
 <div class="card">
  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <div class="card-body">
 
    <form method="POST" action="/checkout/<?php echo $book['id']?>">
    @csrf

  <h1>Checkout for <?php echo ucwords($user['name']);?>:</h1>
  <hr></hr>
  <h5>Book you are checking out:</h5>
  <input id="book_id" name="book_id" type="hidden" class="form-control" value="{{$book['id']}}" required="required">
  <input id="user_id" name="user_id" type="hidden" class="form-control" value="{{$book['id']}}" required="required">
  <input id="user_id" name="user_id" type="hidden" class="form-control" value="{{$user['id']}}" required="required">
  <input id="book_name" name="book_name" type="hidden" class="form-control" value="{{$book['book_name']}}" required="required">    
  <input id="book_author" name="book_author" type="hidden" class="form-control" value="{{$book['book_author']}}" >
  <input id="book_isbn" name="book_isbn" type="hidden" class="form-control" value="{{$book['book_isbn']}}"  >
  <input id="book_issue_status" name="book_issue_status" type="hidden" class="form-control" value="Issue" >
 
  <p><?php echo"{$book['id']}"; ?></p>
  <p><?php echo"{$book['book_name']}"; ?></p>
   <p><?php echo"{$book['book_author']}"; ?></p>
   <p><?php echo"{$book['book_isbn']}"; ?></p>
   <p><?php echo"{$book['book_status_enum']}"; ?></p>
   
  <button type="submit" class="btn btn-primary">Submit</button>
  <a class="btn btn-primary" href="javascript:history.back(1)">Back</a>
</form>
</div>
</div>
</div>
</div>

@endsection
