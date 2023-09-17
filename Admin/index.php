<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login Page</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">

    <script src="https://kit.fontawesome.com/fad89713bc.js" crossorigin="anonymous"></script>
    <style>
      html,body{
        height: 100%;
      }
    </style>
</head>

<body class="bg-dark">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center ">
            <div class="col-lg-5">
                <div class="card border-danger shadow-lg">
                    <div class="card-header bg-danger">
                       <h3 class="m-0 text-white">
                        <i class="fas fa-user-cog"></i>&nbsp;Admin Panel Login
                       </h3> 
                    </div>
                    <div class="card-body">
                      <form action="#" method="post" class="px-3" id="admin-login-form">
                        <div id="adminLoginAlert"></div>
                        <div class="form-group">
                          <input type="text" name="username" class="form-control form-control-lg rounded-0"
                          placeholder="Username" required autofocus>
                        </div>

                        <div class="form-group">
                          <input type="password" name="password" class="form-control form-control-lg rounded-0"
                          placeholder="Password" required >
                        </div>

                        <div class="form-group">
                          <input type="submit" name="admin-login" class="btn btn-danger btn-block btn-lg rounded-0"
                          value ="Login" id="adminLoginBtn" >
                        </div>
                      </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>