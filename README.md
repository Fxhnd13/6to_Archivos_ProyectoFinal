# 6to_Archivos_ProyectoFinal

Proyecto de Manejo de archivos, página web de administración de cursos denominada creatica, utilizando Mysql, php, y webhost como servidor web.

#Breve descripcion de cada archivo

* accionUsuario.php -> archivo de codigo puro php, para ejecutar las distintas acciones que puede realizar un usuario, (editar, crear, eliminar y hacerse docente)
* archivoRandom.txt -> partes de codigo creí servirían pero no, y el gatillo que creó marito para agregarlo después a la base de datos final
* conexionSql.php -> archivo que carga la conexion con las credenciales especificadas.
* database.php -> irrelevante, no sirve de nada, era un modelo.
* error.php -> pagina de error que acepta un mensaje, debe enviarse como $_SESSION['mensajeError']=mensaje
* index.php -> login basicamente
* navBar.php -> archivo que contiene la navBar, aquí se agregan las opciones que pueda tener el usuario básicamente
* perfil.php -> pagina del perfil del usuario, también para visualizar la información de otros usuarios cuando se pueda acceder a esta.
* principalCursos.php -> pagina en la que se listan los cursos
* registroUsuario.php -> pagina en la que se muestra el formulario para crear y editar usuarios
* verificarLogueo.php -> archivo para verificar el logueo correctamente e iniciar la sesion con los datos corrrespondientes.

#NOTAS PARA MARIO Y YEFER xdddd

* En la parte de navbar.php, deje unas instrucciones get, para que se puedan manejar desde el archivo principalCursos.php, para que funcionen los botones de "ver cursos disponibles, cursos impartidos, etc", en el archivo principalCursos.php aparecen los tipos de consultas que se pueden realizar
* En la parte de perfil esta listo para poder convertirse en docente, esto sucedera (como lo plantee xd) cuando al menos el usuario tenga un curso asignado para impartir, hay una opcion en perfil denominada dar curso, ahí se listan los cursos existentes y sería de seleccionar uno.
* Disculpa yefer, al final mejor no usaremos carpetas para los archivos de las páginas, si para el css y para imagenes que se usen, pero para no complicar las rutas, si ya tenes eso funcional así, pues dejalo así xd
* Traté de documentar cosas pero tampoco es que haya hecho mucho xd pero como me despierto a las 2 de la tarde ahí está xddd
* Dios los bendiga, si creen en él, éxitos

#No lo pidas, consíguelo por tu cuenta y tendrás éxito - eureka seven (un buen mensaje por parte de nuestro Dios moi) xddddd
