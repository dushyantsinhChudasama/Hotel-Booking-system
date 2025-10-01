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

?>