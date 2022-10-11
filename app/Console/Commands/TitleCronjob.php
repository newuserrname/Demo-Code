<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\TitleModel;

class TitleCronjob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'title:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Title Cronjob';

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
     * @return int
     */
    public function handle()
    {
        $time_now = Carbon::now('Asia/Ho_Chi_Minh');
        $time_tomorrow = Carbon::tomorrow('Asia/Ho_Chi_Minh');
        
        $new_title = new TitleModel;
        $new_title->title = "testing ".rand(1,99);
        $new_title->ngaybatdau = $time_now;
        $new_title->ngayketthuc = $time_tomorrow;
        $new_title->save();
    }
}
