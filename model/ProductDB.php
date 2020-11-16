<?php
namespace Model;

class ProductDB 
{
    public $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($product)
    {
        $sql = "INSERT INTO products(title, teaser, content, created) VALUES (?, ?, ?, ?)" ;
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $product->title);
        $statement->bindParam(2, $product->teaser);
        $statement->bindParam(3, $product->content);
        $statement->bindParam(4, $product->created);
        // $statements = $statement->execute();
        // var_dump($statements);die();
        return $statement->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $products = [];
        foreach($result as $row){
            $product = new Product($row['title'], $row['teaser'], $row['content'], $row['created']);
            $product->id = $row['id'];
            $products[] = $product;
        }
        // var_dump($products);
        // die();
        return $products;
    }
    public function get($id)
    {
        $sql = "SELECT * FROM Products WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
        $row = $statement->fetch();
        $product = new Product($row['title'],$row['teaser'],$row['content'],$row['created']);
        $product->id = $row['id'];
        return $product;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1,$id);
        // var_dump($id);
        // die();
        return $statement->execute();       
    }
    public function update($id,$product)
    {
        $sql = "UPDATE products SET title = ? , teaser = ?, content = ?, created = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1,$product->title);
        $statement->bindParam(2,$product->teaser);
        $statement->bindParam(3,$product->content);
        $statement->bindParam(4,$product->created);
        $statement->bindParam(5,$id);
        return $statement->execute();
    }

    public function search($search)
    {
        $sql = "SELECT * FROM products WHERE title LIKE ? ";
        $statement = $this->connection->prepare($sql);
        $search = '%'.$search.'%';
        $statement->bindParam(1,$search);
        // die(var_dump($statement));
        $statement->execute();
        $result = $statement->fetchAll();
        $products = [];
        foreach ($result as $key => $row) {
            $product = new Product($row['title'],$row['teaser'],$row['content'],$row['created']);
            $product->id = $row['id'];
            $products[] = $product;
        }
        return $products;
    }
}
