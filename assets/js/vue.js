"use strict"

document.addEventListener('DOMContentLoaded', async () => {
    let app = new Vue ({
        el: '#app',
        data: {
            comentarios : null,
            admin : false
        }
    })

    GetComentarios();
    
    async function GetComentarios() {
        let idEvento = document.getElementById("evento").dataset.id;
        let r = await fetch("api/comentarios/eventos/"+idEvento)
        let json = await r.json();
        app.comentarios = await json;
        setTimeout(AsignarEventListener,0);
        // catch(error => console.log(error));
    }
    
    async function AsignarEventListener(){
        let botonesBorrar = document.querySelectorAll(".botonBorrar");
        for (let botonBorrar of botonesBorrar)
        botonBorrar.addEventListener("click", BorrarComentario);
        let botonEnviar = document.querySelector("#botonEnviar");
        botonEnviar.addEventListener("click", EnviarComentario);
    }

    async function BorrarComentario(e){
        e.preventDefault();
        let id = this.id;
        let r = await fetch("api/comentarios/"+id,
            {
                "method":'DELETE'
            });
        console.log(r);
        setTimeout(GetComentarios,0);
        // catch(error => console.log(error));
    }

    async function EnviarComentario(e){
        e.preventDefault();
        let idUsuario = 1; // HARDCODEADO
        let idEvento = document.getElementById("evento").dataset.id;
        let comentario = document.getElementById("comentario").value;
        let puntaje = document.getElementById("puntaje").value;
        let comentarioNuevo = {
            "id_usuario": idUsuario,
            "id_evento" : idEvento,
            "comentario" : comentario,
            "puntaje" : puntaje
        }
        let r = await fetch("api/comentarios",
            {
                "method": "POST",
                "body": JSON.stringify(comentarioNuevo)
        })
        console.log(r);
        setTimeout(GetComentarios,0);
        // catch(error => console.log(error));

    }
})