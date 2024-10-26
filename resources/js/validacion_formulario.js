document.addEventListener("DOMContentLoaded", () => {
    // 1.- Validar campo Razon Social
    const razonSocialInput = document.getElementById("razon_social");
    const errorRazonSocial = document.getElementById("error_razon_social");

    razonSocialInput.addEventListener("input", function () {
        const inputValue = razonSocialInput.value;
        if (inputValue.length > 50) {
            errorRazonSocial.textContent = "El campo razon social no debe contener más de 50 caracteres.";
            razonSocialInput.classList.add("is-invalid");

        } else if (inputValue.length <= 50) {
            errorRazonSocial.textContent = "";
            razonSocialInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputValue.trim() === '' || inputValue.touched()) {

            errorRazonSocial.textContent = "Este campo es requerido";
            razonSocialInput.classList.add("is-invalid");
        }

    });


    razonSocialInput.addEventListener("blur", function () {
        const inputValue = razonSocialInput.value;
        if (inputValue.trim() === '') {
            errorRazonSocial.textContent = "Este campo es requerido";
            razonSocialInput.classList.add("is-invalid");
        }
    });
    // FIN Validar campo Razon Social

    // 1.- Validar campo Nro. Nim
    const nimInput = document.getElementById("nro_nim");
    const errorNim = document.getElementById("error_nro_nim");

    nimInput.addEventListener("input", function () {
        const inputNimValue = nimInput.value;
        if (inputNimValue.length > 15) {
            errorNim.textContent = "El campo Nro. Nim no debe contener más de 15 caracteres.";
            nimInput.classList.add("is-invalid");

        } else if (inputNimValue.length <= 15) {
            errorNim.textContent = "";
            nimInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputNimValue.trim() === '' || inputNimValue.touched()) {

            errorNim.textContent = "Este campo es requerido";
            nimInput.classList.add("is-invalid");
        }

    });


    nimInput.addEventListener("blur", function () {
        const inputNimValue = nimInput.value;
        if (inputNimValue.trim() === '') {
            errorNim.textContent = "Este campo es requerido";
            nimInput.classList.add("is-invalid");
        }
    });
    // FIN Validar Nro. Nim

    // 1.- Validar campo Nro. Nit
    const nitInput = document.getElementById("nro_nit");
    const errorNit = document.getElementById("error_nro_nit");

    nitInput.addEventListener("input", function () {
        const inputNitValue = nitInput.value;
        if (inputNitValue.length > 15) {
            errorNit.textContent = "El campo Nro. Nit no debe contener más de 15 caracteres.";
            nitInput.classList.add("is-invalid");

        } else if (inputNitValue.length <= 15) {
            errorNit.textContent = "";
            nitInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputNitValue.trim() === '' || inputNitValue.touched()) {

            errorNit.textContent = "Este campo es requerido";
            nitInput.classList.add("is-invalid");
        }

    });


    nitInput.addEventListener("blur", function () {
        const inputNitValue = nitInput.value;
        if (inputNitValue.trim() === '') {
            errorNit.textContent = "Este campo es requerido";
            nitInput.classList.add("is-invalid");
        }
    });
    // FIN Validar Nro. Nit

    // 1.- Validar campo RUIM
    const ruimInput = document.getElementById("ruim");
    const errorRuim = document.getElementById("error_ruim");

    ruimInput.addEventListener("input", function () {
        const inputRuimValue = ruimInput.value;
        if (inputRuimValue.length > 15) {
            errorRuim.textContent = "El campo Ruim no debe contener más de 15 caracteres.";
            ruimInput.classList.add("is-invalid");

        } else if (inputRuimValue.length <= 15) {
            errorRuim.textContent = "";
            ruimInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputRuimValue.trim() === '' || inputRuimValue.touched()) {

            errorRuim.textContent = "Este campo es requerido";
            ruimInput.classList.add("is-invalid");
        }

    });


    ruimInput.addEventListener("blur", function () {
        const inputRuimValue = ruimInput.value;
        if (inputRuimValue.trim() === '') {
            errorRuim.textContent = "Este campo es requerido";
            ruimInput.classList.add("is-invalid");
        }
    });
    // FIN Validar RUIM

    // 1.- Validar campo Reg. partida
    const partidaInput = document.getElementById("partida");
    const errorPartida = document.getElementById("error_partida");

    partidaInput.addEventListener("input", function () {
        const inputPartidaValue = partidaInput.value;
        if (inputPartidaValue.length > 15) {
            errorPartida.textContent = "El campo Reg. Partida no debe contener más de 15 caracteres.";
            partidaInput.classList.add("is-invalid");

        } else if (inputPartidaValue.length <= 15) {
            errorPartida.textContent = "";
            partidaInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputPartidaValue.trim() === '' || inputPartidaValue.touched()) {

            errorPartida.textContent = "Este campo es requerido";
            partidaInput.classList.add("is-invalid");
        }

    });

    partidaInput.addEventListener("blur", function () {
        const inputPartidaValue = partidaInput.value;
        if (inputPartidaValue.trim() === '') {
            errorPartida.textContent = "Este campo es requerido";
            partidaInput.classList.add("is-invalid");
        }
    });
    // FIN Validar Partida

    // 1.- Validar campo Reg. Nro Lote
    const loteInput = document.getElementById("nro_lote");
    const errorLote = document.getElementById("error_nro_lote");

    loteInput.addEventListener("input", function () {
        const inputLoteValue = loteInput.value;
        if (inputLoteValue.length > 15) {
            errorLote.textContent = "El campo Nro. Lote no debe contener más de 15 caracteres.";
            loteInput.classList.add("is-invalid");

        } else if (inputLoteValue.length <= 15) {
            errorLote.textContent = "";
            loteInput.classList.remove("is-invalid");

        }

    });
    // FIN Validar Nro Lote

    // 1.- Validar Reg. Cert. quimico
    const quimicoInput = document.getElementById("quimico");
    const errorQuimico = document.getElementById("error_quimico");

    quimicoInput.addEventListener("input", function () {
        const inputQuimicoValue = quimicoInput.value;
        if (inputQuimicoValue.length > 15) {
            errorQuimico.textContent = "El campo Nro. Lote no debe contener más de 15 caracteres.";
            quimicoInput.classList.add("is-invalid");

        } else if (inputQuimicoValue.length <= 15) {
            errorQuimico.textContent = "";
            quimicoInput.classList.remove("is-invalid");
        }
    });
    // FIN Validar Cert. quimico


    // 1.- Validar campo Peso Bruto
    const brutoInput = document.getElementById("bruto");
    const errorBruto = document.getElementById("error_bruto");

    brutoInput.addEventListener("input", function () {
        const inputBrutoValue = brutoInput.value;
        if (inputBrutoValue.length > 10) {
            errorBruto.textContent = "El campo Peso Bruto no debe contener más de 10 caracteres.";
            brutoInput.classList.add("is-invalid");

        } else if (inputBrutoValue.length <= 10) {
            errorBruto.textContent = "";
            brutoInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputBrutoValue.trim() === '' || inputBrutoValue.touched()) {

            errorBruto.textContent = "Este campo es requerido";
            brutoInput.classList.add("is-invalid");
        }

    });

    brutoInput.addEventListener("blur", function () {
        const inputBrutoValue = brutoInput.value;
        if (inputBrutoValue.trim() === '') {
            errorBruto.textContent = "Este campo es requerido";
            brutoInput.classList.add("is-invalid");
        }
    });
    // FIN Validar Peso Bruto

    // 1.- Validar campo Peso Neto
    const netoInput = document.getElementById("neto");
    const errorNeto = document.getElementById("error_neto");

    netoInput.addEventListener("input", function () {
        const inputNetoValue = netoInput.value;
        if (inputNetoValue.length > 10) {
            errorNeto.textContent = "El campo Peso Neto no debe contener más de 10 caracteres.";
            netoInput.classList.add("is-invalid");

        } else if (inputNetoValue.length <= 10) {
            errorNeto.textContent = "";
            netoInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputNetoValue.trim() === '' || inputNetoValue.touched()) {

            errorNeto.textContent = "Este campo es requerido";
            netoInput.classList.add("is-invalid");
        }

    });

    netoInput.addEventListener("blur", function () {
        const inputNetoValue = netoInput.value;
        if (inputNetoValue.trim() === '') {
            errorNeto.textContent = "Este campo es requerido";
            netoInput.classList.add("is-invalid");
        }
    });
    // FIN Validar Peso Neto

    // 1.- Validar campo Tara
    const taraInput = document.getElementById("tara");
    const errorTara = document.getElementById("error_tara");

    taraInput.addEventListener("input", function () {
        const inputTaraValue = taraInput.value;
        if (inputTaraValue.length > 10) {
            errorTara.textContent = "El campo Tara no debe contener más de 10 caracteres.";
            taraInput.classList.add("is-invalid");

        } else if (inputTaraValue.length <= 10) {
            errorTara.textContent = "";
            taraInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputTaraValue.trim() === '' || inputTaraValue.touched()) {

            errorTara.textContent = "Este campo es requerido";
            taraInput.classList.add("is-invalid");
        }

    });

    taraInput.addEventListener("blur", function () {
        const inputTaraValue = taraInput.value;
        if (inputTaraValue.trim() === '') {
            errorTara.textContent = "Este campo es requerido";
            taraInput.classList.add("is-invalid");
        }
    });
    // FIN Validar Tara

    // 1.- Validar  merma hum
    const mermaInput = document.getElementById("merma");
    const mermaQuimico = document.getElementById("error_merma");

    mermaInput.addEventListener("input", function () {
        const inputMermaValue = mermaInput.value;
        if (inputMermaValue.length > 10) {
            mermaQuimico.textContent = "El campo Hum. Merma no debe contener más de 10 caracteres.";
            mermaInput.classList.add("is-invalid");

        } else if (inputMermaValue.length <= 10) {
            mermaQuimico.textContent = "";
            mermaInput.classList.remove("is-invalid");
        }
    });
    // FIN Validar merma hum


    // 1.- Validar campo Origen
    const origenInput = document.getElementById("origen");
    const errorOrigen = document.getElementById("error_origen");

    origenInput.addEventListener("input", function () {
        const inputOrigenValue = origenInput.value;
        if (inputOrigenValue.length > 13) {
            errorOrigen.textContent = "El campo Origen no debe contener más de 13 caracteres.";
            origenInput.classList.add("is-invalid");

        } else if (inputOrigenValue.length <= 13) {
            errorOrigen.textContent = "";
            origenInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputOrigenValue.trim() === '' || inputOrigenValue.touched()) {

            errorOrigen.textContent = "Este campo es requerido";
            origenInput.classList.add("is-invalid");
        }

    });

    origenInput.addEventListener("blur", function () {
        const inputOrigenValue = origenInput.value;
        if (inputOrigenValue.trim() === '') {
            errorOrigen.textContent = "Este campo es requerido";
            origenInput.classList.add("is-invalid");
        }
    });
    // FIN Validar Origen


    // 1.- Validar campo destino
    const destinoInput = document.getElementById("destino");
    const errorDestino = document.getElementById("error_destino");

    destinoInput.addEventListener("input", function () {
        const inputDestinoValue = destinoInput.value;
        if (inputDestinoValue.length > 13) {
            errorDestino.textContent = "El campo Destino no debe contener más de 13 caracteres.";
            destinoInput.classList.add("is-invalid");

        } else if (inputDestinoValue.length <= 13) {
            errorDestino.textContent = "";
            destinoInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputDestinoValue.trim() === '' || inputDestinoValue.touched()) {

            errorDestino.textContent = "Este campo es requerido";
            destinoInput.classList.add("is-invalid");
        }

    });

    destinoInput.addEventListener("blur", function () {
        const inputDestinoValue = destinoInput.value;
        if (inputDestinoValue.trim() === '') {
            errorDestino.textContent = "Este campo es requerido";
            destinoInput.classList.add("is-invalid");
        }
    });
    // FIN Validar destino

    // 1.- Validar campo comercializadora
    const comercializadoraInput = document.getElementById("comercializadora");
    const errorComercializadora = document.getElementById("error_comercializadora");

    comercializadoraInput.addEventListener("input", function () {
        const inputComercializadoraValue = comercializadoraInput.value;
        if (inputComercializadoraValue.length > 16) {
            errorComercializadora.textContent = "El campo Comercializadora no debe contener más de 16 caracteres.";
            comercializadoraInput.classList.add("is-invalid");

        } else if (inputComercializadoraValue.length <= 16) {
            errorComercializadora.textContent = "";
            comercializadoraInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputComercializadoraValue.trim() === '' || inputComercializadoraValue.touched()) {

            errorComercializadora.textContent = "Este campo es requerido";
            comercializadoraInput.classList.add("is-invalid");
        }

    });

    comercializadoraInput.addEventListener("blur", function () {
        const inputComercializadoraValue = comercializadoraInput.value;
        if (inputComercializadoraValue.trim() === '') {
            errorComercializadora.textContent = "Este campo es requerido";
            comercializadoraInput.classList.add("is-invalid");
        }
    });
    // FIN Validar Alicuota

    // 1.- Validar campo comercializadora
    const alicuotaInput = document.getElementById("alicuota");
    const errorAlicuota = document.getElementById("error_alicuota");

    alicuotaInput.addEventListener("input", function () {
        const inputAlicuotaValue = alicuotaInput.value;
        if (inputAlicuotaValue.length > 10) {
            errorAlicuota.textContent = "El campo Alicuota no debe contener más de 10 caracteres.";
            alicuotaInput.classList.add("is-invalid");

        } else if (inputAlicuotaValue.length <= 10) {
            errorAlicuota.textContent = "";
            alicuotaInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputAlicuotaValue.trim() === '' || inputAlicuotaValue.touched()) {

            errorAlicuota.textContent = "Este campo es requerido";
            alicuotaInput.classList.add("is-invalid");
        }

    });

    alicuotaInput.addEventListener("blur", function () {
        const inputAlicuotaValue = alicuotaInput.value;
        if (inputAlicuotaValue.trim() === '') {
            errorAlicuota.textContent = "Este campo es requerido";
            alicuotaInput.classList.add("is-invalid");
        }
    });
    // FIN Validar Alicuota

    // 1.- Validar campo chofer
    const choferInput = document.getElementById("chofer");
    const errorChofer = document.getElementById("error_chofer");

    choferInput.addEventListener("input", function () {
        const inputChoferValue = choferInput.value;
        if (inputChoferValue.length > 20) {
            errorChofer.textContent = "El campo Chofer no debe contener más de 20 caracteres.";
            choferInput.classList.add("is-invalid");

        } else if (inputChoferValue.length <= 20) {
            errorChofer.textContent = "";
            choferInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputChoferValue.trim() === '' || inputChoferValue.touched()) {
            errorChofer.textContent = "Este campo es requerido";
            choferInput.classList.add("is-invalid");
        }

    });

    choferInput.addEventListener("blur", function () {
        const inputChoferValue = choferInput.value;
        if (inputChoferValue.trim() === '') {
            errorChofer.textContent = "Este campo es requerido";
            choferInput.classList.add("is-invalid");
        }
    });
    // FIN Validar Chofer


    // 1.- Validar campo placa
    const placaInput = document.getElementById("placa");
    const errorPlaca = document.getElementById("error_placa");

    placaInput.addEventListener("input", function () {
        const inputPlacaValue = placaInput.value;
        if (inputPlacaValue.length > 15) {
            errorPlaca.textContent = "El campo Placa no debe contener más de 15 caracteres.";
            placaInput.classList.add("is-invalid");

        } else if (inputPlacaValue.length <= 15) {
            errorPlaca.textContent = "";
            placaInput.classList.remove("is-invalid");

        }
        // Verifica que el campo sea vacio
        if (inputPlacaValue.trim() === '' || inputPlacaValue.touched()) {
            errorPlaca.textContent = "Este campo es requerido";
            placaInput.classList.add("is-invalid");
        }

    });

    placaInput.addEventListener("blur", function () {
        const inputPlacaValue = placaInput.value;
        if (inputPlacaValue.trim() === '') {
            errorPlaca.textContent = "Este campo es requerido";
            placaInput.classList.add("is-invalid");
        }
    });
    // FIN Validar placa


    // 1.- Validar  Emisiones
    const emisionInput = document.getElementById("fecha_emision");
    const emisionError = document.getElementById("error_fecha_emision");

    emisionInput.addEventListener("blur", function () {
        const inputEmisionValue = emisionInput.value;
        if (inputEmisionValue.trim() === '') {
            emisionError.textContent = "Este campo es requerido";
            emisionInput.classList.add("is-invalid");
        } else {
            emisionError.textContent = "";
            emisionInput.classList.remove("is-invalid");
        }
    });
    // FIN Validar Emisiones



    // 1.- Validar  Observaciones
    const observacionesInput = document.getElementById("observaciones");
    const observacionesQuimico = document.getElementById("error_observaciones");

    observacionesInput.addEventListener("input", function () {
        const inputObservacionesValue = observacionesInput.value;
        if (inputObservacionesValue.length > 115) {
            observacionesQuimico.textContent = "El campo Observaciones no debe contener más de 115 caracteres.";
            observacionesInput.classList.add("is-invalid");

        } else if (inputObservacionesValue.length <= 115) {
            observacionesQuimico.textContent = "";
            observacionesInput.classList.remove("is-invalid");
        }
    });
    // FIN Validar Observaciones



});
