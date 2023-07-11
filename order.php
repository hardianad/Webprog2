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

        .card2 {
            width: 280px;
        }

    </style>
</head>

<body>
    <div id="template" style="display:none">
        <div class="card2">
                        <p>
                           xxkode
                        </p>

                        <img src="xxfoto" style="opacity: .8" width="60" height="60">

                        <h3>
                            xxnama
                        </h3>
                        <p>
                            xxharga
                        </p>
        </div>
    </div>
    <div style="display: flex;flex-direction: row;">
        <div style="width:900px">
            <?php
            $makanan=[];
            if (isset($_SESSION["makanan"]))
            {
                $makanan=$_SESSION["makanan"];
            }


            for ($i=0;$i<count($makanan);$i++)
            {
                $item=$makanan[$i];
                ?>
                <div class="card">
                    <p>
                        <?php echo $item["kode"]; ?>
                    </p>

                    <img src="<?php echo $item["foto"];?>" style="opacity: .8" width="60" height="60">

                    <h3>
                        <?php echo $item["nama"]; ?>
                    </h3>
                    <p>
                        <?php echo "Rp ".number_format($item["harga"]); ?>
                    </p>
                    <input id="btn<?php echo $i;?>" type="button" onclick="tambah(<?php echo $i;?>);" value="pilih">
                </div>
                <?php
            }
            ?>
        </div>
        <div style="width:250px" id="container">

        </div>
        <div>
            Total :
            <label id='ttl'></label>
        </div>
    </div>


</body>
<script src="code.jquery.com_jquery-3.7.0.js"></script>
<script>
    var arr=<?php echo json_encode($makanan);?>;
    var harga=0;
    function formatRupiah(num) {
        num=num*1;
        var p = num.toFixed(2).split(".");
        return "Rp " + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
            return num + (num != "-" && i && !(i % 3) ? "," : "") + acc;
        }, "") + "." + p[1];
    }
    $(document).ready(function()
    {

    });
    function tambah(i)
    {
        var makanan=arr[i];
        console.log("makanan",makanan);
        var temp=$("#template").html();
        temp=temp.replace("xxkode",makanan.kode);
        temp=temp.replace("xxnama",makanan.nama);
        temp=temp.replace("xxharga",formatRupiah(makanan.harga));
        temp=temp.replace("xxfoto",makanan.foto);

        harga+=(makanan.harga*1);

        $("#btn"+i).attr("disabled","disabled");

        $("#container").append(temp);

        $("#ttl").html(formatRupiah(harga));
    }
</script>
</html>
