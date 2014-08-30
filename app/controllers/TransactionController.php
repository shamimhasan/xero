<?php

class TransactionController extends BaseController {

    private $xero_url = 'https://api.xero.com/api.xro/2.0/';
    private $xero_email = 'ben+test@skinnyandbald.com';
    private $xero_password = 'Xq6rD3FHGffwsp';

    public function getTransection() {

        $xero = XeroLaravel::Accounts();
        
        print_r($xero);
        die('Im here');
        return View::make('transection/index');
    }

}
