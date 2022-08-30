<?php

class DPD
{

    public $authData;

    public $url;

    public function __construct()
    {

        $this->url = 'https://dpdservicesdemo.dpd.com.pl/DPDPackageObjServicesService/DPDPackageObjServices?wsdl';

        $this->authData = array('login' => 'test', 'password' => 'thetu4Ee', 'masterFid' => '1495');
    }

    public function checkPostCode($code, $countryCode)
    {

        $args = array();

        $args['postalCodeV1'] = array('countryCode' => $countryCode, 'zipCode' => $code);

        $args['authDataV1'] = $this->authData;

        $result = pb_call_soap($this->url, 'findPostalCodeV1', $args);

        return $result->return->status;
    }

    public function getAvailability($code, $countryCode)
    {

        $args = array();

        $args['senderPlaceV1'] = array('countryCode' => $countryCode, 'zipCode' => $code);

        $args['authDataV1'] = $this->authData;

        $result = $this->client->__soapCall('getCourierOrderAvailabilityV1', [$args]);

        $result = json_decode(json_encode($result), true);

        return $result;
    }

    public function createPackage()
    {

        $parcels = [
            'reference' => wp_unique_id(),
            'weight' => '1',
            'sizeX' => '20',
            'sizeY' => '10',
            'sizeZ' => '10',
            'content' => 'dox',
        ];

        $receiver = [
            'address' => 'Kwiatowa 2',
            'city' => 'Poznań',
            'company' => '',
            'countryCode' => 'PL',
            'email' => 'demo@packbook.com',
            'fid' => '1495',
            'name' => 'Piotr Nowak',
            'phone' => '605600600',
            'postalCode' => '87100'
        ];

        $sender = [
            'address' => 'Puławska 1',
            'city' => 'Warszawa',
            'company' => '',
            'countryCode' => 'PL',
            'email' => 'iamrakib@iamrakib.com',
            'fid' => '1495',
            'name' => 'Rakib Hossen',
            'phone' => '501100100',
            'postalCode' => '02566'
        ];

        $param = [];

        $param['packages'] = array(
            'services' => [],
            'reference' => wp_unique_id(),
            'ref1' => '',
            'ref2' => '',
            'ref3' => '',
            'parcels' => $parcels,
            'payerType' => 'SENDER',
            'thirdPartyFID' => '1495',
            'receiver' => $receiver,
            'sender' => $sender
        );

        $args = [];

        $args['openUMLV1'] = $param;

        $args['authDataV1'] = $this->authData;

        $result = pb_call_soap($this->url, 'generatePackagesNumbersV1', $args);

        return $result->return;
    }

    public function getLabel()
    {

        $label = '';

        $upload_dir   = wp_upload_dir();

        if (!empty($upload_dir['basedir'])) {
            $label = $upload_dir['basedir'] . '/labels';
            if (!file_exists($label)) {
                wp_mkdir_p($label);
            }
        }


        $args = [];

        $args['dpdServicesParamsV1'] = [
            'pickupAddress' => [],
            'documentId' => '217775761',
            'session' => [
                'sessionId' => '231050251',
                'sessionType' => 'DOMESTIC',
                'packages' => [
                    'packageId' => '245180734',
                    'parcels' => [
                        'parcelId' => '245169965',
                        'waybill' => '0000000167387Q',
                    ],
                ],
            ],
            'policy' => 'STOP_ON_FIRST_ERROR'
        ];

        $args['outputDocFormatV1'] = 'PDF';
        $args['outputDocPageFormatV1'] = 'A4';

        $args['authDataV1'] = $this->authData;

        $return = pb_call_soap($this->url, 'generateSpedLabelsV1', $args);

        $label = $label . '/0000000167387Q.pdf';

        if (is_wp_error($return)) {

            echo $return->get_error_message();
        } else {

            $fp = fopen($label, 'wb');
            fwrite($fp, $return->return->documentData);
            fclose($fp);

            return home_url('pdrive/labels/0000000167387Q.pdf');
        }
    }
}
