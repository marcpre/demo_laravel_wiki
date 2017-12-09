<?php

namespace App\Console\Commands;

use App\Console\Commands;
use App\CryptoAsset;
use Goutte\Client;
use Illuminate\Console\Command;
use Intervention\Image\ImageManagerStatic as Image;

class CoinMarketCapOverview extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cmc:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrap CoinMarketCap';

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
        foreach ($urlArr as $key => $v) {
            // for ($key = 0; $key < 2; $key++) {

            $subCrawler = $client->request('GET', $urlArr[$key]);
            $image = $subCrawler->filter($img)->extract(array('src'));
            print_r($image[0] . "\n");
            $uri = $image[0];
            array_push($imgArr, $uri);
        }
        //Multi Dimensional Array
        foreach ($coinArr as $key => $v) {
            // for ($key = 0; $key < 2; $key++) {
            /*    $cryptoAsset = new CryptoAsset();
            $cryptoAsset->name = $coinArr[$key];
            $cryptoAsset->symbol = $symbolArr[$key];
            $cryptoAsset->current_price = $priceArr[$key];
             */
            ///save image to public folder
            $fileName = basename($imgArr[$key]);
            Image::make($imgArr[$key])->save(public_path('images/' . $fileName));
            //    $cryptoAsset->asset_logo = $fileName;
            // $cryptoAsset->updateOrCreate();
            CryptoAsset::updateOrCreate(
                ['name' => $coinArr[$key]],
                ['symbol' => $symbolArr[$key]],
                ['current_price' => $priceArr[$key]],
                ['asset_logo' => $fileName]
            );
        }
    }
}
