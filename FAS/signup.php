<!DOCTYPE html>
<html lang="en">

<head>
  <title>Faculty Audit System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>
    :root {
      --input-padding-x: 1.5rem;
      --input-padding-y: .75rem;
    }
    body {
      background: rgb(233, 233, 233);
      background-image: url("css/images/bg1.jpg");
    }
    .card-signin {
      border: 0;
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }
    .card-signin .card-title {
      margin-bottom: 2rem;
      font-weight: 300;
      font-size: 1.5rem;
    }
    .card-signin .card-body {
      padding: 2rem;
    }
    .form-signin {
      width: 100%;
    }
    .form-signin .btn {
      font-size: 80%;
      border-radius: 5rem;
      letter-spacing: .1rem;
      font-weight: bold;
      padding: 1rem;
      transition: all 0.2s;
    }
    .form-label-group {
      position: relative;
      margin-bottom: 1rem;
    }
    .form-label-group input {
      height: auto;
      border-radius: 2rem;
    }
    .form-label-group>input,
    .form-label-group>label {
      padding: var(--input-padding-y) var(--input-padding-x);
    }
    .form-label-group>label {
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      width: 100%;
      margin-bottom: 0;
      /* Override default `<label>` margin */
      line-height: 1.5;
      color: #495057;
      border: 1px solid transparent;
      border-radius: .25rem;
      transition: all .1s ease-in-out;
    }
    .form-label-group input::-webkit-input-placeholder {
      color: transparent;
    }
    .form-label-group input:-ms-input-placeholder {
      color: transparent;
    }
    .form-label-group input::-ms-input-placeholder {
      color: transparent;
    }
    .form-label-group input::-moz-placeholder {
      color: transparent;
    }
    .form-label-group input::placeholder {
      color: transparent;
    }
    .form-label-group input:not(:placeholder-shown) {
      padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
      padding-bottom: calc(var(--input-padding-y) / 3);
    }
    .form-label-group input:not(:placeholder-shown)~label {
      padding-top: calc(var(--input-padding-y) / 3);
      padding-bottom: calc(var(--input-padding-y) / 3);
      font-size: 12px;
      color: #777;
    }
    /* Fallback for Edge
    -------------------------------------------------- */
    @supports (-ms-ime-align: auto) {
      .form-label-group>label {
        display: none;
      }
      .form-label-group input::-ms-input-placeholder {
        color: #777;
      }
    }
    /* Fallback for IE
    -------------------------------------------------- */
    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
      .form-label-group>label {
        display: none;
      }
      .form-label-group input:-ms-input-placeholder {
        color: #777;
      }
    }
  </style>
</head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Sign-up</h5>
              <form class="form-signin" action="backend/signup.php" method="POST">
                <div class="form-label-group">
                  <input name="name" type="text" id="name" class="form-control" placeholder="Full name " required autofocus>
                  <label for="name">Full name</label>
                </div>
                <div class="form-label-group">
                  <input name="username" type="text" id="username" class="form-control" placeholder="User name " required >
                  <label for="username">User name</label>
                </div>
                <div class="form-label-group">
                  <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
                  <label for="password">Password</label>
                </div>
                <div class="form-label-group">
                  <input name="cpassword" type="cpassword" id="cpassword" class="form-control" placeholder="cpassword" required>
                  <label for="cpassword">Confirm password</label>
                </div>
                <div class="form-label-group">
                <select name="role" id="role" style="min-width:380px; min-height:40px; " class="form-control" placeholder="Enter Role">
                    <option>-Select Role-</option>
                    <option  value="hod">HOD</option>
                    <option value="teacher">Teacher</option>
                    <option value="dqa">DQA Member</option>
                    <option value="auditor">Auditor</option>
                </select>
                </div>
                <button class="btn btn-lg btn-dark btn-block text-uppercase" type="submit" style="font-size:15px;">Sign up</button>
                <hr class="my-4">
                <h6 class="card-text text-center">Already have an account? </h6></b>
                <a href="http://localhost/FAS/login.php" class="btn  btn-danger btn-block text-uppercase" type="submit" style="font-size:15px;">sign-in</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  
</html>