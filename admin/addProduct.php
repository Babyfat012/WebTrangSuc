<?php

    $folder = "../assets/img/";

  if(isset($_POST['submitBtn']) ){

      $name = $_POST['name'];
      $stock = $_POST['stock'];
      $price = $_POST['price'];
      $type = $_POST['type'];
      $material = $_POST['material'];
      $color = $_POST['color'];
      $size = $_POST['size'];
      $description = $_POST['desc'];
      $gender = $_POST['gender'];
      switch ($type)
      {
          case 'BRL':
              $folder = $folder . "Bracelet/";
              $ID = "BRL";
              break;
          case 'NKL':
              $folder = $folder . "Necklace/";
              $ID = "NKL";
              break;
          case 'RG':
              $folder = $folder . "Ring/";
              $ID = "RG";
              break;
      }
      $target_file = $folder . basename($_FILES["pic"]["name"]);
      $allowupload = true;
     
      $i = 0;
      do{
          if(file_exists($target_file))
          {
              $i++;
              $target_file = $folder. $i. basename($_FILES["pic"]["name"]);
          }
      }while (file_exists($target_file));
      
      $sql = 'SELECT * FROM sanpham';
      $sql = $sql . ' WHERE maloaisp like' . "'%" . $type . "%'";
      $result = executeQuery($sql);
      
      if($result->num_rows > 0)
      {
          $j = 1;
          $flag = false;
          while($flag == false){
              $flag = true;
              $result = executeQuery($sql);
              
              while($row = $result->fetch_array())
              {
                  $temp = $ID . $j;
                  if( "$temp"== "$row[idsanpham]")
                  {
                      echo "$row[idsanpham]<br>";
                      $flag = false;
                      break;
                  }
              }
              if($flag == true)
                  break;
              $j++;
          }
          $ID = $ID . $j;
       
      }
      else
          $ID = $type . "1";
     
     
      if($i > 0)
      {
          addProduct($ID,$stock,$name,$type,$price,$description,$i.basename($_FILES["pic"]["name"]),$material,$color,$size,$gender);
      }
      else
          addProduct($ID,$stock,$name,$type,$price,$description,basename($_FILES["pic"]["name"]),$material,$color,$size,$gender);
      
      move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
      
      echo $ID;
      header("location: quantri.php?page_layout=danhsachsp");
  }
    ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">ADD PRODUCT</h4>
                <form class="forms-sample" action="quantri.php?page_layout=addProduct" enctype="multipart/form-data" method="post" onsubmit="return check()">
                    <div class="form-group">
                        <div id="displayImg"></div>
                        <label for="pic">File upload</label>
                        <input type="file" name="pic" accept=".jpg, .png, .gif, .jpeg" id="pic" required onchange="ImagesFileAsURL()">
                    </div>

                    <div class="form-group">
                        <label for="name">NAME</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">QUANTITY</label>
                        <input type="text" name="stock" id="stock"  class="form-control" required>
                        <div id="errorStock"></div>
                    </div>


                    <div class="form-group">
                        <label for="price">PRICE</label>
                        <input type="text" name="price" id="price" class="form-control" required>
                        <div id="errorPrice"></div>
                    </div>



                    <div class="form-group">
                        <label for="material">MATERIAL</label>
                        <input type="text" name="material" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="color">COLOR</label>
                        <input type="text" name="color" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="size">SIZE</label>
                        <input type="text" name="size" id="size" class="form-control" required>
                        <div id="errorSize"></div>
                    </div>


                    <div class="form-group">
                        <label for="gender">GENDER</label>
                        <select class="form-control form-control-lg" name="gender" id="gender">
                            <option value="-1" selected>Select gender</option>
                            <option value="F" >Women</option>
                            <option value="M" >Men</option>
                            <option value="U" >Unisex</option>
                        </select>

                        <div id="errorGender"></div>
                    </div>

                    <div class="form-group">
                        <label for="type">TYPE</label>
                        <select class="form-control form-control-lg" name="type" id="type" required>
                            <option value="-1">Select type</option>
                            <?php
                            $sql = "SELECT * FROM loaisanpham";
                            $result = executeQuery($sql);
                            if($result->num_rows > 0){
                                while($row = $result->fetch_array())
                                {
                                    echo("<option value='$row[malsp]'>$row[tenloaisp]</option>");
                                }
                            }
                            ?>
                        </select>
                        <div id="errorType"></div>
                    </div>

                    <div class="form-group">
                        <label for="desc">DESCRIPTION</label>
                        <textarea class="form-control" id="desc" name="desc" rows="4"></textarea>
                    </div>
                    <button type="submit" value="submit" name="submitBtn" class="btn btn-primary me-2">Add</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>q