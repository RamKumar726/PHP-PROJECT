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
    <title>Home</title>
  
    <link rel="stylesheet" href="../CSS/HomePage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
       
    <div class="search">
    <div class="navBar">
        <div class="inside">
        <input type="text" id="source" placeholder="source">
        <h1>&harr;</h1>
        <select name="dog-names" id="routs">
            <option id="dest" >Destination</option> 
            <option id="dest" value="AM">MVP</option> 
            <option id="dest" value="AD">Dwaraka Nagar</option> 
            <option id="dest" value="AG">Gajuwaka</option> 
            <option id="dest" value="AS">Simhachalam</option> 
        </select>
        <button id="searchBtn">Search</button>
        </div>
    </div>
        <img id="bus" src="../IMAGES/bus.png" width="50%" height="250px">
    </div>
    <div class="slider">
	<div class="slide-track">
		<div class="slide">
			<img src="../IMAGES/location.png" height="100" width="250" alt="" />
		</div>
		<div class="slide">
			<img src="../IMAGES/buses.png" height="100" width="250" alt="" />
		</div>
		<div class="slide">
			<img src="../IMAGES/booking.png" height="100" width="250" alt="" />
		</div>
		<div class="slide">
			<img src="../IMAGES/care.png" height="100" width="250" alt="" />
		</div>
		<div class="slide">
			<img src="../IMAGES/refund.png" height="100" width="250" alt="" />
		</div>
		<div class="slide">
			<img src="../IMAGES/deals.png" height="100" width="250" alt="" />
		</div>
		
	</div>
</div>
    <div class="assure">
        <div class="inside-assure">
            <div class="info"><img src="../IMAGES/Assurence.png" width="100px" height="100px"><h4>Upto <span>150%</span> Refund<br>On Bus Cancellation</h4></div>
            <div class="info"><img src="../IMAGES/Assurence.png" width="100px" height="100px"><h4>Upto <span>100%</span> Refund<br>for Bad Service Quality</h4></div>
            <div class="info"><img src="../IMAGES/Assurence.png" width="100px" height="100px"><h4>Upto <span>100%</span> Refund<br>For Bus Delays</h4></div>
            <div class="info"><img src="../IMAGES/Assurence.png" width="100px" height="100px"><h4>Upto <span>100%</span> Refund<br>If You Change Plans</h4></div>
        </div>
    </div>
    <div class="Routs">
        <h3>Bus Routes</h3>
        <ul>
            <li><a id="link" href="./BookingPage.php" class="A">ANITS  &rarr; MVP</a></li>
            <li><a id="link" href="./BookingPage.php" class="B">ANITS  &rarr; Kottavalasa</a></li>
            <li><a id="link" href="./BookingPage.php" class="C">ANITS  &rarr; Steel Plant TownShip</a></li>
            <li><a id="link" href="./BookingPage.php" class="D">ANITS  &rarr; Pendurthy</a></li>
            <li><a  id="link"href="./BookingPage.php" class="E">ANITS  &rarr; Seetammadhara</a></li>
            <li><a id="link" href="./BookingPage.php" class="F">ANITS  &rarr; Dwaraka Nagar</a></li>
            <li><a id="link" href="./BookingPage.php" class="G">ANITS  &rarr; Simhachalam</a></li>
            <li><a id="link" href="./BookingPage.php" class="H">ANITS  &rarr; Vizianagaram</a></li>
            <li><a id="link" href="./BookingPage.php" class="I">ANITS  &rarr; Gajuwaka</a></li>
            <li><a id="link" href="./BookingPage.php" class="J">ANITS  &rarr; Anakapalli</a></li>
        </ul>
    </div>
  <?php include("./Footer.php")?>
<script> 
       var links = document.querySelectorAll('#link');
links.forEach(function(link) {
    link.addEventListener('click', function(event) {
        event.preventDefault();
        var innerHTML = this.innerHTML;
        var dataToSend = innerHTML;
        var code = this.className;
        localStorage.setItem("myData", dataToSend);
        localStorage.setItem("classname", code);

        console.log(innerHTML);
       
        var targetURL = this.getAttribute('href');
        window.location.href = targetURL;
    });
});
        // let dest=document.getElementById("dest");
        // let search=document.getElementById("search");
        // console.log(dest.value);
        // console.log(search);
        // let citis=['mvp','kottavalasa','steel plant pownphip','pendurthy','seetammadhara','dwaraka nagar',' simhachalam','vizianagaram','gajuwaka',' anakapalli'];

        // search.addEventListener('click',function(){
        //     let x=dest.value;
        //     let mx=x.toLowerCase();
        //     if(citis.includes(mx)){
        //         localStorage.setItem('dest',x);
        //         window.location.href=this.getAttribute('href')
        //     }
        //     else{
        //         alert('correct city')
        //     }
        // });




</script>







    <script src="../JS/HomePage.js"></script>
</body>
</html>