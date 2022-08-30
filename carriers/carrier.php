<?php

use Doctrine\Common\Collections\Expr\Expression;

require(get_template_directory() . '/carriers/dpd.php');

class Carrier
{

    private $service;

    private $sender;

    private $receiver;

    private $parcel;


    public function __construct()
    {
        if (empty($this->service)) {

            $this->service = new Dpd();
        }
    }


    /**
     * @param string $service
     * @return void
     */
    public function setService($service = 'dpd')
    {

        if ($service == 'dpd') {

            $service = new Dpd();
        } elseif ($service == 'inpost') {

            $service = new Inpost();
        } elseif ($service == 'ups') {

            $service = new Ups();
        }

        $this->service = $service;
    }


    public function checkPostCode($code, $countryCode)
    {

        $output = $this->service->checkPostCode($code, $countryCode);

        if ($output == 'OK') {
            return true;
        }

        return false;
    }

    public function createPackage()
    {

        return $this->service->createPackage();
    }

    public function getLabel()
    {

        return $this->service->getLabel();
    }
}

$carrier = new Carrier();
