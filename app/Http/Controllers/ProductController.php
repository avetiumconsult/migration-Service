<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Woocommerce\WoocommerceInterface;
use App\Repositories\Zoho\ZohoInterface;

class ProductController extends Controller
{
    protected $woocommerce_repository;
    protected $zoho_repository;

    public function __construct(WoocommerceInterface $woocommerce_repository, ZohoInterface $zoho_repository)
    {
        $this->woocommerce_repository = $woocommerce_repository;
        $this->zoho_repository = $zoho_repository;
    }

    public function productSyncWoocommerce()
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        // ]);
        $productData = [
            'name' => request('name'),
            'sku' => request('sku'),
            'stock_quantity' => request('stock_on_hand'),
            'type' => request('type', 'simple'),
            'price' => request('rate'), 
            'regular_price' => request('pricebook_rate'), 
            'sale_price' => request('rate'), 
            'description' => request('description'), 
            'short_description' => request('purchase_description'), 
            'zoho_id' => request("item_id"),
            'images' => request('image_name', [
                [
                    'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg'
                ]
            ]),
        ];

        $wooProductResponse = $this->woocommerce_repository->createRecord("products", $productData);
        return $wooProductResponse;
    }
}
