function deleteUser(cuenta){
    console.log(cuenta)
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange=function(){
        if (this.readyState==4 && this.status==200){
            var res = JSON.parse(this.responseText);
            if(res.deleted === true){
                var fila = document.querySelector("#"+cuenta)
                if(fila){
                    fila.parentNode.parentNode.removeChild(fila.parentNode)   
                }
            }
        }
    }
    ajax.open("post", "delete_user.php", true)
    ajax.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    ajax.send(JSON.stringify({"cuenta":cuenta}))
}