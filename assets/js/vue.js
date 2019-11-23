"use strict"

document.addEventListener('DOMContentLoaded', async () => {
    let app = new Vue ({
        el: '#app',
        data: {
            promedio: null,
            comentarios : null,
            admin : null,
            baseurl : null
        },
        methods: {
            borrar :    async function BorrarComentario(id){
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
            insertar :  async function EnviarComentario(e){
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
                            GetComentarios();
                            // catch(error => console.log(error));
                        },
            get :   async function (atributo,orden){
                GetComentarios(atributo,orden);
                document.querySelector("#")
            }
        }
    })
    let idEvento = document.getElementById("data").dataset.idevento;
    let idUsuario = document.getElementById("data").dataset.idusuario;
    let admin = document.getElementById("data").dataset.admin;
    app.admin = admin;
    app.baseurl = window.location.pathname;
    GetPromedioPuntaje();
    GetComentarios();
    
    async function GetPromedioPuntaje() {
        let r = await fetch("api/comentarios/promedio/"+idEvento)
        let json = await r.json();
        app.promedio = await json.promedio;
    }
    // Comentado las sentencias para ordenar en js el arreglo de comentarios
    async function GetComentarios() {
        let r = await fetch("api/comentarios/eventos/"+idEvento)
        let json = await r.json();
        // sortJSON(json,atributo,orden);
        console.log(json);
        app.comentarios = await json;
        GetPromedioPuntaje();
        // catch(error => console.log(error));
    }
    // async function GetComentarios(atributo = null,orden = null) {
    //     let r = await fetch("api/comentarios/eventos/"+idEvento)
    //     let json = await r.json();
    //     // sortJSON(json,atributo,orden);
    //     console.log(json);
    //     app.comentarios = await json;
    //     GetPromedioPuntaje();
    //     // catch(error => console.log(error));
    // }
    
    // function sortJSON(data, key, orden) {
    //     if ((key!=null)&&(orden!=null)){
    //         return data.sort(function (a, b) {
    //             var x = a[key],
    //             y = b[key];
        
    //             if (orden === 'asc') {
    //                 return ((x < y) ? -1 : ((x > y) ? 1 : 0));
    //             }
        
    //             if (orden === 'desc') {
    //                 return ((x > y) ? -1 : ((x < y) ? 1 : 0));
    //             }
    //         }
    //     )}
    //     else{
    //         return data
    //     }
    // }
})