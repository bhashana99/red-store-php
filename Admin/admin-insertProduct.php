<?php

require_once './assets/php/admin-header.php';

?>

<div class="container mt-5 mx-auto">
    <div class="row">
        <h2>Add New Product</h2>
    </div>

    <div class="container">
        <form action="#" id="productAddForm"  enctype="multipart/form-data">
                <div class="row">
                    <div class="col-5 mx-auto">
                        
                        <div class="form-row mt-2">
                            <label for="product_title" class="form-label">Product Title</label>
                            <input type="text" class="form-control" id="product_title" placeholder="Enter product title" autofocus required autocomplete="off">
                        </div>
                        <div class="form-row mt-2">
                            <label for="product_description" class="form-label">Product description</label>
                            <input type="text" class="form-control" id="product_description" placeholder="Enter product description"  required autocomplete="off">
                        </div>
                        <div class="form-row mt-2">
                            <label for="product_keywords" class="form-label">Product keywords</label>
                            <input type="text" class="form-control" id="product_keywords" placeholder="Enter product keywords"  required autocomplete="off">
                        </div>

                        <div class="form-row mt-2" id="showCategoryName">
                            <!-- <label for="category">Select a Category</label>
                            <select name="product_category" id="category" class="form-control" aria-label=".form-select-lg example">
                                <option value="" selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>        
                            </select> -->
                            <div id="categoryError"></div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-5 mx-auto">

                    <div class="form-row mt-2">
                        <label for="product_image1" class="mr-2 form-label">Product image1 :</label>
                        <input type="file" name="product_image1" id="product_image1" class="form-control "  required>
                    </div>
                    <div class="form-row mt-2">
                        <label for="product_image2" class="mr-2 form-label">Product image2 :</label>
                        <input type="file" name="product_image2" id="product_image2" class="form-control "  required>
                    </div>
                    <div class="form-row mt-2">
                        <label for="product_image3" class="mr-2 form-label">Product image3 :</label>
                        <input type="file" name="product_image3" id="product_image3" class="form-control "  required>
                    </div>
                    <div class="form-row mt-2">
                        <label for="product_image4" class="mr-2 form-label">Product image4 :</label>
                        <input type="file" name="product_image4" id="product_image4" class="form-control "  required>
                    </div>
                        
                        

                        <div class="form-row mt-3">
                            <label for="product_price" class="form-label">Product price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" id="product_price" placeholder="Enter product price"  required autocomplete="off">
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div id="productAddError"></div>
                <div class="row mt-4">
                    <div class="col-auto mx-auto">
                    <input type="submit" id="insert_product_btn" class="btn btn-primary btn-lg  py-2 px-5 " value="ADD" name="insert_product">
                    </div>
                </div>
            
        </form>
    </div>
   
</div>








<!-- footer area -->
            </div>
        </div>
</div>

<script>


$(document).ready(function(){

    displayCategory();
//Display category name
function displayCategory(){
    $.ajax({
       url:'assets/php/admin-action.php',
       method:'post',
       data:{action: 'displayCategory'},
       success: function(response){
            $("#showCategoryName").html(response);       
       } 
    });
}




//Add New product Ajax request
$("#insert_product_btn").click(function(e){
    if($("#productAddForm")[0].checkValidity()){
        e.preventDefault();

        $(this).val('Please Wait..');
        $.ajax({
            url:'assets/php/admin-action.php',
            method:'post',
            data:$("#productAddForm").serialize()+'&action=productAdd',
            success:function(response){
                if(response === 'product_add'){
                    $("#insert_product_btn").val('ADD');
                    $("#productAddForm")[0].reset();
                    $("#productAddError").html('');
                    Swal.fire({
                        title: 'Product Add Successfully',
                        type: 'success'
                    });
                }else{
                    $("#productAddError").html(response);
                    // $("#insert_product_btn").val('ADD');
                }
            }
        });
    }
});


});



</script>




</body>
</html>