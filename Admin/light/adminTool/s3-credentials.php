<?php

require('../../assets/vendor/autoload.php');

use Aws\S3\S3Client; 
use Aws\Exception\AwsException; 

$S3Options = 
[
	'version' => 'latest',
	'region'  => 'us-east-1',
	'credentials' => 
	[
		// 'key' => 'AKIAVBEKFJYX4SC53FAI',
		// 'secret' => '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'
		'key' => 'AKIAVBEKFJYXYNV6IGHU',
		'secret' => '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'
	]
]; 

$s3 = new S3Client($S3Options); 
?>
