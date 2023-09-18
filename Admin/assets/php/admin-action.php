<?php

require_once './admin-db.php';

$admin = new Admin();
session_start();

//Handle Admin Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'adminLogin'){
    $username = $admin->test_input($_POST['username']);
    $password = $admin->test_input($_POST['password']);

    $hidePassword = sha1($password);

    $loggedInAdmin = $admin->admin_login($username,$hidePassword);
    
    if($loggedInAdmin != null){
        echo 'admin_login';
        $_SESSION['username'] = $username;
    }else{
        echo $admin->showMessage('danger','Username or Password Incorrect!');
    }
}

//Handle Add category Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'categoryAdd'){
    $category = $_POST['NewCategory'];

    $isCategory = $admin->check_category($category);

    if($isCategory == null){
        $admin->insert_category($category);
        echo 'category_add';
    }else{
        echo $admin->showMessage('danger','This category already exists');
    }
}


//Handle Fetch all categories Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllCategories'){
    $output = '';
    $data = $admin->fetchAll_Categories();
    
    if($data){
        $output .= '<table class="table table-striped table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Categories</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>';
                foreach($data as $category){
                    $output .= '<tr>
                                    <td>'.$category['id'].'</td>
                                    <td>'.$category['title'].'</td>
                                    <td>
                                    <a href="#" id="'.$category['id'].'" title="Edit Category" 
                                     class="text-primary categoryEditIcon" data-toggle="modal" data-target="#editCategoryModal" >
                                     <i class="fa-solid fa-pen-to-square"></i></a>&nbsp;&nbsp;

                                    <a href="#" id="'.$category['id'].'" title="Delete Category" class="text-danger deleteCategoryIcon" >
                                    <i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;&nbsp;
                                 </td>
                                </tr>';
                    
                    
                }
                $output .= '</tbody>
                </table>';
                        
                echo $output;            
    } else{
        echo '<h3 class="text-center text-secondary">:( You have not category yet!';
      }
}

//Handle Edit category name Ajax request
if(isset($_POST['edit_id'])){
    $id = $_POST['edit_id'];

    $row = $admin->edit_category($id);
    echo json_encode($row);
}

//Handle Update category name Ajax request
if(isset($_POST['action']) && $_POST['action'] == 'update_category'){
    $id = $admin->test_input($_POST['id']);
    $title = $admin->test_input($_POST['title']);

    $admin->update_category($title,$id);
}
?>