<?php  include('./Nav.php');
include('./Db.php');
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/book.css">
 </head>
 <body>
    
    <div class="navBar">
        <div class="inside">
        <input type="text" id="source" placeholder="source" value="ANITS" disabled style="background-color: white;">
        <h1>&harr;</h1>
        <input type="text" id="destination" placeholder="destination" value="Destination" disabled style="background-color: white;">
        </div>
    </div>
    <?php 
        if(isset($_COOKIE['value'])){
            $val= $_COOKIE['value'];
            echo $_COOKIE['value'];
            echo "<br>";
        }
        $cur1='';
        $cur2='';
        $sql = "SELECT * FROM routs WHERE value ='$val'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Fetch the row
                $id=$row['id'];
                $value = $row["value"];
                $dest = $row["dest"];
                $buses = $row["buses"];
                echo $id;
                echo"<br>";
                echo $value;
                echo"<br>";

                echo $dest;
                echo"<br>";

                echo $buses;
                echo"<br>";

                $arrayOfStrings = explode(",", $buses);
                $lengthOfArray = count($arrayOfStrings);
                echo $lengthOfArray;
                $cur1=$arrayOfStrings[0];
                $cur2=$arrayOfStrings[1];
                $i=0;
                while($i<$lengthOfArray){
                    $selectsql ="SELECT * FROM busdata WHERE buscode = '$arrayOfStrings[$i]'";
                    $selectresult = $conn->query($selectsql);
                        $rowselect= $selectresult->fetch_assoc();
                        print_r($rowselect);
                        $i++;
                }
        }

    ?>
    <?php
        // Now $arrayOfNumbers is an array of strings
        $arrayOfNumbers=[];
 echo ' <div id="outside">';
 echo '<div id="shows" class="show-seats">';
 echo '<div class="left" id="left1">';
for ($i = 1; $i <= 5; $i++) {
    $seatNumber = sprintf('%02d', $i);
    $class = in_array($seatNumber, $arrayOfNumbers) ? 'selected' : '';
    echo '<div class="row"><div class="seat ' . $class . '"><p>' . $seatNumber . '</p></div></div>';
}

echo '</div>';
echo '<div class="right" id="right1">';
for ($i = 6; $i <= 10; $i++) {
    $seatNumber = sprintf('%02d', $i);
    $class = in_array($seatNumber, $arrayOfNumbers) ? 'selected' : '';
    echo '<div class="row"><div class="seat ' . $class . '"><p>' . $seatNumber . '</p></div></div>';
}
echo '</div>';

echo '</div>';
echo '</div>';
    
    
    ?>
  
    <script src="../JS/book2.js">
    </script>
 </body>
 </html>