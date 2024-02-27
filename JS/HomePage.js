var selectElement = document.getElementById("routs");
var selectedOption="";
function change(){
    var selectedOption = selectElement.options[selectElement.selectedIndex];

    return selectedOption.innerHTML
}
selectElement.addEventListener("change",change);
document.getElementById('searchBtn').addEventListener('click',function(){
    console.log(change());
    console.log( selectElement.value);
    window.location.href="./Book.php";
    localStorage.setItem('route',selectElement.value);
    localStorage.setItem('destination',change());

});
