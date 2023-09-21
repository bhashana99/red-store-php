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


<!-- product edit modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
      <h4 class="modal-title text-light">Edit Product Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="#" method="post" id="editProductForm" class="px-3">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" name="title" id="title" class="form-control form-control-lg" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-lg" id="description" name="description"  rows="6" placeholder="Write your description Here..." required ></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="keyword" id="keyword" class="form-control form-control-lg" placeholder="Enter keyword" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" id="price" class="form-control form-control-lg" placeholder="Enter price" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Update Category Details" class="btn btn-info btn-block btn-lg" id="editProductBtn" name="editCategory" >
                    </div>
                </form>
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
            });
        }

        //Edit Product details Ajax request
        $("body").on("click",".productEditIcon",function(e){
            e.preventDefault();

            edit_id = $(this).attr('id');
            $.ajax({
                url:'assets/php/admin-action.php',
                method:'post',
                data:{edit_id: edit_id},
                success:function(response){
                    console.log(response);
                }
            });
        });






    });
</script>
    
</body>
</html>