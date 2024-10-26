<!-- Css con metodologia BEM para PDF  -->
<style>
    /* Reset table */
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    table,
    th,
    td {
        padding: 0;
        margin: 0;
    }

    tr {
        border: none;
    }

    /* Fin Reset table */

    /* Globales */
    h1 {
        margin-top: 0px;
        margin-bottom: 0px;
    }

    p {
        /* margin-top: 0px; */
        margin-bottom: 0px;
    }

    .subtitulos {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .subs {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        margin-top: 0px;
        margin-left: 5px;
        margin-right: 5px;
    }

    .subs-respuesta {
        font-size: 11px;
        font-weight: lighter;
        text-transform: uppercase;
        text-align: center;
        margin-top: 0px;
    }

    .borde-top {
        border-top: 1px solid rgb(193, 193, 194);
    }

    .borde-botton {
        border-bottom: 1px solid rgb(193, 193, 194);
    }

    .borde-star {
        border-left: 1px solid rgb(193, 193, 194);
    }

    .borde-end {
        border-right: 1px solid rgb(193, 193, 194);
    }

    .borde {
        border: 1px solid rgb(193, 193, 194);
    }

    .border {
        border: 1px solid greenyellow;
    }

    .border2 {
        border: 1px solid black;
    }

    .numeracion-form {
        font-size: 13px;
    }

    /* Fin Globales */

    /* Bloque 1 */
    .img-escudo {
        width: 140px;
    }

    .img-logo {
        width: 140px;
    }

    .titulo-cabecera {

        text-align: center;
        text-transform: uppercase;
        font-size: 12px;
    }

    .line-borde {

        border-top: 1px solid rgb(193, 193, 194);

    }

    .margen-linea {
        margin-top: 20px;
    }

    /* Fin Bloque 1 */


    /* Bloque 2 */
    .bloque {
        margin-top: 10px;
    }

    .titulo__principal {
        text-transform: uppercase;
        text-align: center;
        font-size: 14px;
    }

    .titulo__secundario {
        text-transform: uppercase;
        text-align: center;
        font-size: 11px;
        margin-top: 4px;
        margin-bottom: 5px;
    }

    .nro-formulario {
        text-align: center;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .numero-formulario {
        margin-top: 0px;
        text-align: center;
        color: red;
        font-size: 20px;
        line-height: 20px;
    }

    /* FIN Bloque 2 */

    /* Bloque 3 */
    /* .subs-respuesta--text {
        font-size: 13px;
    } */

    /* FIN Bloque 3 */

    /* Bloque 4 */
    .subs-onza {
        font-size: 10px;
        font-weight: 700;
        margin-top: 0px;
    }

    .th-metales th {
        font-size: 10px;
        font-weight: 700;
        border: 1px solid rgb(193, 193, 194);
        border-top: none;
        padding-top: 1px;
        padding-bottom: 1px;
        /* Elimina el borde superior predeterminado */
        /* Borde personalizado (rojo) */
    }

    .th-metales th:nth-child(1) {
        border-left: none;
    }

    .td-metales td {
        font-size: 13px;
        padding: 0px !important;
        margin: 0px !important;
        border: 1px solid rgb(193, 193, 194);
        border-bottom: none;
    }

    .td-metales td:nth-child(1) {
        border-left: none;
    }

    .subs-respuesta--alto {
        padding-top: 8.7px;
        padding-bottom: 8.7px;
    }

    /* FIN Bloque 4 */

    /* Bloque 5 */
    .th-nometales th {
        font-size: 10px;
        font-weight: 700;
        border: 1px solid rgb(193, 193, 194);
        border-top: none;
        padding-top: 1px;
        padding-bottom: 1px;
        padding-left: 2px;
        padding-right: 2px;
        /* Elimina el borde superior predeterminado */
        /* Borde personalizado (rojo) */
    }

    .th-nometales th:nth-child(1) {
        border-left: none;
        padding-left: 0px;
        padding-right: 0px;
    }

    .td-nometales td {
        font-size: 13px;
        padding: 0px !important;
        margin: 0px !important;
        border: 1px solid rgb(193, 193, 194);
        border-bottom: none;
    }

    .td-nometales td:nth-child(1) {
        border-left: none;
    }

    /* FIN Bloque 5 */

    /* Bloque 6 */
    .subs-merma {
        margin-left: 0px;
        margin-right: 0px;
    }

    /* FIN Bloque 6 */

    /* Bloque 7 */

    /* FIN Bloque 7 */

    /* Bloque 8 */
    .transportes {
        font-size: 11px;
        font-weight: lighter;
        margin-top: 0px;
    }

    /* FIN Bloque 8 */
</style>

<!-- ************************HTML************************** -->

<!-- Bloque 1 imagenes y titulo de la gobernacion -->
<table>
    <tbody>
        <tr>
            <td style="width: 145px;">
                <div class="escudo">
                    <img class="img-logo" src="dashboard/img/logo-gadc.jpg" alt="Escudo gobernación">
                </div>
            </td>
            <td style="width: 430px;">
                <p class="titulo-cabecera">Gobierno autónomo departamental de cochabamba <br>secretaria departamental de mineria e hidrocarburos</p>
            </td>
            <td style="width: 145px;">
                <div class="logo">
                    <img class="img-logo" src="dashboard/img/logo-gadc.png" alt="Logo gobernación">
                </div>
            </td>
        </tr>
    </tbody>
</table>

<!-- FIN Bloque 1 imagenes y titulo de la gobernacion -->

<div class="line-borde margen-linea"></div>

<!-- Bloque 2 Razón Social -->
<table class="bloque">
    <tbody>
        <tr>
            <!-- Formulario 101 y Razón social -->
            <td style="width: 580px;" class="">
                <table>
                    <tbody>
                        <tr>
                            <td style="width: 580px;" class="titulo">
                                <h1 class="titulo__principal">Formulario 101</h1>
                                <p class="titulo__secundario">Para el control fiscalización de la regalia minera y autorización de salida de mineral</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 580px;" class="borde-star borde-top borde-botton">
                                <table>
                                    <tbody>
                                        <tr>
                                            <!-- Col-numeración -->
                                            <td style="width: 22px;" class="">
                                                <table>
                                                    <tbody>
                                                        <!-- Numeración 1 -->
                                                        <tr>
                                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde-end borde-botton">
                                                                <span class="numeracion-form">1</span>
                                                            </td>
                                                        </tr>
                                                        <!-- Vacio -->
                                                        <tr>
                                                            <td style="height: 14px;"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <!-- Col-razón-social -->
                                            <td style="width: 145px;" class="">
                                                <p class="subs">Razón social</p>
                                                <p class="subs">y/o nombre completo</p>
                                            </td>
                                            <td style="width: 413px;" class="">
                                                <p class="subs-respuesta">{{ $formulario->razon_social }}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <!--Nro. de formulario  -->
            <td style="width: 140px;" class="">
                <table>
                    <tbody>
                        <tr>
                            <td style="width: 140px;" class="borde">
                                <p class="nro-formulario subtitulos">Nro. Formulario</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 140px; height: 40px;" class="borde-star borde-end borde-botton">
                                <p class="numero-formulario">{{ $formulario->nro_formulario }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<!-- FIN Bloque 2 Razón Social -->

<!-- Bloque 3 Número Nim -->
<table class="bloque">
    <tbody>
        <tr>
            <td style="width: 720px;" class="bloque">
                <table>
                    <tbody>
                        <tr>
                            <!-- Número NIM -->
                            <td style="width: 155px;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="padding-left: 5px; padding-right: 5px;" class="borde">
                                                <span class="numeracion-form">2</span>
                                            </td>
                                            <!-- Número NIM -->
                                            <td style="width: 145px;" class="borde-botton borde-top borde-end">
                                                <p class="subs" style="text-align: center;">Número de Nim</p>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-botton borde-star borde-end">
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->nro_nim }}</p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <td style="width: 30px;" class=""></td>
                            <!-- Número de NIT -->
                            <td style="width: 155px;" class="">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde">
                                                <span class="numeracion-form">3</span>
                                            </td>
                                            <!-- Número NIM -->
                                            <td style="width: 145px;" class="borde-botton borde-top borde-end">
                                                <p class="subs" style="text-align: center;">Número de Nit</p>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-botton borde-star borde-end">
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->nro_nit }}</p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <td style="width: 30px;" class=""></td>
                            <!-- Número de RUIM -->
                            <td style="width: 148px;" class="">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde">
                                                <span class="numeracion-form">4</span>
                                            </td>
                                            <!-- Número NIM -->
                                            <td style="width: 148px;" class="borde-botton borde-top borde-end">
                                                <p class="subs" style="text-align: center;">Ruim</p>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-botton borde-star borde-end">
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->ruim }}</p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <!-- Número de Reg. partida -->
                            <td style="width: 155px;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde-end borde-botton borde-top">
                                                <span class="numeracion-form">5</span>
                                            </td>
                                            <!-- Número NIM -->
                                            <td style="width: 148px;" class="borde-top borde-botton borde-end">
                                                <p class="subs" style="text-align: center;">Reg. partida</p>
                                            </td>
                                        </tr>

                                        <tr class="tr-2">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-end borde-botton">
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->reg_partida }}</p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<!-- FIN Bloque 3 Número Nim -->

<!-- Bloque 4 Mineral Metalico -->
<table class="bloque">
    <tbody>
        <tr>
            <td style="width: 720px;" class="bloque">
                <table>
                    <tbody>
                        <tr>
                            <!-- Mineral metalico -->
                            <td style="width: 537px;" class="">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde-star borde-top borde-end">
                                                <span class="numeracion-form">6</span>
                                            </td>
                                            <!-- Número NIM -->
                                            <td style="width: 537px;" class=" borde-top borde-end">
                                                <p class="subs" style="text-align: left;">Mineral metálico(O<span style="text-transform: lowercase;">nza</span> T<span style="text-transform: lowercase;">roy</span>-DM-%)</p>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde">
                                                <table class="">
                                                    <thead>
                                                        <tr class="th-metales">
                                                            <th style="width: 50px; text-transform: uppercase;">Tipo</th>
                                                            @if($metalico_array[0] != '')
                                                            @foreach ($metalico_array as $metal)
                                                            <th style="width: 26px;">{{ $metal }}</th>
                                                            @endforeach
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="td-metales">
                                                            <!-- Aqui pinta los minerales metalicos escogidos de la lista de metales -->
                                                            <td style="text-align: center; color: white;"> .</td>
                                                            @if($metalico_array[0] != '')
                                                            @foreach ($metalico_array as $metal)
                                                            <td style="text-align: center;">x</td>
                                                            @endforeach
                                                            @endif
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>

                            <!-- Número de lote -->
                            <td style="width: 155px;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde-end borde-botton borde-top">
                                                <span class="numeracion-form">7</span>
                                            </td>
                                            <!-- Número NIM -->
                                            <td style="width: 148px;" class="borde-top borde-botton borde-end">
                                                <p class="subs" style="text-align: center;">Nro. de Lote</p>
                                            </td>
                                        </tr>

                                        <tr class="tr-2">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-end borde-botton">

                                                @if(is_null($formulario->nro_lote) || $formulario->nro_lote == '')
                                                <p class="subs-respuesta subs-respuesta--text subs-respuesta--alto" style="color: white;">.</p>
                                                @else
                                                <p class="subs-respuesta subs-respuesta--text subs-respuesta--alto">{{ $formulario->nro_lote }}</p>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<!-- Bloque 4 -->

<!-- Bloque 5 -->
<table class="bloque">
    <tbody>
        <tr>
            <td style="width: 720px;" class="bloque">
                <table>
                    <tbody>
                        <tr>

                            <!-- Mineral metalico -->
                            <td style="width: 537px;" class="">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde-star borde-top borde-end">
                                                <span class="numeracion-form">8</span>
                                            </td>
                                            <!-- Número NIM -->
                                            <td style="width: 537px;" class=" borde-top borde-end">
                                                <p class="subs" style="text-align: left;">Mineral metálico(O<span style="text-transform: lowercase;">nza</span> T<span style="text-transform: lowercase;">roy</span>-DM-%)</p>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde">
                                                <table class="">
                                                    <thead>
                                                        <tr class="th-nometales">

                                                            <th style="width: 50px; text-transform: uppercase;">Tipo</th>

                                                            @if($nometalico_array[0] != '')
                                                            @foreach ($nometalico_array as $nometal)
                                                            <th style="width: 26px;">{{ $nometal }}</th>
                                                            @endforeach
                                                            @endif

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="td-nometales">

                                                            <td style="text-align: center; color: white;"> .</td>
                                                            @if($nometalico_array[0] != '')
                                                            @foreach ($nometalico_array as $nometal)
                                                            <td style="text-align: center;">x</td>
                                                            @endforeach
                                                            @endif

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>

                            <!-- Certificado a quimico -->
                            <td style="width: 155px;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde-end borde-botton borde-top">
                                                <span class="numeracion-form">9</span>
                                            </td>
                                            <!-- Número NIM -->
                                            <td style="width: 148px;" class="borde-top borde-botton borde-end">
                                                <p class="subs" style="text-align: center;">Cert. a. Químico</p>
                                            </td>
                                        </tr>

                                        <tr class="tr-2">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-end borde-botton">

                                                @if(is_null($formulario->cert_analisis_quimico) || $formulario->cert_analisis_quimico == '')
                                                <p class="subs-respuesta subs-respuesta--text subs-respuesta--alto" style="color: white;">.</p>
                                                @else
                                                <p class="subs-respuesta subs-respuesta--text subs-respuesta--alto">{{ $formulario->cert_analisis_quimico }}</p>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<!-- FIN Bloque 5 -->

<!-- Bloque 6 -->
<table class="bloque">
    <tbody>
        <tr>
            <td style="width: 720px;" class="bloque">
                <table>
                    <tbody>
                        <tr>
                            <!-- Peso bruto -->
                            <td style="width: 155px;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="padding-left: 5px; padding-right: 5px;" class="borde">
                                                <span class="numeracion-form">10</span>
                                            </td>
                                            <!-- Peso bruto -->
                                            <td style="width: 133px;" class="borde-botton borde-top borde-end">
                                                <p class="subs" style="text-align: center;">Peso Bruto <span style="text-transform: capitalize;">{{ $formulario->unidad }}</span> </p>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-botton borde-star borde-end">
                                                <!-- <p class="subs-respuesta subs-respuesta--text">{{ $formulario->peso_bruto_kg }}</p> -->

                                                @if(is_null($formulario->peso_bruto_kg) || $formulario->peso_bruto_kg == '')
                                                <p class="subs-respuesta subs-respuesta--text " style="color: white;">.</p>
                                                @else
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->peso_bruto_kg }}</p>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <td style="width: 30px;" class=""></td>
                            <!-- Peso neto -->
                            <td style="width: 155px;" class="">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde">
                                                <span class="numeracion-form">11</span>
                                            </td>
                                            <!-- Peso neto -->
                                            <td style="width: 120px;" class="borde-botton borde-top borde-end">
                                                <p class="subs" style="text-align: center;">Peso Neto <span style="text-transform: capitalize;">{{ $formulario->unidad }}</span> </p>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-botton borde-star borde-end">

                                                @if(is_null($formulario->peso_neto_kg) || $formulario->peso_neto_kg == '')
                                                <p class="subs-respuesta subs-respuesta--text " style="color: white;">.</p>
                                                @else
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->peso_neto_kg }}</p>
                                                @endif

                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <td style="width: 23px;" class=""></td>
                            <!-- Tara kg -->
                            <td style="width: 155px;" class="">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde">
                                                <span class="numeracion-form">12</span>
                                            </td>
                                            <!-- Tara kg -->
                                            <td style="width: 163.7px;" class="borde-botton borde-top borde-end">
                                                <p class="subs" style="text-align: center;">Tara <span style="text-transform: capitalize;">{{ $formulario->unidad }}</span> </p>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-botton borde-star borde-end">
                                                @if(is_null($formulario->tara_kg) || $formulario->tara_kg == '')
                                                <p class="subs-respuesta subs-respuesta--text " style="color: white;">.</p>
                                                @else
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->tara_kg }}</p>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <!-- Hum. merma -->
                            <td style="width: 155px;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde-end borde-botton borde-top">
                                                <span class="numeracion-form">13</span>
                                            </td>
                                            <!-- Hum merma -->
                                            <td style="width: 141.3px;" class="borde-top borde-botton borde-end">
                                                <p class="subs subs-merma" style="text-align: center;">Hum.merma(%)env.(<span style="text-transform: capitalize;">{{ $formulario->unidad }}</span>)</p>
                                            </td>
                                        </tr>

                                        <tr class="tr-2">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-end borde-botton">
                                                @if(is_null($formulario->hum_merma ) || $formulario->hum_merma == '')
                                                <p class="subs-respuesta subs-respuesta--text" style="color: white;">.</p>
                                                @else
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->hum_merma }}</p>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<!-- FIN Bloque 6 -->

<!-- Bloque 7 -->
<table class="bloque">
    <tbody>
        <tr>
            <td style="width: 720px;" class="bloque">
                <table>
                    <tbody>
                        <tr>
                            <!-- Codigo -->
                            <td style="width: 50px;" class="">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde">
                                                <span class="numeracion-form">14</span>
                                            </td>
                                            <!-- Tara kg -->
                                            <td style="width: 50px;" class="borde-botton borde-top borde-end">
                                                <p class="subs" style="text-align: center;">Codigo</p>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-botton borde-star borde-end">
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->codigo }}</p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <!-- Municipio -->
                            <td style="width: 140px;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <!-- Hum merma -->
                                            <td style="width: 140px; padding-top: 3.5px; padding-bottom: 3.5px;" class="borde-top borde-botton borde-end">
                                                <p class="subs subs-merma" style="text-align: center;">Municipio productor</p>
                                            </td>
                                        </tr>

                                        <tr class="tr-2">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-botton">
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->municipio }}</p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>

                            <!-- Origen -->
                            <td style="width: 90px;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde-star borde-end borde-botton borde-top">
                                                <span class="numeracion-form">15</span>
                                            </td>
                                            <!-- Origen -->
                                            <td style="width: 90px;" class="borde-top borde-botton borde-end">
                                                <p class="subs subs-merma" style="text-align: center;">Origen</p>
                                            </td>
                                        </tr>

                                        <tr class="tr-2">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-star borde-end borde-botton">
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->origen }}</p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>

                            <!-- Destino -->
                            <td style="width: 110px;">
                                <table>
                                    <tbody>

                                        <tr>

                                            <!-- destino -->
                                            <td style="width: 110px; padding-top: 3.5px; padding-bottom: 3.5px;" class="borde-botton borde-top borde-end">
                                                <p class="subs subs-merma" style="text-align: center;">Destino</p>
                                            </td>
                                        </tr>

                                        <tr class="tr-2">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-botton">
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->destino }}</p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <!-- Comercializadora -->
                            <td style="width: 140px;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <!-- Comercializadora -->
                                            <td style="width: 148.7px; padding-top: 3.5px; padding-bottom: 3.5px;" class="borde-star borde-top borde-botton">
                                                <p class="subs subs-merma" style="text-align: center;"><span>
                                                        @if($formulario->comercio=='Externo')
                                                        Comer./Comprador
                                                        @else
                                                        Comercializadora
                                                        @endif
                                                    </span></p>
                                            </td>
                                        </tr>

                                        <tr class="tr-2">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-star borde-botton">
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->comercializadora }}</p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                            <!-- Alicuota -->
                            <td style="width: 102.5px;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="height: 10px; padding-left: 5px; padding-right: 5px;" class="borde-star borde-end borde-botton borde-top">
                                                <span class="numeracion-form">16</span>
                                            </td>
                                            <!-- Alicuota -->
                                            <td style="width: 102.5px;" class="borde-top borde-botton borde-end">
                                                <p class="subs subs-merma" style="text-align: center;">Alicuota</p>
                                            </td>
                                        </tr>

                                        <tr class="tr-2">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-star borde-end borde-botton">
                                                <p class="subs-respuesta subs-respuesta--text">{{ $formulario->alicuota }}</p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<!-- FIN Bloque 7 -->

<!-- bloque 8 -->
<table class="bloque">
    <tbody>
        <tr>
            <td style="width: 720px;" class="bloque">
                <table>
                    <tbody>
                        <tr>
                            <!-- Transportes -->
                            <td style="width: 720px;">
                                <table>
                                    <tbody>

                                        <tr>
                                            <td style="padding-bottom: 5px; padding-left: 5px; padding-right: 5px;" class="borde">
                                                <span class="numeracion-form">17</span>
                                            </td>
                                            <!-- Transportes -->
                                            <td style="width: 696.9px;" class="borde-botton borde-top borde-end">
                                                <p class="transportes" style="text-align: left;"><span class="subs">Transporte</span>
                                                    @if($formulario->transporte == "Volqueta")
                                                    <span style="margin-left: 30px;" class="transportes">Volqueta <span class="borde" style="padding: 2px 4px;">x</span></span>
                                                    @else
                                                    <span style="margin-left: 30px;" class="transportes">Volqueta <span class="borde" style="padding: 2px 4px; color: white;">x</span></span>
                                                    @endif

                                                    @if($formulario->transporte == "Camión")
                                                    <span style="margin-left: 25px;" class="transportes">Camión <span class="borde" style="padding: 2px 4px;">x</span></span>
                                                    @else
                                                    <span style="margin-left: 25px;" class="transportes">Camión <span class="borde" style="padding: 2px 4px; color: white;">x</span></span>
                                                    @endif

                                                    @if($formulario->transporte == "Via ferrea")
                                                    @if($formulario->comercio=='Interno')
                                                    <span style="margin-left: 25px;" class="transportes">Vía ferrea <span class="borde" style="padding: 2px 4px;">x</span></span>
                                                    @else
                                                    <span style="margin-left: 25px;" class="transportes">Otros <span class="borde" style="padding: 2px 4px;">x</span></span>
                                                    @endif
                                                    @else
                                                    @if($formulario->comercio=='Interno')
                                                    <span style="margin-left: 25px;" class="transportes">Vía ferrea <span class="borde" style="padding: 2px 4px; color: white;">x</span></span>
                                                    @else
                                                    <span style="margin-left: 25px;" class="transportes">Otros <span class="borde" style="padding: 2px 4px; color: white;">x</span></span>
                                                    @endif
                                                    @endif

                                                    <span style="margin-left: 25px;" class="transportes">Chofer <span class="borde" style="padding: 2px 4px;">{{ $formulario->chofer }}</span></span>
                                                    <span style="margin-left: 95px;" class="transportes">Placa <span class="borde" style="padding: 2px 4px;">{{ $formulario->placa }}</span></span>
                                                </p>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-botton borde-star borde-end">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="borde-end" style="width: 184.3px; color: white;">.</td>
                                                            <td class="borde-end" style="width: 184.3px; color: white;">.</td>
                                                            <td class="borde-end" style="width: 184.3px; color: white;">.</td>
                                                            <td class="" style="width: 165px;">
                                                                <p style="text-align: center; text-transform: uppercase; font-size: 6.5px;">Gobierno Autónomo<br>Departamental de Cochabamba</p>
                                                                <p style="text-align: center; text-transform: uppercase; font-weight: bold;margin-top: 1px; font-size: 9px;">Autorizado</p>
                                                                <p style="text-align: center; text-transform: uppercase;margin-top: 1px; font-size: 7px;">Regalías mineras</p>
                                                                <p style="text-align: center; text-transform: uppercase; margin-top: 1px; font-size: 6px;margin-bottom: 2px;">Cochabamba-Bolivia</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                                            <td colspan="2" class="borde-botton borde-star borde-end">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="subs borde-end" style="text-align: center; width: 184.3px;text-transform: uppercase;">Sello contribuyente</td>
                                                            <td class="subs borde-end" style="text-align: center; width: 184.3px;text-transform: uppercase;">Aclaración de firma</td>
                                                            <td class="subs borde-end" style="text-align: center; width: 184.3px;text-transform: uppercase;">Responsable gobernación</td>
                                                            <td class="subs" style="text-align: center; width: 165px;text-transform: uppercase;">Sello autorizado</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<!-- FIN bloque 8 -->

<!-- Bloque 9 -->
<table class="bloque">
    <tbody>
        <!-- Fecha emision -->
        <tr>
            <!-- Formulario 101 y Razón social -->
            <td>
                <table>
                    <tbody>
                        <tr>
                            <td class="borde-star borde-top borde-botton">
                                <table>
                                    <tbody>
                                        <tr>
                                            <!-- Col-numeración -->
                                            <td style="width: 20px;" class="">
                                                <table>
                                                    <tbody>
                                                        <!-- Numeración 1 -->
                                                        <tr>
                                                            <td style="padding-left: 5px; padding-right: 5px;" class="borde-end borde-botton">
                                                                <span class="numeracion-form">18</span>
                                                            </td>
                                                        </tr>
                                                        <!-- Vacio -->
                                                        <tr>
                                                            <td style="height: 20px;"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </td>
                                            <!-- Col-razón-social -->
                                            <td class="">
                                                <p class="subs" style="margin-top: 1px;">Declaración jurada</p>
                                                <P style="margin-left: 5px; margin-top: 0px;font-size: 8.5px; padding-right: 26px;">El presente formulario constituye una Declaración Jurada y debe ser sellada en todas las trancas por el Organismo Operativo de Tránsito y puestos <br>de control que se encuentren en el fijado por el itenerario.</P>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <!-- Fechas -->
            <td class="" style="width: 160.8px;">
                <table>
                    <tbody>
                        <!-- Fecha de emision -->
                        <tr>
                            <td style="padding-left: 5px; padding-right: 5px;" class="borde">
                                <span class="numeracion-form">19</span>
                            </td>

                            <td style="width: 140.8px;" class="borde-botton borde-top borde-end">
                                <p class="subs" style="text-align: center; margin-top: 0px; margin-left: 0px;">Fecha de Emisión</p>
                            </td>
                        </tr>

                        <tr class="">
                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                            <td colspan="2" class="borde-botton borde-star borde-end">
                                <p class="subs-respuesta subs-respuesta--text" style="padding-top: 3.5px; padding-bottom: 3.5px;">{{ $formulario->fecha_emision }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>

        </tr>
        <!-- Fecha Validez -->
        <tr>
            <!-- Formulario 101 y Razón social -->
            <td style="width: 556px;">
                <table>
                    <tbody>
                        <tr>
                            <td class="borde-star borde-botton">
                                <table>
                                    <tbody>
                                        <tr>
                                            <!-- Col-numeración -->
                                            <td class="">
                                                <table>
                                                    <tbody>
                                                        <!-- Numeración 1 -->
                                                        <tr>
                                                            <td style="padding-left: 5px; padding-right: 5px;" class="borde-end borde-botton">
                                                                <span class="numeracion-form">20</span>
                                                            </td>
                                                        </tr>
                                                        <!-- Vacio -->
                                                        <tr>
                                                            <td style="height: 20px;"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </td>
                                            <!-- Col-razón-social -->
                                            <td class="" style="width: 531px;">
                                                <p class="subs" style="margin-top: 1px;">Observaciones: <span style="font-weight: lighter;">Comercio {{ $formulario->comercio }}</span></p>
                                                <P style="margin-left: 5px; margin-top: 0px;font-size: 8.5px; padding-right: 26px;">{{ $formulario->observaciones }}</P>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <!-- Fechas -->
            <td class="" style="width: 160.8px;">
                <table>
                    <tbody>
                        <!-- Fecha de validez -->
                        <tr>
                            <td style="padding-left: 5px; padding-right: 5px;" class="borde-star borde-botton">
                                <span class="numeracion-form" style="color: white;">19</span>
                            </td>

                            <td style="width: 141.8px;" class="borde-botton borde-end">
                                <p class="subs" style="text-align: center; margin-top: 0px; margin-left: 0px;">Validez fecha</p>
                            </td>
                        </tr>

                        <tr class="">
                            <!-- colspan="2" Esto indica que este <td> debe ocupar dos columnas -->
                            <td colspan="2" class="borde-botton borde-star borde-end">
                                <p class="subs-respuesta subs-respuesta--text" style="padding-top: 3.5px; padding-bottom: 3.5px;">
                                    @if(is_null($formulario->fecha_valides) || $formulario->fecha_valides == '')
                                    <span style="color: white;">.</span>
                                    @else
                                    <span>{{ $formulario->fecha_valides }}</span>
                                    @endif
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>

        </tr>
    </tbody>
</table>
@if($formulario->comercio=='Externo')
<span style="font-size: 8px;">VALIDO UNA SALIDA</span>
@else
<span style="font-size: 8px;">VALIDO UNA SALIDA 48Hrs.</span>
@endif

<!-- FIN Bloque 9 -->


<!-- Bloque 10 integrando Simple QR al formulario 101 -->
<table class="bloque">
    <tbody>
        <tr>
            <td style="width: 240px;"></td>
            <td style="width: 240px;">
                <p class="subs" style="text-align: center; margin-bottom: 0px;">QR de seguridad</p>
                <div class="" style="text-align: center;">
                    <img src="data:image/png;base64,{{ base64_encode(QrCode::size(150)->generate(Request::url().'?nro_formulario='.$formulario->nro_formulario.'&token=GobiernoAutónomoDepartamentalDeCochabamba')) }}" alt="Código QR">
                </div>
                <p class="subs" style="text-align: center;">Escanea y verifica la autenticidad del documento</p>
            </td>
            <td style="width: 240px;"></td>
        </tr>
    </tbody>
</table>

<!-- FIN Bloque 10 integrando Simple QR al formulario 101 -->

<!-- Bloque 11 pie de Pagina -->
<table class="" style="margin-top: 90px;">
    <tbody>
        <tr>
            <td class="borde-top" style="width: 720px;">
                <p class="subs" style="text-align: center; font-weight:lighter;">SECRETARIA DEPARTAMENTAL DE MINERIA E HIDROCARBUROS<br>
                    Av. Aroma N-327 frente Plaza San Sebastián • Telf.: 4-258066 • Fax: 4-258056
                    www.gobernaciondecochabamba.bo<br>
                    Cochabamba – Bolivia
                </p>
            </td>
        </tr>
    </tbody>
</table>
<!-- FIN Bloque 11 pie de Pagina -->