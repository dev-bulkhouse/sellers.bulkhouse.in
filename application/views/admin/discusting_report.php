<?php

if (!ini_get('date.timezone')) {

    date_default_timezone_set('Asia/Kolkata');
}

$file = $name;
header("Content-Type: plain/text");
header("Content-Disposition: Attachment; filename=$file");
header("Pragma: no-cache");
$bank_data = $banks_data->result();

foreach ($bank_data as $bank_single) {

    echo "N";

    echo ",,";

    echo $bank_single->account_number;

    echo ",";

    echo $bank_single->amount;

    echo ",";

    echo $bank_single->firm_name;

    echo ",,,,,,,,,";

    echo "BUL11RBI";

    echo ",";

    echo "Vendor verification";

    echo ",";

    echo ",,,,,,,,";

    echo date(d/m/y);

    echo ",,";

    echo $bank_single->ifsc;

    echo ",,,";

    echo $bank_single->email;


    echo "\r\n";
}
echo ",,,,,,,,,,,,,,,,,,,,,,,,,,,";


$this->register_model->checking($file);
