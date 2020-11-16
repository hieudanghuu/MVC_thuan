<?php
namespace Controller;

use Model\DBConnection;
use Model\Product;
use Model\ProductDB;


class ProductController {
    public $productDB;

    function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=my-blog","root","");
        $this->productDB = new ProductDB($connection->connect());
    }

    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/create.php';
        }
        else {
            $title = $_POST['title'];
            $teaser = $_POST['teaser'];
            $content = $_POST['content'];
            $created = $_POST['created'];

            $product = new Product($title,$teaser,$content,$created);
            // var_dump($created);die();
            $this->productDB->create($product);           
            include 'view/create.php';
            header('Location: index.php');           
            $message = 'Create success';
        }
    }
    public function index()
    {
        $products = $this->productDB->getAll();
        include 'view/list.php';
    }
    public function delete()
    {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            // var_dump($_POST['id']);
            // die();
            $this->productDB->delete($id);
            $message = 'delete success';
            include 'view/list.php';
            header('Location: index.php');
        }
    }

    public function edit()
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $id = $_GET['id'];
            $product = $this->productDB->get($id);
            include 'view/edit.php';
        }else {
            $id = $_POST['id'];
            $product = new Product($_POST['title'],$_POST['teaser'],$_POST['content'],$_POST['created']);
            $this->productDB->update($id,$product);
            header('Location: index.php');
        }
    }

    public function search()
    {
        // die(var_dump('aaaaaaaaaaaaa'));
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $search = $_POST['search'];
            $products = $this->productDB->search($search);
            include 'view/list.php';         
        }
    }
}