<!-- <?php
        if (isset($message)) {
            echo "<p class='text-success'>" . $message . "</p>";
        }
        ?> -->
<div class="container">
    <h2 class="text-primary">Create Product</h2>
    <form class="row from-group" method="post">
        <div class="col-12 pt-3">
            Title : <input type="text" name="title" value="<?php echo $product->title ?>" class="form-control col-8">
        </div>
        <div class="col-12 pt-3">
            Teaser : <input type="text" name="teaser" value="<?php echo $product->teaser ?>" class="form-control col-8">
        </div>
        <div class="col-12 pt-3">
            Content : <textarea name="content" rows="3"  class="form-control col-8" cols="30"><?php echo $product->content?></textarea>
        </div>
        <div class="col-12 pt-3">
            Created : <input type="text" name="created" value="<?php echo $product->created ?>" class="form-control col-8">
        </div>
        <input type="hidden" name="id" value="<?php echo $product->id ?>">
        <button type="submit" class="btn btn-primary ml-3 mt-3">Sửa</button>
    </form>
</div>