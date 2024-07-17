<?php
function insert_categories(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title=$_POST['cat_title'];
            if ($cat_title=="" || empty($cat_title) ){
                echo "this field should not be emty";
    
            }
            else{
                $query="INSERT INTO categories(cat_title) ";
                $query .="VALUE ('{$cat_title}')";
                $create_category_query=mysqli_query($connection,$query);
               
                if(!$create_category_query){
                    die('error'. mysqli_error($connection));
                }
            }
            }
    
}

function findAllCategories(){
    global $connection;
    $query="SELECT * FROM categories ";
    $select_all_categories=mysqli_query($connection,$query);
   
      while ($rows=mysqli_fetch_assoc($select_all_categories)){
       $cat_id=$rows['cat_id'];
       $cat_title=$rows['cat_title'];
   
       echo "<tr>";
       echo " <td>{$cat_id}</td> ";
       echo "<td>{$cat_title}</td>";
       echo " <td><a href='categories.php?delete={$cat_id}'>Delete </a></td>";
       echo " <td><a href='categories.php?edit={$cat_id}'>Edit </a></td>";
       
       echo " </tr> ";
   } 
}

function deleteCategories(){
    global $connection;
    if(isset($_GET['delete'])){
        $the_cat_id=$_GET['delete'];
        $query="DELETE FROM categories WHERE cat_id= {$the_cat_id}";
        $delete_query=mysqli_query($connection,$query);
        // bel clique tetfasa5 donnee ama matetna7ach men page 
        // lazem na3mlo refrech lil page 
        header("Location:categories.php");

    }
}

function updateCategories(){
    global $connection;
    if(isset($_GET['edit'])){
        $cat_id=$_GET['edit'];

    include "includes/update_categories.php";

     }
}

?>