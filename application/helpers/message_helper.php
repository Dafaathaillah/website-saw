<?php
function write_message()
{
    $CI = & get_instance();
    $message = $CI->session->flashdata('message');
    if(is_array($message))
    {
        echo '<div class="alert alert-'.$message[0].'" role="alert">';
        echo $message[1];
        echo '</div>';
    }
}