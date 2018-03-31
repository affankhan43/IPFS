<?php


function insert_data($ipfs_hash, $ipfs_name, $ipfs_size, $btc_add, $btc_fees){
    include 'db_config.php';
    $qry = "INSERT INTO `document_details` (`ipfs_hash`, `ipfs_name`, `ipfs_size`, `verified`, `bitcoin_address`, `bitcoin_fees`) VALUES ('".$ipfs_hash."','".$ipfs_name."','".$ipfs_size."',0,'".$btc_add."','".$btc_fees."')";
    if(mysqli_query($db, $qry)){
        return true;
    }
    else{
        return false;
    }
}
insert_data("xx","xx",11,"xx",12);
function xss_code_generate(){
    if(isset($_SESSION['xss_code_generate'])){
        unset($_SESSION['xss_code_generate']);
        return $_SESSION['xss_code_generate'] = base64_encode(openssl_random_pseudo_bytes(32));
    }
  return $_SESSION['xss_code_generate'] = base64_encode(openssl_random_pseudo_bytes(32));
}

function check_code($token){
  if($_SESSION['xss_code_generate'] == $token){
    unset($_SESSION['xss_code_generate']);
    return true;
  }
  return false;
}

function build_data_files($boundary, $fields, $files){
    $data = '';
    $eol = "\r\n";

    $delimiter = '-------------' . $boundary;

    foreach ($fields as $name => $content) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . "\"".$eol.$eol
            . $content . $eol;
    }


    foreach ($files as $name => $content) {
        $data .= "--" . $delimiter . $eol
            . 'Content-Disposition: form-data; name="' . $name . '"; filename="' . $name . '"' . $eol
            //. 'Content-Type: image/png'.$eol
            . 'Content-Transfer-Encoding: binary'.$eol
            ;

        $data .= $eol;
        $data .= $content . $eol;
    }
    $data .= "--" . $delimiter . "--".$eol;


    return $data;
}
?>