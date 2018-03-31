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
      .inputDnD {
  .form-control-file {
    position: relative;
    width: 100%;
    height: 100%;
    min-height: 6em;
    outline: none;
    visibility: hidden;
    cursor: pointer;
    background-color: #c61c23;
    box-shadow: 0 0 5px solid currentColor;
    &:before {
      content: attr(data-title);
      position: absolute;
      top: 0.5em;
      left: 0;
      width: 100%;
      min-height: 6em;
      line-height: 2em;
      padding-top: 1.5em;
      opacity: 1;
      visibility: visible;
      text-align: center;
      border: 0.25em dashed currentColor;
      transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
      overflow: hidden;
    }
    &:hover {
      &:before {
        border-style: solid;
        box-shadow: inset 0px 0px 0px 0.25em currentColor;
      }
    }
  }
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
          <div class="container p-y-1">
  <div class="row m-b-1">
    <div class="col-sm-6 offset-sm-3">
      <button type="button" class="btn btn-primary btn-block" onclick="document.getElementById('inputFile').click()">Add Image</button>
      <div class="form-group inputDnD">
        <label class="sr-only" for="inputFile">File Upload</label>
        <input type="file" class="form-control-file text-primary font-weight-bold" id="inputFile" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file">
      </div>
    </div>
  </div>
</div>
        </div>
        <!-- <ul class="list-group list-group-flush">
          <li class="list-group-item">Cras justo odio</li>
          <li class="list-group-item">Dapibus ac facilisis in</li>
          <li class="list-group-item">Vestibulum at eros</li>
        </ul> -->
      </div>
      <div class="col-md-6 kyc-form">
        <!--<div class="alert alert-danger" role="alert">
          <strong>Oh snap!</strong> 
      </div>
      <div class="alert alert-warning" role="alert">
          <strong>Oh snap!</strong> 
      </div>
        <div class="alert alert-success" role="alert">
          <strong>Oh snap!</strong>
      </div>-->
        <!-- <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
          </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="street-line-1" placeholder="Street Line 1">
          <br>
          <input type="text" class="form-control" name="street-line-2" placeholder="Street Line 2">
          <br>
          <input type="text" class="form-control" name="city" placeholder="City" required>
          <br>
          <input type="text" class="form-control" name="state" placeholder="State/Province" required>
          <br>
          <input type="text" class="form-control" name="country" placeholder="Country" required>
          <input type="hidden" class="form-control" name="xss_code" value=<?php echo xss_code_generate(); ?> readonly required>
        </div>

        <div class="form-group">
          <label for="passport-image">Passport Image</label>
          <input type="file" name="passport" class="form-control-file" required>
        </div>
  
        <div class="form-group">
          <input type="submit" class="form-control btn btn-primary" name="kyc-submit" value="Submit">
        </div>
      </form> -->
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
      function readUrl(input) {
  
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = (e) => {
      let imgData = e.target.result;
      let imgName = input.files[0].name;
      input.setAttribute("data-title", imgName);
      console.log(e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }

}
    </script>
  </body>
</html>