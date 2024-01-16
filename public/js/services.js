$(function () {
    $('#datatable').DataTable({
        language: {
            url: "/js/translate_pt-br.json"
        },
        paging: false
    });

    $('[data-toggle="switch"]').bootstrapSwitch();
    $('[data-toggle="tooltip"]').tooltip();

    $('#status').bootstrapToggle({
        on: 'Ativo',
        off: 'Inativo'
    });
    // Validando CPF
    $('#cpf').change(function() {
        let cpf = validarCPF($(this).val());
        if (cpf === false) {
            swal.fire({
                title: 'O CPF não é Válido!',
            });
            $(this).val("");
        }
    });

    $('#cpf_responsavel').change(function() {
        let cpf = validarCPF($(this).val());
        if (cpf === false) {
            swal.fire({
                title: 'O CPF não é Válido!',
            });
            $(this).val("");
        }
    });

    // Validando CNPJ
    $('#cnpj').change(function() {
        let cnpj = validarCNPJ($(this).val());
        if (cnpj === false)  {
            swal.fire({
                title: 'O CNPJ não é Válido!',
            });
            $(this).val("");
        }
    });

    // Reload de Imagem
    let files = document.querySelector('input[type="file"]');
    files.addEventListener("change", function(file){
        var input = file.target;
        let reader = new FileReader();
        reader.onload = function(){
            let dataURL = reader.result;
            let output = document.getElementById('fileArchive');
            output.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    });
});

// API ViaCEP -- Inicio --
function limparFormulario() {
    //Limpa valores do formulário de cep.
    document.getElementById('logradouro').value=("");
    document.getElementById('bairro').value=("");
    document.getElementById('localidade').value=("");
    document.getElementById('uf').value=("");
}

function callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('logradouro').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('localidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);
    }
    else {
        limparFormulario();
        swal.fire({
            title: 'CEP não encontrado',
        });
    }
}

function pesquisarCep(valor) {
    var cep = valor.replace(/\D/g, '');

    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if(validacep.test(cep)) {
            swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Buscando CEP...',
                showConfirmButton: false,
                timer: 1500
            })

            var script = document.createElement('script');

            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=callback';

            document.body.appendChild(script);
        }
        else {
            limparFormulario();
            swal.fire({
                title: 'Formato de CEP Inválido',
            });
        }
    }
    else {
        limparFormulario();
    }
};
// API ViaCEP -- Fim --

// GRÁFICO DE DESPESAS -- Inicio --
fetch('/grafico-despesas')
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    var labels = [];
    var valores = [];

    for (var key in data.datasets) {
      labels.push(data.datasets[key].dia_mes);
      valores.push(data.datasets[key].valor);
    }

    var ctx = document.getElementById('despesa').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: valores,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                pointRadius: 3,
                pointBackgroundColor: 'rgba(255, 99, 132, 1)',
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Despesas dos Últimos 30 Dias'
                }
            }
        }
    });
    chart.update();
  })
  .catch(function(error) {
    console.error(error);
  });
// GRÁFICO DE DESPESAS -- Fim --

// GRÁFICO DE RECEITAS -- Inicio --
fetch('/grafico-receitas')
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    var labels = [];
    var valores = [];

    for (var key in data.datasets) {
      labels.push(data.datasets[key].dia_mes);
      valores.push(data.datasets[key].valor);
    }

    var ctx = document.getElementById('receita').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                data: valores,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                pointRadius: 3,
                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Receitas dos Últimos 30 Dias'
                }
            }
        }
    });
    chart.update();
  })
  .catch(function(error) {
    console.error(error);
  });
// GRÁFICO DE RECEITAS -- Fim --

// GRÁFICO DE RECEITAS vs DESPESA -- Inicio --

fetch('/grafico-receita-despesa')
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    var periodo = [];
    var receitas = [];
    var despesas = [];

    for (var key in data.datasets) {
        periodo.push(data.datasets[key].mes);
        receitas.push(data.datasets[key].total_receita);
        despesas.push(data.datasets[key].total_despesa);
    }

    var ctx = document.getElementById('receita-despesa').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: periodo,
            datasets: [
            {
                label: 'Receitas',
                data: receitas,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                pointRadius: 3,
                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                fill: true
            },
            {
                label: 'Despesas',
                data: despesas,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                pointRadius: 3,
                pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                fill: true
            },
            ],
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [
                    {
                    ticks: {
                        beginAtZero: true,
                    },
                    },
                ],
            },
            plugins: {
                legend: {
                    display: true,
                }
            }
        }
    });
    chart.update();
  })
  .catch(function(error) {
    console.error(error);
  });
// GRÁFICO DE RECEITAS vs DESPESA-- Fim --

// GRÁFICO DE STATUS DE SERVIÇOS-- Inicio --

fetch('/grafico-servicos')
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    var status = [];
    var quantidade = [];

    for (var key in data.datasets) {
        status.push(data.datasets[key].nome_status);
        quantidade.push(data.datasets[key].quantidade);
    }

    var ctx = document.getElementById('servico').getContext('2d');
    var cores = ['rgba(54, 162, 235, 0.2)', 'rgba(0, 128, 0, 0.2)', 'rgba(255, 99, 132, 0.2)'];
    var border = ['rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'];
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: status,
            datasets: [
                {
                    data: quantidade,
                    backgroundColor: cores,
                    borderColor: border,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointBackgroundColor: border,
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                }
            }
        },
    });
    chart.update();
  })
  .catch(function(error) {
    console.error(error);
  });

// GRÁFICO DE STATUS DE SERVIÇOS-- Fim --

$('.isTelefone').mask('(00) 00000-0000');
$('.isCPF').mask('000.000.000-00');
$('.isCEP').mask('00000-000');
$('.isCNPJ').mask('00.000.000.0000/00');


function confirmarExclusao(registro) {
    const url = registro.getAttribute("data-rota");
    alertExclusao(url);
}

function alertExclusao(url) {
    swal.fire({
        title: 'Deseja excluir esse registro?',
        text: "O registro atualmente selecionado será excluído.",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function (success) {
        if (success.value === true) {
            window.location.href = url;
        }
    })
}

function validarCPF (cpf) {
    value = jQuery.trim(cpf);

    value = value.replace('.','');
    value = value.replace('.','');
    cpf = value.replace('-','');

    while(cpf.length < 11)
        cpf = "0"+ cpf;

    var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
    var a = [];
    var b = new Number;
    var c = 11;

    for (i=0; i<11; i++){
        a[i] = cpf.charAt(i);
        if (i < 9) b += (a[i] * --c);
    }

    if ((x = b % 11) < 2) {
        a[9] = 0
    } else {
        a[9] = 11-x
    }

    b = 0;
    c = 11;

    for (y=0; y<10; y++) b += (a[y] * c--);

    if ((x = b % 11) < 2) {
        a[10] = 0;
    } else {
        a[10] = 11-x;
    }

    var retorno = true;

    if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno = false;

    return retorno;
}

function validarCNPJ (cnpj) {
    var b = [ 6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2 ]
    var c = String(cnpj).replace(/[^\d]/g, '')

    if(c.length !== 14)
        return false

    if(/0{14}/.test(c))
        return false

    for (var i = 0, n = 0; i < 12; n += c[i] * b[++i]);
    if(c[12] != (((n %= 11) < 2) ? 0 : 11 - n))
        return false

    for (var i = 0, n = 0; i <= 12; n += c[i] * b[i++]);
    if(c[13] != (((n %= 11) < 2) ? 0 : 11 - n))
        return false

    return true
}

function generateRandomAlphaNumeric(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    const charactersLength = characters.length;

    for (let i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}

function generateRandomValue() {
    const length = 5; // comprimento da string alfanumérica aleatória
    const anoCorrente = new Date().getFullYear();
    const randomValue = generateRandomAlphaNumeric(length);
    document.getElementById('numero_orcamento').value = anoCorrente + randomValue;
}

function calcularOrcamento() {
    var quantidade = document.getElementById('quantidade').value;
    var valor_unitario = document.getElementById('valor_unitario').value;
    var total = quantidade * valor_unitario;
    document.getElementById('total').value = total;
}


