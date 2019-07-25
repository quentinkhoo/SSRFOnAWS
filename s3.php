<?php

require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$bucket = 'poc-with-bucket';
$s3 = new S3Client([
	'version' => 'latest',
	'region' => 'ap-southeast-1',
]);

try {
	$results = $s3->getPaginator('ListObjects', ['Bucket' => $bucket]);

	foreach ($results as $result) {
		foreach ($result['Contents'] as $object) {
			echo $object['Key'] . PHP_EOL;
		}
	}

} catch (S3Exception $e) {
	echo $e->getMessage() . PHP_EOL;
}
?>
