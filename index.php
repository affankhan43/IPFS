<?php
  require __DIR__ . '/vendor/autoload.php';
  include 'core/funcs.php';
  use \Curl\Curl;

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>IPFS</title>
    <style type="text/css">
      .nav_menu{
        margin-right: 25px;
      }
      .kyc-form{
        margin: 0 auto;
        overflow: hidden;
        padding: 10px 0;
        align-items: center;
        justify-content: space-around;
        float: none;
      }
      .form-group>label{
    font-weight: bold;
    font-family:  sans-serif;
      }
      .heading{
        font-family: Roboto;
        margin-top: 11px;
      }
      .upload-card{
        margin: 20px;
      }
    
    </style>
  </head>
  <body>
    <nav class="navbar navbar-light bg-primary">
    <a class="navbar-brand" href="#">
    <img src="IPFS_logo.png" width="97" height="32" class="d-inline-block align-top"></a>
    <ul class="navbar-nav my-2 my-lg-0 nav_menu">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      </ul>
  </nav>
    <div class="container">
      <div class="card upload-card">
        <div class="card-header">Upload File</div>
        <div class="container">
          <h3 class="heading">Upload a document on IPFS and have it certified in the Bitcoin blockchain</h3>
        </div>
      </div>    
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>