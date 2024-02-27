let help=document.querySelectorAll('.help');
let submit=document.getElementById('button');
const fname=document.getElementById('name');
const email=document.getElementById('email');
let pass=document.getElementById('pass');
let cpass=document.getElementById('cpass');
let left=document.getElementById('left');
let right=document.getElementById('right');

let orginalPassword;
fname.addEventListener("focusin",function(){
    if(document.hasFocus && document.activeElement===fname){
        fname.addEventListener('input',function(){
            if(fname.value.length<6){
                help[0].textContent='Fullname should conatain grater than 5 charaters'

            }
            else{
                help[0].textContent=" ";
            }
        })
    }
})
email.addEventListener("focusin",function(){
    if(document.hasFocus && document.activeElement===email){
        email.addEventListener('input',function(){
            let mailValue=email.value;
            var mail=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            console.log(mailValue);
            if(mail.test(mailValue)){
                help[1].textContent=" ";
            }
            else{
                help[1].textContent='Enter a valid email';
            }
        })
    }
})
pass.addEventListener("focusin",function(){
    if(document.hasFocus && document.activeElement===pass){
        pass.addEventListener('input',function(){
            let password=pass.value;
            var validpass=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if(validpass.test(password)){
                help[2].textContent=" ";

            }
            else{
              
                help[2].innerHTML="At least one letter (uppercase or lowercase)<br>At least one digit.<br>At least one special character.<br>Minimum length of 8 characters.";
                
            }
        })
    }
})
pass.addEventListener("focusout",function(){
    orginalPassword=pass.value;
});
cpass.addEventListener("focusin",function(){
    if(document.hasFocus && document.activeElement===cpass){
        cpass.addEventListener('input',function(){
            let cpassword=cpass.value;
            if(cpassword===orginalPassword){
                help[3].textContent=" ";
            }
            else{
                help[3].textContent="doesn't match with password";

            }
        })
    }
})