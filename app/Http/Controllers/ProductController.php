<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Validator;

/**
 * ProductController
 * This class is used to fetch, create products
 */
class ProductController extends Controller
{    
    /**
     * Method index
     * Used to fetch all products 
     * @return void
     */
    public function index()
    {
        try{
            $productModel = new ProductModel;
            $productDetails = $productModel->getProducts();
            return view('products', $productDetails);
        } catch (\Exception $e) {
            // Handle any errors that occur
            return view('products', ['error' => $e->getMessage()]);
        }
    }
    
    /**
     * Method newProduct
     * View new product page to create new product
     * @return void
     */
    public function newProduct()
    {
        try{
            $productModel = new ProductModel;
            $categoryDetails = $productModel->getCategoryList();
            return view('newproduct', $categoryDetails);
        } catch (\Exception $e) {
            // Handle any errors that occur
            return view('newproduct', ['error' => $e->getMessage()]);
        }
    }
    
    /**
     * Method createProduct
     * Used to create new product with the parameters from POST method
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function createProduct(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'price' => 'required',
                'description' => 'required',
                'category' => 'required',
            ]);
     
            if ($validator->fails()) {
                return redirect('/newproduct')
                            ->withErrors($validator)
                            ->withInput();
            }
            $productData = $request->post();
            $productModel = new ProductModel;
            $newProduct = $productModel->createNewProduct($productData);
        } catch (\Exception $errors) {
            // Handle any errors that occur
            return redirect('newproduct')->withInput()->withErrors($e);
        }
        return redirect()->route('/');
    }
}