<?php

namespace App\Repositories\Woocommerce;

interface WoocommerceInterface
{
    public function getRecord($endpoint,$productId);
    public function createRecord($endpoint, $productData);
    public function handleWebhook($payload);
}

