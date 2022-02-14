function comprobarPass(){
    pass1=document.getElementById("pass").value;
    pass2=document.getElementById("pass2").value;
    console.log(pass1+","+pass2)
    if(pass1!=pass2){
        document.getElementById("pass2").style.backgroundColor="red";
        document.getElementById("boton").disabled=true;
        alert("La contraseña no coincide");
    } else {
        document.getElementById("pass2").style.backgroundColor="white";
        document.getElementById("boton").disabled=false;
    }
}
