<?php
header('Content-Type: text/plain');
echo "PHP Version: " . phpversion() . "\n";
echo "upload_max_filesize: " . ini_get('upload_max_filesize') . "\n";
echo "post_max_size: " . ini_get('post_max_size') . "\n";
echo "memory_limit: " . ini_get('memory_limit') . "\n";
echo "max_execution_time: " . ini_get('max_execution_time') . "\n";
echo "max_input_time: " . ini_get('max_input_time') . "\n";
echo "Temporary upload directory: " . ini_get('upload_tmp_dir') . (is_writable(ini_get('upload_tmp_dir') ?: sys_get_temp_dir()) ? " (Writable)" : " (NOT Writable)") . "\n";
?>
