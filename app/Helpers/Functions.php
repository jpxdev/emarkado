<?php

namespace App\Helpers;
// app/Helpers/helpers.php

class Functions
{

    public static function IDGenerator($model, $trow, $length = 5, $prefix)
    {
        $data = $model::orderBy('id', 'desc')->first();
        if (!$data) {
            $og_length = $length;
            $last_number = '';
        } else {
            $code = substr($data->$trow, strlen($prefix) + 1);
            //$actual_last_number = ($code/1)*1;  intval($code);
            $actual_last_number = intval($code);
            $increment_last_number = $actual_last_number + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for ($i = 0; $i < $og_length; $i++) {
            $zeros .= "0";
        }

        return $prefix . '-' . $zeros . $last_number;
    }

    //STATUS COLOR
    public static function status_color($status)
    {
        switch ($status) {
            case 'Approved':
                return 'badge-success';
            case 'For approval':
                return 'badge-warning';
            case 'Disapproved':
                return 'badge-danger';
            default:
                return 'badge-secondary';
        }
    }

    //STATUS COLOR
    public static function userrole_color($status)
    {
        switch ($status) {
            case 'Vendor':
                return 'vendor-color';
            case 'Merchant':
                return 'merchant-color';
            case 'Buyer':
                return 'buyer-color';
            default:
                return 'badge-dark';
        }
    }

    /*  if (! function_exists('show')) {
        function show() {
            echo('asdasd');
        }
    }*/
}
