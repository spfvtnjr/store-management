
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/styles.css">
    <link rel="stylesheet" href="../styles.css">
    <title>Document</title>
</head>
<style>
#navigation-button {
    background-color: #0d1d40;
    color: white;
    width: 150px;
    height: 41px;
    float: right;
    text-decoration: none;
    display: grid;
    margin: 28px;
    line-height: 41px;
    text-align: center;
    }
  input.form-control{
width: 100% !important;
  }
  .form-group{
    margin:20px !important;
  }
</style>
<body>
<?php
$image=$_GET["image"];
echo("<img src=uploads/".$image.">");
?>
</body>
</html>