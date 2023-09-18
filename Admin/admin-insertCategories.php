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

    });
</script>
</body>
</html>