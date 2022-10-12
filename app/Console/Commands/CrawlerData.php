<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrawlerData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawler data website = url';

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
        $html_dom = file_get_html('https://toptruyen.net/truyen-tranh/dao-hai-tac/chapter-1/144571');
        $data_crawler = $html_dom->find('.list-image-detail .page-chapter img');
        $data_after_crawler = array();
        foreach ($data_crawler as $key => $value) {
            $data_img = $value->src;
            $data_after_crawler['data'] = $data_img;
        }
        print_r($data_after_crawler);
        return 0;
    }
}
