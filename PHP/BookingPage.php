
<?php 
session_start();
include("./Nav.php");
include("./Db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="../CSS/BookingPage.css">
        <style>
         .selected {
            background-color: #e23f3f;
            color: white;
        }
    </style>
</head>
<body>






    


    <div class="navBar">
        <div class="inside">
        <input type="text" id="source" placeholder="source">
        <h1>&harr;</h1>
        <input type="text" id="destination" placeholder="destination">
        </div>
    </div>
    <div class="businfo">
        <div class="card">
            <div class="card-head"><h3 id="heading"></h3></div>
            <div class="card-image"><img src="../IMAGES/realbus.png" alt="" width="250px" height="180px"></div>
            <div class="card-body">
                
            <form action="./BookingPage.php" method="post"><button class="seats" id="seats" name="Booked">Show Seats</button></form>

            </div>
            <div class="price">
            <div class="rate">&#8377;<h3 id="rate"></h3></div>
            <input type="hidden" id="hinput" value="10" >
           <div class="book"><button id="book" onclick="openPopup()"   name="book">Book</button></div>

        </div>
        </div>
         <!----------------PopUp------------------------------->
    <div id="overlay">
        <div id="popup">
            <h2>Passenger details</h2>
            <span id="closeBtn" onclick="closePopup()">X</span>

            <form id="myForm" onsubmit="submitForm(); return false;" action="" method="">
                <input type="text" id="name" name="name" required placeholder="Name">
                <br>
                <input type="email" id="email" name="email" required placeholder="Email">
                <br>
                <input type="text" id="phno" name="phno" required placeholder="Mobile Number">
                <br>
                <label for="email" id="label">Payment Method</label><br>
                <input type="radio" id="payment" name="payment" >Phnpay
                <input type="radio" id="payment" name="payment" >Paytm
                <input type="radio" id="payment" name="payment" >Gpay
                <br>
                <input type="submit" value="Continue to Pay" name="continue" onclick="openPopup1()">
            </form>
        </div>
    </div>
    <!----------------PopUp------------------------------->
    <div id="overlay1">
        <div id="popup1">
            <h2>Payment</h2>
            <span id="closeBtn" onclick="closePopup1()">X</span>
                <h3 id="payroute"></h3>
                <p >tickets: <span id="tickets"></span></p>
                <p >Price: <span id="price"></span></p>
                <p >Convenience Fee: <span id="cov-price">40</p>
                <p >Toatl: <span id="total"></p>

                <input type="submit" value="Pay Now" name="pay" onclick="openPopup2()">
        </div>
    </div>
    <div id="overlay2">
        <div id="popup2">
        <img src="../IMAGES/tick.webp" width="100px" height="100px">
            <h2>Payment Done</h2>
            <input type="submit" value="Done" onclick="closePopup2()">

        </div>
    </div>

        
    </div>
            <div id="noof">No of Tickets Selected<input type="text" disabled id="noofseats" value="0"></div>
            
            <form action="./BookingPage.php" method="post"><div class="proceed"><button id="proceed"  name="proceed">Proceed</button></div></form>

    <?php include("./conne.php")?>


<script>
    console.log()
</script>
<script>
        


        var receivedData = localStorage.getItem("myData");
        var receivedClass=localStorage.getItem("classname");
        console.log(receivedClass);
        console.log(receivedData);
        var selectedSeats = 0;
        var avialableSeats = 22;
        var selectedSeatsArray = [];
        let somes= document.querySelectorAll('.seat');
        somes.forEach(function(seat) {
        seat.addEventListener('click', function(event) {
        event.preventDefault();
        console.log(this.textContent);
        let seatNo=this.textContent;
        document.cookie = "seatNo=" + seatNo;

        if (this.style.background === 'green') {
            this.style.background = 'rgb(207, 196, 196)';
            selectedSeatsArray.pop(this.textContent);

            // const index = selectedSeats.indexOf(this.textContent);
                // if (index !== -1) {
                //     selectedSeatsArray.splice(index, 1);
                // }
            if(selectedSeats<=0){
                selectedSeats=0;
            }
               
            else{
                selectedSeats--;
            }
            
            avialableSeats++;
      
             
        } else {
            this.style.background = 'green';
            if(avialableSeats<=0){
                avialableSeats=0;
            }
            else{
                selectedSeatsArray.push(this.textContent);
                avialableSeats--;
            }
            selectedSeats++;
        }
        // console.log(avialableSeats);
        // console.log(selectedSeats);
        console.log(selectedSeatsArray)
        console.log(selectedSeatsArray.length);
        var avail=avialableSeats;
        var select=selectedSeats;
        var curr=document.getElementById("noofseats").value=selectedSeatsArray.length;
        document.cookie = "avail=" + avail;
        document.cookie="select=" + selectedSeatsArray.length;
        document.cookie='current=' + selectedSeatsArray.length;
        document.cookie='selectedArray=' + selectedSeatsArray;
    });
});
        var myVariable = receivedClass;
        
        document.cookie = "myVariable=" + myVariable;

</script>
    <script src="../JS/Book.js"></script>
    <script>
        function splitString(inputString, separator) {
        var result = {};
        var index = inputString.indexOf(separator);

        if (index !== -1) {
            result.part1 = inputString.substring(0, index).trim();
            result.part2 = inputString.substring(index + separator.length).trim();
        } else {
            console.log("Error: Separator not found in the input string.");
        }

        return result;
        }
        var separator = "→";

        var result = splitString(receivedData, separator);
        console.log(result)
        let soruce=document.getElementById('source');
        let dest=document.getElementById('destination');
        console.log(soruce)
        soruce.value=result.part1;
        dest.value=result.part2;
        let rDest=localStorage.getItem('dest');
        console.log(rDest)
        
        let heading=document.getElementById('heading');
        heading.textContent=receivedData;
    </script>
    
    <script>
        
        function openPopup() {
       document.getElementById('overlay').style.display = 'flex';
       }

       function closePopup() {
           document.getElementById('overlay').style.display = 'none';
       }
       function openPopup1() {
       document.getElementById('overlay1').style.display = 'flex';
       }
       function closePopup1() {
           document.getElementById('overlay1').style.display = 'none';
       }
       function openPopup2() {
       document.getElementById('overlay2').style.display = 'flex';
       }
       function closePopup2() {
           document.getElementById('overlay2').style.display = 'none';
           document.getElementById('overlay1').style.display = 'none';
           document.getElementById('overlay').style.display = 'none';
           window.location.href="./HomePage.php";
       }



      
   </script>
    
</body>
</html>