<!-- <?php
    $id = $_SESSION['uid'] ?? '';
?>

<script>
    // $(document).ready(function(){
    //     readData();
    // });


    function addProduct(){
        var product_name = document.getElementById("product_name").value; 
        var product_quantity = document.getElementById("product_quantity").value; 
        var product_netamount = document.getElementById("product_netamount").value;
        var product_taxpercent = document.getElementById("product_taxpercent").value;
        var product_grossamount = document.getElementById("product_grossamount").value;
        var profile_id = "<?php echo $id ?>";
        profile_id.toString();

        $.ajax({
            url: "productData.php",
            type: 'post',
            data: {
                profile_id: profile_id,
                product_name: product_name,
                product_quantity: product_quantity,
                product_netamount: product_netamount,
                product_taxpercent: product_taxpercent,
                product_grossamount: product_grossamount 
            },
            success: function(data, status){
                readData();
            }
            })

    }

    function readData(){
        var readData = "readData";

        $.ajax({
            url: "productData.php",
            type: 'POST',
            data: { readData: readData },
            success: function(data, status){
                $("#allRecords").html(data);
            }
        });
    }

</script>

<script>
    function calc(){
        var product_netamount = document.getElementById("product_netamount");
        var product_taxpercent = document.getElementById("product_taxpercent");
        var product_grossamount = document.getElementById("product_grossamount");
        var result = product_netamount.value * (product_taxpercent.value / 100);
        product_grossamount.value = Math.floor(result * 100) / 100;
    }
</script> -->