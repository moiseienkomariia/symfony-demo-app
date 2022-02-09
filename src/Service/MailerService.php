<?php


namespace App\Service;


use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService implements EmailService
{
    private $mailer;

    /**
     * MailerService constructor.
     * @param $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    function sendEmail($from, $to, $content)
    {
        $url = "https://www.bestbip.pl" . $content;

        // creat mail template
        $email = (new Email())
            ->from($from)
            ->to($to)
            ->subject('Link on a good article')
            ->text("Hello my dear client!!!")
            ->html("<a href='" . $url ."'>link</a>");

        // send email
        try
        {
            dd($email);
            //$this->mailer->send($email);
        }
        catch (TransportExceptionInterface $e)
        {
            dd($e->getMessage());
        }
    }
}