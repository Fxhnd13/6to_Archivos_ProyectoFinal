# 6to_Archivos_ProyectoFinal

Proyecto de Manejo de archivos, página web de administración de cursos denominada creatica, utilizando Mysql, php, y webhost como servidor web.

# Breve descripcion de cada archivo

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
