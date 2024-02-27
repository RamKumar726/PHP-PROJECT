<?php 
include("./Db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .selected {
            background-color: red; /* Change this to your desired color */
            color: white;
        }
        .selected:hover{
            background-color: red;
            cursor: default;
            border: none;
        }

    </style>
</head>
<body>
    
</body>
</html>
<?php
    function str_intersection($str1, $str2) {
        // Convert strings to arrays of characters
        $chars1 = str_split($str1);
        $chars2 = str_split($str2);
    
        // Find common characters
        $intersection = array_intersect($chars1, $chars2);
    
        // Convert the result back to a string
        $result = implode('', $intersection);
    
        return $result;
    }
        $flag=true;   
        $code = '';
        $seatNo=array();
        $avail=22;
        $select=0;
        $curr=0;
        $prevSeats=0;
        $updatedSeats=0;
        $newSeats=0;
        $prevCode="";

        if (isset($_COOKIE['avail'])) {
            $avail = $_COOKIE['avail'];
        }
        if (isset($_COOKIE['select'])) {
            $select = $_COOKIE['select'];
        }
        if(isset($_COOKIE['current'])){
            $curr=$_COOKIE['current'];
            
        }
        if(isset($_COOKIE['seatNo'])){
            $currentseatNo=$_COOKIE['seatNo'];
        }
        if(!isset($_COOKIE['selectedArray'])){
            $currSeats=0;
        }
         // Retrieve the variable from the cookie
         if (isset($_COOKIE['myVariable'])) {
            $code = $_COOKIE['myVariable'];
        }
        if(isset($_COOKIE['selectedArray'])){
            $currSeats=$_COOKIE['selectedArray'];
        }
        

       


       
        $sql = "SELECT * FROM bus WHERE buscode = '$code'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Fetch the row
            $price = $row["pirce"];
            
            echo"<script>document.getElementById('rate').textContent=$price;</script>";
        }
       
        // Retrieve values from the POST request
        if (isset($_POST['proceed'])) {
           
            $sql = "SELECT * FROM bus WHERE buscode = '$code'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); // Fetch the row
                
                // Store each value in separate variables
                $id = $row["id"];
                $busCode = $row["buscode"];
                $source = $row["source"];
                $destination = $row["dest"];
                $available = $row["avail"];
                $selected = $row["selected"];
                $price = $row["pirce"];
                $selectedSeatsInDB = json_decode($row['selectedseats'], true);
                $existingSeats = json_decode($row['selectedseats'], true);
                $newSeats = $currSeats;
    
                
                $updatedSeats=$existingSeats. "," . $newSeats;
                
            }
            if($available>0){
                
                $select=$row["selected"];
                $avail=$row["avail"];
                echo $existingSeats;
                echo $newSeats;
                $array1 = explode(',', $existingSeats);
                $array2 = explode(',', $newSeats);
                $intersection = array_intersect($array1, $array2);

                if(!$intersection ){
                    $newAvailable = $available - $curr-1;  // Adjust based on your logic
                    $newSelected = $selected + $curr+1;   // Adjust based on your logic
                    $updateSql = "UPDATE bus SET avail = $newAvailable, selected = $newSelected WHERE buscode = '$code'";
                    if ($conn->query($updateSql) === TRUE) {
                    } else {
                    }
                    echo "current:";
                    echo "$curr<br>";

                    echo "<script>document.getElementById('rate').textContent = $price*($curr);</script>";
                    echo "<script>document.getElementById('noofseats').value</script>";
                    echo"<script> document.getElementById('tickets').textContent=$curr+1</script>";
                    echo"<script>document.getElementById('price').textContent=$price*($curr)</script>";
                    echo"<script>document.getElementById('total').textContent=$price*($curr)+40</script>";
                    // Encode the updated array back to JSON
                    $updatedSeatsJson = json_encode($updatedSeats);

                    // Update the selectedseats column
                    $sqlUpdate = "UPDATE bus SET selectedseats = '$updatedSeatsJson' WHERE buscode = '$code'";
                    
                    if ($conn->query($sqlUpdate) === TRUE) {
                    } else {
                    }

                }
                else{
                    
                }
            }
            else{
                echo "<script>alert('not available');</script>";
            }

        }
        
?>
<?php
if(isset($_POST['Booked'])){
    
    $BookedSeats=0;
    $Booksql = "SELECT * FROM bus WHERE buscode = '$code'";
    $result = $conn->query($Booksql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the row
        
        $BookedSeats = json_decode($row['selectedseats'], true);
    }





 $stringOfNumbers = $BookedSeats;
 $arrayOfNumbers = explode(',', $stringOfNumbers);
 // Now $arrayOfNumbers is an array of strings
 echo ' <div id="outside">';
 echo '<div id="shows" class="show-seats">';
 echo '<div class="left" id="left1">';
for ($i = 1; $i <= 6; $i++) {
    $seatNumber = sprintf('%02d', $i);
    $class = in_array($seatNumber, $arrayOfNumbers) ? 'selected' : '';
    echo '<div class="row"><div class="seat ' . $class . '"><p>' . $seatNumber . '</p></div></div>';
}

echo '</div>';
echo '<div class="left" id="left2">';
for ($i = 7; $i <= 12; $i++) {
    $seatNumber = sprintf('%02d', $i);
    $class = in_array($seatNumber, $arrayOfNumbers) ? 'selected' : '';
    echo '<div class="row"><div class="seat ' . $class . '"><p>' . $seatNumber . '</p></div></div>';
}

echo '</div>';
echo '<div class="right" id="right1">';
for ($i = 13; $i <= 17; $i++) {
    $seatNumber = sprintf('%02d', $i);
    $class = in_array($seatNumber, $arrayOfNumbers) ? 'selected' : '';
    echo '<div class="row"><div class="seat ' . $class . '"><p>' . $seatNumber . '</p></div></div>';
}
echo '</div>';
echo '<div class="right" id="right2">';
for ($i = 18; $i <= 22; $i++) {
    $seatNumber = sprintf('%02d', $i);
    $class = in_array($seatNumber, $arrayOfNumbers) ? 'selected' : '';
    echo '<div class="row"><div class="seat ' . $class . '"><p>' . $seatNumber . '</p></div></div>';
}
echo '</div>';
echo '</div>';
echo '</div>';
}
$conn->close();

?>
