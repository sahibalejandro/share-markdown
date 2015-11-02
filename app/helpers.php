<?php
/**
 * @author Sahib J. Leo <sahib@sahib.io>
 * Date: 11/1/15 2:16 AM
 */

if (!function_exists('json_response')) {
    function json_response($errorCode = 200, $errorMessage = null)
    {

        $context['error'] = $errorCode;
        $context['message'] = $errorCode;

    }
}