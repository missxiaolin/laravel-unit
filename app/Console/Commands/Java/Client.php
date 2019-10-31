<?php

namespace App\Console\Commands\Java;

use Illuminate\Console\Command;
use GuzzleHttp\Client as ClientIndex;

class Client extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'java:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new ClientIndex([
            'base_uri' => "http://127.0.0.1:8080",
            'timeout' => 5,
        ]);
        $minute = 60;
        $options = [
            'json' => [
                'mac' => '1',
                'data' => '2',
                'minute' => $minute
            ]
        ];
        dump($this->dechexMinute($minute));

        try {
            $response = $client->post('/dks/key/verify', $options);
            $body = json_decode($response->getBody(), true);
            dd($body);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * @desc   十进制分钟数改为十六进制
     * @author limx
     * @param $minute
     */
    public function dechexMinute($minute)
    {
        $minute = dechex($minute);
        if (strlen($minute) > 2 || strlen($minute) == 0) {
            throw new CodeException(ErrorCode::$ENUM_API_PARAMS_MINUTE_ERROR);
        }
        if (strlen($minute) == 1) {
            $minute = "0" . $minute;
        }

        return $minute;
    }
}
