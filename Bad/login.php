<?php

$con = new PDO('mysql:host=localhost;port=3306;dbname=todolist_app', 'root', '');
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = $con->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
  $query->bindValue(':email', $email);
  $query->bindValue(':password', $password);
  $query->execute();
  $user = $query->fetchAll(PDO::FETCH_ASSOC);
  // echo '<prev>';
  // var_dump($user);
  // echo '</prev>';

  if ($user) {
    header("Location: index.php");
    echo "<div class='alert alert-danger text-center'>Login was successfully<br> Thank You!!!!</div>";
  }else{
    echo "<div class='alert alert-danger text-center'>Your login details no corect oooo!!!!!!!</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo App</title>
  <link rel="stylesheet" href="styles/style.css" type="style/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<div class="card text-center">
  <div class="card-header">
    <h1 class="card title">User Login</h1>
  </div>
  <div class="card-body">
    <form action="" method="POST">
      <div class="mb-3">
        <label class="form-label">User Email</label>
        <input type="text" name="email" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</div>