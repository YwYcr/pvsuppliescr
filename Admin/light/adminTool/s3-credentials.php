<?php

require('../../assets/vendor/autoload.php');

use Aws\S3\S3Client; 
use Aws\Exception\AwsException; 

$S3Options = 
[
	'version' => 'latest',
	'region'  => 'us-east-1'
]; 

$s3 = new S3Client($S3Options); 
?>
