<?php

// Show errors
error_reporting(E_ALL);
ini_set('display_errors', false);

// Function curl and create cache
function apiCall($url)
{
    $fileName = md5($url);
    $filePath = './cache/' . $fileName;
    $fileExists = file_exists($filePath);

    if($fileExists)
    {
        $fileTime = filemtime($filePath);
        $time = time();

        if($fileTime < $time - 60 * 60 * 24 * 7)
        {
            unlink($filePath);
            $fileExists = false;
        }
    }

    if($fileExists)
    {
        $result = file_get_contents($filePath);
    }
    else
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    
        $result = curl_exec($curl);
        curl_close($curl);

        file_put_contents($filePath, $result);
    }

    $result = json_decode($result);
    return $result;
}

$apiKey = '1dbf9f642eafb1dde5997d1598b30b72';
$apiKeyPrivate = '77f08ad9df1076126abc6b30c695a390311d4014';
$hash = md5(1 . $apiKeyPrivate . $apiKey);

$params = '?ts=' . 1 . '&apikey=' . $apiKey . '&hash=' . $hash;