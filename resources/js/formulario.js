   // Carga primero el HTML y luego ejecuta javascript
   document.addEventListener('DOMContentLoaded', () => {

       // Municipios
       $('#select2-dropdown').select2(); // Inicializar
       // Capturar Values when change event
       $('#select2-dropdown').on('change', (e) => {
           let id = $('#select2-dropdown').select2("val"); // get id municipio
           let municipio = $('#select2-dropdown option:selected').text(); // get nombre municipio
           let codigo = $('#select2-dropdown option:selected').data('otro-dato'); // Obtener data-otro-dato

           // Asignar el valor al input oculto
           $('#hidden-municipio-id').val(id);
           $('#codigo-municipio').val(codigo); // Solo Mostrar en la vista
           $('#cod-municipio').val(codigo);
       }); // Fin municipios


       // Fechas
       let fechaEmisionInput = document.getElementById('fecha_emision');
       let fechaValidezInput = document.getElementById('fecha_valides');

       fechaEmisionInput.addEventListener('change', () => {
           let fechaEmision = new Date(fechaEmisionInput.value);

           // Restar la diferencia horaria entre tu zona horaria y UTC
           let zonaHorariaOffset = fechaEmision.getTimezoneOffset() * 60 * 1000;

           // Sumar 48 horas en milisegundos
           let fechaValidez = new Date(fechaEmision.getTime() + (48 * 60 * 60 * 1000) - zonaHorariaOffset);

           // Formatea la fecha de validez en el formato 'YYYY-MM-DDTHH:mm'
           let fechaValidezFormatted = fechaValidez.toISOString().slice(0, 16);

           // Actualiza el valor del campo de fecha de validez
           fechaValidezInput.value = fechaValidezFormatted;
       }); // Fin fechas

   });
