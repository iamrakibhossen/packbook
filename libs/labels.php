<?php

use Dompdf\Dompdf;

function getLabels($bid)
{

  global $booking;

  $data = $booking->get($bid);

  extract($data);

  $user_info = get_userdata($parcel_create);

  if ($user_info->user_type == 'bussiness') {

    $order_id = intval(get_option('invoice_id'));

    if (!empty($order_id)) {
      $order_id++;

      $order_id = sprintf('%06d', $order_id);
      
    } else {
      $order_id =  0000001;
    }

    update_option('invoice_id', $order_id);

    $order_id = $order_id . '/IF/' . date("Y");
  } else {
    $order_id = intval(get_option('receipt_id'));
    if (!empty($order_id)) {
      $order_id++;
      $order_id = sprintf('%06d', $order_id);
    } else {
      $order_id =  0000001;
    }

    update_option('receipt_id', $order_id);

    $order_id = $order_id . '/IP/' . date("Y");
  }



  $dompdf = new Dompdf();

  $label = '';
  $upload_dir   = wp_upload_dir();

  if (!empty($upload_dir['basedir'])) {
    $label = $upload_dir['basedir'] . '/labels';
    if (!file_exists($label)) {
      wp_mkdir_p($label);
    }
  }

  $html = '
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pl" xml:lang="pl" style="margin: 0;padding: 0;border: 0;">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Packbook Invoice</title>
    <meta name="viewport" content="width=device-width">
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex, nofollow, noarchive">
</head>

<body class="Email"
    style="margin: 0;padding: 0;border: 0;background-color: #fff;font-family: DejaVu Sans, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;min-width: 100% !important;width: 100% !important;"
    data-new-gr-c-s-check-loaded="14.1006.0" data-gr-ext-installed="">
    <div class="Background" style="background-color: #fff; margin: 0">
        <div class="" style="border: 1px rgba(0, 32, 96,1);">
            <table class="Wrapper" align="center"
                style="border: 2px solid#4a608e; border-collapse: collapse;margin: 0 auto !important;padding: 0;max-width: 210mm;min-width: 600px;width: 198mm; ">
                <tbody>
                    <tr>
                        <td style="border: 0;border-collapse: collapse;margin: 0;padding: 0;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;height: 285mm"
                            valign="top">
                            <table dir="ltr" class="Section Header" width="90%"
                                style="border: 0;border-collapse: collapse;margin: 0 auto;padding: 0;background-color: #ffffff; font-size: 13px">
                                <tbody>
                                    <tr>
                                        <td class="Header-right Target" align="center" height="70" valign="bottom"
                                            width="90%"> UWAGA! Uprzejmie prosimy o dokonywanie wpłat na poprawny numer
                                            konta bankowego:<p><b>PKO BP 92 1020 4144 0000 6002 0276 2300</b></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="bottom"> <img
                                                style="margin: 15px 0; width: 200px; height: auto"
                                                src="data:image/png;base64,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">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: 1px solid#a5a5a5; padding: 10px; font-weight: bold; background:#e7e6e6"
                                            class="Header-right Target" align="center" valign="bottom" width="80%">
                                            <b>Faktura nr '.$order_id.'</b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table dir="ltr" width="90%"
                                style="font-size: 13px; border: 0;border-collapse: collapse;margin: 10px auto;padding: 0;background-color: #ffffff;">
                                <tbody>
                                    <tr>
                                        <td align="left" valign="bottom" width="50%">
                                            <p><b>Data sprzedaży: '.date("d.m.Y").'</b></p>
                                            <p><b>Termin płatności: Zapłacone</b></p>
                                        </td>
                                        <td align="right" valign="bottom" width="50%">
                                            <p><b>Data wystawienia: '.date("d.m.Y").'</b></p>
                                            <p><b>Metoda płatności: Packbook</b></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table dir="ltr" width="90%"
                                style="font-size: 13px; border: 0;border-collapse: collapse;margin: 0 auto;padding: 0;background-color: #ffffff;">
                                <tbody>
                                    <tr>
                                        <td align="left" valign="bottom" width="100%"
                                            style="height: 2px; background:#e7e6e6"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table dir="ltr" width="85%"
                                style="font-size: 13px; border: 0;border-collapse: collapse;margin: 20px auto;padding: 0;background-color: #ffffff;">
                                <tbody>
                                    <tr>
                                        <td align="left" valign="bottom" width="50%">
                                            <p><b>Sprzedawca:</b></p>
                                            <p>Packbook Sp.z.o.o.</p>
                                            <p> Belęcin 88 <br /> 64-231 Belęcin <br /> NIP: 9231737030 <br />
                                                kontakt@packbook.pl</p>
                                        </td>
                                        <td align="right" valign="bottom" width="50%">
                                            <p><b>Nabywca:</b></p>
                                            <p>'.$user_info->user_company.'</p>
                                            <p> '.$user_info->user_address.' <br /> '.$user_info->user_postcode.' '.$user_info->user_city.' <br /> NIP: 9231737030 <br />
                                            '.$user_info->user_email.'</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table dir="ltr" width="90%"
                                style="font-size: 13px; border: 0;border-collapse: collapse;margin: 0 auto;padding: 0;background-color: #ffffff;">
                                <tbody>
                                    <tr>
                                        <td align="left" valign="bottom"
                                            style="background: #e7e7e7; padding: 10px 15px; font-weight: bold; font-size: 12px">
                                            Lp</td>
                                        <td align="center" valign="bottom"
                                            style="width: 200px; background: #e7e7e7; padding: 10px 15px; font-weight: bold; font-size: 12px">
                                            Nazwa usługi</td>
                                        <td align="center" valign="bottom"
                                            style="background: #e7e7e7; padding: 10px 15px; font-weight: bold; font-size: 12px">
                                            J.M</td>
                                        <td align="center" valign="bottom"
                                            style="background: #e7e7e7; padding: 10px 15px; font-weight: bold; font-size: 12px">
                                            Ilość</td>
                                        <td align="center" valign="bottom"
                                            style="background: #e7e7e7; padding: 10px 15px; font-weight: bold; font-size: 12px">
                                            Cena netto</td>
                                        <td align="center" valign="bottom"
                                            style="background: #e7e7e7; padding: 10px 15px; font-weight: bold; font-size: 12px">
                                            Stawka VAT</td>
                                        <td align="right" valign="bottom"
                                            style="background: #e7e7e7; padding: 10px 15px; font-weight: bold; font-size: 12px">
                                            Wartość netto</td>
                                        <td align="right" valign="bottom"
                                            style="background: #e7e7e7; padding: 10px 15px; font-weight: bold; font-size: 12px">
                                            Wartość VAT</td>
                                        <td align="right" valign="bottom"
                                            style="background: #e7e7e7; padding: 10px 15px; font-weight: bold; font-size: 12px">
                                            Wartość brutto</td>
                                    </tr>
                                    <tr>
                                        <td align="left" valign="top"
                                            style="font-weight: normal;background: #f6f9fc; padding: 10px 15px; font-size: 12px">
                                            1.</td>
                                        <td align="center" valign="top"
                                            style=" width: 200px; font-weight: normal;background: #f6f9fc; padding: 10px 15px; font-size: 12px">
                                            Usługa kurierska <br /> ( ID: '.$order_id.')</td>
                                        <td align="right" valign="top"
                                            style="font-weight: normal;background: #f6f9fc; padding: 10px 15px; font-size: 12px">
                                            Szt</td>
                                        <td align="left" valign="top"
                                            style="font-weight: normal;background: #f6f9fc; padding: 10px 15px; font-size: 12px">
                                            1</td>
                                        <td align="center" valign="top"
                                            style="font-weight: normal;background: #f6f9fc; padding: 10px 15px; font-size: 12px">
                                            13.82</td>
                                        <td align="right" valign="top"
                                            style="font-weight: normal;background: #f6f9fc; padding: 10px 15px; font-size: 12px">
                                            23%</td>
                                        <td align="left" valign="top"
                                            style="font-weight: normal;background: #f6f9fc; padding: 10px 15px; font-size: 12px">
                                            13.82</td>
                                        <td align="center" valign="top"
                                            style="font-weight: normal;background: #f6f9fc; padding: 10px 15px; font-size: 12px">
                                            3.18</td>
                                        <td align="right" valign="top"
                                            style="font-weight: normal;background: #f6f9fc; padding: 10px 15px; font-size: 12px">
                                            '.pb_price($total_cost).'</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table dir="ltr" width="90%"
                                style="font-size: 13px; border: 0;border-collapse: collapse;margin: 0 auto;padding: 0;background-color: #ffffff;">
                                <tbody>
                                    <tr>
                                        <td align="right" valign="bottom" width="100%" style="">
                                            <p>Zapłacono: '.pb_price($total_cost, true).'</p>
                                            <p>Pozostało: 0.00 PLN</p>
                                            <p><b>Razem: '.pb_price($total_cost, true).'</b></p>
                                            <p>Słownie:: siedemnaście złotych zero groszy</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table dir="ltr" width="90%"
                                style="font-size: 13px; border: 0;border-collapse: collapse;margin: 20px auto;padding: 0;background-color: #ffffff;">
                                <tbody>
                                    <tr>
                                        <td align="center" valign="bottom" width="100%"
                                            style="border-bottom: 2px solid #444;">
                                            <p><b>Administrator</b></p>
                                            <p>Osoba upoważniona do wystawienia</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table dir="ltr" width="90%"
                                style="font-size: 13px; border: 0;border-collapse: collapse;margin: 15px auto;padding: 0;background-color: #ffffff;">
                                <tbody>
                                    <tr>
                                        <td align="center" valign="bottom" width="100%">
                                            <p>Packbook Sp.z.o.o., Belęcin 88, 64-231 Belęcin, NIP: 9231737030</p>
                                            <p style="margin-bottom: 20px">Nr konta bankowego: <b>PKO BP 92 1020 4144
                                                    0000 6002 0276 2300</b></p>
                                            <p>W przypadku niezgodności danych o charakterze formalnym, prosimy o
                                                wystawienie noty korygującej.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
  ';


  $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

  $dompdf->loadHtml($html);


  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('A4', 'portrait');

  // Render the HTML as PDF
  $dompdf->render();

  $outputString = $dompdf->output();

  $pdfFile = fopen($label . '/' . $bid . '.pdf', 'w');

  fwrite($pdfFile, $outputString);

  fclose($pdfFile);

  return $label . '/' . $bid . '.pdf';
}
