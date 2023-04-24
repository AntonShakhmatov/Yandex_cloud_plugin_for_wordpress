<?php
/*
Plugin Name: Upload
Plugin URI: https://example.com/my-plugin
Description: Plugin
Version: 1.0
Author: Name
Author URI: https://example.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

require_once __DIR__ . '/yandex.php';

use Aws\S3\S3Client;

function my_function()
{
    $s3 = new S3Client([
        'version' => 'latest',
        'endpoint' => 'https://storage.yandexcloud.net',
        'region' => 'ru-central1',
        'credentials' => [
            'key' => '',
            'secret' => '',
        ],
    ]);
    $yc = new Yandex_Cloud($s3);
    $result = $yc->sendToStorage();
    return $result;
}

add_action('wp_handle_upload', 'my_function');
