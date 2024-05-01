<?php

require'../lib/DataProvider.php';
$folder = "../assets/img/";

if(isset($_GET['edit_id']))
{
    $id = $_GET['edit_id'];
    $sql = "SELECT * FROM sanpham WHERE idsanpham='" . $id . "'";
    $result =executeQuery($sql);
    $row = $result->fetch_array();
    $gender = $row['gioitinh'];
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
    $image = $row['hinhanh'];
}
?>

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">EDIT PRODUCT</h4>
            <form class="forms-sample" action="updateproduct.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <img id="displayImg" src="<?php echo($folder . $image); ?>">
                    <label for="pic">File upload</label>
                    <input type="file" accept=".jpg, .png, .gif, .jpeg" name="pic" class="" id="pic" onchange="ImagesFileAsURL()">
                </div>
                <?php echo($folder . $image) ?>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo($id); ?>">
                </div>

                <div class="form-group">
                    <label>NAME</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $row['tensp']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">QUANTITY</label>
                    <input type="text" name="quantity" class="form-control"  value="<?php echo $row['soluong']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">PRICE</label>
                    <input type="text" name="price" class="form-control" value="<?php echo $row['dongia']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword4">MATERIAL</label>
                    <input type="text" name="material" class="form-control" value="<?php echo $row['chatlieu']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputCity1">COLOR</label>
                    <input type="text" name="color" class="form-control" value="<?php echo $row['mausac']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputCity1">SIZE</label>
                    <input type="text" name="size" class="form-control" value="<?php echo $row['kichthuoc']; ?>" required>
                </div>


                <?php
                function isCheckedGender($value, $gender)
                {
                    if($value === $gender)
                    {
                        echo "selected";
                    }
                }
                ?>


                <div class="form-group">
                    <label for="gender">GENDER</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="-1">Select gender</option>
                        <option value="F" <?php isCheckedGender("F",$gender); ?>>Women</option>
                        <option value="M" <?php isCheckedGender("M",$gender); ?>>Men</option>
                        <option value="U" <?php isCheckedGender("U",$gender); ?>>Unisex</option>
                    </select>
                </div>

                <?php
                function isCheckedType($value, $type)
                {
                    if($value === $type)
                    {
                        echo "selected";
                    }
                }
                ?>

                <div class="form-group">
                    <label for="type">TYPE</label>
                    <select class="form-control" id="type" name="type">
                        <option value="-1">Select type</option>
                        <option value="BRL" <?php isCheckedType("BRL",$type); ?>>Bracelet</option>
                        <option value="NKL" <?php isCheckedType("NKL",$type); ?>>Necklace</option>
                        <option value="RG" <?php isCheckedType("RG",$type); ?>>Ring</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">DESCRIPTION</label>
                    <textarea class="form-control" name="description" rows="4"><?php echo $row['mota']; ?></textarea>
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

