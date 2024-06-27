<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Woocommerce\WoocommerceInterface;
use App\Repositories\Zoho\ZohoInterface;

class CustomerController extends Controller
{
    protected $zoho_repository;

    public function __construct(ZohoInterface $zoho_repository)
    {
        $this->zoho_repository = $zoho_repository;
    }
}
