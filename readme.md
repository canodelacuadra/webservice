# webservice recursos multimedia
## Componentes del websevice
###  Paso 1 Creación de los componentes básicos del servicio
1. Base de datos La base de datos almacena los datos de los recursos multimedia(Tabla Recursos Multimedia)
2. Enrutador: El enrutador es el encargado de determinar qué función se llama en función de la URL solicitada. El enrutador es una parte fundamental de cualquier webservice. Su función es asociar las solicitudes HTTP a las funciones que implementan los servicios del webservice.
3. Funciones: Las funciones son las encargadas de realizar las operaciones CRUD (Create, Read, Update, Delete) en la base de datos. En este caso, las funciones necesarias son las siguientes:




## 1. Tabla de recursos multimedia
 La tabla debería  tener los siguientes campos:

* id: El identificador del recurso multimedia.
* nombre: El nombre del recurso multimedia.
* tipo: El tipo de recurso multimedia.
* url: La URL del recurso multimedia.
* date: momento de la creación del recurso
````sql
CREATE TABLE
    recursos_multimedia (
        id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(255) NOT NULL,
        tipo VARCHAR(255) NOT NULL,
        ruta VARCHAR(255) NOT NULL,
        date TIMESTAMP,
        PRIMARY KEY (id)
    );
```` 
Tipos de recursos multimedia:  
- Vídeos
- Audios
- Texto
- Imágenes
### 2. Enrutador
 se pueden utilizar las siguientes URLs:

* GET

    /recursos: Devuelve una lista de todos los recursos.
    /recursos/:id: Devuelve un recurso específico, identificado por su ID.
* POST

    /recursos: Crea un nuevo recurso.
* PUT

    /recursos/:id: Actualiza un recurso existente.
* DELETE

    /recursos/:id: Elimina un recurso existente.

Por ejemplo, si los recursos están almacenados en una tabla de base de datos, las URLs podrían estar asociadas mediante funciones a las siguientes consultas sql:

#### GET

````
/recursos: SELECT * FROM recursos;
/recursos/:id: SELECT * FROM recursos WHERE id = :id;
````
#### POST

````
/recursos: INSERT INTO recursos (campo1, campo2, ...) VALUES (valor1, valor2, ...);
````

####  PUT

````
/recursos/:id: UPDATE recursos SET campo1 = valor1, campo2 = valor2, ... WHERE id = :id;
````

####  DELETE

````
/recursos/:id: DELETE FROM recursos WHERE id = :id;
````
Por supuesto, estas son solo sugerencias. Las URLs concretas que se utilicen dependerán de las necesidades específicas del webservice.*

### 3. Funciones
* getRecursosMultimedia(): Devuelve todos los recursos multimedia.
* getRecursoMultimedia(id): Devuelve el recurso multimedia con el identificador especificado.
* postRecursoMultimedia(): Crea un nuevo recurso multimedia.
* putRecursoMultimedia(id): Actualiza un recurso multimedia existente.
* deleteRecursoMultimedia(id): Elimina un recurso multimedia existente.



### Futuros Pasos
1. Validación de datos
### Paso 3 Autenticación y Autorización
1. los usuarios puedan buscar, listar, crear, editar, añadir, ver, descargar  y eliminar recursos multimedia
2. Solo los usuarios registrados  los usuarios puedan ver y descargar recursos multimedia
3. Solo los usuarios administradores puedan añadir, eliminar recursos multimedia
### Paso 4
1. Logística (quién ha hecho y cuando)

###  Objetivos:




### Usuarios: Roles y Acceso
#### Roles de usuario
##### Administrador

* Permisos de administración: Puede realizar todas las operaciones CRUD en los recursos multimedia.
* Permisos de configuración: Puede modificar la configuración del webservice.
##### Usuario

Permisos de lectura: Puede leer los recursos multimedia.
##### Invitado

Ningún permiso: No puede realizar ninguna operación en el webservice.


* Un administrador podría crear nuevos recursos multimedia, editar recursos multimedia existentes y eliminar recursos multimedia. También podría modificar la configuración del webservice.
* Un usuario podría leer los recursos multimedia, pero no podría crearlos, editarlos ni eliminarlos.
* Un invitado no podría realizar ninguna operación en el webservice, ni siquiera leer los recursos multimedia
#### Acceso
se puede utilizar un sistema de autenticación basado en contraseñas. En este sistema, los usuarios deben proporcionar un nombre de usuario y una contraseña para iniciar sesión en el webservice.

### Seguridad: 
### Protección contra ataques malicioisos

- Validación de datos

  



## Tabla de usuarios


----
## Tabla de usuarios
La tabla SQL ña debería tener los siguientes campos:

id: El identificador del usuario.
nombre_usuario: El nombre de usuario del usuario.
contraseña: El hash de la contraseña del usuario.
rol: El rol del usuario.

  
 ````sql 
 CREATE TABLE usuarios (
  id INT NOT NULL AUTO_INCREMENT,
  nombre_usuario VARCHAR(255) NOT NULL,
  contraseña VARCHAR(255) NOT NULL,
  rol VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
 ````
 ### Encriptación de la contraseña
 El campo contraseña debe ser un campo de tipo VARCHAR(255). El hash de la contraseña debe ser generado usando un algoritmo de encriptación seguro, como bcrypt o PBKDF2.

Los hashes de las contraseñas se han generado usando el algoritmo de encriptación bcrypt con la configuración predeterminada de php
````php
$contraseña = "micontraseña";
$hash = password_hash($contraseña, PASSWORD_DEFAULT);
````

* Usuario 1: Nombre de usuario: "usuario1", contraseña: "micontraseña", rol: "usuario".
* Usuario 2: Nombre de usuario: "usuario2", contraseña: "otracontraseña", rol: "administrador".
* Usuario 3: Nombre de usuario: "usuario3", contraseña: "otracontraseñadiferente", rol: "invitado".
  
Para validar la contraseña de un usuario, puedes usar la función password_verify() de PHP. Por ejemplo, el siguiente código verifica la contraseña "micontraseña" para un usuario con el identificador 1

 ````php
$id = 1;
$contraseña = "micontraseña";
$hash = "d3b073411116d881f520b2b5a5c74982b8a94140091ba86a3d9100d0b0b29873";

if (password_verify($contraseña, $hash)) {
  echo "La contraseña es correcta.";
} else {
  echo "La contraseña es incorrecta.";
}
````