<?php

require_once './assets/php/admin-header.php';
require_once './assets/php/admin-db.php';

?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Add New Categories</h2>

            <form action="#" id="categoryAddForm" class="px-3">
            <div id="categoryAddError"></div>
    <div class="form-row align-items-center">
        <div class="col">
            <input type="text" class="form-control" name='NewCategory' id="newCategoryName" placeholder="Enter category name" autofocus>
        </div>
        <div class="col-auto">
            <input type="submit" class="btn btn-success" id="categoryAddBtn" value="Add">
        </div>
    </div>
    
</form>

        </div>
    </div>

    <div class="row mt-5">
    <div class="col-lg-12">
        <div class="card my-2 border-info">
            <div class="card-header bg-info text-white">
                <h4 class="m-0 ">All Categories</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="showAllCategories">
                    <p class="text-center align-self-center lead">Please Wait...</p>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>

<!-- Edit Category name Model -->
<div class="modal fade" id="editCategoryModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-info ">
        <h4 class="modal-title text-light">Edit Category name</h4>
        <button type="button" class="close text-light" data-dismiss="modal" >&times;</button>
      </div>
      <div class="modal-body">
              <form action="#" method="post" id="edit-category-form" class="px-3">
                <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <input type="text" name="title" id="title" class="form-control form-control-lg" placeholder="Enter Title" required >
                </div>
                <div class="form-group">
                  <input type="submit" value="Update Note" class="btn btn-info btn-block btn-lg" id="editCategoryBtn" name="editNote" >
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
        //Add new Category Ajax request
        $("#categoryAddBtn").click(function(e){
            if($("#categoryAddForm")[0].checkValidity()){
                e.preventDefault();

                $(this).val('Please Wait..');
                $.ajax({
                    url:'assets/php/admin-action.php',
                    method:'post',
                    data:$("#categoryAddForm").serialize()+'&action=categoryAdd',
                    success:function(response){
                        // console.log(response);
                        if(response === 'category_add'){
                            $("#categoryAddBtn").val('Add');
                            $("#categoryAddForm")[0].reset();
                            $("#categoryAddError").html('');
                            Swal.fire({
                                title: 'Category Add Successfully',
                                type: 'success'
                            });
                        }else{
                            $("#categoryAddError").html(response);
                            $("#categoryAddBtn").val('Add');
                        }
                        fetchAllCategories();
                    }
                });
            }
        });

        fetchAllCategories();
        //Fetch all categories Ajax Request
        function fetchAllCategories(){
            $.ajax({
                url:'assets/php/admin-action.php',
                method:'post',
                data:{action: 'fetchAllCategories'},
                success:function(response){
                    $("#showAllCategories").html(response);
                    $("table").DataTable({
                         order: [0, 'desc']
                    });
                }
            });
        }


        //edit category name ajax request
        $("body").on("click",".categoryEditIcon", function(e){
            e.preventDefault();

            edit_id = $(this).attr('id');  
            // console.log(edit_id);

            $.ajax({
                url:'assets/php/admin-action.php',
                method:'post',
                data:{edit_id: edit_id},
                success: function(response){
                    //console.log(response);
                    data = JSON.parse(response);
                    //console.log(data);
                    $("#id").val(data.id);
                    $("#title").val(data.title);
                }
            });
        });

        //update category name ajax request
        $("#editCategoryBtn").click(function(e){
            if($("#edit-category-form")[0].checkValidity()){
                e.preventDefault();

                $.ajax({
                    url:'assets/php/admin-action.php',
                    method:'post',
                    data:$("#edit-category-form").serialize()+"&action=update_category",
                    success:function(response){

                        Swal.fire({
                            title:'Category Edit Successfully',
                            type:'success'
                        });
                        $("#edit-category-form")[0].reset();
                        $("#editCategoryModal").modal('hide');
                        fetchAllCategories();
                    }
                });
            }
        });

    });
</script>
</body>
</html>