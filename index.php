<?php
echo '<pre>  files  ';
print_r($_FILES);
echo '</pre>';

if(isset($_FILES['image']) ) {
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];


    $extensions = ['jpeg', 'jpg', 'png'];

    $file_ext = explode('.', $file_name);
    $file_ext = end($file_ext); //returns the last item in an array
    $file_ext = strToLower($file_ext);
    echo '<pre> filename:';
    print_r($file_size);
    echo '</pre>';

    if(in_array($file_ext, $extensions) === false){
        $errors[]="extension not allowed";
    }

    if($file_size > 7000000){
        $errors[] = 'file size must be less than 7 MB';
    }

    if(empty($errors)===true){
        move_uploaded_file($file_tmp, 'images/'.$file_name);
        echo "success";
    }else{
        echo '<pre>';
        print_r($errors);
        echo '</pre>';
    }


}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" /> <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
