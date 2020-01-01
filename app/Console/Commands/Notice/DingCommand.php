<?php

namespace App\Console\Commands\Notice;

use Illuminate\Console\Command;

class DingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xyz:notice:ding';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '机器人测试';

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
        ding_env('状态正常');
    }
}
