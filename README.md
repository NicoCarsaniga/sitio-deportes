# TPE-1-Web

#Participantes Héctor Liceaga y Nicolás Carsaniga
#Sitio de entretenimiento con temática "Videos de Deportes"

#Usuario administrador: admin@admin.com password: pass123

# El Trabajo consto con dos entregas

# Consigna de la Primer entrega

#Desarrollar un sitio web dinámico que permita visualizar una lista de items con categorías. Éstos deben poder ser administrados por un usuario administrador. 

#Debe contar con una base de datos acorde al tipo de página a implementar. La base de datos debe tener al menos una relación 1-N. Por ejemplo, debe haber una categoría, y un nivel de ítem que es agrupado en la categoría. Las columnas de cada tabla deben ser acordes a la lógica de su página.

# Acceso público 
Debe existir al menos 2 paginas donde se muestre el contenido dinámicamente generado desde la base de datos. Estas secciones pueden ser accedidas de manera pública, no es necesario loguearse.
Listado de ítems: Se debe poder visualizar todos los items 
Detalle de ítem: Se debe poder navegar y visualizar cada ítem particularmente 
Listado de categorías: Se debe poder visualizar todas las categorías
Listado de items x categoria: Se debe poder visualizar los ítems agrupados por categorías.
Importante: En cada ítem siempre se debe mostrar el nombre de la categoría a la que pertenece.

# Acceso administrador de datos 
Debe existir una sección para la administración de datos, la cual es accedida solo a usuarios administradores del sitio.
El usuario administrador debe loguearse con usuario y contraseña.
El usuario debe poder desloguearse (logout)
Solo los usuarios logueados pueden modificar las categorías y los items.
Se debe crear servicios de ABM (alta/baja/modificación) para administrar los datos:
Administrar Ítems (entidad del lado N de la relación).
Lista de Items (Noticias/Productos/…)
Agregar Items (Noticias/Productos/…)
Eliminar Items (Noticias/Productos/…)
Editar Items (Noticias/Productos/…)
Importante: 
Al agregar Items (Noticias/Productos/…) se debe poder elegir la categoría a la que pertenecen utilizando un select que muestre el nombre de la misma. 
Administrar Categorías (entidad del lado 1 de la relación)
Lista de Categorias
Agregar Categorias
Eliminar Categorias
Editar Categorias.

# Requerimientos Técnicos (no funcionales)
Todos los HTML deben mostrarse utilizando un motor de plantillas (Smarty).
Todas las acciones realizadas en la página deben estar manejadas utilizando el patrón MVC.
Las URL deben ser amigables.
El sitio debe incluir un archivo sql para instalar la base de datos.

# Consigna de la última entrega
Para la segunda entrega, se debe continuar el trabajo de la primera etapa.  El objetivo es agregar nueva funcionalidad detallada en forma de user stories abajo. Las historias se agrupan por tema sólo para facilitar la organización.

# Roles de Usuarios
Como usuario quiero poder registrarme en el sitio generando nombre de usuario/mail y contraseña. 
Al registrarse el usuario se loguea automáticamente. Este usuario no tiene privilegios de administración.
Como administrador del sitio, quiero poder asignar o quitar permisos de administración a cualquier usuario.
Como administrador del sitio, quiero poder eliminar usuarios.
Comentarios (todo por API REST):
Como usuario registrado, quiero poder postear comentarios en los ítems del sitio asignándoles un puntaje de 1 a 5. 
Cada item del sitio tendrá la posibilidad de recibir comentarios y puntuaciones solamente de usuarios logueados.
Como administrador del sitio, quiero poder borrar comentarios.
Como administrador del sitio, quiero poder asociar una imagen a un ítem.
Las imágenes de los “items” se deben poder subir y eliminar desde el ABM de los mismos.
Como usuario quiero poder navegar los listados de items en forma paginada.
Se debe generar una paginación del lado del servidor para recorrer los listados en forma paginada. 
Como usuario quiero poder realizar búsquedas avanzadas de los items.
Se debe incluir un formulario de búsquedas avanzadas donde se filtren los items dependiendo de los atributos internos. Esta búsqueda se debe resolver del lado del servidor.

# Aclaraciones
Respecto a los comentarios:
Todo el sistema de comentarios debe funcionar por medio de una API REST. Por ejemplo, cuando un usuario ingresa un comentario, el sitio no se debe recargar en su totalidad, solo el listado de comentarios.
Se debe renderizar todo lo relacionado a comentarios utilizando Client Side Render JS mediante la API REST.
Los comentarios se pueden ver siempre, pero sólo agregar por usuarios registrados y sólo borrar por administradores.
Los comentarios se deben poder crear. No es necesario poder modificarlos.

Respecto a los usuarios:
Existirán dos roles de usuarios registrados. (administradores y no-administradores)
Los usuarios registrados no son administradores (a menos que se les dé el permiso luego

