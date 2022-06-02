--los archivos php donde se encuentran el programa son: 

--1. trabajadores
--2. historia_clinica
--  2.1. comorbilidad
--  2.2. medicacion
--  2.3. restriccion
--3. prueba_covid

--NOTAS:
--1. se debe importar el documento sql llamado 'basededatos' usando phpMyAdmin creando un localhost con XAMPP.
--2. en cada archivo principal cuando se le da a enviar despues de llenar el formulario se envia al respectivo documento 'insertar'..
--3. en los documentos de nombre insertar se encuentra la verificacion de valores validos.
--4. al tocar el boton eliminar de algun atributo en especifico el codigo para pedir verificacion se encuentra en el mismo documento principal.
--5. cuando se le da al boton 'editar' de algun registro el boton llevara al respectivo documento de nombre 'editar' donde esta el codigo del formulario que vendra lleno con la informacion del registro seleccionado, cuando se toca el boton 'actualizar' la informacion es enviada al archivo de la respectiva carpeta con el nombre 'actualizar'.
--6. algunas tablas tienen un boton en lugar de mostrar el dato de la columna, estos botones llevan un sitio donde se hace un echo de la informacionen esa columna, esto es debido a que la informacion se espera que sea demasiado extensa para que quepa en la pequeña columna de la tabla por eso le asigne un boton para que muestre la informacion en una pagina aparte.
--7. toda la informacion en las tablas es informacion de prueba, sientase libre de tratar de editarla o borrarla agusto
--8. todas las tablas que lleven una clave foranea referenciando una clave primaria tienen la restriccionde 'ON DELETE CASCADE' asi que si se borra un trabajador el historial medico y posteriormente los registros en las tablas 'comorbilidad', 'restriccion' y 'medicacion' que referencien a ese trabajador seran borradas.
--9. ya que cada trabajdor solo puede tener 1 historial clinico el menu desplegable del ormulario de insercion para seleccionar un docmento solo muestra aquellos documentos que todavia no tienen un historial clinico, osea muestra los numeros de documento que estan en 'trabajadores' pero no en 'historia_clinica'



--INFORMACION IMPORTANTE:
--1. en el programa 'prueba_covid' por alguna razon la actualizacion de datos no funciona, cuando se le da al boton 'editar' lleva al formulario para editar la informacion pero cuando se toca el boton 'actualizar' ninguno de los cambios se aplica.
--2. en algunos archivos 'insertar' algunas verificaciones de valores validos no funciona.
--2. en algunos formularios de editar hay menus desplegables, no se como hacer que cuando se toque el boton 'editar' se genere el menu de tipo 'select' que venga con la opcion ya elegida de acuerdo con la opcion elegida durante la creacion del registro. lo mismo pasa con los checkbox de tipo radio (osea los que solo permiten que se elija una opcion a la vez), no se como hacer que se generen con la opcion seleccionada por defecto de acuerdo a la que tiene el registro.
