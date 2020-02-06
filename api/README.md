# REST API para el control de mercancías

Este directorio contiene el código de una API simple para el control de mercancías. Esta API puede ser usada desde cualquier dispositivo que pueda enviar y recibir peticiones HTTP.

A continuación se describe cada endpoint de la API, con ejemplos en jQuery de como usarlos.

## POST /api/login.php

Este endpoint recibe un usuario y una contraseña y devuelve un token de acceso si las credenciales son correctas. Este endpoint genera el token que se requiere para utilizar el resto de endpoints.

### Detalles del endpoint

* **Método HTTP**: GET
* Parámetros:
  * **usuario**: Nombre de usuario, tal como está registrado en la base de datos.
  * **password**: Contraseña del nombre de usuario específicado
* Headers esperados: Ninguno

### Ejemplos

Ejemplo de request con jQuery:
```js
$.ajax({
  url: '/api/login.php',
  method: 'post',
  data: { usuario: 'Foo', password: 'Bar' },
  success: function(response) {
    console.log(response.token);
  },
  error: function(xhr) {
    alert(xhr.responseJSON.error);
  }
});
```

Ejemplo de respuesta exitosa:
```json
{
  "success": true,
  "token": "DSADASDFHFG98980"
}
```

Ejemplo de respuesta fallida:
```json
{
  "success": false,
  "error": "Mensaje de error"
}
```

## DELETE /api/logout.php

Este endpoint recibe un token a través del header _Authorization_ y lo elimina de la
base de datos para que no pueda usarse más, cerrando de esta forma la sesión del
usuario.

### Detalles del endpoint

* **Método HTTP**: DELETE
* Parámetros: Ninguno
* Headers esperados:
  * **Authorization: Bearer _token_** donde _token_ es el generado por /api/login.php

### Ejemplos

Ejemplo de request con jQuery:
```js
$.ajax({
  url: '/api/logout.php',
  method: 'delete',
  success: function() {
    console.log('Sesión finalizada');
  },
  error: function(xhr) {
    alert(xhr.responseJSON.error);
  }
});
```

Ejemplo de respuesta exitosa:
```json
{
  "success": true
}
```

Ejemplo de respuesta fallida:
```json
{
  "success": false,
  "error": "Mensaje de error"
}
```

## GET /api/mercancias/index.php

Este endpoint permite listar los registros de mercancías actualmente en la base de datos.
Solo las mercancías asociadas al usuario que usa la API son mostradas. Las mercancías se
devuelven en páginas, junto con número de página y cantidad de elementos por página.

### Detalles del endpoint

* **Método HTTP**: GET
* Parámetros (en la URL):
  * **page**: Número de página a visualizar. Por defecto es _1_.
  * **per_page**: Número de elementos por página. Por defecto es _15_.
* Headers esperados:
  * **Authorization: Bearer _token_** donde _token_ es el generado por /api/login.php

### Ejemplos

Ejemplo de request con jQuery:
```js
$.ajax({
  url: '/api/mercancias/index.php',
  method: 'get',
  data: {
    page: 1,
    per_page: 30
  }.
  success: function(response) {
    console.log(response.mercancia);
  },
  error: function(xhr) {
    alert(xhr.responseJSON.error);
  }
});
```

Ejemplo de respuesta exitosa:
```json
{
  "success": true,
  "mercancias": [
    {
      "idViaje": 1,
      "cdestino": "Destino",
      "Cliente": "Cliente pagador",
      // resto de parámetros...
    },
    {
      "idViaje": 2,
      "cdestino": "Destino",
      "Cliente": "Cliente pagador",
      // resto de parámetros...
    },

    // resto de mercancías...

    {
      "idViaje": 30,
      "cdestino": "Destino",
      "Cliente": "Cliente pagador",
      // resto de parámetros...
    }
  ],
  "page": 1,
  "per_page": 30
}
```

Ejemplo de respuesta fallida:
```json
{
  "success": false,
  "error": "Mensaje de error"
}
```

## POST /api/mercancias/create.php

Este endpoint permite crear un nuevo registro de mercancía. Los atributos de la nueva
mercancía deben ser enviados en el cuerpo de la request en formato JSON. Los campos
requeridos son los mismos que se usan cuando se crea una mercancía desde el admin del
sitio. Todos los parámetros listados abajo son obligatorios, pero pueden enviarse en blanco
si es necesario. La nueva mercancía se asocia automáticamente al usuario que esta usando
la API.

### Detalles del endpoint

* **Método HTTP**: POST
* Parámetros (en la URL): Ninguno
* Parámetros (en el body, requeridos):
  * **cdestino**
  * **Coberturas1**
  * **Coberturas2**
  * **Coberturas3**
  * **Coberturas4**
  * **corigen**
  * **cuota**
  * **detalles**
  * **edestino**
  * **eorigen**
  * **FechaAlta**
  * **FechaLlegada**
  * **FechaSalida**
  * **folio**
  * **gastosexp**
  * **importe**
  * **iva**
  * **mercancia**
  * **moneda**
  * **pdestino**
  * **porigen**
  * **poliza**
  * **prima**
  * **rfc**
  * **TipoOperacion**
  * **TipoTransporte**
  * **total**
* Headers esperados:
  * **Authorization: Bearer _token_** donde _token_ es el generado por /api/login.php

### Ejemplos

Ejemplo de request con jQuery:
```js
$.ajax({
  url: '/api/mercancias/create.php',
  method: 'post',
  data: {
    // Todos los parámetros de la mercancía
  },
  success: function(response) {
    console.log(response.mercancia);
  },
  error: function(xhr) {
    alert(xhr.responseJSON.error);
  }
});
```

Ejemplo de respuesta exitosa:
```json
{
  "success": true,
  "mercancia": {
    "cdestino": "Destino",
    "Cliente": "Cliente pagador",
    // resto de parámetros...
  }
}
```

Ejemplo de respuesta fallida:
```json
{
  "success": false,
  "error": "Mensaje de error"
}
```

## PATCH /api/mercancias/update.php

Este endpoint permite modificar un registro de mercancía. Los atributos de la
mercancía deben ser enviados en el cuerpo de la request en formato JSON. Los campos
permitidos son los mismos que se usan cuando se crea una mercancía desde el admin del
sitio. Todos los parámetros listados abajo son opcionales. Solo se modificará un parámetro
si es incluído en la request. El usuario que usa la API solo puede modificar mercancias
asociadas a sí mismo.

### Detalles del endpoint

* **Método HTTP**: PATCH
* Parámetros (en la URL):
  * **id**: ID de la mercancia a modificar
* Parámetros (en el body, opcionales):
  * **cdestino**
  * **Coberturas1**
  * **Coberturas2**
  * **Coberturas3**
  * **Coberturas4**
  * **corigen**
  * **cuota**
  * **detalles**
  * **edestino**
  * **eorigen**
  * **FechaAlta**
  * **FechaLlegada**
  * **FechaSalida**
  * **folio**
  * **gastosexp**
  * **importe**
  * **iva**
  * **mercancia**
  * **moneda**
  * **pdestino**
  * **porigen**
  * **poliza**
  * **prima**
  * **rfc**
  * **TipoOperacion**
  * **TipoTransporte**
  * **total**
* Headers esperados:
  * **Authorization: Bearer _token_** donde _token_ es el generado por /api/login.php

### Ejemplos

Ejemplo de request con jQuery:
```js
$.ajax({
  url: '/api/mercancias/update.php',
  method: 'patch',
  data: {
    "moneda": "MXN"
  },
  success: function(response) {
    console.log(response.mercancia);
  },
  error: function(xhr) {
    alert(xhr.responseJSON.error);
  }
});
```

Ejemplo de respuesta exitosa:
```json
{
  "success": true,
  "mercancia": {
    // Atributos originales sin cambios
    "cdestino": "Destino",
    "Cliente": "Cliente pagador",

    // Atributos modificados
    "moneda": "MXN",

    // resto de parámetros...
  }
}
```

Ejemplo de respuesta fallida:
```json
{
  "success": false,
  "error": "Mensaje de error"
}
```

## DELETE /api/mercancias/delete.php

Este endpoint permite eliminar un registro de mercancía especificando su ID. Ninguno de los
registros relacionados a la mercancía es eliminado. El usuario que usa la API solo puede
eliminar mercancías asociadas a sí mismo.

### Detalles del endpoint

* **Método HTTP**: DELETE
* Parámetros (en la URL):
  * **id**: ID de la mercancía a eliminar
* Headers esperados:
  * **Authorization: Bearer _token_** donde _token_ es el generado por /api/login.php

### Ejemplos

Ejemplo de request con jQuery:
```js
$.ajax({
  url: '/api/mercancias/delete.php',
  method: 'delete',
  data: { id: 1 },
  success: function() {
    console.log('Mercancía borrada');
  },
  error: function(xhr) {
    alert(xhr.responseJSON.error);
  }
});
```

Ejemplo de respuesta exitosa:
```json
{
  "success": true,
  "mercancia": {
    "idViaje": 1,
    "cdestino": "Destino",
    "Cliente": "Cliente pagador",
    // resto de parámetros...
  }
}
```

Ejemplo de respuesta fallida:
```json
{
  "success": false,
  "error": "Mensaje de error"
}
```