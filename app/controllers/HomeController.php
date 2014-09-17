<?php

use Illuminate\Encryption\Encrypter;

class HomeController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function showWelcome() {
        return View::make('hello');
    }

    public function getIndex() {
//        $messages = array();
        $crypt = new Encrypter(Config::get('app.key'));
        $ironmq = new \IronMQ(array(
            'token' => Config::get('queue.connections.iron.token', 'xxx'),
            'project_id' => Config::get('queue.connections.iron.project', 'xxx')
        ));
        $ironmq->ssl_verifypeer = false;
        $queues = $ironmq->getQueues(0, 50);
//        foreach ($queues as $queue) {
//            $messages[$queue->name][] = $ironmq->getMessage($queue->name);
//        }
        $messages = $ironmq->getMessage('segmentio_events_stage', 5);
        echo '<pre>';
        print_r($messages);
//        $ironmq->postMessages('AnalyticsEventWorker', array("Message 1", "Message 2"), array(
//            "timeout" => 120
//        ));
//        $messages = $ironmq->getMessage('AnalyticsEventWorker', 6);
//        $params = array("push_type" => "multicast");
//        $ironmq->updateQueue('AnalyticsEventWorker', $params);
//        echo '<pre>';
//        print_r($messages);

        die();
        return View::make('home.blade');
    }

}
