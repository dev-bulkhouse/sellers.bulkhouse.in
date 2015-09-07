<?php
// Bucket Name
$bucket="sellers.bulkhouse.files";
if (!class_exists('S3'))require_once('S3.php');

 

//AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAJVZBGGEJZVDH4EAA');
if (!defined('awsSecretKey')) define('awsSecretKey', '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');

//instantiate the class
$s3 = new S3(awsAccessKey, awsSecretKey);

$s3->putBucket($bucket, S3::ACL_PUBLIC_READ);





?>