
    function pegarHorarios() {
        if ($("#disc").val() != -1 && $("#dia").val() != -1) {
            $.get("pegar_horarios.php", {
                diasemana: $("#dia").val(),
                disciplina: $("#disc").val()
            }).done(
                function (resposta) {
                    var resultado = JSON.parse(resposta);
                    var horaInicio = resultado[0];
                    var horaFim = resultado[1];
                    var qtdHoras = horaFim - horaInicio;
                    var x=0;
                    while(x < qtdHoras){
                        var option = document.createElement("option");
                        option.text = horaInicio + x + ":00";
                        option.value = horaInicio + x + ":00"; 
                        $("#selectHorarios").append(option);
                        x++;
                    }
                }
            )
        }
    }


