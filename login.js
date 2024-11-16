document.getElementById("pass1").addEventListener("input",validatePassword);
document.getElementById("pass2").addEventListener("input",validatePassword);
function validatePassword(){
    const pass1 = document.getElementById("pass1").value;
    const pass2 = document.getElementById("pass2").value;
    const message = document.getElementById("message");
    if(pass1.length < 8){
        message.style.color = "red";
        message.innerText = "Password must be at least 8 characters long." ;
    }
    else if(pass1 === pass2){
        message.style.color = "green";
        message.innerText = "Register Successful !";
    }
    else{
        message.style.color = "red";
        message.innerText = "Password do not match.";
    }
}
