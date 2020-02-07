<?php
require_once 'aws-credentials.php';
require_once 'aws.phar';
use Aws\S3\S3Client;

$aws = new S3Client([
    'version'     => $aws_version,
    'region'      => $aws_region,
    'credentials' => [
        'key'    => $aws_key,
        'secret' => $aws_secret,
    ],
]);

$object_key = $_POST['object_key'];

$cmd = $aws->getCommand('GetObject', [
    'Bucket' => $aws_bucket,
    'Key'    => $object_key
]);

$request = $aws->createPresignedRequest($cmd, '+1 minute');

$url = (string) $request->getUri();

echo $url;
?>