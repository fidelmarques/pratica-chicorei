<?php

namespace App\Http\Controllers;

use Symfony\Component\Panther\Client;
use \stdClass;

require __DIR__.'/../../../vendor/autoload.php'; 


class ScraperController extends Controller
{
    public function scraper() {

        $client = Client::createChromeClient();

        $crawler = $client->request('GET', 'https://chicorei.com/camiseta/');

        $client->waitFor('.product-list-item');

        $products = $crawler->filter('.product-list-item')->each(function ($product) {
            $originalPrice = $product->filter('.product-list-item-info > div > div > p > del')->text();
            $originalPrice = floatval(str_replace(',', '.', preg_replace('/[^0-9\.,]/', '', $originalPrice)));
            
            $actualPrice = $product->filter('.product-list-item-price > span:nth-child(2)')->text();
            $actualPrice = floatval(str_replace(',', '.', preg_replace('/[^0-9\.,]/', '', $actualPrice)));

            $discount = round((1 - $actualPrice / $originalPrice) * 100);
            
            $price = new stdClass();
            $price->originalPrice = $originalPrice;
            $price->actualPrice = $actualPrice;
            $price->discount = $discount;
            
            $isNew = count($product->filter('.product-seal-new')) > 0 ? true : false;
            
            $isOnSale = $product->filter('.product-seal-primary')->text();
            $isOnSale = preg_match("/^\d{2}% OFF$/", $isOnSale) ? true : false;

            $data = new stdClass();
            $data->id = $product->filter('.product-list-item > meta:nth-child(2)')->attr('content');
            $data->name = $product->filter('.product-list-item-title')->text();
            $data->price = $price;
            $data->isNew = $isNew;
            $data->isOnSale = $isOnSale;
            $data->link = $product->filter('.product-list-item > a')->attr('href');


            return $data;
        });

        foreach($products as $product) {
            $crawler = $client->request('GET', $product->link);
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
    
                    $colorCodes = $colors->each(function ($color) { // Cada uma das DIVS
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

            // var_dump($product);
            // var_dump($details);
            // var_dump($description);

        }
    }  
}