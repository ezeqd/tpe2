"use strict";
document.addEventListener("DOMContentLoaded", cargar)

function cargar() {
    
    mostrar();
    
    
    function mostrar() {
        let botonEditar = document.querySelectorAll(".botonEditar");
        for (let elemt of botonEditar)
        elemt.addEventListener("click", editar);
    }
    
    function editar(e) {
        e.preventDefault();
        let formUnico = document.getElementById("FormUnico");
        let btnEnviar = document.getElementById("btnEnviar");
        btnEnviar.innerHTML = "Guardar";
        let IdEditar = this.value;
        // console.log(IdEditar);
        let UrlEditar = 'eventos/editar/'+IdEditar;
        formUnico.setAttribute('action',UrlEditar);
        let nombre = document.getElementById("nombre"+IdEditar).innerHTML;
        let fecha = document.getElementById("fecha"+IdEditar).innerHTML;
        let organizador = document.getElementById("organizador"+IdEditar).innerHTML;
        let ciudadaeditar = document.getElementById("ciudad"+IdEditar).innerHTML;
        console.log(ciudadaeditar);
        document.getElementById("nombre").value = nombre;
        document.getElementById("fecha").value = fecha;
        document.getElementById("organizador").value = organizador;
        // document.getElementById("ciudad").value = ciudadaeditar;
    }
}

