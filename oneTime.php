<?php
/**
 *
 *  OTP Generator
 *
 *  Usage: php oneTime.php key
 *
 */


    /** Setting up OTP Class **/
    require 'otp.php';
    $OTP=new OTP();

    /** Passing the $key variable trough command line **/
    $key = $argv[1];

    /** Getting the OTP **/
    $oneTime = $OTP->getOTP($key);

    /** Printing out the Key and the OTP **/
    print("Key: $key\n");
    print("OTP: $oneTime\n");
