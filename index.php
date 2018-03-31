<?php
include 'core/.env';
$db = mysqli_connect($HostName,$HostUser,$HostPass,$dbName) or die("Could not connect to the database");
if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else{
       // echo "sdf";
    }
session_start();
  require __DIR__ . '/vendor/autoload.php';
  include 'core/funcs.php';
  
  include '.env';
  use \Curl\Curl;
  if(isset($_POST['upload_now']) && check_code($_POST['xss_code'])){
    if(isset($_FILES['docx'])){
      $path_parts = pathinfo($_FILES["docx"]["name"]);
      $extension = $path_parts['extension'];
      if($extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "pdf"){
        $fields = array();
        $filenames = array($_FILES['docx']['tmp_name']);
        $files = array();
        foreach ($filenames as $f){
          $files[$_FILES['docx']['name']] = file_get_contents($f);
        }
      $url = "http://159.65.131.43:5001/api/v0/add";
      $curl = curl_init();
      $boundary = uniqid();
      $delimiter = '-------------' . $boundary;
      $post_data = build_data_files($boundary, $fields, $files);
      curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
          CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $post_data,
        CURLOPT_HTTPHEADER => array(
          "Content-Type: multipart/form-data; boundary=" . $delimiter,
          "Content-Length: " . strlen($post_data)),
      ));
      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
      if($err){
        $error[1] = "cURL Error #:" . $err;
      }
      else{
        $data_compose = json_decode($response,true);
        if(isset($data_compose['Hash'])){
          $curl = new curl();
          $curl->get($url_env);
          if ($curl->error) {
            $errors[1] = "Unknown Error #9";  
          } else {
            $address = json_decode($curl->response,true);
            if($address['address'] == "false"){
              $errors[1] = "Unknown Error #10";
            }
            else{
              $qry = "INSERT INTO `document_details` (`ipfs_hash`, `ipfs_name`, `ipfs_size`, `verified`, `bitcoin_address`, `bitcoin_fees`) VALUES ('".$data_compose['Hash']."','".$data_compose['Name']."','".$data_compose['Size']."',0,'".$address['address']."',50000)";
              
              if(mysqli_query($db, $qry)){
                $error[2] = "Successfully Data Added"; 
              }
              else{
                $errors[1] = "Unknown Error #11";
              }
            }
          }
        } 
        else{
          $error[2] = "Unknown Error".json_encode($response);
        }
      }
      }
      else{
        $error[0] = "You Can only upload (png, jpg, jpeg, pdf)";
      }
    }
    else{
      $error[0] = "Please Upload Document Before Uploading";
    }
  }
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
        margin-top: 13px;
        margin-bottom: 17px;
      }
      .upload-card{
        margin: 20px;
      }
      .uploader{
        border: 1px solid #7d7979;
        border-radius: 8px;
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
          <form method="post"  enctype="multipart/form-data">
<?php if(isset($error[0])){ ?>
  <div class="alert alert-danger" role="alert">
    <strong>Oh snap!</strong> <?php echo $error[0]; ?>
  </div>
<?php } ?>
<?php if(isset($error[1])){ ?>
  <div class="alert alert-warning" role="alert">
    <strong>Oh snap!</strong> <?php echo $error[1]; ?>
  </div>
<?php } ?>
<?php if(isset($error[2])){ ?>
  <div class="alert alert-success" role="alert">
    <strong>Oh snap!</strong> <?php echo $error[2]; ?>
  </div>
<?php } ?>
            <div class="form-group">
              <label for="passport-image">Upload Image</label>
              <input type="file" name="docx" class="form-control-file uploader" accept=".png, .jpg, .jpeg" required>
              <input type="hidden" name="xss_code" value=<?php echo xss_code_generate(); ?> required>
              <input type="submit" name="upload_now" class="form-control btn btn-info" value="Upload Now!" required>
            </div>
          </form>
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