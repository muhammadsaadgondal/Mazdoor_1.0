@extends('layouts.clientLayout')

@section('sectionX')

<div class="profile-settings-section">
    <h2>Profile Settings</h2>

    <!-- Update Profile Form -->
    <form method="POST" action="/c_settings" enctype="multipart/form-data">
        @csrf
        <label for="f_name">First Name:</label>
        <input type="f_name" name="f_name" value="{{$user->f_name}}">

        <label for="l_name">Last Name:</label>
        <input type="text" name="l_name" value="{{$user->l_name}}">

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{$user->email}}">
        
        <label for="phone">Contact No:</label>
        <input type="tel" name="phone" value="{{$user->phone}}">

        <label for="image">Change Profile Picture</label>
        <input type="file" name="image" id="image">

        <label for="cover">Change Cover</label>
        <input type="file" name="cover" id="cover">

        <!-- Add more fields for other profile settings -->
        <button type="submit" name="update_profile">Update Profile</button>
    </form>

    <!-- Delete Account Form -->
    <hr>
    <p style="color: red;">Deleting your account is irreversible. Are you sure you want to proceed?</p>
    <a href="/deleteAccount"><button name="delete_account">Delete Account</button></a>
</div>
@endsection