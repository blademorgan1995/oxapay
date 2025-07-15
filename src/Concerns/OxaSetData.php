<?php

namespace OxaPay\OxaPay\Concerns;

trait OxaSetData
{
    public function callbackUrl($data, $key)
    {
        // if callback has data
        if(array_key_exists('callback_url', $data)) {
            if(!empty($data['callback_url'])) {
                return $data;
            }
        }

        // set callbackUrl from config
        $callbackUrl = config("oxapay.callback_url.$key");
        if(!empty($callbackUrl)) {
            $data['callback_url'] = $callbackUrl;
            return $data;
        }

        return $data;
    }

}
