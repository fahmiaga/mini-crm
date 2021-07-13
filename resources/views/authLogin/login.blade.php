<!DOCTYPE html>
<html lang="en">
   <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        
        
        <style type="text/css">
            * {
            margin: 0px;
            padding: 0px;
            }
                .login{
                    width: 30%;
                    height: 500px;
                    margin: 100px auto;
                }
            }
            </style>
</head>
<body>
    <div class="login">
            <div class="account-login">
               <h1>Login</h1>
               <form action="{{url('login-with-jwt')}}" method="POST">
                @csrf
                  <div class="form-group">
                     <input type="text" name="email" placeholder="Email" class="form-control" @error('email')@enderror value="{{old('email')}}">
                     <div class="text-danger">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                     <input type="password" name="password" placeholder="Password" class="form-control" @error('password')@enderror>
                     <div class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                  </div>
                  <button class="btn btn-primary">Login</button>
               </form>
            </div>
        </div>
   </body>
</html>