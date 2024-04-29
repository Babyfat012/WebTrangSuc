<?php

    require'../lib/DataProvider.php';
    $folder = "../assets/img/";
if(isset($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $sql = "SELECT * FROM sanpham WHERE idsanpham='" . $id . "'";
        $result =executeQuery($sql);
        $row = $result->fetch_array();
        $name = $row['tensp'];
        $quantity = $row['soluong'];
        $price = $row['dongia'];
        $picture = $row['hinhanh'];
        $material = $row['chatlieu'];
        $color = $row['mausac'];
        $size = $row['kichthuoc'];
        $gender = $row['gioitinh'];
        $description = $row['mota'];
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
        echo $folder;
    }

if(isset($_POST['edit']))
{
    $target_file = $folder . basename($_FILES["pic"]["name"]);
    $allowupload = true;
    $i = 0;
    do
    {
        if(file_exists($target_file))
        {
            $i++;
            $target_file = $folder. $i. basename($_FILES["pic"]["name"]);
        }
    }while(file_exists($target_file));
    move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
}

?>





<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit product details</h4>
            <form class="forms-sample" action="updateproducts.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <img id="displayImg" src="../assets/img/Necklace/gc0000y000029-day-co-cuoi-vang-24k-pnj-hoa-tinh-yeu-1.png">
                    <label for="pic">File upload</label>

                    <input type="file" accept=".jpg, .png, .gif, .jpeg" name="pic" class="" id="pic" onchange="ImagesFileAsURL()">

                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo($id); ?>">
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="title" value="<?php echo($name); ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">Quantity</label>
                    <input type="text" name="quantity" class="form-control"  value="<?php echo($quantity); ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Price</label>
                    <input type="text" class="form-control" value="<?php echo($price); ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword4">Material</label>
                    <input type="text" name="material" class="form-control" value="<?php echo($material); ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputCity1">Color</label>
                    <input type="text" name="color" class="form-control" value="<?php echo($color); ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputCity1">Size</label>
                    <input type="text" name="size" class="form-control" value="<?php echo($size); ?>">
                </div>


                <div class="form-group">
                    <label for="exampleInputCity1">Gender</label>
                    <input type="text" name="gender" class="form-control" value="<?php echo($gender); ?>">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" name="description" rows="4"><?php echo($description); ?></textarea>
                </div>
                <button type="submit" value="edit" name="edit" class="btn btn-primary me-2">Edit</button>
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
