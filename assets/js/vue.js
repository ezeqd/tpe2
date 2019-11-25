"use strict"

document.addEventListener('DOMContentLoaded', async () => {
    let app = new Vue ({
        el: '#app',
        data: {
            promedio: null,
            comentarios : null,
            login : null,
            admin : null,
            baseurl : null
        },
        methods: {
            borrar  :   async function BorrarComentario(id){
                            if (app.admin==1){
                                let idBorrar = id;
                                let r = await fetch("api/comentarios/"+idBorrar,
                                    {
                                        "method":'DELETE'
                                    });
                                GetComentarios();
                                // catch(error => console.log(error));
                            }
                        },
            insertar:   async function EnviarComentario(e){
                            e.preventDefault();
                            let usuario = idUsuario; 
                            let comentario = document.getElementById("comentario").value;
                            let puntaje = document.getElementById("puntaje").value;
                            let comentarioNuevo = {
                                "id_usuario": usuario,
                                "id_evento" : idEvento,
                                "comentario" : comentario,
                                "puntaje" : puntaje
                            }
                            let r = await fetch("api/comentarios",
                                {
                                    "method": "POST",
                                    "body": JSON.stringify(comentarioNuevo)
                            })
                            GetComentarios();},
            get     :   async function get(atributo,orden){
                            GetComentarios(atributo,orden);
            }
        }
    })
    let idEvento = document.getElementById("data").dataset.idevento;
    let idUsuario = document.getElementById("data").dataset.idusuario;
    GetData();
    CheckLogin();
    GetComentarios();
    GetPromedioPuntaje();
    
    function GetData (){
        let admin = document.getElementById("data").dataset.admin;
        app.admin = admin;
        app.baseurl = window.location.pathname;
    }
    
    function CheckLogin(){    
        if (idUsuario){
            app.login=1;
        }
    }
    
    async function GetPromedioPuntaje() {
        let r = await fetch("api/comentarios/promedio/"+idEvento)
        let json = await r.json();
        app.promedio = await json.promedio;
    }
    
    async function GetComentarios(atributo = null,orden = null) {
        let r;
        if (atributo&&orden){
            r = await fetch("api/comentarios/eventos/"+idEvento+"?atributo="+atributo+"&orden="+orden)
        }
        else {
            r = await fetch("api/comentarios/eventos/"+idEvento)    
        }
        let json = await r.json();
        app.comentarios = await json;
        // console.log(json);
        GetPromedioPuntaje();
        // catch(error => console.log(error));
    }
})