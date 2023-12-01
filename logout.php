<?php
session_start();



$id = $_REQUEST['id'];
if ($id) {
    if (isset($_SESSION['employee_id'])) {
        if ($_SESSION['employee_id'] === $id) {
            unset($_SESSION['employee_id']);
            header('location:./');
        }
    } elseif (isset($_SESSION['manager_id'])) {
        if ($_SESSION['manager_id'] === $id) {
            unset($_SESSION['manager_id']);
            header('location:./');
            
        }
        

    } elseif (isset($_SESSION['sale_id'])) {
        if ($_SESSION['sale_id'] === $id) {
            unset($_SESSION['sale_id']);
            header('location:./');
            
        }
    } elseif (isset($_SESSION['nvl_id'])) {
        if ($_SESSION['nvl_id'] === $id) {
            unset($_SESSION['nvl_id']); 
            header('location:./');
            
        }

    } elseif (isset($_SESSION['director_id'])) {
        if ($_SESSION['director_id'] === $id) {
            unset($_SESSION['director_id']);
            header('location:./');
            
        }
    } elseif (isset($_SESSION['resource_supplier_id'])) {
        if ($_SESSION['resource_supplier_id'] === $id) {
            unset($_SESSION['resource_supplier_id']);
            header('location:./');
            
        }
    } else if (isset($_SESSION['product_manager_id'])) {
        if ($_SESSION['product_manager_id'] === $id) {
            unset($_SESSION['product_manager_id']);
            header('location:./');
            
        }
    }
} else {
    header('localtion:page-error-404');
}

// }
?>