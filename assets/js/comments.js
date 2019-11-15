"use strict";
document.addEventListener("DOMContentLoaded", ()=>{
    const element = React.createElement("h1", null, "Hola Mundo!");
    let node = document.getElementById("eventos");

    ReactDOM.render(element, node);
})