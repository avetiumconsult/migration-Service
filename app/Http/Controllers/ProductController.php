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

    public function productSyncWoocommerce(Request $request)
    {
        $request->validate([
            $request->name => ['required'],
        ]);
        $productData = [
            'name' => $request->input('name'),
            'sku' => $request->input('sku'),
            'stock_quantity' => $request->input('stock_on_hand'),
            'type' => $request->input('type', 'simple'),
            'price' => $request->input('rate'), 
            'regular_price' => $request->input('pricebook_rate'), 
            'sale_price' => $request->input('rate'), 
            'description' => $request->input('description'), 
            'short_description' => $request->input('purchase_description'), 
            'zoho_id' => $request->input("item_id"),
            'images' => $request->input('image_name', [
                [
                    'src' => ''
                    // 'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg'
                ]
            ]),
        ];

        $wooProductResponse = $this->woocommerce_repository->createRecord("products", $productData);
        return $wooProductResponse;
    }
}
