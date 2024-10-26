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
<br>

<!-- Bloque titulo-->
<table>
    <tbody>
        <tr>
            <td style="width: 750px;" class="titulo">
                <h1 class="titulo__principal">Cantidad de empresas por municipio</h1>
            </td>
        </tr>
    </tbody>
</table>
<br>
<br>

<!-- Bloque datos-->
<table>
    <tbody>
        <tr>
            <td style="width: 450px;">
                <span style="font-size: 14px;"><strong>Empresa/Cooperativa: </strong><span id="nombres">{{ $municipio->municipio }}</span></span><br>
            </td>
            <td>
                <span style="font-size: 14px;"><strong>Fecha y hora reporte: </strong><span id="fecha">{{ $fechaHoraFormateada }}</span></span>
            </td>
        </tr>
    </tbody>
</table>
<br>


<!-- Bloqque Datos del formulario -->
<style>
    .reporte-uno {
        border-collapse: collapse;
        width: 30%;
    }

    .reporte-uno th,
    .reporte-uno td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 5px;
        width: 20px;
        font-size: 14px;
    }

    .reporte-uno th {
        background-color: #f2f2f2;
    }
</style>
<br>
<div style="display: inline-block; width: 50%;">
    <span style="display: block;">Reporte empresa por municipio</span>
    <table class="reporte-uno" style="float: left; margin-right: 20px; width: 100%;">
        <thead>
            <tr>
                <th>#</th>
                <th>Empresa/Cooperativa</th>
                <th>Estado actual</th>
            </tr>
        </thead>
        <tbody>

            @foreach($listaEmpresas as $empresa)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $empresa->nombres }}</td>
                <td>{{ $empresa->estado }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div style="clear: both;"></div> <!-- Clear float para evitar problemas de diseño -->
</div>
<div class="line-borde margen-linea"></div>
<br>

<!-- Bloque cantidad total de formulario -->
<table>
    <tbody>
        <tr>
            <td class="titulo">
                <h1 class="titulo__principal"><strong>Total cantidad de empresas por municipio:</strong><span> {{ $cantidadEmpresas }}</span> </h1>
            </td>
        </tr>
    </tbody>
</table>


<style>
    /* Estilo para el bloque de pie de página */
    #pie-de-pagina {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #fff;
        /* Puedes ajustar el color de fondo según tus preferencias */
        /* Línea de separación superior */
        padding: 10px;
        /* Espaciado interno */
        text-align: center;
    }

    /* Estilo para el párrafo dentro del bloque de pie de página */
    #pie-de-pagina p {
        text-align: center;
        font-weight: lighter;
        margin: 0;
        /* Eliminar márgenes predeterminados del párrafo */
    }
</style>

<!-- Bloque pie de Página -->
<div id="pie-de-pagina">
    <table>
        <tbody>
            <tr>
                <td class="borde-top" style="width: 720px;">
                    <p class="subs">SECRETARIA DEPARTAMENTAL DE MINERIA E HIDROCARBUROS<br>
                        Av. Aroma N-327 frente Plaza San Sebastián • Telf.: 4-258066 • Fax: 4-258056
                        www.gobernaciondecochabamba.bo<br>
                        Cochabamba – Bolivia
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<!-- FIN Bloque 11 pie de Pagina -->