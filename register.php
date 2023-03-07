<?php
require_once "scripts/participant.php";
// print_r($_POST);
if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["gender"]) && !empty($_POST["phoneNumber"]))
{
print_r($_POST);
  echo "here";
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $phoneNumber = $_POST["phoneNumber"];
  $organization = $_POST["organization"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  $partcipant = new Participant($firstname, $lastname, $phoneNumber, $organization, $email, $gender);
  $partcipant->addNewParticipant();
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
    <title>Registration Page</title>  

</head>
<body>
    <section class="container">
        <div class="row content d-flex justify-content-center align-items-center">
            <div class="col-md-5">
              <div class="box shadow bg-white p-4">
                <h3 class="mb-4 text-center fs-1">FEMI-TECH Registration</h3>
                  <form class="mb-3" action="register.php" method="POST">
                    <div class="form-floating mb-3">
                      <input type="text" name="firstname" class="form-control rounded-0"
                      id="floatingInput" placeholder="John">
                      <label for="floatingInput">Firstname</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" name="lastname" class="form-control rounded-0"
                      id="floatingInput" placeholder="Doe">
                      <label for="floatingInput">Lastname</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control rounded-0"
                        id="floatingInput"  name="email" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" name="phoneNumber" class="form-control rounded-0"
                        id="floatingInput" placeholder="+23355555488">
                        <label for="floatingInput">Phone Number</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-0"
                        id="floatingInput" name="organization" placeholder="name@example.com">
                        <label for="floatingInput">Organization</label>
                      </div>
                      <div class="form-floating mb-3">
                      <select name="gender" class="form-control" id="sel1">
                          <option value="">Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>

                            </select>
                      </div>
                    
                      <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-dark btn-lg border-0 rounded-0">Register</button>
                    </div>
                      <!-- <div class="forgot-password-link mb-3 text-center">
                        <a href="#" title="Forgot Password" class="text-decoration-none">Forgot Password?</a>
                      </div> -->
                  </form>
              </div>
            </div>
        </div>
    </section>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</body>
</html>