
<?php
    session_start();
    include_once ('connection.php');
?>



<?php
    if(isset($_SESSION['uid']))
    {
        echo "";
    }
?>




<?php
    extract($_POST);

    $profile_id = isset($_SESSION['uid']);
    $product_name = $_POST['product_name'] ?? '';
    $product_quantity = $_POST['product_quantity'] ?? '';
    $product_netamount = $_POST['product_netamount'] ?? '';
    $product_taxpercent = $_POST['product_taxpercent'] ?? '';
    $product_grossamount = $_POST['product_grossamount'] ?? '';
    $isDeleted = $_POST['n'] ?? '';
    $readData = $_POST['readData'] ?? '';
    $useForUpdate = $_POST['id'] ?? '';


    if(isset($_POST['readData'])){
        $data = '<table class="table container table-bordered table-striped">
                    <tr>
                        <th>Sr. No.</th>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Product Net Amount</th>
                        <th>Product Tax Percent</th>
                        <th>Product Gross Amount</th>
                        <th>Edit</th>
                        <th>Delete/Restore</th>
                    </tr>';
    

        $display = "SELECT * FROM `product_details`";
        $displayResult = mysqli_query($conn, $display);

        if(mysqli_num_rows($displayResult) > 0){
            $num = 1;

            while($row = mysqli_fetch_array($displayResult)){
                // echo $row['id'];
                $data .= '<tr>
                            <td>' .$num. '</td>
                            <td>' .$row['product_name']. '</td>
                            <td>' .$row['product_quantity']. '</td>
                            <td>' .$row['product_net_amount']. '</td>
                            <td>' .$row['product_tax_percent']. '</td>
                            <td>' .$row['product_gross_amount']. '</td>
                            <td> 
                                <button class="btn btn-warning" onclick="editData('.$row['product_id'].') ">Edit</button> 
                            </td>
                            <td> 
                                <button class="btn btn-danger" id="unique" onclick="deleteData('.$row['product_id'].')">Delete</button> 
                            </td>
                        ';
                $num++;        
            }
        }
        $data .= '</table>';
        echo $data;

    }


    if(isset($_POST['profile_id']) && isset($_POST['product_name']) && isset($_POST['product_quantity']) && isset($_POST['product_netamount']) && isset($_POST['product_taxpercent']) && isset($_POST['product_grossamount'])){ 

       $sql = "INSERT INTO `product_details`(`profile_id`,`product_name`, `product_quantity`, `product_net_amount`, `product_tax_percent`, `product_gross_amount`) VALUES ('$profile_id','$product_name', '$product_quantity', '$product_netamount', '$product_taxpercent', '$product_grossamount')";
        $result = mysqli_query($conn, $sql);
    }

    //DELETING
    

    if($isDeleted){
        $isDeleted = "DELETE FROM `product_details` WHERE product_id='$isDeleted'";
        mysqli_query($conn, $isDeleted);
    }







    // START GETTING DETAILS to UPDATE DETAILS

    if(isset($useForUpdate) && (isset($useForUpdate) != "")){
        // $useForUpdate    

        $query = "SELECT * FROM `product_details` WHERE `product_id`='$useForUpdate'";
        $updateResult = mysqli_query($conn, $query);

        if(!$updateResult){
            echo "ERROR: ". $mysqli_error();
        }

        $response = array();
        if(mysqli_num_rows($updateResult) > 0){
            // $row = mysqli_fetch_array($updateResult);
            // for ($i = 0; $i < count($row); $i++) {
            //     echo $row[$i];
            //     $response = $row[$i];
            // }    
            while($row = mysqli_fetch_array($updateResult)){
                // echo "This is row: \n";
                // var_dump($row);
                $response = $row;
            }
        }


        // if($response){
        //     echo "Filled\n";
        // }else {echo "EMPTY";}
        // else{
        //     $response['status'] = 200;
        //     $response['message'] = "Data not found!";
        // }
        // implode(", ", $response);    //prints 1, 2, 3
        // join(',', $response);   
        json_encode($response);
    // }
    // else {
    //     $response['status'] = 200;
    //     $response['message'] = "Not a valid request!";       
    }
    
    $hidden_id = $_POST['hidden_id'] ?? '';
    $product_name = $_POST['product_name'] ?? '';
    $product_quantity = $_POST['product_quantity'] ?? '';
    $product_netamount = $_POST['product_netamount'] ?? '';
    $product_taxpercent = $_POST['product_taxpercent'] ?? '';
    $product_grossamount = $_POST['product_grossamount'] ?? '';



    // UPDATING details

    if(isset($_POST['hidden_id'])){
        $updQuery = "UPDATE `product_details` SET `product_name`='$product_name',`product_quantity`='$product_quantity',`product_net_amount`='$product_netamount',`product_tax_percent`='$product_taxpercent',`product_gross_amount`='$product_grossamount' WHERE product_id='$hidden_id'";
        mysqli_query($conn, $updQuery);
    }

?> 







