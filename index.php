<?php
  include_once ('connection.php');
?>


<?php
    session_start();
    
    if(!isset($_SESSION['uid']))
    {
        header('location: login.php');
    }
  
?>


<!-- NAVBAR -->
<?php 
    include_once ('header.php');
?>


<div class="container" id="form">
    <h1 class="text-primary" >Add Product(s)</h1>

    <!-- <form action="index.php" method="POST" enctype="multipart/form-data"> action="index.php" id="form" method="post" enctype="multipart/form-data" -->
        <!-- <fieldset> -->
            

            <div class="form-group">
                <label class="col-md-4 control-label" for="product_name">Product Name</label>  
                <div class="col-md-4 getmetocenter">
                    <input id="product_name" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md clear" required="" type="text">
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="product_quantity">Poduct Quantity</label>  
                <div class="col-md-4 getmetocenter">
                    <input id="product_quantity" name="product_quantity" placeholder="PRODUCT QUANTITY" class="form-control input-md clear" required="" type="number">
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="product_netamount">Product Net Amount</label>  
                <div class="col-md-4 getmetocenter">
                    <input id="product_netamount" onblur="calc()" name="product_netamount" placeholder="PRODUCT NET AMOUNT" class="clear form-control input-md" required="" type="number">
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="product_taxpercent">Product Tax Percentage</label>  
                <div class="col-md-4 getmetocenter">
                <input id="product_taxpercent" oninput="calc()"  name="product_taxpercent" placeholder="PRODUCT TAX PERCENTAGE" class="clear form-control input-md" required="" type="number">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="product_grossamount">Product Gross Amount</label>  
                <div class="col-md-4 getmetocenter">
                <input id="product_grossamount" name="product_grossamount"  class="form-control input-md clear" required="" type="number" value="" readonly>
                </div>
            </div>


            <div class="form-group">
                <div class="col-md-4">
                    <button id="singlebutton" name="addForm" class="btn btn-primary" onclick="addProduct()">Add</button>
                </div>
            </div>

        <!-- </fieldset> -->
    <!-- </form> -->

            <div>
                <h2>All Records</h2>
                <div id="allRecords"> </div>
            </div>


</div>




<!-- UPDATING PRODUCT DETAILS -->



<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_modal">
Click to Update
</button> -->

<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="update_modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="update_modal">Product Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label class="col-md-4 control-label" for="update_product_name">Product Name</label>  
                <input id="update_product_name" name="update_product_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="update_product_quantity">Poduct Quantity</label>  
                <input id="update_product_quantity" name="update_product_quantity" placeholder="PRODUCT QUANTITY" class="form-control input-md" required="" type="number">
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="update_product_netamount">Product Net Amount</label>  
                <input id="update_product_netamount" oninput="update_calc()" name="update_product_netamount" placeholder="PRODUCT NET AMOUNT" class="form-control input-md" required="" type="number">
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="update_product_taxpercent">Product Tax Percentage</label>  
                <input id="update_product_taxpercent" onblur="update_calc()"  name="update_product_taxpercent" placeholder="PRODUCT TAX PERCENTAGE" class="form-control input-md" required="" type="number">
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="update_product_grossamount">Product Gross Amount</label>  
                <input id="update_product_grossamount" name="update_product_grossamount"  class="form-control input-md" required="" type="number" value="" readonly>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update_modal" onclick="updateDetails()">Update</button>
        <input type="hidden" id="hidden_id">
      </div>
    </div>
  </div>


  <!-- MODAL UNTIL HERE -->

<script>

</script>





<?php
    $id = $_SESSION['uid'] ?? '';
?>

<script>
    $(document).ready(function(){
        readData();
    });


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
            });


            $("#product_name").val("");
            $("#product_quantity").val("");
            $("#product_netamount").val("");
            $("#product_taxpercent").val("");
            $("#product_grossamount").val("");
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


    // DELETE DATA
    function deleteData(n){
        var use = document.getElementById("unique");
        $("#unique").on("click", function(){
            use.textContent = "Restore";
        })
        var s = confirm("Are you sure you want to Delete?");
        if(s == true){
        $.ajax({
            url: "productData.php",
            type: 'post',
            data: { n: n },
            success: function(data, status){
                readData();
            }
        });
    }
        else{}
    }

</script>



<script>

    function editData(id){
        $("#hidden_id").val(id);
        // $.ajax({
        //     url: "productData.php",
        //     type: 'post',
        //     data: { id: id },
        //     success: function(data, status){
        //         var passData = JSON.parse(data);
        //         console.log(passData);
        //         $("#update_product_name").val(passData.product_name);
        //         $("#update_product_quantity").val(passData.product_quantity);
        //         $("#update_product_netamount").val(passData.product_net_amount);
        //         $("#update_product_taxpercent").val(passData.product_tax_percent);
        //         $("#update_product_grossamount").val(passData.product_gross_amount);                
        //     }
        // });

        $.post("productData.php", { id: id }, function(data, status){
            // var user = JSON.parse(data);
            // $("#update_product_name").val(user.product_name);
            // $("#update_product_quantity").val(user.product_quantity);
            // $("#update_product_netamount").val(user.product_net_amount);
            // $("#update_product_taxpercent").val(user.product_tax_percent);
            // $("#update_product_grossamount").val(user.product_gross_amount);
        });
        $("#update_modal").modal("show");
        $("#update_product_name").val("");
        $("#update_product_quantity").val("");
        $("#update_product_netamount").val("");
        $("#update_product_taxpercent").val("");
        $("#update_product_grossamount").val("");
    }


    function updateDetails(){
        var product_name = $("#update_product_name").val();
        var product_quantity = $("#update_product_quantity").val();
        var product_netamount = $("#update_product_netamount").val();
        var product_taxpercent = $("#update_product_taxpercent").val();
        var product_grossamount = $("#update_product_grossamount").val();
        var hidden_id = $("#hidden_id").val();


        $.post("productData.php", {
            hidden_id: hidden_id,
            product_name: product_name,
            product_quantity: product_quantity,
            product_netamount: product_netamount,
            product_taxpercent: product_taxpercent,
            product_grossamount: product_grossamount
        },
        function (data, success){
            $("#update_modal").modal("hide");
            readData();
        }
        );
    }

    function update_calc(){
        var update_product_netamount = document.getElementById("update_product_netamount");
        var update_product_taxpercent = document.getElementById("update_product_taxpercent");
        var update_product_grossamount = document.getElementById("update_product_grossamount");
        var result = update_product_netamount.value * (update_product_taxpercent.value / 100);
        update_product_grossamount.value = result.toFixed(2);
    }


    function calc(){
        var product_netamount = document.getElementById("product_netamount");
        var product_taxpercent = document.getElementById("product_taxpercent");
        var product_grossamount = document.getElementById("product_grossamount");
        var result = product_netamount.value * (product_taxpercent.value / 100);
        product_grossamount.value = result.toFixed(2);
    }
</script>


</body>
</html>

