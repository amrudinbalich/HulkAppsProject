<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap and jQuery CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.4.js"
    integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
    <!-- Bootstrap and jQuery CDN -->
    <link rel="stylesheet" href="/style.css/base.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body class='bg-dark text-light'>
    <div class="container">
        <!-- Form DIV -->
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8 d-flex justify-content-center align-items-center">
                <form id="form" class="col-md-6 bg-light text-dark">
                    <h3>Register</h3>
                    <p class="my-1">Username:</p>
                    <input type="text" name="username" id="username" class="form form-control-sm" >
                    <p class="my-1">Email:</p>
                    <input type="email" name="email" id="email" class="form form-control-sm" >
                    <p class="my-1">Password:</p>
                    <input type="password" name="password" id="password" class="form form-control-sm" >
                    <br>
                    <input type="submit" value="Submit" class="btn btn-sm btn-danger mt-3">
                </form>
            </div>
        <!-- Form DIV -->

        <!-- Response DIV -->
        <div class="row d-flex justify-content-center align-items-center">
            <div id="response" class="col-md-4 text-light mt-5 hidden"></div>
        </div>
        <!-- Response DIV -->
</div>
</div>
</div>
</div>
<script src="script/register.js"></script>
</body>
</html>