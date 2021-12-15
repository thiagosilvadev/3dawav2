const incluirForm = document.querySelector("#incluirForm");
const feedback = document.querySelector("#feedback");


function criarOnibus(e) {
    e.preventDefault();
    console.log(e.target.elements);
    const {elements} = e.target;
    const data = {
        marca: elements.marca.value,
        modelo: elements.modelo.value,
        chassis: elements.chassis.value,
        placa: elements.placa.value,
        qtdAssentos: elements.qtdAssentos.value,
        temBanheiro: elements.temBanheiro.checked,
        temArCondicionado: elements.temArCondicionado.checked,

    };

        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);

            feedback.classList.add("d-inline");
            feedback.innerHTML = "Cadastro criado com successo"
          
          }
        };
        xhttp.open("GET", `php/incluir.php?marca=${data.marca}&modelo=${data.modelo}&chassis=${data.chassis}&placa=${data.placa}&qtdAssentos=${data.qtdAssentos}&temBanheiro=${data.temBanheiro ? '1' : '0'}&temArCondicionado=${data.temArCondicionado ? '1' : '0'}`);
        xhttp.send();

        // fetch("php/incluir.php", {
        //     method: "POST",
        //     headers: {
        //         "Content-Type": "application/json"
        //     },
        //     body: JSON.stringify(data)
        // }).then(res => res.json()).then(json => console.log(json))
      
}


incluirForm.addEventListener("submit", criarOnibus);