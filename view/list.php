<div class="container">
    <h2>List Prodcut</h2>
    <div class="row">
        <a class="btn btn-primary" href="./index.php?page=add">Thêm Sản Phẩm</a>
        <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2" action="./index.php?page=search" method="post">
            <input class="form-control form-control-sm mr-3 w-75" type="text" name="search" placeholder="Search" aria-label="Search">
            <button type="submit" class="btn btn-primary btn-sm" style="margin-left: -16px;"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div>

    <table class=" table mt-3">
        <thead>
            <tr>
                <td>STT</td>
                <td>Title</td>
                <td>Teaser</td>
                <td>Content</td>
                <td>Created</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $key => $product) : ?>
                <tr>
                    <td><?php echo ++$key ?></td>
                    <td><?php echo $product->title ?></td>
                    <td><?php echo $product->teaser ?></td>
                    <td><?php echo $product->content ?></td>
                    <td><?php echo $product->created ?></td>
                    <td>
                        <form action="./index.php?page=delete" method="post">
                            <input type="hidden" name="id" value="<?php echo $product->id ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('bạn có thực sự muốn xóa')">
                                delete
                            </button>
                        </form>
                    </td>
                    <td><a class="btn btn-warning btn-sm" href="./index.php?page=edit&id=<?php echo $product->id ?>">edit</a> </td>
                    <td><a href="#" class="btn btn-primary btn-sm">view</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>