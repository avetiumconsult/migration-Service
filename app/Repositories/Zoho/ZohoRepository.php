<?php 

namespace App\Repositories\Zoho;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ZohoRepository implements ZohoInterface
{
    protected $clientId;
    protected $clientSecret;
    protected $refreshToken;
    protected $accessToken;
    protected $baseUrl;
    protected $client;
    protected $orgId;

    public function __construct()
    {
        $this->clientId = config('services.zoho.client_id');
        $this->clientSecret = config('services.zoho.client_secret');
        $this->refreshToken = config('services.zoho.refresh_token');
        $this->baseUrl = 'https://www.zohoapis.com/inventory/v1';
        $this->orgId = config('services.zoho.org_id');

        $this->client = new Client();
        $this->authenticate();
    }

    public function authenticate()
    {
        $response = Http::asForm()->post('https://accounts.zoho.com/oauth/v2/token', [
            'grant_type' => 'refresh_token',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'refresh_token' => $this->refreshToken,
        ]);
        $this->accessToken = $response->json()['access_token'];
    }

    public function postData($module, $data)
    {
        $response = Http::withToken($this->accessToken)
            ->post("{$this->baseUrl}/{$module}?organization_id={$this->orgId}", $data);
        return $response->json();
    }

    public function getData($module, $recordId)
    {
        $response = Http::withToken($this->accessToken)
            ->get("{$this->baseUrl}/{$module}/{$recordId}?organization_id={$this->orgId}");
        return $response->json();
    }

    public function updateData($module, $recordId, $data)
    {
        $response = Http::withToken($this->accessToken)
            ->put("{$this->baseUrl}/{$module}/{$recordId}?organization_id={$this->orgId}", $data);
        return $response->json();
    }

    public function searchData($module, $criteria)
    {
        $response = Http::withToken($this->accessToken)
            ->get("{$this->baseUrl}/{$module}?organization_id={$this->orgId}&", [
                'email_contains' => $criteria
            ]);
        return $response->json();
    }
}