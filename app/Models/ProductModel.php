<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

const API_BASE_URL = 'https://fakestoreapi.com';

/**
 * ProductModel
 * USed to connect to third party API to access product details
 */
class ProductModel extends Model
{
    //    
    /**
     * Method getProducts
     * Fetch all products without any limit
     * @return void
     */
    public function getProducts()
    {  
        try {
            $client = new Client();
            $productAPIUrl = API_BASE_URL.'/products?limit=50';
            $response = $client->get($productAPIUrl);
            // Get the response body as an array
            $data = json_decode($response->getBody(), true);
            return ['products' => $data]; 
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return ['products' => [], 'error' => $e->getMessage()];
        }
    }   
    
    /**
     * Method getCategoryList
     * Fetch All categories
     * @return void
     */
    public function getCategoryList()
    {
        try {
            $client = new Client();
            $categoryAPIUrl = API_BASE_URL.'/products/categories';
            $response = $client->get($categoryAPIUrl);
            // Get the response body as an array
            $data = json_decode($response->getBody(), true);
            return ['categories' => $data]; 
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return ['products' => [], 'error' => $e->getMessage()];
        }
    }
    
    /**
     * Method createNewProduct
     * Create new product
     * @param $productData $productData [explicite description]
     *
     * @return void
     */
    public function createNewProduct($productData)
    {
        try{
            $client = new Client();
            $categoryAPIUrl = API_BASE_URL.'/products';
            $response = $client->post($categoryAPIUrl, $productData);
            return $response;
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return ['products' => [], 'error' => $e->getMessage()];
        }
    }
}