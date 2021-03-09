<?php
session_start();

$username = '';
$email = '';

$errors = array();

// db connection

$db = mysqli_connect('localhost', 'root', '', 'projet_gites') or die("could not connect to database");

// register users

$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);


// form validation

if (empty($username))
    array_push($errors, "Username is required");
if (empty($email))
    array_push($errors, "Email is required");
if (empty($password))
    array_push($errors, "Password is required");


// check db for existing user with same username

$user_check_query = "SELECT * FROM administration WHERE  admin_pseudo = '$username' or email_admin = '$email' LIMIT 1";


