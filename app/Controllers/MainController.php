<?php

namespace App\Controllers;
use App\Models\ModelCategory;
use App\Controllers\BaseController;

class MainController extends BaseController
{
    private $product;
    private $category;

    public function __construct()
    {
        $this->product = new \App\Models\MainModel;
        $this->category = new \App\Models\CategoryModel;
    }
    public function save()
    {
        $id =$_POST['id'];
        $productData = [
            'ProductName' => $this->request->getVar('ProductName'),
            'ProductDescription' => $this->request->getVar('ProductDescription'),
            'ProductCategory' => $this->request->getVar('ProductCategory'),
            'ProductQuantity' => $this->request->getVar('ProductQuantity'),
            'ProductPrice' => $this->request->getVar('ProductPrice'),
        ];

        $categoryData = [
            'ProductCategory' => $this->request->getVar('ProductCategory'),
        ];

            if($id != null)
                {
                    $this->product->set($productData)->where('id', $id)->update();
                    $this->category->set($categoryData)->where('id', $id)->update();
                }
                else{
                    $this->product->insert($productData);
                    $this->category->insert($categoryData);
                }
                return redirect()->to('/main');
    }
    
    public function delete($id)
    {
        $this->category->delete($id);
        $this->product->delete($id);
        return redirect()->to('/main');
    }

    public function edit($id)
    {
        $data = [
            'product' => $this->product->findAll(),
            'pro' => $this->product->where('id', $id)->first(),
            'categories' => $this->category->findAll(),
        ];
            return view('main', $data);
    }

    public function index()
    {
        $data['product'] = $this->product->findAll();
        $data['categories'] = $this->category->findAll();
        return view('main', $data);
    } 
    
    public function addcat()
    {
        $categoryNew = [
            'ProductCategory' => $this->request->getPost('ProductCategory'),
        ];
        if (!empty($categoryNew['ProductCategory'])) 
        {
            $this->category->insert($categoryNew);
        }
        return redirect()->to('/main');
    }
}
