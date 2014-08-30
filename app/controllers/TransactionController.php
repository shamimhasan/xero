<?php

/*
 * methods: Accounts, BankTransactions, BrandingThemes, Contacts, CreditNotes, Currencies, Employees, ExpenseClaims, Invoices, Items, Journals, 
 * ManualJournals, Organisation, Payments, Receipts, TaxRates, TrackingCategories
 *  
 */

class TransactionController extends BaseController {

    public function getTransection() {

        $filter = array(
//            "Name" => "Demo Creditcard",
//            'status' => 'ACTIVE'
        );
        $xero = XeroLaravel::BankTransactions(false, false, array("Contact.Name" => "KISSMetrics"));
//        $xero = XeroLaravel::Accounts(false, false, array("Name" => "Demo Creditcard"));

        echo '<pre>';
//        print_r($xero);
        $xero_json = json_encode($xero);

        if ($first = Transaction::first()) {
            $transaction = Transaction::find($first->id);
            $transaction->data = $xero_json;
            $transaction->save();
        } else {
            $transaction = new Transaction;
            $transaction->data = $xero_json;
            $transaction->save();
        }


        die('im here');
        return View::make('transection/index');
    }

}
