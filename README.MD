# Sistema de Seguimiento de Equipos y Herramientas

Aplicación web para el registro y control de préstamos y devoluciones de herramientas y equipos en una organización. Desarrollada con PHP, MySQL, HTML, CSS y JavaScript vanilla.

---

## Requisitos

- Windows 10 u 11
- [XAMPP](https://www.apachefriends.org) con PHP 8.x y MariaDB/MySQL (versión estable más reciente)
- [Composer](https://getcomposer.org) para instalar dependencias PHP
- Navegador web moderno (Chrome, Firefox, Edge, Brave)
- [Git](https://git-scm.com) para clonar el repositorio

---

## Instalación

### 1. Instalar XAMPP

Descarga XAMPP desde https://www.apachefriends.org e instálalo en `C:\xampp` (ruta por defecto recomendada). Durante la instalación asegúrate de marcar los componentes **Apache**, **MySQL** y **phpMyAdmin**.

### 2. Clonar el repositorio

Abre una terminal (CMD o PowerShell) y ejecuta:

```bash
cd C:\xampp\htdocs
git clone <URL_DEL_REPOSITORIO> sistema-herramientas
```

La carpeta del proyecto debe quedar en:
```
C:\xampp\htdocs\sistema-herramientas\
```

### 3. Instalar dependencias PHP

Desde la carpeta del proyecto, ejecuta:

```bash
cd C:\xampp\htdocs\sistema-herramientas
composer install
```

Esto instalará `mPDF`, la librería utilizada para la generación de reportes en PDF.

### 4. Crear la base de datos

1. Abre el **XAMPP Control Panel** y haz clic en **Start** en Apache y MySQL.
2. Abre tu navegador y entra a: `http://localhost/phpmyadmin`
3. Haz clic en la pestaña **SQL** en el menú superior.
4. Copia y pega el contenido del archivo `database/schema.sql` que está en este repositorio.
5. Haz clic en **Continuar** para ejecutarlo.

Esto creará la base de datos `sistema_herramientas` con todas las tablas necesarias y el usuario administrador por defecto.

### 5. Verificar la conexión

El archivo de configuración de la base de datos está en `config/db.php`. Los valores por defecto son:

```
Host:          127.0.0.1
Base de datos: sistema_herramientas
Usuario:       sist_herr
Contraseña:    password123
```

Asegúrate de que el usuario `sist_herr` exista en tu instalación de MySQL con permisos sobre la base de datos `sistema_herramientas`. Si prefieres usar el usuario `root` de XAMPP, edita `config/db.php` y ajusta `DB_USER` y `DB_PASS` según corresponda.

---

## Uso

1. Con Apache y MySQL corriendo en XAMPP, abre tu navegador y entra a:
```
http://localhost/sistema-herramientas/login.php
```

2. Inicia sesión con las credenciales por defecto:
```
Usuario:    admin
Contraseña: password
```

> **Importante:** Cambia la contraseña del administrador después del primer inicio de sesión.

---

## Estructura del proyecto

```
sistema-herramientas/
│
├── config/
│   └── db.php                      # Configuración de conexión a la base de datos
│
├── includes/
│   ├── auth.php                    # Verificación de sesión activa
│   ├── header.php                  # Sidebar, topbar y apertura HTML
│   └── footer.php                  # Cierre HTML y script de sidebar
│
├── modules/
│   ├── herramientas/
│   │   ├── index.php               # Listado con filtros por estado y categoría
│   │   ├── crear.php               # Formulario de registro
│   │   ├── editar.php              # Formulario de edición
│   │   └── baja.php                # Baja lógica (activo = 0)
│   │
│   ├── trabajadores/
│   │   ├── index.php               # Listado de personal
│   │   ├── crear.php               # Formulario de registro
│   │   ├── editar.php              # Formulario de edición
│   │   └── eliminar.php            # Eliminación con validación de trazabilidad
│   │
│   ├── prestamos/
│   │   ├── index.php               # Listado de préstamos activos
│   │   ├── crear.php               # Registro de préstamo con bloqueo transaccional
│   │   └── devolver.php            # Registro de devolución y actualización de estado
│   │
│   ├── historial/
│   │   ├── por_herramienta.php     # Movimientos de una herramienta específica
│   │   └── por_trabajador.php      # Movimientos de un trabajador específico
│   │
│   ├── categorias/
│   │   └── index.php               # Gestión de categorías (crear y eliminar)
│   │
│   └── reportes/
│       ├── reporte_inventario.php  # Formulario de filtros para el reporte
│       └── inventario_pdf.php      # Generación del PDF con mPDF
│
├── assets/
│   ├── css/style.css               # Estilos del sistema
│   └── js/main.js                  # Confirmaciones, validaciones y búsqueda en tiempo real
│
├── database/
│   └── schema.sql                  # Script SQL para crear la base de datos
│
├── vendor/                         # Dependencias Composer (generado por composer install)
├── composer.json                   # Definición de dependencias PHP
├── login.php                       # Pantalla de inicio de sesión
├── logout.php                      # Cierre de sesión
├── dashboard.php                   # Pantalla principal con resumen y accesos rápidos
└── README.md                       # Este archivo
```

---

## Funcionalidades

- **Inventario de herramientas** — registro, edición y baja lógica con filtros por estado y categoría. La baja establece `activo = 0`; el registro se conserva en la base de datos para mantener el historial completo.
- **Catálogo de trabajadores** — registro, edición y eliminación del personal. La eliminación es permanente pero está sujeta a las reglas de trazabilidad descritas más abajo.
- **Categorías** — gestión de categorías de herramientas (crear y eliminar). No es posible eliminar una categoría que esté asignada a alguna herramienta activa.
- **Préstamos** — registro del ciclo completo: préstamo → devolución. Al registrar un préstamo, la herramienta pasa a estado `prestada`; al devolver, regresa a `disponible` o pasa a `mantenimiento` según la condición indicada en la devolución.
- **Historial** — consulta de movimientos filtrada por herramienta o por trabajador, con detalle de estado de devolución y observaciones.
- **Reportes PDF** — generación de reporte de inventario con filtros por estado y categoría, exportado vía mPDF.
- **Dashboard** — resumen en tiempo real con contadores por estado y accesos rápidos a las operaciones principales.
- **Autenticación** — sesión protegida con usuario y contraseña.

---

## Notas técnicas

- El sistema corre íntegramente en red local. No requiere conexión a internet.
- El estado de las herramientas (`disponible`, `prestada`, `mantenimiento`) es gestionado automáticamente por el módulo de préstamos y no puede modificarse manualmente desde el formulario de edición.
- Al registrar una devolución con estado **"Requiere mantenimiento"**, la herramienta queda en estado `mantenimiento` y no estará disponible para nuevos préstamos hasta que se edite manualmente su estado.
- **Baja de herramientas:** es lógica (`activo = 0`). No es posible dar de baja una herramienta con un préstamo activo abierto. El historial de préstamos asociado se conserva.
- **Eliminación de trabajadores:** es permanente y está sujeta a dos validaciones:
  1. No se puede eliminar un trabajador con préstamos activos (herramienta aún fuera del inventario).
  2. No se puede eliminar un trabajador que tenga historial de préstamos vinculado a herramientas que aún existen en el sistema, para preservar la trazabilidad.
  - Si el trabajador solo tiene historial vinculado a herramientas ya dadas de baja (registros huérfanos), la eliminación procede y esos registros se eliminan junto con el trabajador.
- El registro de préstamos utiliza una transacción con bloqueo (`SELECT ... FOR UPDATE`) para evitar condiciones de carrera en entornos con múltiples usuarios simultáneos.
- La carpeta `vendor/` y el archivo `composer.lock` son generados por Composer y están excluidos del repositorio vía `.gitignore`.