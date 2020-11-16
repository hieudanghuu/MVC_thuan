<!-- <?php
if (isset($message)) {
    echo "<p class='text-success'>" . $message . "</p>";
}
?> -->
<div class="container">
    <h2 class="text-primary">Create Products</h2>
    <form class="row from-group" method="post">
        <div class="col-12 pt-3">
            Title : <input type="text" name="title" class="form-control col-8">
        </div>
        <div class="col-12 pt-3">
            Teaser : <input type="text" name="teaser" class="form-control col-8">
        </div>
        <div class="col-12 pt-3">
            Content : <textarea name="content" rows="3" class="form-control col-8" cols="30"></textarea>
        </div>
        
          <input type="hidden" name="created"  value="<?php echo(date("Y/m/d"))?>">
        <button type="submit" class="btn btn-primary ml-3 mt-3">Tạo Mới</button>
    </form>
</div>