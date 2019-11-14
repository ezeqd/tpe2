"use strict"

document.addEventListener('DOMContentLoaded', () => {
    let app = new Vue ({
        el: '#app',
        data: {
            comentarios : null,
            admin : false
        }
    })

    GetComentarios();

    function GetComentarios() {
        let idEvento = document.getElementById("evento").dataset.id;
        fetch("api/comentarios/eventos/"+idEvento)
        .then(response => response.json())
        .then(comentarios => {
            app.comentarios = comentarios; // similar a $this->smarty->assign("tasks", $tasks)
        }).then(AsignarEventListener)
        .catch(error => console.log(error));
    }
    
    function AsignarEventListener(){
        let botonesBorrar = document.querySelectorAll(".botonBorrar");
        for (let botonBorrar of botonesBorrar)
        botonBorrar.addEventListener("click", BorrarComentario);
    }

    function BorrarComentario(e){
        e.preventDefault();
        let id = this.id;
        fetch("api/comentarios/"+id,{method:'DELETE'}).catch(error => console.log(error));
        GetComentarios();
    }
})