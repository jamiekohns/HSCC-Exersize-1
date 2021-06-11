<?php require 'innit.php';?>
<?php $page_title = 'Create New User' ?>
<?php include_once 'web-assets/tpl/app_header.php'; ?>
<?php include_once 'web-assets/tpl/app_nav.php'; ?>
<?php
use App\Database\User;

if(isset($_SESSION['user'])){
    header('location: ' . $_ENV['BASE_URL'] .'/my_locations.php');
}

$error = '';
$make_user = new User();

if(isset($_POST['submit'])){
    if($_POST['first_name'] == NULL){
        $error = 'Please Enter Your First Name';
    } elseif ($_POST['last_name'] == NULL){
        $error = 'Please Enter Your Last Name';
    } elseif ($_POST['password'] == NULL){
        $error = 'Please Enter Your Password';
    }elseif ($_POST['password2'] !== $_POST['password']){
        $error = 'The Two Passwords Do Not Match';
    }elseif ($_POST['email'] == NULL){
        $error = 'Please Enter Your Email Address';
    } else {
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);


        $make_user->signup($_POST['first_name'], $_POST['last_name'], $_POST['middle_name'],$password_hash,
         $_POST['email']);
        $password_hash = NULL;
        header('location: login.php');
    }
}

?>
<div class="jumbotron bg-light">
    <div class="container mx-auto">
        <h1 class="text-center mb-4"> Create an Account </h1>
        <?php
        if ($error) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
        ?>
        <form class= action="user_signup.php" method="post">
            <div class="p-3 bg-white rounded shadow-sm border border-top-0 rounded-0">
<div class="form-row">
<div class="form-group col-md-4">
        <label for="">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
</div>
<div class="form-group col-md-2">
    <label for="">Middle Name</label>
    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
</div>
<div class="form-group col-md-4">
    <label for="">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Please Enter Your Email Address">
</div>
</div>





<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Please Enter Your Password">
</div>
<div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" id="password2" name="password2" placeholder="Please Confirm Your Password">
</div>

<button type="submit" name="submit" class="btn btn-primary w-100">Create Account</button>
</form>
</div>