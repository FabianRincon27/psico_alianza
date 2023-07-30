<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## PsicoAlianza

La empresa Alianza desea organizar mejor su información de nómina para esto requiere una aplicación web que permita registrar los datos de sus empleados, asociarlos a uno o varios cargos y definir cuál es su jefe inmediato. Se desarrolla el siguiente prototipo <a href="https://www.figma.com/proto/5o0Zbe6yRu2t5Bujaru3Lu/Prueba-t%C3%A9cnica---PSA?node-id=6-4&scaling=scale-down&page-id=6%3A3">Prueba Técnica - PSA</a> para tener en cuenta el flujo de la información

## Observación
Según el Figma se tenían dos tablas una para la información general del empleado y otra donde se guardaría nuevamente el nombre, identificación y demás, por buenas practicas y por evitar redundancia, la información se manejo en una sola tabla, haciendo uso de buenas practicas, que permitieran un mejor flujo en cuanto a la interacción con el sistema
## Que se desarrollo
- Vista para ingreso a la plataforma con sus respectivas validaciones para el usuario y la contraseña, entre estas validaciones están:
    - Que los dos campos contengan información
    - La validación de que los datos coincidan con registros en la DB
- Vista para registro de nuevos usuarios, con sus respectivas validaciones, entre estás validaciones están:
    - Que todos los campos contengan información
    - Que el campo identificación y correo electrónico no se hayan registrado previamente
- Se creo una interfaz en donde se podrán administrar los siguientes módulos:
    - Cargos
    - Áreas
    - Roles
  <br>
  <b>Esto con el fin de que sea autoadministrable en el momento que se requiera nueva información para el sistema, estos datos se almacenan en sus respectivas tablas y tienen su respectiva validación de que no se repitan cargos,areas o roles, esto con el fin de evitar duplicidad en los datos</b>
- Vista de empleados, en esta vista, se tendrá el manejo para el registro y actualización de empleados y está interfaz, contiene lo siguiente
  - <b>Botón Nuevo Empleado:</b> Este botón desplegara un modal en el cual se podrá registrar un nuevo empleado, con sus respectivas validaciones, entre estas validaciones están:
    - Que todos los campos contengan información
    - Que el campo identificación no se haya registrado en otro empleado, esta validación la hará en tiempo real y de tener ya un registro con esa identificación, no permitirá el registro
    - La validación de que si el cargo que se selecciona es el de Presidente, este no podrá tener un superior por encima de el, por lo cual el campo de Jefe, se ocultaría y se deshabilitaría
  - <b>Datatable:</b> Está es una librería de javascript que se utiliza para darle un renderizado a las tablas de tal forma que se pueda tener una lista desplegable con la cantidad de registros que se desean mostrar, en el Figma aparecía colocar un input de búsqueda por cada columna, pero con Datatable se puede simplificar en una sola y esto ayuda también a no realizar tantos llamados a la BD, ya que Datatable hace un solo llamado y filtra la información en el front, tambien tiene la implementación para la descarga de la información, en esté caso se incluyo la exportación en formato xlx y pdf
  - <b>Checkbox Plural y Singular:</b> Según el Figma, al momento de seleccionar un empleado o el checkbox de la cabecera de la tabla, se debía mostrar un botón para eliminarlo, se creo un checkbox que permite seleccionar varios empleados y al seleccionarlos, se habilita el botón de eliminar, esto con el fin de evitar que se elimine un empleado por error, ya que al seleccionar varios, se debe tener la certeza de que se quiere eliminar, de igual forma se empleo SweetAlert para realizar una confirmación de que si se desean eliminar los empleados seleccionados
  - <b>Botón Editar:</b> Este botón desplegara un modal en el cual se podrá actualizar la información del empleado, esté contiene las mismas validación que al momento de crearlo.

#### Requisitos

- PHP >= 8.1
- Composer

#### Instalación

1. Clona este repositorio en tu máquina local:
```
    $ git clone https://github.com/FabianRincon27/psico_alianza.git
```

2. Accede al directorio del proyecto:
```
    $ cd psico_alianza
```

3. Instala las dependencias del proyecto utilizando Composer:
```
    $ composer update
```

4. Crea un archivo .env basado en el archivo .env.example y configura la conexión a la base de datos.
```
    $ cp .env.example .env
```

4. Crea la key del proyecto
```
    $ php artisan key:generate
```

6. Ejecuta las migraciones para crear las tablas de la base de datos

```
    $ php artisan migrate
```


#### Uso
Deberás ingresar al archivo que se encuentra en la ruta

```
    public/assets/js/pages/global.js
```

Una ves allí se debe descomentar la linea 
```
    // export const DATAMAIN = base + "/psico-alianza/public"
```
y comentar la linea
```
    export const DATAMAIN = base
```

Esto con el fin de que funcionen las peticiones AJAX

Para ejecutar el proyecto, puedes utilizar el servidor de desarrollo de Laravel o alguno como Xampp, Laragon, etc.


```
    $ php artisan serve
```

Una vez que el servidor esté en ejecución, puedes acceder al proyecto en tu navegador web en la URL http://localhost:8000