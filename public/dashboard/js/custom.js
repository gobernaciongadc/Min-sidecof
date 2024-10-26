 // INDEX Agregar código JavaScript para ocultar el mensaje de éxito después de 4 segundos
 setTimeout(function () {
     var successMessage = document.getElementById('success-message');
     if (successMessage) {
         successMessage.style.display = 'none';
     }
 }, 4000); // 4000 milisegundos (4 segundos)


 //  Data Municipios
 new DataTable('#municipio_1', {
     language: {
         info: 'Mostrando la página _PAGE_ de _PAGES_',
         infoEmpty: 'No hay registros disponibles',
         infoFiltered: '(filtrados de un total de _MAX_ registros)',
         lengthMenu: ' _MENU_ registros por página',
         zeroRecords: 'Nada encontrado - lo siento',
         paginate: {
             previous: 'Anterior',
             next: 'Siguiente'
         },
         search: 'Buscar'

     },
     ordering: true, // Habilitar el ordenamiento de columnas
 });

 // Data Funcionarios
 new DataTable('#fun_2', {
     language: {
         info: 'Mostrando la página _PAGE_ de _PAGES_',
         infoEmpty: 'No hay registros disponibles',
         infoFiltered: '(filtrados de un total de _MAX_ registros)',
         lengthMenu: ' _MENU_ registros por página',
         zeroRecords: 'Nada encontrado - lo siento',
         paginate: {
             previous: 'Anterior',
             next: 'Siguiente'
         },
         search: 'Buscar'

     },
     ordering: true, // Habilitar el ordenamiento de columnas
 });

 // Data metalicos
 new DataTable('#met_1', {
     language: {
         info: 'Mostrando la página _PAGE_ de _PAGES_',
         infoEmpty: 'No hay registros disponibles',
         infoFiltered: '(filtrados de un total de _MAX_ registros)',
         lengthMenu: ' _MENU_ registros por página',
         zeroRecords: 'Nada encontrado - lo siento',
         paginate: {
             previous: 'Anterior',
             next: 'Siguiente'
         },
         search: 'Buscar'

     },
     ordering: true, // Habilitar el ordenamiento de columnas
 });

 // Data No metalicos
 new DataTable('#nomet_1', {
     language: {
         info: 'Mostrando la página _PAGE_ de _PAGES_',
         infoEmpty: 'No hay registros disponibles',
         infoFiltered: '(filtrados de un total de _MAX_ registros)',
         lengthMenu: ' _MENU_ registros por página',
         zeroRecords: 'Nada encontrado - lo siento',
         paginate: {
             previous: 'Anterior',
             next: 'Siguiente'
         },
         search: 'Buscar'

     },
     ordering: true, // Habilitar el ordenamiento de columnas
 });


 // Data empresa
 new DataTable('#emp_1', {
     language: {
         info: 'Mostrando la página _PAGE_ de _PAGES_',
         infoEmpty: 'No hay registros disponibles',
         infoFiltered: '(filtrados de un total de _MAX_ registros)',
         lengthMenu: ' _MENU_ registros por página',
         zeroRecords: 'Nada encontrado - lo siento',
         paginate: {
             previous: 'Anterior',
             next: 'Siguiente'
         },
         search: 'Buscar'

     },
     ordering: true, // Habilitar el ordenamiento de columnas
 });

 // Data empresa
 new DataTable('#min_1', {
     language: {
         info: 'Mostrando la página _PAGE_ de _PAGES_',
         infoEmpty: 'No hay registros disponibles',
         infoFiltered: '(filtrados de un total de _MAX_ registros)',
         lengthMenu: ' _MENU_ registros por página',
         zeroRecords: 'Nada encontrado - lo siento',
         paginate: {
             previous: 'Anterior',
             next: 'Siguiente'
         },
         search: 'Buscar'

     },
     ordering: true, // Habilitar el ordenamiento de columnas
 });

 // Data Emitidos
 new DataTable('#pescena_1', {
     paging: true, // Deshabilita la paginación
     language: {
         info: 'Mostrando la página _PAGE_ de _PAGES_',
         infoEmpty: 'No hay registros disponibles',
         infoFiltered: '(filtrados de un total de _MAX_ registros)',
         lengthMenu: ' _MENU_ registros por página',
         zeroRecords: 'Nada encontrado - lo siento',
         paginate: {
             previous: 'Anterior',
             next: 'Siguiente'
         },
         search: 'Buscar'

     },
     ordering: true, // Habilitar el ordenamiento de columnas
 });


 // Data usuarios
 new DataTable('#pusuarios_1', {
     paging: true, // Deshabilita la paginación
     language: {
         info: 'Mostrando la página _PAGE_ de _PAGES_',
         infoEmpty: 'No hay registros disponibles',
         infoFiltered: '(filtrados de un total de _MAX_ registros)',
         lengthMenu: ' _MENU_ registros por página',
         zeroRecords: 'Nada encontrado - lo siento',
         paginate: {
             previous: 'Anterior',
             next: 'Siguiente'
         },
         search: 'Buscar'

     },
     ordering: true, // Habilitar el ordenamiento de columnas
 });


 //  Gestion buscar
 // Data empresa
 //  new DataTable('#gestion_buscar_1', {
 //      paging: true, // Deshabilita la paginación
 //      searching: true, // Deshabilita la función de búsqueda
 //      info: false,
 //      language: {
 //          info: 'Mostrando la página _PAGE_ de _PAGES_',
 //          infoFiltered: '(filtrados de un total de _MAX_ registros)',
 //          lengthMenu: ' _MENU_ registros por página',
 //          zeroRecords: 'Nada encontrado - lo siento',
 //          paginate: {
 //              previous: 'Anterior',
 //              next: 'Siguiente'
 //          },
 //          search: 'Buscar'
 //      },
 //      ordering: false, // Habilitar el ordenamiento de columnas
 //  });

 //  Ubicacion
 new DataTable('#gestion_buscar_ubicacion', {
     paging: false, // Deshabilita la paginación
     searching: false, // Deshabilita la función de búsqueda
     info: false,
     language: {
         info: 'Mostrando la página _PAGE_ de _PAGES_',
         infoFiltered: '(filtrados de un total de _MAX_ registros)',
         lengthMenu: ' _MENU_ registros por página',
         zeroRecords: 'Nada encontrado - lo siento',
         paginate: {
             previous: 'Anterior',
             next: 'Siguiente'
         },
         search: 'Buscar'
     },
     ordering: false, // Habilitar el ordenamiento de columnas
 });

 //  Cierre
 new DataTable('#gestion_buscar_cierre', {
     paging: false, // Deshabilita la paginación
     searching: false, // Deshabilita la función de búsqueda
     info: false,
     language: {
         info: 'Mostrando la página _PAGE_ de _PAGES_',
         infoFiltered: '(filtrados de un total de _MAX_ registros)',
         lengthMenu: ' _MENU_ registros por página',
         zeroRecords: 'Nada encontrado - lo siento',
         paginate: {
             previous: 'Anterior',
             next: 'Siguiente'
         },
         search: 'Buscar'
     },
     ordering: false, // Habilitar el ordenamiento de columnas
 });
