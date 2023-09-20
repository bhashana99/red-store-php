<?php

require_once './assets/php/admin-header.php';

?>

<div class="row mt-5">
    <div class="col-lg-12">
        <div class="card my-2 border-info">
            <div class="card-header bg-info text-white">
                <h4 class="m-0 ">All Product</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="showAllProducts">
                    <p class="text-center align-self-center lead">Please Wait...</p>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- footer area -->
            </div>
        </div>
</div>

<script>
    $(document).ready(function(){

        fetchAllProduct();
        //fetch all products ajax request
        function fetchAllProduct(){
            $.ajax({
                url:'assets/php/admin-action.php',
                method:'post',
                data:{action:'fetchAllProduct'},
                success:function(response){
                    $("#showAllProducts").html(response);
                    $("table").DataTable();
                }
            })
        }




    });
</script>
    
</body>
</html>