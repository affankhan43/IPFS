<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if(isset($_POST['msg']) && $_POST['msg'] == "make_pdf"){
	echo "dataaaa";
}

?>