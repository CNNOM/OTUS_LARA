<?php

namespace App\Http\Controllers;

class ProductController
{
    public function index()
    {
        return 'Список товаров';
    }

    public function show($id)
    {
        return $id;
    }
}
