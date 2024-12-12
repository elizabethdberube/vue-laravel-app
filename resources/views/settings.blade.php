@extends('layouts.app')
@section('content')

<div class="card text-center mx-4 mb-4 mt-4">
  <div class="card-header">
  <h1>Update your info:</h1>
  </div>
  <div class="card-body">
  <form method="POST" action="/settings/updateName">
  @csrf

<div class="mx-4 mb-4">
<label for="nameInput" class="pb-2">Name:</label>

    <input id="nameInput" type="text" class="form-control" name="userName" value="<?php echo ucwords($user['name']);?>" autofocus>

</div>
@if (session('statusOne'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('statusOne') }}
                                </div>
                            @endif

<button type="submit" class="btn btn-primary mb-2">Update Name</button>
</form>

<form method="POST" action="/settings/updateEmail">
  @csrf
<div class="mx-4 mb-4">
<label for="emailInput" class="pb-2">Email:</label>
    <input id="emailInput" type="email" class="form-control" name="userEmail" value="<?php echo ucwords($user['email']);?>" autofocus>
   
</div>
@if (session('statusTwo'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('statusTwo') }}
                                </div>
                            @endif
<button type="submit" class="btn btn-primary mb-2">Update Email</button>
</form>
<form method="POST" action="/settings/updatePassword">
  @csrf

                       

                            <div class="mx-4 mb-4">
                                <label for="oldPasswordInput" class="form-label">Old Password</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Old Password">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mx-4 mb-4">
                                <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mx-4 mb-4">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                     
<button type="submit" class="btn btn-primary mb-2">Update Password</button>

</form>
  </div>
  
</div>

@endsection