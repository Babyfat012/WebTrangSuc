<?php
    include 'lib/lib.php';
    $folder = "assets/img/";
  if(isset($_POST['submitBtn']) ){
      $ID = $_POST['ID'];
      $name = $_POST['name'];
      $stock = $_POST['stock'];
      $price = $_POST['price'];
      $type = $_POST['type'];
      $material = $_POST['material'];
      $color = $_POST['color'];
      $size = $_POST['size'];
      $description = $_POST['desc'];
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
      
     
      move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
      addProduct($ID,$stock,$name,$type,$price,$description,basename($_FILES["pic"]["name"]),$material,$color,$size);
      
      
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
    
    <form action="addProduct.php" enctype="multipart/form-data" method="post" onsubmit="return check()">
        <table>
            <tr>
                <td><label for="pic">Photo:</label> </td>
                <td> <input type="file" name="pic" accept=".jpg, .png, .gif, .jpeg" required > </td>
            </tr>
            
            <tr>
                <td><label for="ID">ID Product</label> </td>
                <td> <input type="text" name="ID" required> </td>
            </tr>
            
            <tr>
                <td><label for="name">Product's name</label> </td>
                <td> <input type="text" name="name" required> </td>
            </tr>
            
            <tr>
                <td><label for="stock">STOCK</label> </td>
                <td> <input type="text" name="stock" id="stock" required> </td>
                <td id="errorStock"></td>
            </tr>
            
            <tr>
                <td><label for="type">TYPE:</label> </td>
                <td> <select name="type" id="type" required>
                        <option value="-1">Chon loai san pham</option>
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
                </td>
                <td id="errorType"></td>

            </tr>
            
            <tr>
                <td><label for="price">PRICE</label> </td>
                <td> <input type="text" name="price" id="price" required> </td>
                <td id="errorPrice"></td>
            </tr>
            
            <tr>
                <td><label for="material">MATERIAL</label> </td>
                <td> <input type="text" name="material" required> </td>
                
            </tr>

            <tr>
                <td><label for="color">COLOR</label> </td>
                <td> <input type="text" name="color" required> </td>
            </tr>

            <tr>
                <td><label for="size">SIZE</label> </td>
                <td> <input type="text" name="size" id="size" required> </td>
                <td id="errorSize"></td>
            </tr>
            
            <tr>
                <td><label for="desc">DESCRIPTION</label> </td>
                <td> <textarea style="width:300px; height: 200px" id="desc" name="desc"></textarea> </td>
            </tr>
            
            <tr>
                <td>
                    <input type="submit" value="submit" name="submitBtn">
                </td>
            </tr>
        </table>
        
    </form>

    
    <script>
       
        function check(){
            var regNumber = /^[0-9]+$/;
            var regFloat = /^\d*\.\d+$/;
            var stock = document.getElementById("stock").value;
            var type = document.getElementById("type").value;
            var size = document.getElementById("size").value;
            var price = document.getElementById("price").value;
            flag = true;
            if((regFloat.test(size) || regNumber.test(size)) && parseFloat(size) >0){
                document.getElementById("errorSize").style.display = "none";

            }else{
                document.getElementById("errorSize").innerHTML = "Data is wrong";
                document.getElementById("errorSize").style.display = "block";
                document.getElementById("errorSize").style.color = "red";

                flag = false;
            }
          

            if(!regNumber.test(stock) || parseInt(stock) < 0){
                document.getElementById("errorStock").innerHTML = "Data is wrong";
                document.getElementById("errorStock").style.display = "block";
                document.getElementById("errorStock").style.color = "red";

                flag = false;
            }else
                document.getElementById("errorStock").style.display = "none";

            if((regFloat.test(price) || regNumber.test(price)) && parseFloat(price)>0){
                document.getElementById("errorPrice").style.display = "none";
              
            }else{
                document.getElementById("errorPrice").innerHTML = "Data is wrong";
                document.getElementById("errorPrice").style.display = "block";
                document.getElementById("errorPrice").style.color = "red";

                flag = false;
            }
            

            if(type == -1){
                document.getElementById("errorType").innerHTML = "Data is wrong";
                document.getElementById("errorType").style.display = "block";
                document.getElementById("errorType").style.color = "red";

                flag = false;
            }else
            document.getElementById("errorType").style.display = "none";

            return flag;

        }
    </script>
</body>
</html>