<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Package;

class CatalogController extends Controller
{
    public function index(): void
    {
        $model = new Package();

        $this->view('catalog/index', [
            'title' => 'Katalog Pricing Package',
            'packages' => $model->all(),
        ]);
    }

    public function contact(): void
    {
        $this->view('catalog/contact', [
            'title' => 'Contact Us - Genvibes',
        ]);
    }
}
