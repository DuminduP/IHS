<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Library\Mysms;

class SmsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_sending_sms()
    {
        $mysms = new Mysms();
        $response = $mysms->sendSMS('0712285852', 'This is a test sms');
        $this->assertEquals(true, $response);
    }
}
