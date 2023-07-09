<?php
session_start();

// $makanan=$_SESSION['makanan'];
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        .card {
            width: 300px;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 10px;
            float: left;
        }

        .card img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .card h3 {
            margin-top: 0;
        }

        .card p {
            margin-bottom: 0;
        }
    </style>
</head>

<body>

    <?php
    foreach ($_SESSION["makanan"] as $item) {
        ?>
        <div class="card">
            <p>
                <?php echo $item["kode"]; ?>
            </p>
            <a href="<?php echo $item["foto"]; ?>">
                <img src="example.jpg" style="opacity: .8" width="60" height="60">
            </a>
            <h3>
                <?php echo $item["nama"]; ?>
            </h3>
            <p>
                <?php echo $item["harga"]; ?>
            </p>
            <input type = "submit" value= "pilih">
        </div>
        <?php
    }
    ?>


</body>

</html>
