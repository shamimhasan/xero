<?php

/*
 * methods: Accounts, BankTransactions, BrandingThemes, Contacts, CreditNotes, Currencies, Employees, ExpenseClaims, Invoices, Items, Journals, 
 * ManualJournals, Organisation, Payments, Receipts, TaxRates, TrackingCategories, Users
 *  
 */

class TransactionController extends BaseController {

    public function getTransection() {

        $filter = array(
//            "Name" => "Demo Creditcard",
//            'status' => 'ACTIVE'
        );
//        $xero = XeroLaravel::BankTransactions();
        $xero = XeroLaravel::Accounts(false, false, array("Name" => "Demo Creditcard"));

        echo '<pre>';
        print_r($xero);

        die('im here');
        return View::make('transection/index');
    }

}
