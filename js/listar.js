function getOnibus(order = "id") {
    
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log();

        const res = JSON.parse(this.response);

        renderTable(res);

       
      
      }
    };
    xhttp.open("GET", `php/listar.php?order=${order}`);
    xhttp.send();

}

getOnibus();

function renderTable(data) {
    const tBody = document.querySelector("#tableBody");
    tBody.innerHTML = "";
    data.forEach(el => {
        const tr = document.createElement("tr");
        const id = document.createElement("td"); 
  
        const marca = document.createElement("td"); 
        const modelo = document.createElement("td"); 
        const placa = document.createElement("td"); 
        const qtdAssentos = document.createElement("td"); 
        const temArCondicionado = document.createElement("td"); 
        const temBanheiro = document.createElement("td"); 
        id.innerText = el.id;
        marca.innerText = el.marca;
        modelo.innerText = el.modelo;
        placa.innerText = el.placa;
        qtdAssentos.innerText = el.qtdAssentos;
        temArCondicionado.innerText = el.temArCondicionado === '0' ? "Não" : "Sim";
        temBanheiro.innerText = el.temBanheiro === '0' ? "Não" : "Sim";

        const alterar = document.createElement("td");
   
        alterar.innerHTML = `<a href="alterar.php?id=${el.id}" class="btn btn-primary">Alterar</a>`
        tr.appendChild(id);
        tr.appendChild(marca);
        tr.appendChild(modelo);
        tr.appendChild(placa);
        tr.appendChild(qtdAssentos);
        tr.appendChild(temArCondicionado);
        tr.appendChild(temBanheiro);
        tr.appendChild(alterar);
  

        tBody.appendChild(tr);
        
    });

    console.log(data);
}


const orders = document.querySelectorAll(".order");

orders.forEach(el => {
    el.addEventListener("click", () => {
        console.log(el.dataset.order);
        getOnibus(el.dataset.order)
    })
})