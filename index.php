<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title> PO language file editor </title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link media="screen" rel="stylesheet" href="css/defaultTheme.css">
        <link media="screen" rel="stylesheet" href="css/myTheme.css">
        <script src="js/jquery-1.7.2.min.js"></script>
        <script src="js/jquery.fixedheadertable.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        <div id = "container">
                    <?php

                    //header file for main includes and functions and some other stuff.
                    require_once('header.php');
					//edit modified file
					//if (!$overwrite && isset($_GET['file']) && in_array($_GET['file'], $files) && trim($_GET['file']) != '')
					//	$_GET['file'] = $modified."-".$_GET['file'];
                    //Select box for files
                    echo '<form action = "" method = "GET">';
                    echo '<select name="file">';
                    echo '<option value= "" >Select File</options>';
                    foreach ($files as $file) {
						//generate options for select
                        echo '<option value = "' . $file . '" ' . (isset($_GET['file']) && $_GET['file'] == $file ? 'selected = "selected"' : '') . '>' . $file . '</option>';
                    }
                    echo '</select>';
					//input button
                    echo '<input type = "submit" class = "button"  value = "Select file" />';
                    echo '</form>';					
                    //check for selected file if it is in array, if yes (no hack attempt), continue
                    if (isset($_GET['file']) && in_array($_GET['file'], $files) && trim($_GET['file']) != '') {
                        $selectedFile = $_GET['file'];
                        $langCodes = '';
                        foreach ($poFiles as $poFile) {
                            $langCodes .= ( $langCodes != '' ? ',' : '') . $poFile['code'];
                        }
                        $langCodes = explode(',', $langCodes);
                        $file = $selectedFile;
                        if (isset($rows) && $rows != null && isset($rows[$file]['code']))
                            $default = $rows[$file]['code'];
                        else
                            $default = $langCodes[0];
                    ?>	
						<script>
							var langs = <?php echo count($langCodes); ?>;
						</script>
                        <form name = "save_file" method = "POST" action = "">    
                        <?php
                        // outputs files list and modified date
                        $filename = $poFiles[$default]['dir'] . $file;
                        if (file_exists($filename)) {
                            $filesDir = '';
                            foreach ($poFiles as $poFile) {
                                $filesDir .= $poFile['dir'] . $file . "<br />";
                            }
                            echo "<center><h1>$filesDir</h1> was last modified: " . gmdate("F d Y, H:i:s.", filemtime($filename)) . "</center><br />";
							echo '<input type = "hidden" value = "'.filemtime($filename).'" name = "last_modified" />';
					   }
                        ?>
                        <!-- Here starts table with fields -->
                        <input type = "hidden" value = "<?php echo $selectedFile; ?>" name = "file" />
                        <center>
                            <input type = "submit" class = "button" value = "Save file" />
							<div id = "add_key" class = "button" style =" line-height: 16px; font-weight:normal;">Add New Key</div>
							<div id = "add_id" class = "button" style =" line-height: 16px; font-weight:normal;">Add ID</div>
							<div id = "remove_id" class = "button" style =" line-height: 16px; font-weight:normal;">Remove ID</div>
                        </center>
                        <TABLE id = "data" class="fancyTable tableWithFloatingHeader" >
                            <THEAD>
                                <TR>
                                    <!--<TH SCOPE="col">File Name</TH>-->
                                    <TH SCOPE="col">Key ID (msgid)</TH>
                                    <?php
                                    // Header of languages
                                    foreach ($poFiles as $poFile) {
                                        echo '<TH  SCOPE="col">' . $languageCodes[$poFile['code']] . '</TH>';
                                    }
                                    ?>
                                    <TH SCOPE="col">References</TH>
                                </TR>
                            </THEAD>
                            <TBODY>
                                <?php
                                    $counter = 0;
                                    // generates rows of table
                                    foreach ($poFiles[$default][$file][1] as $row) {
                                        echo "<TR>";
                                        //echo '<TD >'.$file.'</TD>';
                                        // Key column
                                        echo '<TD ><textarea  name="msgid[]" readonly="readonly">' . (isset($row['msgid']) ? $row['msgid'] : '') . '</textarea></TD>';
                                        // msgstr columns of languages
                                        foreach ($langCodes as $langCode) {
                                            echo '<TD ><textarea class = "msgstr" name="msgstr[' . $langCode . '][]" >' . (isset($poFiles[$langCode][$file][1][$counter]['msgstr']) ? $poFiles[$langCode][$file][1][$counter]['msgstr'] : '') . '</textarea></TD>';
                                        }
                                        // comments
                                        echo '<TD style = "width: 100px;" >';
										if (isset($row['references'])){
											$refs = explode("\n",$row['references']);
											foreach ($refs as $ref){
												echo (isset($row['references']) ? "<a href=\"https://fisheye.devadmin.com/browse/portal".$ref."\" >".$ref."</a><br/>" : '') . '';
											}
										}
										echo '<input type="hidden" name="msgreference[]" value="' . (isset($row['references']) ? $row['references'] : '') . '"/>';
                                        // hidden fields for additional information
                                        echo '<input type="hidden" name="msgcomment[]" value="' . (isset($row['translator-comments']) ? $row['translator-comments'] : '') . '"/>';
                                        echo '<input type="hidden" name="msgexcomments[]" value="' . (isset($row['extracted-comments']) ? $row['extracted-comments'] : '') . '"/>';
                                        echo '<input type="hidden" name="msgflags[]" value="' . (isset($row['flags']) ? $row['flags'] : '') . '"/>';
                                        echo '<input type="hidden" name="premsgid[]" value="' . (isset($row['previous-msgid']) ? $row['previous-msgid'] : '') . '"/>';
                                        echo '<input type="hidden" name="premsgtxt[]" value="' . (isset($row['previous-msgctxt']) ? $row['previous-msgctxt'] : '') . '"/>';
                                        echo '</TD>';
                                        echo "</TR>";
                                        //counter increase
                                        $counter++;
                                    }
                                ?>
                                </TBODY>    
                            </TABLE>    
                        <?php
                                    //generates files directory for saving
                                    foreach ($langCodes as $langCode) {
                                        echo '<input type = "hidden" name = "dir_' . $langCode . '" value = "' . $poFiles[$langCode]['dir'] . '"/>';
                                    }
                                    //generate header file for submit
                                    $header_top = "msgid \"\"\nmsgstr \"\"\n";
                                    $header = "";
                                    foreach ($poFiles[$default][$file][0] as $key => $val) {
                                        if ($val != '')
                                            $header .= "\"" . $key . ":" . $val . "\\n\"\n";
                                    }
                                    if ($header != "") {
                                        $header = $header_top . $header . "\n";
                                        echo '<textarea style="visibility:hidden;position:absolute; width:1px; height:1px;" name="header" >' . $header . '</textarea>';
                                    }
                        ?>
                                </form>            
                    <?php
                                } else if (count($poFiles) < 2) {
                                    // If no files found in directory
                                    echo '<h2>No files found. Please check main directory!</h2><br/>';
                                } else {
                                    // If no file chosen
                                    echo "Please select file to edit";
                                }
                    ?>
        </div>            
    </body>
</html>