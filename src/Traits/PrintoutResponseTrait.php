<?php

namespace Omnipay\InBank\Traits;

trait PrintoutResponseTrait 
{
    public function getUuid(): ?string
    {
        $data = $this->getData();
        $uuid = null;
        if (isset($data['uuid'])) {
            $uuid = $data['uuid'];
        }

        return $uuid;
    }
    
    public function getLink(): ?string
    {
        $data = $this->getData();
        
        $link = null;
        if (isset($data['link'])) {
            $link = $data['link'];
        }

        return $link;
    }       
}