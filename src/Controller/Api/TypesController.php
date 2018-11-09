<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

class TypesController extends AppController{
    public $paginate = [
        'page' => 1,
        'limit' => 20,
        'maxLimit' => 20,
        'sortWhitelist' => [
            'id', 'description'
        ]
    ];
}