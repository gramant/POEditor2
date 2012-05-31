<?php
/* Header file */
// For file checking
$fileCheck = '';
//main parser function
require_once('poparser.php');
//functions file
require_once('functions.php');
//configuration file
require_once('config.php');
//save changes
save_file();
// If error is filled, print it
if ($error != '')
    echo $error;
// Checks if main dir is defined
if (!isset($main_directory) || $main_directory == '') {
    echo "<h2>Check 'config.php' for main directory of language files<br />";
    exit;
}
//get po files array
$poFiles = get_po_files($main_directory);
//check if languages have the same files
$files = '';
if ($poFiles != null) {
    foreach ($poFiles as $poFile) {
        if ($files != '') {
            if ($files != $poFile['files'])
                $fileCheck = "<h2>Some language files are missing!\nPlease check language folders.\n</h2>";
        } else {
            $files = $poFile['files'];
        }
    }
}
if ($fileCheck != '') {
    echo $fileCheck;
    exit;
}
//check if same files have same rows of keys and strings. Take which has largest number of rows
$files = explode(',', $files);
$rows = '';
$last = null;
if ($poFiles != null) {
    foreach ($poFiles as $poFile) {
        foreach ($files as $file) {
            if (isset($last[$file])) {
                if ($last[$file]['size'] < count($poFile[$file][1])) {
                    $rows[$file]['size'] = count($poFile[$file][1]);
                    $rows[$file]['code'] = $poFile['code'];
                } else if ($last[$file]['size'] > count($poFile[$file][1])) {
                    $rows[$file]['size'] = $last[$file]['size'];
                    $rows[$file]['code'] = $last[$file]['code'];
                }
            }
            $last[$file]['size'] = count($poFile[$file][1]);
            $last[$file]['code'] = $poFile['code'];
        }
    }
}
// Info if number of keys missmatch
if (isset($rows) && $rows != null) {
    foreach ($rows as $key => $val) {
        if ($val != null)
            echo "<h2>File '" . $key . "' has different number of keys (msgid) in different language folders.<br /> Will be used the highest number of keys (msgid) having language file from '" . $languageCodes[$val['code']] . "' language folder as default key index.</h2><br />";
    }
}
?>