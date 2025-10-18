<?php

//creating connection object
$con = mysqli_connect("localhost","root","");

//creating database

// if($con){

//     $q = "CREATE DATABASE Hotel_Booking";
    
//     if(mysqli_query($con,$q)){

//         echo "Connected to Databse";
//     }
//     else{

//         echo "Error in creating database";
//     }

// }
// else{

//     echo "Connection can not be established";
// }


//selecting database

try{
    mysqli_select_db($con,"Hotel_Booking");
} catch(Exception $e){

    echo "Error in selecting database";
}


//creating "REGISTRATION" table

// if($con){

//     $q = "CREATE TABLE user_details(
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         full_name VARCHAR(100),
//         email VARCHAR(50),
//         mobile BIGINT(10),
//         pincode INT(6),
//         password varchar(25),
//         address TEXT,
//         profile_picture VARCHAR(100),
//         status CHAR(10) DEFAULT 'inactive',
//         role CHAR(6) DEFAULT 'user'
//     )";

//     if(mysqli_query($con,$q)){

//         echo "userdetails table created";
//     }
//     else{
//         echo "Error in creating table userdetails";
//     }
// }



//here are some important functions

    //for filtering data remove spaces, extra unwanted chars etc.
    function filteration($data)
    {
        foreach($data as $key => $value)
            {
                $value = trim($value);
                $value = stripslashes($value);
                $value = htmlspecialchars($value);
                $value = strip_tags($value);

                $data[$key] = $value;
            }

            return $data;
    }

    //for selecting a perticular data
    function select($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];

        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt))
            {
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else
            {
                mysqli_stmt_close($stmt);
                die("Query cannot executed - Select");
            }
        }
        else
        {
            die("Query cannot prepared - Select");
        }
    }

    //for selecting whole table data
    function selectAll($table)
    {
        $con = $GLOBALS['con'];
        $res = mysqli_query($con,"SELECT * FROM $table");
        return $res;
    }


    //for updating the data
    function update($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];

        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt))
            {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else
            {
                mysqli_stmt_close($stmt);
                die("Query cannot executed - Update");
            }
        }
        else
        {
            die("Query cannot prepared - Update");
        }
    }

    //for inserting the data
    function insert($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];

        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt))
            {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else
            {
                mysqli_stmt_close($stmt);
                die("Query cannot executed - Insert");
            }
        }
        else
        {
            die("Query cannot prepared - Insert");
        }
    }

    //for deleting data
    function deletQ($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];

        if($stmt = mysqli_prepare($con,$sql))
        {
            mysqli_stmt_bind_param($stmt,$datatypes,...$values);
            if(mysqli_stmt_execute($stmt))
            {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else
            {
                mysqli_stmt_close($stmt);
                die("Query cannot executed - Delete");
            }
        }
        else
        {
            die("Query cannot prepared - Delete");
        }
    }

    
?>