<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap and jQuery CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.4.js"
    integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
    <!-- Bootstrap and jQuery CDN -->
    <link rel="stylesheet" href="style.css/base.css">
    <title>UserDetails</title>
</head>
<body>
    <div class="container-fluid" style="background-color: #3C486B;">
        <nav class="container d-flex justify-content-between align-items-center py-2 text-light" style="background-color: #3C486B;">
            <h1><a href='http://localhost:8000/main' class="text-decoration-none text-light">HulkMovies</a></h1>
            <div class='d-flex justify-content-center align-items-center'>
            <button id="logout" class="btn btn-light mx-1">Logout</button>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
        <h4 class="text-center border-bottom mt-3 border-4 mb-2">User Details</h4>
        <div id="details" class="col-md-4 p-5 my-5 mx-5 border border-secondary bg-light text-dark" style="padding-top:55px; padding-bottom:55px">
        </div>
        <div id="edit" class="col-md-4 p-5 my-5 mx-5 border border-secondary bg-light text-dark">
            <h3>Edit User</h3>
            <p class="my-3 text-bold">Choose which one you want to update</p>
            <p id="responseTxt" class="text-success"></p>
            <div class="d-flex justify-content-start align-items-center ms-0 mt-4">
                <button id="usernameBtn" class="btn btn-sm me-2 border-2 btn-secondary">Username</button>
                <button id="emailBtn" class="btn btn-sm mx-2 border-2 btn-secondary">Email</button>
                <button id="passwordBtn" class="btn btn-sm mx-2 border-2 btn-secondary">Password</button>
            </div>
            <form id="updateForm">
                    <p class="my-1 hidden"  id='forUsername'>New Username:</p>
                    <input type="text" name="username" id="username" class="form form-control-sm hidden" placeholder="Enter new Username">
                    <p class="my-1 hidden" id='forEmail'>New Email:</p>
                    <input type="email" name="email" id="email" class="form form-control-sm hidden" placeholder="Enter new E-Mail">
                    <p class="my-1 hidden" id='forPassword'>New Password:</p>
                    <input type="password" name="password" id="password" class="form form-control-sm hidden" placeholder="Enter new Password">
                    <br>
                    <input type="submit" value="Submit" class="btn btn-sm btn-danger mt-3">
            </form>
        </div>
        <div class="row delete d-flex justify-content-center align-items-center">
            <div class="col-md-8 text-center py-5 px-5 bg-dark text-light border-3 border-secondary my-5">
                <h4>Delete The Account</h4>
                <br>
                <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Delete Account
            </button>
            </div>
        </div>
    </div>
    <script src="/script/userDetails.js"></script>
</body>
</html>





<!-- Delete modal --> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5>Are you sure that you want to delete your account?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Not Actually</button>
          <button type="button" class="btn btn-primary" id="delete">Yeah , I am sure</button>
        </div>
      </div>
    </div>
  </div>