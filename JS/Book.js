const seats=document.getElementById('seats');
const div=document.getElementById('shows');
const left=document.getElementById('left');
const right=document.getElementById('right');

console.log(seats);
seats.addEventListener('click',function(){
    if (div.style.display === 'none') {
        div.style.display = 'block';
        seats.style.backfaceVisibility='lightgreen';
        seats.textContent='Hide Seats';
        seats.style.background="#64af46";
        right.style.marginTop="-400px";
        right.style.marginLeft="425px";
        left.style.paddingTop="5px"
        
        
    } else {
        seats.textContent='Show Seats';
        seats.style.background="#e23f3f";
        div.style.display = 'none';
    }
})
    