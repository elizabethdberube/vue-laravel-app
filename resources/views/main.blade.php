@extends('layouts.app')

@section('content')



<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

  <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">


  <nav class="nav flex-column">

  <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Login</button>
      </li>
      <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Register</button>
      </li>

      </ul>
      <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">   
        <div class="col-md-12">
      <div class="card row">

      <div class="card-body flex mt-5">

              <!-- Logo here -->
              <g clip-path="url(#clip0)" fill="#EF3B2D">
              <img src="{{ asset('images/book.png') }}" alt="a really good book" width="200" height="200">
              </g>


              @include('auth.login') 
      
          </div>
  </div>
      </div>
  </div>
      <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">   
        <div class="col-md-12">

      <div class="card row">


      <div class="card-body flex mt-5">

              <!-- Logo here -->
              <g clip-path="url(#clip0)" fill="#EF3B2D">
              <img src="{{ asset('images/book.png') }}" alt="a really good book" width="200" height="200">
              </g>
              @include('auth.register') 
          </div>
  </div>

      </div>
  </div>

  </div>
</nav>


          </div>
      </div>


  </div>
</div>


@endsection
 


