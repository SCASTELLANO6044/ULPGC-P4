function deleteRegister(fila){
    var ajax = new XMLHttpRequest()
    ajax.onreadystatechange=function(){
        if (this.readyState == 4 && this.status == 200){
            var res = JSON.parse(this.responseText)
            if(res.deleted === true){
                var row = document.querySelector(".fila"+fila)
                if(row){
                    row.parentNode.removeChild(row)
                }
            }
        }
    }
    ajax.open("post", "delete_register.php", true)
    ajax.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    ajax.send(JSON.stringify({"id": fila}))
}

function addRegisterValidation(event, form){
    event.preventDefault()
    var peso = document.getElementById("peso")
    var grasa = document.getElementById("grasa")
    var pulsaciones = document.getElementById("pulsaciones")
    
    if(!isNaN(peso) || parseFloat(peso) <= 20){
        alert("El peso del cliente debe ser de más de 20kg")
        return
    }
    
    if(!isNaN(grasa) || parseFloat(grasa) < 0 || parseFloat(grasa) > 100){
        alert("El porcentaje de grasa tiene que estar entre 0 y 100")
        return
    }
    
    if(!isNaN(pulsaciones)){
        alert("Debe introducir un número en el campo pulsaciones.")
        return
    }
    
    form.submit()
}