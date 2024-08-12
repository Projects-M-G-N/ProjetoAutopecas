const problemas = [
    ["", "Selecione o problema", ""],
    ["pneu.jpg", "Pneu", "R$ 199,99"],
    ["bomba_injetora.jpg", "Bomba Injetora", "R$ 399,99"],
    ["filtro-de-oleo.jpg", "Oleo", "R$ 100,00"],
    ["disco_de_freio.jpg", "Disco de Freio", "R$ 200,00"],
    ["retentores-de-cilindoros.jpg", "Retentores de cilindro", "R$ 300,00"],
];

let btn = document.getElementById("comprar");
let img = document.querySelector(".produto > img");
let nome = document.querySelector(".produto > .produto-content > h2");
let preco = document.querySelector(".price")
btn.disabled = true;

function verProduto(id) {
    if(id != 0) {
        btn.disabled = false;
    }
    img.src = "public/assets/img/" + problemas[id][0];
    nome.innerHTML = problemas[id][1];
    preco.innerHTML = problemas[id][2];
}

verProduto(0)