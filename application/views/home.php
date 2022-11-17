<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/templates/classic/images/" type="image/x-icon">
    <title>Data finder</title>

    <!-- main css -->
    <style>
        table{
            width: 40%;
        }
        .upload{
            position: absolute;
            bottom: 10%;
        }
        h1{
            text-align: center;
            width: 40%;
        }
        .search{
            margin-left: 5px;
        }
        .resultitle{
            font-weight: bold;
            padding-right: 5px;
        }
        .resultvalue{
            padding-right: 5px;
        }
    </style>

</head>

<body>
<h1>Data Search</h1>
<form action="home/search" method="post" enctype="multipart/form-data">
    <table>
        <thead>
        <tr><th>Postcode</th><th>Town</th><th>Region</th></tr>

        </thead>
        <tbody>
        <tr>
            <td><input type="text" <?php if(isset($_SESSION["postcode"])){echo 'value="'.$_SESSION["postcode"].'"';}?> name="postcode"></td>
            <td><input type="text" <?php if(isset($_SESSION["town"])){echo 'value="'.$_SESSION["town"].'"';}?> name="town"></td>
            <td><input type="text" <?php if(isset($_SESSION["region"])){echo 'value="'.$_SESSION["region"].'"';}?> name="region"></td>
        </tr>

        </tbody>
    </table>
    <input class="search" type="submit" value="Search">
</form>

<?php if(isset($_SESSION["searchdata"])) {
    for($i=0;$i<count($_SESSION["searchdata"]);$i++){
        $output= '<span class="resultitle">'.'Postcode-'.'</span>'.
            '<span class="resultvalue">'.$_SESSION["searchdata"][$i]["Postcode"].'</span>'.
            '<span class="resultitle">'.'Town-'.'</span>'.
            '<span class="resultvalue">'.$_SESSION["searchdata"][$i]["Town"].'</span>'.
            '<span class="resultitle">'.'Region-'.'</span>'.
            '<span class="resultvalue">'.$_SESSION["searchdata"][$i]["Region"].'</span>'.
            '<span class="resultitle">'.'SupplierName-'.'</span>'.
            '<span class="resultvalue">'.$_SESSION["searchdata"][$i]["SupplierName"].'</span>'.
            '<span class="resultitle">'.'Days-'.'</span>';
        if($_SESSION["searchdata"][$i]["Monday"]==1){
            $output=$output.'<span class="resultvalue">Monday</span>';
        }
        if($_SESSION["searchdata"][$i]["Tuesday"]==1){
            $output=$output.'<span class="resultvalue">Tuesday</span>';
        }
        if($_SESSION["searchdata"][$i]["Wednesday"]==1){
            $output=$output.'<span class="resultvalue">Wednesday</span>';
        }
        if($_SESSION["searchdata"][$i]["Thursday"]==1){
            $output=$output.'<span class="resultvalue">Thursday</span>';
        }
        if($_SESSION["searchdata"][$i]["Friday"]==1){
            $output=$output.'<span class="resultvalue">Friday</span>';
        }
        $output=$output.'<br>';
        echo $output;
    }
};?>


<div class="upload">
    <form action="home/do_upload" method="post" enctype="multipart/form-data">

        <input type="file" name="userfile" size="20" />

        <br /><br />

        <input type="submit" value="upload" />

    </form>
</div>

</body>
<script>
    <?php if(isset($_SESSION['uploaded'])){
        echo 'alert("File uploaded")';
    }?>
</script>
<!-- Clear all session -->
<?php session_destroy()?>
</html>
