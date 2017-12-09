<?php

use App\CryptoAsset;
use App\Console\Commands;
use Goutte\Client;
use Illuminate\Console\Command;

class ScrapCoinMarketCapBasics extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ScrapCoinMarketCapBasics:scrap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CoinmarkeCapScrapper or Basic Things';

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
        $client = new Client();
        $cssSelector = 'tr';
        $coin = 'td.no-wrap.currency-name > a';
        $url = 'td.no-wrap.currency-name > a';
        $symbol = 'td.text-left.col-symbol';
        $price = 'td:nth-child(5) > a';
        $img = 'body > div.container > div > div.col-lg-10 > div:nth-child(5) > div.col-xs-6.col-sm-4.col-md-4 > h1 > img';
        //arrays
        $coinArr = array();
        $urlArr = array();
        $symbolArr = array();
        $priceArr = array();
        $imgArr = array();
        $crawler = $client->request('GET', 'https://coinmarketcap.com/all/views/all/');
        $crawler->filter($coin)->each(function ($node) use (&$coinArr) {
            //    print $node->text()."\n";
            array_push($coinArr, $node->text());
        });
        $crawler->filter($url)->each(function ($node) use (&$urlArr) {
            $link = $node->link();
            $uri = $link->getUri();
            //    print $uri."\n";
            array_push($urlArr, $uri);
        });
        $crawler->filter($symbol)->each(function ($node) use (&$symbolArr) {
            //    print $node->text()."\n";
            array_push($symbolArr, $node->text());
        });
        $crawler->filter($price)->each(function ($node) use (&$priceArr) {
            //    print $node->text()."\n";
            $p = $node->extract(array('data-usd'));
            array_push($priceArr, $p[0]);
        });
        // get Links from Subpages
        // foreach ($urlArr as $key => $v) {
        for ($key = 0; $key < 2; $key++) {

            $subCrawler = $client->request('GET', $urlArr[$key]);
            $image = $subCrawler->filter($img)->extract(array('src')); //->each(function ($node) use (&$imgArr) {
            print_r($image[0] . "\n");
            //$link = $image[0]->link();
            $uri = $image[0];
            array_push($imgArr, $uri);
            //});
        }
        //Multi Dimensional Array
        // $multi = array();
        // foreach ($coinArr as $key => $v) {
        for ($key = 0; $key < 2; $key++) {
            // $multi[] = [$coinArr[$key], $imgArr[$key], $urlArr[$key], $symbolArr[$key], $priceArr[$key]];
            $cryptoAsset = new CryptoAsset();
            $cryptoAsset->name = $coinArr[$key];
            $cryptoAsset->symbol = $symbolArr[$key];
            $cryptoAsset->current_price = $priceArr[$key];
            
            ///save image to public folder
            $fileName = basename($imgArr[$key]);
            Image::make($path)->save(public_path('images/' . $fileName));           
            $cryptoAsset->asset_logo = $fileName;
            $cryptoAsset->save();
        }
        // $json_data = json_encode($multi);

        //Write File to database
        /*
    file_put_contents('data/myfile1.json', $json_data);
     */
    }
}
