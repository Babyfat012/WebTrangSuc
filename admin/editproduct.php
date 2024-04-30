<?php

    require'../lib/DataProvider.php';
    $folder = "../assets/img/";

if(isset($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $sql = "SELECT * FROM sanpham WHERE idsanpham='" . $id . "'";
        echo $sql;
        $result =executeQuery($sql);
        $row = $result->fetch_array();
        $type = $row['maloaisp'];
        switch ($type)
        {
            case 'BRL':
                $folder = $folder . "Bracelet/";
                break;
            case 'NKL':
                $folder = $folder . "Necklace/";
                break;
            case 'RG':
                $folder = $folder . "Ring/";
                break;
        }
    }
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit product details</h4>
            <form class="forms-sample" action="updateproduct.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <img id="displayImg" src="../assets/img/Necklace/gc0000y000029-day-co-cuoi-vang-24k-pnj-hoa-tinh-yeu-1.png">
                    <label for="pic">File upload</label>

                    <input type="file" accept=".jpg, .png, .gif, .jpeg" name="pic" class="" id="pic" onchange="ImagesFileAsURL()">

                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo($id); ?>">
                </div>

                <div class="form-group">
                    <label>Jewelry Name</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $row['tensp']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Quantity</label>
                    <input type="text" name="quantity" class="form-control"  value="<?php if(isset($_POST['quantity'])){echo $_POST['quantity'];}else{echo $row['soluong'];} ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Price</label>
                    <input type="text" name="price" class="form-control" value="<?php if(isset($_POST['price'])){echo $_POST['price'];}else{echo $row['dongia'];} ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword4">Material</label>
                    <input type="text" name="material" class="form-control" value="<?php if(isset($_POST['material'])){echo $_POST['material'];}else{echo $row['chatlieu'];} ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputCity1">Color</label>
                    <input type="text" name="color" class="form-control" value="<?php if(isset($_POST['color'])){echo $_POST['color'];}else{echo $row['mausac'];} ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputCity1">Size</label>
                    <input type="text" name="size" class="form-control" value="<?php if(isset($_POST['size'])){echo $_POST['size'];}else{echo $row['kichthuoc'];} ?>">
                </div>


                <div class="form-group">
                    <label for="exampleInputCity1">Gender</label>
                    <input type="text" name="gender" class="form-control" value="<?php if(isset($_POST['gender'])){echo $_POST['gender'];}else{echo $row['gioitinh'];} ?>">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" name="description" rows="4"><?php if(isset($_POST['description'])){echo $_POST['description'];}else{echo $row['mota'];} ?></textarea>
                </div>
                <button type="submit" value="submit" name="submit" class="btn btn-primary me-2">Edit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>

<script>
    function ImagesFileAsURL() {
        var fileSelected = document.getElementById('pic').files;
        if (fileSelected.length > 0) {
            var fileToLoad = fileSelected[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
                var srcData = fileLoaderEvent.target.result;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                newImage.style.width = "250px";
                document.getElementById('displayImg').innerHTML = newImage.outerHTML;

                var display = document.getElementById('displayImg');
                display.style.width="250px";
                display.src = srcData;
                display.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
        }
    }</script>

