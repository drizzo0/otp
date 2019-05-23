<?php
    require 'otp.php';

    $OTP=new OTP();

    $key = $argv[1];

    $oneTime = $OTP->getOTP($key);

    print("Key: $key\n");
    print("Otp: $oneTime\n");
