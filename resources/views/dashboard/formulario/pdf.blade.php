 <style>
     /* Reset table */
     table {
         border-collapse: collapse;
         border-spacing: 0;
         font-size: 10px;
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

     .container {
         width: 100%;
         border: 0.5px solid rgb(193, 193, 194);
         padding: 10px;
     }

     .header {
         text-align: center;
         font-weight: bold;
         font-size: 14px;
         margin-bottom: 10px;
     }

     .form-number {
         text-align: right;
         font-weight: bold;
         margin-bottom: 10px;
     }

     table {
         width: 100%;
         border-collapse: collapse;
         margin-bottom: 10px;
     }

     td {
         text-transform: uppercase;
         /* border: 1px solid rgb(193, 193, 194); */
         padding: 4px;
     }

     .section-title {
         text-transform: uppercase;
         background: #f5f4f4;
         font-weight: bold;
         padding: 3px;
         font-size: 8px;
     }

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

     .padd {
         padding: 5px;
     }
 </style>

 @if($formulario->comercio == "Externo")
 <div class="container">


     <!-- Bloque 1 imagenes y titulo de la gobernacion -->
     <table>
         <tbody>
             <tr>
                 <td style="width: 145px; border: none; border-bottom: 1px solid rgb(193, 193, 194);">
                     <div class="escudo">
                         <img class="img-logo" src="dashboard/img/logo-gadc.jpg" alt="Escudo gobernación">
                     </div>
                 </td>
                 <td style="width: 400px;border: none;border-bottom: 1px solid rgb(193, 193, 194);">
                     <p class="titulo-cabecera">FORMULARIO 101 - DE EXPORTACIÓN</p>
                 </td>
                 <td style="width: 145px;border: none;border-bottom: 1px solid rgb(193, 193, 194);">
                     <div class="logo">
                         <img class="img-logo" src="dashboard/img/logo-gadc.png" alt="Logo gobernación">
                     </div>
                 </td>
             </tr>
         </tbody>
     </table>
     <p class="form-number"><span class="borde" style="font-size: 12px; padding: 5px;">Nro. de Formulario: </span><span class="borde-top borde-end borde-botton" style="color: red; font-size: 12px; padding: 5px;">{{ $formulario->nro_formulario }}</span></p>
     <table>
         <tr>
             <td class="borde">Fecha de Emisión</td>
             <td class="borde">
                 <span>{{ $formulario->fecha_emision }}</span>
             </td>
             <td></td>
             <td class="borde">Fecha de Vencimiento</td>
             <td class="borde">
                 @if(is_null($formulario->fecha_valides) || $formulario->fecha_valides == '')
                 <span style="color: white;">.</span>
                 @else
                 <span>{{ $formulario->fecha_valides }}</span>
                 @endif
             </td>
         </tr>
     </table>
     <div class="section-title">1. Datos del Operador Minero/Actor Productivo Minero/Exportador</div>
     <table>
         <tr>
             <td class="borde">Razón Social / Nombre Completo</td>
             <td class="borde" colspan="7">{{ $formulario->razon_social }}</td>
         </tr>
         <tr>
             <td colspan="8"></td>
         </tr>
         <tr>
             <td class="borde">Número NIM</td>
             <td class="borde">{{ $formulario->nro_nim }}</td>
             <td></td>
             <td class="borde">Número NIT</td>
             <td class="borde">{{ $formulario->nro_nit }}</td>
             <td></td>
             <td class="borde">N° de ROCMIN</td>
             <td class="borde">{{ $formulario->ruim }}</td>
         </tr>
     </table>
     <div class="section-title">2. Datos del Mineral y/o Metal Exportado</div>
     <table>
         <tr>
             <td class="borde">N° de Lote</td>
             <td class="borde">{{ $formulario->nro_lote }}</td>
             <td class="borde">Tara (Kg.)</td>
             <td class="borde">
                 @if(is_null($formulario->tara_kg) || $formulario->tara_kg == '')
                 <span class="subs-respuesta subs-respuesta--text " style="color: white;">.</span>
                 @else
                 <span class="subs-respuesta subs-respuesta--text">{{ $formulario->tara_kg }}</span>
                 @endif
             </td>
         </tr>

         <tr>
             <td class="borde">Tipo de Mineral</td>
             <td class="borde">
                 @if($formulario->tipo_min_metalico != null)
                 <span class="subs-respuesta subs-respuesta--text">{{ $formulario->tipo_min_metalico }}</span>
                 @endif
                 @if($formulario->tipo_min_nometalico != null)
                 <span class="subs-respuesta subs-respuesta--text">{{ $formulario->tipo_min_nometalico }}</span>
                 @endif
             </td>
             <td class="borde">Humedad (%)</td>
             <td class="borde">{{ $formulario->humedad }}</td>
         </tr>

         <tr>
             <td class="borde">Presentación</td>
             <td class="borde">{{ $formulario->presentacion }}</td>
             <td class="borde">Merma (%)</td>
             <td class="borde">{{ $formulario->merma }}</td>
         </tr>

         <tr>
             <td class="borde">Alicuota</td>
             <td class="borde">{{ $formulario->alicuota }}</td>
             <td class="borde">Peso Neto</td>
             <td class="borde">{{ $formulario->peso_neto_kg }}</td>
         </tr>
     </table>
     <div class="section-title">3. Origen del Mineral y/o Metal</div>
     <table>
         <tr>
             <td style="width: 150px;" class="borde">Municipio Productor</td>
             <td class="borde" style="width: 193px;">{{ $formulario->municipio }}</td>
             <td></td>
             <td class="borde">Código Municipio</td>
             <td class="borde">{{ $formulario->codigo }}</td>
         </tr>
         <tr>
             <td colspan="5"></td>
         </tr>
         <tr>
             <td class="borde" colspan="1">Origen de la Exportación</td>
             <td class="borde border-end" colspan="0">{{ $formulario->origen }}</td>
             <td></td>
         </tr>
     </table>
     <div class="section-title">4. Destino del Mineral y/o Metal</div>
     <table>
         <tr>
             <td class="borde" style="width: 150px;">Comprador</td>
             <td class="borde" style="width: 193px;">{{ $formulario->comprador }}</td>
             <td style="width: 14px;"></td>
             <td class="borde" style="width: 150px;">Destino</td>
             <td class="borde">{{ $formulario->destino }}</td>
         </tr>
         <tr>
             <td colspan="5"></td>
         </tr>
         <tr>
             <td class="borde" colspan="1">Aduana de Salida</td>
             <td class="borde" colspan="0">{{ $formulario->aduana }}</td>
             <td></td>
         </tr>
     </table>
     <div class="section-title">5. Medio de Transporte</div>
     <table>
         <tr>
             <td class="borde" style="width: 150px;">Tipo de Transporte</td>
             <td class="borde" style="width: 193px;">
                 @if($formulario->transporte == "Volqueta")
                 <span style="margin-left: 30px;" class="transportes">Volqueta</span>
                 @endif

                 @if($formulario->transporte == "Camión")
                 <span style="margin-left: 25px;" class="transportes">Camión</span>
                 @endif

                 @if($formulario->transporte == "Via ferrea")
                 <span style="margin-left: 25px;" class="transportes">Vía ferrea</span>
                 @endif

                 @if($formulario->transporte == "Otros")
                 <span style="margin-left: 25px;" class="transportes">Otros</span>
                 @endif
             </td>
             <td style="width: 14px;"></td>
             <td class="borde" style="width: 150px;">Placa</td>
             <td class="borde">{{ $formulario->placa }}</td>
         </tr>
         <tr>
             <td colspan="5"></td>
         </tr>
         <tr>
             <td class="borde" colspan="1">Conductor</td>
             <td class="borde" colspan="0">{{ $formulario->chofer }}</td>
             <td></td>
         </tr>
     </table>
     <div class="section-title">6. Otros</div>
     <table>
         <tr>
             <td class="borde">Número de Trámite Formulario M-03 SENARECOM</td>
             <td class="borde">{{ $formulario->senarecom }}</td>
         </tr>
     </table>
     <div class="section-title">7. Observaciones</div>
     <table>
         <tr>
             <td class="borde" colspan="4">{{ $formulario->observaciones }}</td>
         </tr>
     </table>
     <div class="section-title">Verificación de Puntos de Control</div>
     <table>
         <thead>
             <tr>
                 <td class="borde">1er Punto de Control</td>
                 <td class="borde">2do Punto de Control</td>
                 <td class="borde">Sello de Autorización</td>
                 <td class="borde">Marca de Seguridad</td>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td class="borde"></td>
                 <td class="borde"></td>
                 <td class="borde"></td>
                 <td class="borde" style="padding: 0px; margin: 0px;">
                     <div class="" style="text-align: center;">
                         <img src="data:image/png;base64,{{ base64_encode(QrCode::size(140)->generate(Request::url().'?nro_formulario='.$formulario->nro_formulario.'&token=GobiernoAutónomoDepartamentalDeCochabamba')) }}" alt="Código QR">
                     </div>
                 </td>
             </tr>

         </tbody>
     </table>
     <span style="font-size: 10px;">1. El formulario 101 es el único documento habilitado para el transporte de minerales y/o metales, de aplicación obligatoria para los Operadores Mineros, Actores Productivos Mineros, conforme señala el articulo 7 del D.S. Nro. 2288 con caracter de declaración jurada.<br>
         2. El presente formulario constituye una declaración jurada, las caracteristicas y las cantidades indicadas en el formulario M-03 del SENARECOM, es de entera responsabilidad del exportador.</span>
 </div>
 @endif

 @if($formulario->comercio=="Interno")
 <div class="container" style="border: none;">
     <!-- Bloque 1 imagenes y titulo de la gobernacion -->
     <table>
         <tbody>
             <tr>
                 <td style="width: 145px; border: none; border-bottom: 1px solid rgb(193, 193, 194);">
                     <div class="escudo">
                         <img class="img-logo" src="dashboard/img/logo-gadc.jpg" alt="Escudo gobernación">
                     </div>
                 </td>
                 <td style="width: 400px;border: none;border-bottom: 1px solid rgb(193, 193, 194);">
                     <p class="titulo-cabecera">Gobierno autónomo departamental de cochabamba <br>secretaria departamental de mineria e hidrocarburos</p>
                 </td>
                 <td style="width: 145px;border: none;border-bottom: 1px solid rgb(193, 193, 194);">
                     <div class="logo">
                         <img class="img-logo" src="dashboard/img/logo-gadc.png" alt="Logo gobernación">
                     </div>
                 </td>
             </tr>
         </tbody>
     </table>
     <p style="text-align: center; text-transform: uppercase; font-size: 14px;">Formulario 101 - Transporte de Comercio Interno</p>
     <p class="form-number"><span class="borde" style="font-size: 12px; padding: 5px;">Nro. de Formulario: </span><span class="borde-top borde-end borde-botton" style="color: red; font-size: 12px; padding: 5px;">{{ $formulario->nro_formulario }}</span></p>
     <table>
         <tr>
             <td class="borde">Fecha de Emisión</td>
             <td class="borde">
                 <span>{{ $formulario->fecha_emision }}</span>
             </td>
             <td></td>
             <td class="borde">Fecha de Vencimiento</td>
             <td class="borde">
                 @if(is_null($formulario->fecha_valides) || $formulario->fecha_valides == '')
                 <span style="color: white;">.</span>
                 @else
                 <span>{{ $formulario->fecha_valides }}</span>
                 @endif
             </td>
         </tr>
     </table>
     <table>

         <tr>
             <td class="borde" style="width: 2px;">1</td>
             <td class="borde">Razón Social / Nombre Completo</td>
             <td class="borde" colspan="9">{{ $formulario->razon_social }}</td>
         </tr>
         <tr>
             <td colspan="11"></td>
         </tr>
         <tr>
             <td class="borde" style="width: 2px;">2</td>
             <td class="borde">Número NIM</td>
             <td class="borde">{{ $formulario->nro_nim }}</td>
             <td></td>
             <td class="borde" style="width: 2px;">3</td>
             <td class="borde">Número NIT</td>
             <td class="borde">{{ $formulario->nro_nit }}</td>
             <td></td>
             <td class="borde" style="width: 2px;">4</td>
             <td class="borde">N° de ROCMIN</td>
             <td class="borde">{{ $formulario->ruim }}</td>

         </tr>
         <tr>
             <td colspan="11"></td>
         </tr>
         <tr>
             <td class="borde" style="width: 2px;">5</td>
             <td class="borde">Nro. de Lote</td>
             <td class="borde">{{ $formulario->nro_lote }}</td>
             <td></td>
             <td class="borde" style="width: 2px;">6</td>
             <td class="borde">Ley</td>
             <td class="borde">{{ $formulario->ley }}</td>
             <td></td>
             <td class="borde" style="width: 2px;">7</td>
             <td class="borde">Hum-merma(%)</td>
             <td class="borde">{{ $formulario->hum_merma }}</td>

         </tr>
     </table>

     <!-- bloque  tipo mineral y presentación -->
     <table>
         <tr>
             <td class="borde" style="width: 2px;">8</td>
             <td class="borde">Tipo de mineral</td>
             <td class="borde">
                 @if($formulario->tipo_min_metalico != null)
                 <span class="subs-respuesta subs-respuesta--text">{{ $formulario->tipo_min_metalico }}</span>
                 @endif
                 @if($formulario->tipo_min_nometalico != null)
                 <span class="subs-respuesta subs-respuesta--text">{{ $formulario->tipo_min_nometalico }}</span>
                 @endif
             </td>
             <td></td>
             <td class="borde" style="width: 2px;">9</td>
             <td class="borde">Presentación</td>
             <td class="borde">{{ $formulario->presentacion }}</td>
         </tr>
     </table>

     <!-- Bloque alicuota peso bruto y tara -->
     <table>
         <tr>
             <td class="borde" style="width: 2px;">10</td>
             <td class="borde">Alicuota</td>
             <td class="borde">{{ $formulario->nro_lote }}</td>
             <td></td>
             <td class="borde" style="width: 2px;">11</td>
             <td class="borde">Peso Bruto({{ $formulario->unidad }})</td>
             <td class="borde">{{ $formulario->peso_bruto_kg }}</td>
             <td></td>
             <td class="borde" style="width: 2px;">12</td>
             <td class="borde">Tara({{ $formulario->unidad }})</td>
             <td class="borde">{{ $formulario->tara_kg }}</td>

         </tr>
     </table>


     <!-- bloque  peso neto y municipio productor -->
     <table>
         <tr>
             <td class="borde" style="width: 2px;">13</td>
             <td class="borde">Peso Neto({{ $formulario->unidad }})</td>
             <td class="borde">{{ $formulario->peso_neto_kg }}</td>
             <td></td>
             <td class="borde" style="width: 2px;">14</td>
             <td class="borde">Municipio Productor</td>
             <td class="borde">{{ $formulario->municipio }}</td>
         </tr>
     </table>

     <!-- bloque  codigo y comercializadora -->
     <table>
         <tr>
             <td class="borde" style="width: 2px;">15</td>
             <td class="borde">Peso Neto({{ $formulario->codigo }})</td>
             <td class="borde">{{ $formulario->peso_neto_kg }}</td>
             <td></td>
             <td class="borde" style="width: 2px;">16</td>
             <td class="borde">Comercializadora y/o<br>Agente de retención</td>
             <td class="borde">{{ $formulario->comprador }}</td>
         </tr>
     </table>
     <!-- bloque  origen y destino -->
     <table>
         <tr>
             <td class="borde" style="width: 2px;">17</td>
             <td class="borde">Origen</td>
             <td class="borde">{{ $formulario->origen }}</td>
             <td></td>
             <td class="borde" style="width: 2px;">18</td>
             <td class="borde">Destino</td>
             <td class="borde">{{ $formulario->destino }}</td>
         </tr>
     </table>

     <table>
         <tr>
             <td class="borde" style="width: 2px;">19</td>
             <td class="borde">Tipo de Transporte</td>
             <td class="borde" style="width: 193px;">
                 @if($formulario->transporte == "Volqueta")
                 <span style="margin-left: 30px;" class="transportes">Volqueta</span>
                 @endif

                 @if($formulario->transporte == "Camión")
                 <span style="margin-left: 25px;" class="transportes">Camión</span>
                 @endif

                 @if($formulario->transporte == "Via ferrea")
                 <span style="margin-left: 25px;" class="transportes">Vía ferrea</span>
                 @endif
             </td>
             <td></td>
             <td class="borde" style="width: 2px;">20</td>
             <td class="borde">Placa</td>
             <td class="borde">{{ $formulario->placa }}</td>
             <td></td>
             <td class="borde" style="width: 2px;">20</td>
             <td class="borde">Chofer</td>
             <td class="borde">{{ $formulario->chofer }}</td>
         </tr>

     </table>
     <table>
         <tr>
             <td class="borde">
                 <div class="section-title">DECLARACIÓN JURADA</div>
                 <P class="mt-3">El presente formulario constituye una Declaración Jurada y debe ser requerida en todas las trancas por el personal de la,policia y puestos de control.</P>
             </td>
         </tr>
     </table>
     <div class="section-title">Observaciones</div>
     <table>
         <tr>
             <td class="borde" colspan="4">{{ $formulario->observaciones }}</td>
         </tr>
     </table>
     <div class="section-title">Verificación de Puntos de Control</div>
     <table>
         <thead>
             <tr>
                 <td class="borde">Sello actor productivo minero</td>
                 <td class="borde">Aclaración de firma</td>
                 <td class="borde">Responzable de gobernación</td>
                 <td class="borde">Marca de Seguridad</td>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td class="borde"></td>
                 <td class="borde"></td>
                 <td class="borde"></td>
                 <td class="borde" style="padding: 0px; margin: 0px;">
                     <div class="" style="text-align: center;">
                         <img src="data:image/png;base64,{{ base64_encode(QrCode::size(140)->generate(Request::url().'?nro_formulario='.$formulario->nro_formulario.'&token=GobiernoAutónomoDepartamentalDeCochabamba')) }}" alt="Código QR">
                     </div>
                 </td>
             </tr>

         </tbody>
     </table>
     <span style="font-size: 10px;">1. El formulario 101 es el único documento habilitado para el transporte de minerales y/o metales, de aplicación obligatoria para los Operadores Mineros, Actores Productivos Mineros, conforme señala el articulo 7 del D.S. Nro. 2288 con caracter de declaración jurada.<br>
         2. El presente formulario constituye una declaración jurada, las caracteristicas y las cantidades indicadas en el formulario M-03 del SENARECOM, es de entera responsabilidad del exportador.</span>
 </div>
 @endif