const linhas = document.querySelectorAll('tbody tr')


linhas.forEach((linha) => {
    const diferenca = linha.querySelector('.valueDifference');
    const valor = Number(diferenca.textContent);

    if (valor > 0) {
        linha.classList.add('bg-solid', 'theme-success');
    } else if (valor < 0) {
        linha.classList.add('bg-solid', 'theme-danger');
    }
});