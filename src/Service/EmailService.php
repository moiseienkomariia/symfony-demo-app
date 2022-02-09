<?php


namespace App\Service;


interface EmailService
{
    function sendEmail($from, $to, $content);
}