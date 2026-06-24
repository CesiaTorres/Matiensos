# Reglas de negocio

- El usuario debe estar registrado para comprar[cite: 1].
- El stock se controla por variante (tipo de material, color o modelo).
- Solo administradores pueden acceder al panel administrativo[cite: 1].
- Los pedidos se registran con estado inicial "Pendiente"[cite: 1].

---

# Autores

Desarrollado por Romero Ingrid Luana y Torres Jemina Cesia.

# Manual de Usuario — MATIENSOS

**Tienda Online de Mates, Termos y Bombillas**
Versión 1.0 | Junio 2026

---

## Índice

1. [Introducción](#1-introducción)
2. [Registro e Inicio de Sesión](#2-registro-e-inicio-de-sesión)
3. [Navegación General](#3-navegación-general)
4. [Catálogo de Productos](#4-catálogo-de-productos)
5. [Detalle de Producto](#5-detalle-de-producto)
6. [Carrito de Compras](#6-carrito-de-compras)
7. [Proceso de Compra](#7-proceso-de-compra)
8. [Mis Pedidos](#8-mis-pedidos)
9. [Formulario de Consultas](#9-formulario-de-consultas)
10. [Panel de Administración](#10-panel-de-administración)

---

## 1. Introducción

MATIENSOS es una tienda online de mates, termos y bombillas[cite: 1]. Permite navegar el catálogo, agregar productos al carrito, realizar pedidos y hacer consultas directamente desde el sitio[cite: 1].

---

## 2. Registro e Inicio de Sesión

### Registrarse

1. Ir a `/login`[cite: 1].
2. Completar: nombre, email y contraseña[cite: 1].
3. Hacer clic en **Registrarse**[cite: 1].
4. El sistema crea la cuenta y redirige al inicio[cite: 1].

### Iniciar sesión

1. Ir a `/login`[cite: 1].
2. Ingresar email y contraseña registrados[cite: 1].
3. Hacer clic en **Iniciar sesión**[cite: 1].
4. El token de sesión se guarda en el navegador automáticamente[cite: 1].

### Cerrar sesión

- Hacer clic en el botón **Cerrar sesión** en el navbar[cite: 1].
- El sistema elimina el token y la sesión[cite: 1].

---

## 3. Navegación General

El navbar superior contiene:

| Sección          | URL                 | Descripción                               |
| ---------------- | ------------------- | ----------------------------------------- |
| Inicio           | `/matiensos.test`   | Hero, productos destacados y CTA[cite: 1] |
| Quiénes Somos    | `/quienes-somos`    | Historia, equipo y valores[cite: 1]       |
| Productos        | `/productos`        | Catalogo completo de productos [cite: 1]  |
| Comercialización | `/comercializacion` | Incluye las secciones de Envíos y         |
|                  |                     | Entregas y Medios de Pago[cite: 1]        |
| Contacto         | `/contacto`         | Datos de contacto FAQ y formulario        |
|                  |                     | de consulta[cite: 1]                      |

El **ícono de carrito** (🛍) en el navbar muestra la cantidad de productos agregados y abre el panel lateral[cite: 1].

---

## 4. Catálogo de Productos

En `/catalogo` se muestran todos los mates, termos y bombillas disponibles en una grilla responsive[cite: 1].

Cada tarjeta muestra:

- Imagen del producto[cite: 1]
- Nombre del producto[cite: 1]
- Precio [cite: 1]
- Botón **Agregar** para sumar al carrito[cite: 1]

---

## 5. Detalle de Producto

Al acceder a la ruta `/detalle/{id}` de un mate, termo o bombilla, se despliega la interfaz con los siguientes elementos:

- **Visualización:** Foto principal del artículo en alta calidad.
- **Identificación:** Nombre comercial del producto y su código único de registro.
- **Precio:** Valor de venta al público.
- **Selector de variantes:**
    - _Variantes con stock:_ Se habilitan normalmente para la selección.
    - _Variantes sin stock:_ No estan visibles para el cliente. Para administradores aparecen deshabilitadas o grisadas.
- **Indicador visual de disponibilidad:**
    - 🟢 **Verde:** Stock disponible en depósito (10 o más unidades disponibles).
    - 🔴 **Rojo:** Últimas unidades disponibles en inventario (stock critico menos de 5 unidades).
- **Botón Agregar al carrito:** Este botón se activa únicamente cuando el usuario selecciona una variante que tenga stock. Al hacer clic, añade de forma automática **una sola unidad** al panel lateral rápido de la derecha.

## 6. Carrito de Compras

El sistema cuenta con dos instancias separadas para la gestión y revisión de los productos seleccionados:

### A. Panel Lateral Rápido (Offcanvas)

Se despliega de forma flotante desde el margen derecho de la pantalla al presionar el ícono del carrito en el navbar, permitiendo una visualización rápida sin salir de la página actual. Muestra:

- Lista de artículos agregados con su imagen, nombre, cantidad fija (1) y precio unitario.
- Ícono de papelera (🗑️) al lado de cada producto para una eliminación rápida.
- Indicador del **Total** acumulado en negrita y tipografía destacada.
- **Botones de acción inferiores:**
    - **Ver Carrito:** Redirige a la pantalla detallada de gestión completa (`/cliente/carrito`).
    - **Iniciar Compra:** Lleva al usuario directamente al proceso de checkout (`/confirmar-compra`).

### B. Página de "Detalle de tu Carrito"

Al hacer clic en "Ver Carrito", el sistema redirige a la ruta dedicada `http://matiensos.test/cliente/carrito`. En esta interfaz de página completa se despliega una tabla interactiva con las siguientes funciones:

- **Gestión de Unidades:** Una columna central de **Cantidad** con un casillero dinámico para modificar manualmente el número de unidades que se desean comprar de cada mate, termo o bombilla.
- **Cálculo Automático:** Columnas para visualizar el **Precio** unitario y el **Subtotal** de cada fila calculados en tiempo real según la cantidad ingresada.
- **Botón Vaciar Carrito:** Ubicado en la esquina inferior izquierda, permite limpiar por completo todos los elementos seleccionados de una sola vez.
- **Botón Seguir Comprando:** Enlace de retorno directo a la tienda para continuar explorando el catálogo de productos.

> El estado del carrito persiste en el navegador (`localStorage`). Si el usuario cierra la pestaña o recarga el sitio, los productos seleccionados permanecen guardados en la sesión.

## 7. Proceso de Compra

Al ir a `/confirmar-compra`[cite: 1]:

**Paso 1 — Datos de envío**[cite: 1]
Completar: Calle, Altura, Piso/Dpto [cite: 1]. Todos los campos son obligatorios excepto el Piso/Dpto[cite: 1].

**Paso 2 — Método de pago**[cite: 1]
Completar: Nro de tarjeta, Vencimiento, CVC[cite: 1]. Todos los campos son obligatorios.

**Confirmar pago**[cite: 1]
Al hacer clic se validan los datos. Si todo está correcto, aparece el mensaje de confirmación y el pedido queda registrado[cite: 1].

---

## 8. Mis Pedidos

En `/pedidos` se puede ver el historial de compras[cite: 1]:

- Lista de todos los pedidos ordenados por fecha[cite: 1].
- Estado de cada pedido (🟡 Pendiente, 🔵 En preparación, 🚛 En camino, ✅ Entregado)[cite: 1].
- Detalle completo al hacer clic: timeline del estado, productos comprados, datos de envío y costo total[cite: 1].

---

## 9. Formulario de Consultas

En `/consultas` hay un formulario para enviar preguntas[cite: 1]:

**Campos:** Correo, Asunto y Mensaje[cite: 1]. Al enviar, si todos los campos son válidos, se muestra una pantalla de confirmación[cite: 1].

---

## 10. Panel de Administración

Accesible desde el navbar en el icono de perfil se desplega la opcion de "Gestionar tienda" (solo usuarios administradores)[cite: 1].

### Secciones disponibles:

- **Dashboard:** Estadísticas generales[cite: 1].
- **Productos:** ABM de mates, termos y bombillas[cite: 1].
- **Pedidos:** Ver y gestionar los estados de las compras[cite: 1].
- **Usuarios:** Lista de usuarios registrados[cite: 1].
- **Consultas:** Gestión y respuesta de mensajes de clientes[cite: 1].

---

# Especificación Técnica y Guía de Instalación — MATIENSOS

## Índice Técnico

1. [Arquitectura y Tecnologías](#1-arquitectura-y-tecnologías)
2. [Instrucciones para Levantar el Proyecto](#2-instrucciones-para-levantar-el-proyecto)
3. [Estructura del Proyecto](#3-estructura-del-proyecto)
4. [Comandos Útiles](#4-comandos-útiles)

---

## 1. Arquitectura y Tecnologías

El sistema está estructurado bajo el entorno del framework Laravel, utilizando herramientas modernas para el empaquetado de assets y la estilización de la interfaz:

| Capa              | Tecnología                |
| ----------------- | ------------------------- |
| Framework backend | Laravel 13.x              |
| Autenticación     | Laravel Sanctum / Session |
| Base de datos     | SQLite                    |
| Frontend          | Tailwind CSS v4 + Blade   |
| Gestión de assets | Vite 8                    |
| Conexión HTTP     | Axios                     |

---

## 2. Instructions para Levantar el Proyecto

Gracias a los scripts personalizados del equipo incluidos en la configuración, el proceso de instalación en tu entorno local está completamente automatizado.

### 2.1 Clonar el repositorio

```bash
git clone [https://github.com/CesiaTorres/Matiensos.git](https://github.com/CesiaTorres/Matiensos.git)
cd Matiensos

2.2 Configuración automática (Setup)

Ejecutá el siguiente comando en tu terminal. Este script se encargará de instalar las dependencias de PHP con Composer, copiar el archivo de entorno .env, generar la clave de la aplicación, migrar la base de datos SQLite, instalar los paquetes de Node y compilar los recursos estáticos automáticamente:

Bash
composer run setup

2.3 Ejecutar la aplicación en desarrollo
Para levantar el servidor local de Laravel y activar el compilador de Vite en tiempo real de forma simultánea a través de procesos concurrentes, ejecutá:

Bash
composer run dev

3. Estructura del Proyecto
El código fuente de la aplicación se organiza bajo la arquitectura estándar del framework:

Plaintext
Matiensos/
├── app/
│   ├── Http/
│   │   ├── Controllers/       # Controladores de la lógica (Mates, Carrito, Pedidos)
│   │   └── Middleware/        # Filtros de seguridad y control de roles (Admin)
│   └── Models/                # Modelos ORM para la base de datos (Product, User, Variant)
├── database/
│   ├── migrations/            # Estructura de tablas de SQLite (Mates, Stock)
│   ├── factories/             # Generadores de datos de prueba (Faker)
│   └── seeders/               # Pobladores iniciales de la base de datos
├── public/                    # Archivos estáticos y compilados de Vite
├── resources/
│   ├── views/                 # Plantillas y componentes modulares Blade
│   └── css/
│       └── app.css            # Estilos principales con Tailwind CSS v4
├── routes/
│   ├── web.php                # Rutas web del sitio y vistas
│   └── api.php                # Endpoints REST de la aplicación
├── composer.json              # Configuración y scripts de PHP
├── package.json               # Configuración y scripts de Node
└── vite.config.js             # Configuración del bundler Vite

4. Comandos Útiles
Limpieza de caché de la aplicación
Si realizás cambios estructurales en las rutas o archivos de configuración y necesitás limpiar las optimizaciones del framework para ver los cambios reflejados:

Bash
php artisan optimize:clear
```
