<?php

 $filename = 'some_file.txt';

 $log_file = 'log_file.txt';

 if (is_readable($filename)) {
    return true;
} else {
   file_put_contents($filename, '', FILE_APPEND);
};

if (is_readable($log_file)) {
    return true;
} else {
   file_put_contents($log_file, '', FILE_APPEND);
}

?>