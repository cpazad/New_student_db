<?php

/**
 * Validation Messages
 *
 */

function valMsg($msg, $type = 'info'){
    return '<p class="alert alert-'.$type.'"><button class="close" data-dismiss="alert">&times;</button> '. $msg .' </p>';
}

?>