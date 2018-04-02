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
  $details = false;
  if(isset($_GET['hash']) || isset($_GET['txid'])){
    if(!empty($_GET['hash'])){
      $qry = mysqli_query($db,"SELECT * FROM `document_details` WHERE ipfs_hash='".$_GET['hash']."' ");
      $result = mysqli_fetch_assoc($qry);
      if(empty($result)){
        
      }
      else{
        $details = true;
        $all_data = $result;
        if($all_data['verified'] == 0 && empty($all_data['bitcoin_txid'])){
          $check_url = $url2_env.$all_data['bitcoin_address'];
          $curl1 = new curl();
          $curl1->get($check_url);
          if ($curl1->error) {
            $error[1] = "Unknown Error #9";  
          } else {
            $amount = json_decode($curl1->response,true);
            if($amount['amount'] == ($all_data['bitcoin_fees']*100000000)){
              echo "OK";
            }
        }
       }     
    }
  }
}
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
            $error[1] = "Unknown Error #9";  
          } else {
            $address = json_decode($curl->response,true);
            if($address['address'] == "false"){
              $error[1] = "Unknown Error #10";
            }
            else{
              $qry = "INSERT INTO `document_details` (`ipfs_hash`, `ipfs_name`, `ipfs_size`, `verified`, `bitcoin_address`, `bitcoin_fees`) VALUES ('".$data_compose['Hash']."','".$data_compose['Name']."','".$data_compose['Size']."',0,'".$address['address']."',50000)";
              
              if(mysqli_query($db, $qry)){
                $URL = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'].'?hash='.$data_compose['Hash'];
                header('Location: '.$URL);
               // $error[2] = "Successfully Data Added"; 
              }
              else{
                $error[1] = "Unknown Error #11";
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
      .card_body{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-light bg-primary">
    <a class="navbar-brand" href="index.php">
    <img src="IPFS_logo.png" width="97" height="32" class="d-inline-block align-top"></a>
    <ul class="navbar-nav my-2 my-lg-0 nav_menu">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      </ul>
  </nav>
    <div class="container">
      <?php if($details != true){ ?>
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
      <?php }else{ ?>
  <div class="row">
    <div class="col-md-6">
      <div class="card upload-card">
        <div class="card-header">IPFS Details</div>
        <div class="container card_body">
          <p class="heading"><strong>IPFS HASH : </strong> <?php echo $all_data['ipfs_hash']?></p>
          <p class="heading"><strong>IPFS FILE_NAME : </strong> <?php echo $all_data['ipfs_name']?></p>
          <img src="https://gateway.ipfs.io/ipfs/QmSNTwF26eRxKPFpjUp1TWVq6CPuJqTuhNBTTwRSTSYq1n" class="heading" style="text-align: center;">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card upload-card">
        <div class="card-header">Bitcoin Blockchain</div>
        <div class="container card_body">
          <?php if($all_data['verified'] == 0){ ?>
          <h3 class="heading">Certify this document on Bitcoin BLockchain</h3>
<?php if(isset($error[1])){ ?>
  <div class="alert alert-warning" role="alert">
    <strong>Oh snap!</strong> <?php echo $error[1]; ?>
  </div>
<?php } ?>
          <p>Please send exactly <span class="badge badge-default" style="background: #d0c9c9;"><strong><?php echo $all_data['bitcoin_fees']/100000000; ?></strong></span> Bitcoin to</p>
          <img class="img-responsive" src=<?php echo "https://chart.googleapis.com/chart?chs=200x200&amp;choe=UTF-8&amp;chld=M|0&amp;cht=qr&amp;chl=".$all_data['bitcoin_address'] ?>>
          <?php }elseif($all_data['verified'] == 1){ ?>
          <h3 class="heading">Verified</h3>
          <?php } ?>
          
          
        </div>
      </div>
    </div>
  </div>
      <?php } ?>

  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>