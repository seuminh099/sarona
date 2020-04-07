<?php
//import class.php
    require_once('inc/class.php');
//instant object
    $obj = new mycodes;
                //test button addnew
                if(isset($_REQUEST['btn_addnew'])){
                    $proname = $_REQUEST['txt_proname'];
                    $imei = $_REQUEST['txt_imei'];
                    $desc = $_REQUEST['txt_desc'];
                    $cat_id = $_REQUEST['txt_catname'];
                    $model_id = $_REQUEST['txt_modelname'];
                    $pricepur = $_REQUEST['txt_pricePur'];
                    $pricesale = $_REQUEST['txt_priceSale'];
                    $Status = $_REQUEST['txt_status'];
                    if($_FILES['txtphoto']['tmp_name']){
                        $Logo = $obj->f_upload_img('txtphoto',100,'images');
                    }else{
                        $Logo = "default.jpg";
                    }
                    
                    $result1 = $obj->fun_countpro($proname,$Status);
                    $result2 = $obj->fun_checkExistingData($imei,"tblproduct","Imei");
                    if($result1 >0){
                        echo "$proname is Exsting";
                    }else{
                          if($result2 == false){
                            $tblname = "tblproduct";
                             $fields = array("ProductName","Imei","Description","CategoryID","ModelID","UnitPrice_Purchase","UnitPrice_Sale","Photo","Status");
                             $values = array($proname,$imei,$desc,$cat_id,$model_id,$pricepur,$pricesale,$Logo,$Status);
                             $obj->fun_insertdata($tblname,$fields,$values);
                            header('location:productformshow.php');
                            ob_end_flush(); 
                        }else{
                            echo "$imei is Exsting";
                        ?>

                            <button type="button" class="btn btn-success m-b-10 m-l-5" id="toastr-success-top-right">Success</button>
                        <?php
                        }    
                    }
                }




               
?>