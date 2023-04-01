<?php

namespace App\Http\Controllers;

use Symfony\Component\Panther\Client;
use App\Models\Product;
use App\Models\Price;

use \stdClass;

require __DIR__.'/../../../vendor/autoload.php'; 



class ScraperController extends Controller
{
    public function scraper() {

        $client = Client::createChromeClient();

        $crawler = $client->request('GET', 'https://chicorei.com/camiseta/');

        $client->waitFor('.product-list-item');

        $products = $crawler->filter('.product-list-item')->each(function ($item) {
            $originalPrice = $item->filter('.product-list-item-info > div > div > p > del')->text();
            $originalPrice = floatval(str_replace(',', '.', preg_replace('/[^0-9\.,]/', '', $originalPrice)));
            
            $actualPrice = $item->filter('.product-list-item-price > span:nth-child(2)')->text();
            $actualPrice = floatval(str_replace(',', '.', preg_replace('/[^0-9\.,]/', '', $actualPrice)));

            $discount = round((1 - $actualPrice / $originalPrice) * 100);
                        
            $isNew = count($item->filter('.product-seal-new')) > 0 ? true : false;
            
            $isOnSale = $item->filter('.product-seal-primary')->text();
            $isOnSale = preg_match("/^\d{2}% OFF$/", $isOnSale) ? true : false;

            $id = $item->filter('.product-list-item > meta:nth-child(2)')->attr('content');
            $name = $item->filter('.product-list-item-title')->text();
            $link = $item->filter('.product-list-item > a')->attr('href');

            $product = new Product([
                'id' => $id,
                'name' => $name,
                'isNew' => $isNew,
                'isOnSale' => $isOnSale,
                'link' => $link,
            ]);

            $price = new Price([
                'originalPrice' => $originalPrice,
                'actualPrice' => $actualPrice,
                'discount' => $discount,
            ]);

            $product->save();
            $product->price()->save($price);
        });

        foreach($products as $item) {
            $product = Product::find($item->id);

            $crawler = $client->request('GET', $item->link);
            $client->waitFor('#product-main');

            $details = $crawler->filter('#product-main')->each(function ($info) {
                $modelingOptions = $info->filter('.cr-option-modelings > nav')->each(function ($modeling) {
                    return $modeling->text();
                });
    
                $sizeOptions = $info->filter('.cr-option-sizes > div')->each(function ($size) {
                    $isAvailable = $size->attr('data-text') === 'Esgotado' ? false : true;
                    return array_combine([$size->text()], [$isAvailable]);
                });

                $colorOptions = $info->filter('#product-variations > div.text-yanone > div > div.block')->each(function ($colorSection) {    
                    $colors = $colorSection->filter('.product-variations-colors > div');
    
                    $colorCodes = $colors->each(function ($color) { 
                        preg_match('/rgb\((\d+), (\d+), (\d+)\)/', $color->filter('.product-color-option')->attr('style'), $matches);
                        return $matches[0];
                    });
    
                    $colorNames = array();
                    foreach ($colors as $color) {
                        $color->click();    
                        $name = $colorSection->filter('#product-variations > div.text-yanone > div > div.block > p > span')->text();
                        array_push($colorNames, $name);
                    };
    
                    return array_combine($colorNames, $colorCodes);
                });
    
                $data = new stdClass();
                $data->modelingOptions = $modelingOptions;
                $data->sizeOptions = $sizeOptions;
                $data->colorOptions = $colorOptions[0];
                
                return $data;
            });


            $description = $crawler->filter('#product-about')->each(function ($info) {
                $text = $info->filter('#product-about > div > div > div:nth-child(1) > p')->text();
                $categories = $info->filter('#product-categories-mobile > a')->each(function ($category) {
                    return $category->text();
                });
                $details = $info->filter('#product-about > div > div > div:nth-child(3) > div > div:nth-child(1) > div > ul > li')->each(function ($detail) {
                    return $detail->text();
                });
                
                $data = new stdClass();
                $data->text = $text;
                $data->categories = $categories;
                $data->details = $details;
    
                return $data;
            });

            $product->details = $details[0];
            $product->description = $description[0];
        }

        var_dump($products);

        return $products;
    }  
}