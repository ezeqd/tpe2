"use strict"

document.addEventListener('DOMContentLoaded', async () => {
    let app = new Vue ({
        el: '#app',
        data: {
            promedio: null,
            comentarios : null,
            admin : true
        }
    })
    let idEvento = document.getElementById("evento").dataset.id;

    GetPromedioPuntaje();
    GetComentarios();

    async function GetPromedioPuntaje() {
        let r = await fetch("api/comentarios/promedio/"+idEvento)
        let json = await r.json();
        app.promedio = await json.promedio;
    }

    async function GetComentarios() {
        let r = await fetch("api/comentarios/eventos/"+idEvento)
        let json = await r.json();
        app.comentarios = await json;
        setTimeout(AsignarEventListener,0);
        setTimeout(GetPromedioPuntaje,0);
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
        if (app.admin){
            let id = this.id;
            let r = await fetch("api/comentarios/"+id,
                {
                    "method":'DELETE'
                });
            setTimeout(GetComentarios,0);
            // catch(error => console.log(error));
        }
    }

    async function EnviarComentario(e){
        e.preventDefault();
        let idUsuario = 1; // HARDCODEADO
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
        setTimeout(GetComentarios,0);
        // catch(error => console.log(error));

    }
})