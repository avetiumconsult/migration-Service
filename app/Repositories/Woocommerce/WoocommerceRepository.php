<?php

namespace App\Repositories\Woocommerce;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class WoocommerceRepository implements WoocommerceInterface
{
    protected $url;
    protected $consumerKey;
    protected $consumerSecret;
    protected $client;

    public function __construct()
    {
        $this->url = config('services.woocommerce.url');
        $this->consumerKey = config('services.woocommerce.consumer_key');
        $this->consumerSecret = config('services.woocommerce.consumer_secret');
        $this->client = new Client();
    }

    public function getRecord($endpoint, $productId)
    {
        $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
            ->get("{$this->url}/wp-json/wc/v3/{$endpoint}/{$productId}");
        return $response->json();
    }

    public function createRecord($endpoint, $productData)
    {
        $response = Http::withBasicAuth($this->consumerKey, $this->consumerSecret)
            ->post("{$this->url}/wp-json/wc/v3/{$endpoint}", $productData);
        return $response->json();
    }

    public function handleWebhook($payload)
    {
        // Process the webhook payload
        return $payload;
    }

}