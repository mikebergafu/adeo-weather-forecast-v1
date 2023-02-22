<?php

    use Carbon\Carbon;
    use Illuminate\Http\Response;

    function return_types($message = '', $code = Response::HTTP_FORBIDDEN, $data = null)
    {
        $author = array(
            'AUTHOR_NAME' => "Mike-Berg Sitsofe Afu",
            'COPYRIGHT' => "copyright@".Carbon::now()->format('Y')." All rights reserved",
            'AUTHOR_PHONE' => array('233204038261'),
            'SUPPORT_PHONE' => array('233204038261'),
            'SUPPORT_EMAIL' => array('mikeberg.afu@gmail.com'),
            'AUTHOR_URL' => 'mikebergafu.me',
        );

        if ($code !== 501) {
            $arr = array(
                'status' => $code,
                'message' => $message,
                'details' => $data,
                'developed_by' => $author,
                'version' => '1.0.0',
            );
            $ret = response($arr, $arr['status']);
        } else {
            $arr = array(
                'status' => 501,
                'message' => 'No such function is Implemented',
                'details' => $data,
                'developed_by' => $author,
                'version' => '1.0.0',
            );
            $ret = response($arr, $arr['status']);
        }
        return $ret;
    }

    function generate_code($length_of_string)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($str_result),
            0, $length_of_string);
    }

    function generate_code_small($length_of_string)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return strtolower(substr(str_shuffle($str_result), 0, $length_of_string));
    }

    function generate_code_numbers_only($length_of_string)
    {
        $str_result = '0123456789';
        return substr(str_shuffle($str_result),
            0, $length_of_string);
    }

    function generate_api_user($length_of_string, $mixed = null)
    {
        $str_result = $mixed === null ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($str_result),
            0, $length_of_string);
    }

    function clean_throwable(Throwable $throwable)
    {
        $message = $throwable->getMessage();
        $file = $throwable->getFile();
        $line = $throwable->getLine();

        $error_message = $message.' found on LINE '.$line.' in '.$file;
        return return_types($error_message, 500);
    }

    function clean_throwable_only(Throwable $throwable)
    {
        $message = $throwable->getMessage();
        $file = $throwable->getFile();
        $line = $throwable->getLine();

        return $message.' found on LINE '.$line.' in '.$file;

    }

    function guidv4()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        $data = openssl_random_pseudo_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
