<?php

namespace App\Repositories\Zoho;

Interface ZohoInterface 
{
    public function authenticate();
    public function postData($module, $data);
    public function getData($module, $recordId);
    public function updateData($module, $recordId, $data);
    public function searchData($module, $criteria);
}