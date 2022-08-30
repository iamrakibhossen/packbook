<?php

use Respect\Validation\Validator;
use GusApi\Exception\InvalidUserKeyException;
use GusApi\Exception\NotFoundException;
use GusApi\GusApi;

function pb_check_nip($nip)
{

    return Validator::nip()->validate($nip);
}


function pb_get_nip($nip)
{

    if (pb_check_nip($nip) === false) {

        return false;
    }

    $data = get_transient(md5($nip));

    if (!empty($data)) {
        return $data;
    }

 
    //for development server use:
    $gus = new GusApi('db63b499ba0247838d42');

    try {

        $gus->login();

        $gusReports = $gus->getByNip($nip);

        if (empty($gusReports[0])) {

            return false;
        }


        $data = json_decode(json_encode($gusReports[0]), true);

        if (!empty($data)) {
            set_transient(md5($nip), $data, DAY_IN_SECONDS);
        }

        return $data;
    } catch (InvalidUserKeyException $e) {

        return false;
    } catch (NotFoundException $e) {

        return false;
    }
}


function pb_check_postal_code($postalCode, $countryCode)
{
    global $wpdb;

    $countryCode = trim($countryCode);

    $postalCode = trim($postalCode);

    $data = get_transient(md5($countryCode . $postalCode));

    if (!empty($data)) {
        return $data;
    }

    $result = $wpdb->get_results("
    SELECT *
    FROM  {$wpdb->prefix}postalcode
        WHERE country_code = '$countryCode' 
        AND postal_code = '$postalCode'
        ORDER BY id ASC
        LIMIT 0, 1
    ", ARRAY_A);

    if (empty($result[0])) {

        $result[0] = [];
    }

    set_transient(md5($countryCode . $postalCode), $result[0], WEEK_IN_SECONDS);

    return $result[0];
}
