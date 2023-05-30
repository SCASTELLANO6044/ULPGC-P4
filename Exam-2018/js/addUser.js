function addUserValidation(event){
    
    console.log("holaaaaaaaaaaa")
    event.preventDefault();
    
    var cuenta = document.getElementById("cuenta").value
    var clave = document.getElementById("clave").value
    var nombre = document.getElementById("nombre").value
    var poblacion = document.getElementById("poblacion").value
    var direccion = document.getElementById("direccion").value
    var telefono = document.getElementById("telefono").value
    
    if(cuenta.length < 8 || cuenta.length > 20){
        alert("The account must have between 8 and 20 characters")
    }
    
    if(clave.length < 8 || clave.length > 20 || !(/\d/.test(clave))){
        alert("The key must have between 8 and 20 characters and at least a number")
    }
    
    if(poblacion.length > 100){
        alert("The city must have less than 100 characters")
    }
    
    if(direccion.length > 100){
        alert("The address must have less than 100 characters")
    }
    
    if(telefono.length > 15){
        alert("The account must have less than 15 characters")
    }
    
    event.target.form.submit()
}