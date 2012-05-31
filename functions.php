<?php
/**************************************/
/* Contains main functions
/**************************************/
//var for displaying error
$error = '';
//Language array
$languageCodes = array(
 "aa" => "Afar",
 "ab" => "Abkhazian",
 "ae" => "Avestan",
 "af" => "Afrikaans",
 "ak" => "Akan",
 "am" => "Amharic",
 "an" => "Aragonese",
 "ar" => "Arabic",
 "as" => "Assamese",
 "av" => "Avaric",
 "ay" => "Aymara",
 "az" => "Azerbaijani",
 "ba" => "Bashkir",
 "be" => "Belarusian",
 "bg" => "Bulgarian",
 "bh" => "Bihari",
 "bi" => "Bislama",
 "bm" => "Bambara",
 "bn" => "Bengali",
 "bo" => "Tibetan",
 "br" => "Breton",
 "bs" => "Bosnian",
 "ca" => "Catalan",
 "ce" => "Chechen",
 "ch" => "Chamorro",
 "co" => "Corsican",
 "cr" => "Cree",
 "cs" => "Czech",
 "cu" => "Church Slavic",
 "cv" => "Chuvash",
 "cy" => "Welsh",
 "da" => "Danish",
 "de" => "German",
 "dv" => "Divehi",
 "dz" => "Dzongkha",
 "ee" => "Ewe",
 "el" => "Greek",
 "en" => "English",
 "eo" => "Esperanto",
 "es" => "Spanish",
 "et" => "Estonian",
 "eu" => "Basque",
 "fa" => "Persian",
 "ff" => "Fulah",
 "fi" => "Finnish",
 "fj" => "Fijian",
 "fo" => "Faroese",
 "fr" => "French",
 "fy" => "Western Frisian",
 "ga" => "Irish",
 "gd" => "Scottish Gaelic",
 "gl" => "Galician",
 "gn" => "Guarani",
 "gu" => "Gujarati",
 "gv" => "Manx",
 "ha" => "Hausa",
 "he" => "Hebrew",
 "hi" => "Hindi",
 "ho" => "Hiri Motu",
 "hr" => "Croatian",
 "ht" => "Haitian",
 "hu" => "Hungarian",
 "hy" => "Armenian",
 "hz" => "Herero",
 "ia" => "Interlingua",
 "id" => "Indonesian",
 "ie" => "Interlingue",
 "ig" => "Igbo",
 "ii" => "Sichuan Yi",
 "ik" => "Inupiaq",
 "io" => "Ido",
 "is" => "Icelandic",
 "it" => "Italian",
 "iu" => "Inuktitut",
 "ja" => "Japanese",
 "jv" => "Javanese",
 "ka" => "Georgian",
 "kg" => "Kongo",
 "ki" => "Kikuyu",
 "kj" => "Kwanyama",
 "kk" => "Kazakh",
 "kl" => "Kalaallisut",
 "km" => "Khmer",
 "kn" => "Kannada",
 "ko" => "Korean",
 "kr" => "Kanuri",
 "ks" => "Kashmiri",
 "ku" => "Kurdish",
 "kv" => "Komi",
 "kw" => "Cornish",
 "ky" => "Kirghiz",
 "la" => "Latin",
 "lb" => "Luxembourgish",
 "lg" => "Ganda",
 "li" => "Limburgish",
 "ln" => "Lingala",
 "lo" => "Lao",
 "lt" => "Lithuanian",
 "lu" => "Luba-Katanga",
 "lv" => "Latvian",
 "mg" => "Malagasy",
 "mh" => "Marshallese",
 "mi" => "Maori",
 "mk" => "Macedonian",
 "ml" => "Malayalam",
 "mn" => "Mongolian",
 "mr" => "Marathi",
 "ms" => "Malay",
 "mt" => "Maltese",
 "my" => "Burmese",
 "na" => "Nauru",
 "nb" => "Norwegian Bokmal",
 "nd" => "North Ndebele",
 "ne" => "Nepali",
 "ng" => "Ndonga",
 "nl" => "Dutch",
 "nn" => "Norwegian Nynorsk",
 "no" => "Norwegian",
 "nr" => "South Ndebele",
 "nv" => "Navajo",
 "ny" => "Chichewa",
 "oc" => "Occitan",
 "oj" => "Ojibwa",
 "om" => "Oromo",
 "or" => "Oriya",
 "os" => "Ossetian",
 "pa" => "Panjabi",
 "pi" => "Pali",
 "pl" => "Polish",
 "ps" => "Pashto",
 "pt" => "Portuguese",
 "qu" => "Quechua",
 "rm" => "Raeto-Romance",
 "rn" => "Kirundi",
 "ro" => "Romanian",
 "ru" => "Russian",
 "rw" => "Kinyarwanda",
 "sa" => "Sanskrit",
 "sc" => "Sardinian",
 "sd" => "Sindhi",
 "se" => "Northern Sami",
 "sg" => "Sango",
 "si" => "Sinhala",
 "sk" => "Slovak",
 "sl" => "Slovenian",
 "sm" => "Samoan",
 "sn" => "Shona",
 "so" => "Somali",
 "sq" => "Albanian",
 "sr" => "Serbian",
 "ss" => "Swati",
 "st" => "Southern Sotho",
 "su" => "Sundanese",
 "sv" => "Swedish",
 "sw" => "Swahili",
 "ta" => "Tamil",
 "te" => "Telugu",
 "tg" => "Tajik",
 "th" => "Thai",
 "ti" => "Tigrinya",
 "tk" => "Turkmen",
 "tl" => "Tagalog",
 "tn" => "Tswana",
 "to" => "Tonga",
 "tr" => "Turkish",
 "ts" => "Tsonga",
 "tt" => "Tatar",
 "tw" => "Twi",
 "ty" => "Tahitian",
 "ug" => "Uighur",
 "uk" => "Ukrainian",
 "ur" => "Urdu",
 "uz" => "Uzbek",
 "ve" => "Venda",
 "vi" => "Vietnamese",
 "vo" => "Volapuk",
 "wa" => "Walloon",
 "wo" => "Wolof",
 "xh" => "Xhosa",
 "yi" => "Yiddish",
 "yo" => "Yoruba",
 "za" => "Zhuang",
 "zh" => "Chinese",
 "zu" => "Zulu"
);
$fileData= '';
$po = new POParser;
//filter PO files and get language code
function echoFile($file){
	global $languageCodes, $fileData, $po;
	$parts = explode('/',$file);
	$last = count($parts);
	if ($last > 2){
		if (strtolower($parts[$last-2]) == strtolower('LC_MESSAGES')){
			if (isset($languageCodes[substr($parts[$last-3],0,2)])){
				if (isset($fileData[substr($parts[$last-3],0,2)])){
					$tempData = $fileData[substr($parts[$last-3],0,2)];
				} else {
					$tempData = null;
				}
				if (!isset($fileData[substr($parts[$last-3],0,2)])){
					$fileData[substr($parts[$last-3],0,2)] = array (
						'code' => substr($parts[$last-3],0,2),
						'language' => $languageCodes[substr($parts[$last-3],0,2)],
						'dir' => str_replace($parts[$last-1],'',$file),
						'files' => ($tempData['files']!= null ? $tempData['files'].',':'').$parts[$last-1],	
						$parts[$last-1] => $po->parse($file)
					);
				} else {
					$fileData[substr($parts[$last-3],0,2)][$parts[$last-1]]  = $po->parse($file);
					$fileData[substr($parts[$last-3],0,2)]['files'] .= ','.$parts[$last-1];
				}
			}
		}
	}
}
//get PO file list
function get_po_files($dir = null){
	global $fileData;
	find_files($dir,'/[(.po)(.PO)]$/','echoFile');
	return $fileData;
}
//search files
function find_files($path, $pattern, $callback) {
	$path = rtrim(str_replace("\\", "/", $path), '/') . '/*';                         
	foreach (glob ($path) as $fullname) {
		if (is_dir($fullname)) {
			find_files($fullname, $pattern, $callback);
		} else if (preg_match($pattern, $fullname)) {
			call_user_func($callback, $fullname);
		}
	}
}
//function for saving changes
$modified = date('YmdHis');
$overwrite = true;
function save_file(){
	//Part of saving files
        global $error, $modified, $overwrite;
		// check if form is submitted
        if (isset($_POST['file']) && !empty($_POST['file'])) {
			//create time prefix for modified files
			$modified = date('YmdHis');
			// go throug all languages
            foreach ($_POST['msgstr'] as $key => $val) {
				// creates unique file name
                $myFile = uniqid("tmp_", true);
                $fh = fopen($myFile, 'w') or die("Can't open file");
                $counter = 0;
				// writes header
                if (isset($_POST['header']) && $_POST['header'] != null) {
					if (get_magic_quotes_gpc()) {
						$header = $_POST['header'];
						$header = str_replace("\n","--newline--",$header);
						$header = stripslashes($header);
						$header = str_replace("--newline--","\n",$header);
						fwrite($fh, $header);
					} else {
						$header = $_POST['header'];
						fwrite($fh, $header);
					}
                }
				// go through all keys 
                foreach ($_POST['msgid'] as $msgid) {
                    //write comments
                    $comments = explode("\n", $_POST['msgcomment'][$counter]);
                    foreach ($comments as $comment) {
                        if ($comment != null) {
                            $temp = "#  " . stripslashes($comment) . "\n";
                            fwrite($fh, $temp);
                        }
                    }
                    //write extracted-comments
                    $comments = explode("\n", $_POST['msgexcomments'][$counter]);
                    foreach ($comments as $comment) {
                        if ($comment != null) {
                            $temp = "#. " . stripslashes($comment) . "\n";
                            fwrite($fh, $temp);
                        }
                    }
                    //write references
                    $references = explode("\n", $_POST['msgreference'][$counter]);
                    foreach ($references as $reference) {
                        if ($reference != null) {
                            $temp = "#: " . stripslashes($reference) . "\n";
                            fwrite($fh, $temp);
                        }
                    }
                    //write flags
                    $flags = explode("\n", $_POST['msgflags'][$counter]);
                    foreach ($flags as $flag) {
                        if ($flag != null) {
                            $temp = "#, msgctxt " . stripslashes($flag) . "\n";
                            fwrite($fh, $temp);
                        }
                    }
                    //write previous-msgtxt
                    $prevs = explode("\n", $_POST['premsgtxt'][$counter]);
                    foreach ($prevs as $prev) {
                        if ($prev != null) {
                            $temp = "#| msgtxt " . stripslashes($prev) . "\n";
                            fwrite($fh, $temp);
                        }
                    }
                    //write previous-msgid
                    $prevs = explode("\n", $_POST['premsgid'][$counter]);
                    foreach ($prevs as $prev) {
                        if ($prev != null) {
                            $temp = "#| msgid " . stripslashes($prev) . "\n";
                            fwrite($fh, $temp);
                        }
                    }
                    //write msgid
                    $msgid_array = explode("\n", $msgid);
                    if (count($msgid_array) > 1) {
                        $str = "msgid \"\"\n";
                        foreach ($msgid_array as $msgid_one) {
                            $msgid_one = str_replace(array("\n", "\r"), '', $msgid_one);
                            $str .= '"' . stripslashes($msgid_one) . '"' . "\n";
                        }
                    } else {
                        $str = "msgid \"" . stripslashes($msgid) . "\"\n";
                    }
                    fwrite($fh, $str);
                    //write msgstr
                    $msgstr_array = explode("\n", $val[$counter]);
                    if (count($msgstr_array) > 1) {
                        $str = "msgstr \"\"\n";
                        foreach ($msgstr_array as $msgstr_one) {
                            $msgstr_one = str_replace(array("\n", "\r"), '', $msgstr_one);
                            $str .= '"' . stripslashes($msgstr_one) . '"' . "\n";
                        }
                        $str .= "\n";
                    } else {
                        $str = "msgstr \"" . stripslashes($val[$counter]) . "\"\n\n";
                    }
                    fwrite($fh, $str);
					// increase counter
                    $counter++;
                }
                fclose($fh);
                // Open the file to get existing content
                $content = file_get_contents($myFile);
                // Directory of each language
				
                $oldFile = $_POST['dir_' . $key] . $_POST['file'];
				$org_file = $_POST['last_modified'];
				$before_save = filemtime($oldFile);
				if ($org_file != $before_save)
					$overwrite = false;
				if (!$overwrite)
					$oldFile = $_POST['dir_' . $key] . $modified . "-" .$_POST['file'];
                // Write the contents to main file and checks if success
                if (file_put_contents($oldFile, $content) == false) {
					$error = "<h2>File '" . $_POST['file'] . "' has <b>not</b> been saved!</h2>\n";
                } else {
					if (!$overwrite)
						$error = "<h1>File '" . $_POST['file'] . "' has been saved as '".$modified . "-" .$_POST['file']."'!</h1>\n<h2>That means that someone else has modified file before you!</h1>";
					else
						$error = "<h1>File '" . $_POST['file'] . "' has been saved!</h1>\n";               
				}
				// Delets temporary file
                unlink($myFile);
            }
			
        }
}
?>