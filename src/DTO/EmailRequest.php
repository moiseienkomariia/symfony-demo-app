<?php


namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;


class EmailRequest
{

    /**
     * @Assert\NotBlank
     * @Assert\Email(message="Email is not valid")
     */
    private $from;

    /**
     * @Assert\NotBlank
     * @Assert\Email(message="Email is not valid")
     */
    private $to;

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from): void
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to): void
    {
        $this->to = $to;
    }
}