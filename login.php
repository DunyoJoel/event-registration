<?php
require_once "scripts/admin.php";
require_once "scripts/session.php";
if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["submit"]))
{
  $admin = new Admin();
  if($data = $admin->authenticateAdmin($_POST["email"], $_POST["password"]))
  {
    $session = new Session("admin");
    $session->setSession($data);
    header("Location: dashboard.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>  

</head>
<body>
    <section class="container">
        <div class="row content d-flex justify-content-center align-items-center">
            <div class="col-md-5">
              <div class="box shadow bg-white p-4">
                <h3 class="mb-4 text-center fs-1">GI-KACE ERAS</h3>
                  <form class="mb-3" action="login.php" method="post">
                    <div class="form-floating mb-3">
                      <input type="email"name="email" class="form-control rounded-0"
                      id="floatingInput" placeholder="name@example.com">
                      <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-0"
                        id="floatingPassword" placeholder="name@example.com">
                        <label for="floatingPassword">Password</label>
                      </div>
                      <div class="form-check mb-3">
                       <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                       <label class="form-check-label">Remember me</label>
                      </div>
                      <div class="d-grid gap-2 mb-3">
                        <button type="submit" name="submit" value="submit" class="btn btn-dark btn-lg border-0 rounded-0">Login</button>
                    </div>
                      <div class="forgot-password-link mb-3 text-center">
                        <a href="#" title="Forgot Password" class="text-decoration-none">Forgot Password?</a>
                      </div>
                  </form>
              </div>
            </div>
        </div>
    </section>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>