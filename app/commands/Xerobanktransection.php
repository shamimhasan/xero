<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Xerobanktransection extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'xerobanktransection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save Xero Bank Transection';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire() {
        //
        $xero = XeroLaravel::Accounts(false, false, array("Name" => "Demo Creditcard"));

        $xero_json = json_encode($xero);

        $transaction = new Transaction;
        $transaction->data = $xero_json;
        $transaction->save();

        return [];
    }

    protected function getArguments() {
        return [];
//        return array(
//            array('example', InputArgument::REQUIRED, 'An example argument.'),
//        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions() {
        return [];
//        return array(
//            array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
//        );
    }

}
