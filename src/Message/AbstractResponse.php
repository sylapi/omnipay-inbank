<?php

namespace Omnipay\InBank\Message;

abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
{
    const DEFAULT_MESSAGE = 'Something went wrong.';

    private $message;

    public function isSuccessfulResponse()
    {
        $success = !(isset($this->data['Message']) || isset($this->data['message']));

        if($success === false)
        {
            $message = (isset($this->data['Message']) ?
                $this->data['Message'] : (
                    (isset($this->data['message'])) ? 
                    $this->data['message']
                     : self::DEFAULT_MESSAGE)
                );

            $message = is_array($message) ? implode(',', $message) : $message;
            $this->setMessage($message);
        }

        return $success;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($value)
    {
        return $this->message = $value;
    }
}