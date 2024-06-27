<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Woocommerce\WoocommerceInterface;
use App\Repositories\Zoho\ZohoInterface;
use App\Helpers\UniqueIdHelper;

class OrderController extends Controller
{
    //
    protected $woocommerce_repository;
    protected $zoho_repository;

    public function __construct(WoocommerceInterface $woocommerce_repository, ZohoInterface $zoho_repository)
    {
        $this->woocommerce_repository = $woocommerce_repository;
        $this->zoho_repository = $zoho_repository;
    }

    public function ordersSyncToZoho(Request $request)
    {
        $customerEmail = $request->input('customer_email');
        $querySearch = $this->zoho_repository->searchData("contacts", $customerEmail);
        $customerId = $querySearch["ccontact_id"];
        $uniqueId = UniqueIdHelper::generateUniqueId();
        $uniqueId = UniqueIdHelper::zohoDateFomat($request->input('date'),);

        if (!isset($customerId))
        {
            $customerData = [
                'contact_name' => $request->input('first_name') + " " + $request->input('last_name'),
                "contact_persons.email" => $request->input('email'),
                "contact_persons.phone" => $request->input('phone')
            ];
            $uniqueId = $this->zoho_repository->postData("contacts",$customerData);
        } 

        $orderData = [
            'customer_id' => $customerId,
            'salesorder_number' => "sc" . + $uniqueId,
            'reference_number' => "wc" . + $uniqueId,
            'date' => $uniqueId,
            'line_items' => [
                "item_id"  => $request->input('phone'),
                "rate"  => $request->input('phone'),
                "rate"  => $request->input('phone'),
                "quantity"  => $request->input('phone'),
                "item_total"  => $request->input('phone'),
                "unit"  => "pcs",
                "warehouse_id" => null 
            ],
        ];
        $response = $this->zoho_repository->postData("salesorders",$orderData);
        return $response;
    }
}





