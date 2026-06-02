# Sistema de Seguimiento de Equipos y Herramientas

Aplicación web para el registro y control de préstamos y devoluciones de herramientas y equipos en una organización. Desarrollada con PHP, MySQL, HTML, CSS y JavaScript vanilla. No requiere frameworks de frontend.

---

## Requisitos

- Windows 10 u 11
- [XAMPP](https://www.apachefriends.org) con PHP 8.x y MariaDB/MySQL (versión estable más reciente)
- [Composer](https://getcomposer.org) para instalar dependencias PHP (mPDF)
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

### 3. Instalar Composer

Composer es el gestor de dependencias de PHP que se necesita para instalar mPDF (librería de reportes PDF).

1. Descarga el instalador desde https://getcomposer.org/Composer-Setup.exe y ejecútalo.
2. El instalador detectará automáticamente el PHP de XAMPP. Si no lo hace, apúntalo manualmente a:
   ```
   C:\xampp\php\php.exe
   ```
3. Completa la instalación con las opciones por defecto.
4. Abre una terminal nueva (CMD o PowerShell) y verifica que quedó instalado correctamente:
   ```bash
   composer --version
   ```
   Deberías ver algo como `Composer version 2.x.x`.

### 4. Instalar dependencias PHP

Con Composer instalado, ejecuta dentro de la carpeta del proyecto:

```bash
cd C:\xampp\htdocs\sistema-herramientas
composer install
```

Esto creará la carpeta `vendor/` con la librería mPDF y todo lo que necesita para funcionar.

### 5. Crear la base de datos y el usuario

1. Abre el **XAMPP Control Panel** y haz clic en **Start** en Apache y MySQL.
2. Abre tu navegador y entra a: `http://localhost/phpmyadmin`
3. Haz clic en la pestaña **SQL** en el menú superior.
4. Copia y pega el contenido del archivo `database/schema.sql` que está en este repositorio.
5. Haz clic en **Continuar** para ejecutarlo.

Esto creará la base de datos `sistema_herramientas` con todas las tablas necesarias y el usuario administrador por defecto.

Luego crea el usuario de base de datos que usa la aplicación. En la misma pestaña SQL ejecuta:

```sql
CREATE USER 'sist_herr'@'127.0.0.1' IDENTIFIED BY 'password123';
GRANT ALL PRIVILEGES ON sistema_herramientas.* TO 'sist_herr'@'127.0.0.1';
FLUSH PRIVILEGES;
```

### 6. Verificar la configuración

El archivo de configuración de la base de datos está en `config/db.php` con los siguientes valores por defecto:

```
Host:          127.0.0.1
Base de datos: sistema_herramientas
Usuario:       sist_herr
Contraseña:    password123
```

Si cambiaste el usuario o la contraseña al crearlo, edita ese archivo y actualiza los valores `DB_USER` y `DB_PASS`.

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
│   └── db.php                  # Configuración de conexión a la base de datos
│
├── includes/
│   ├── auth.php                # Verificación de sesión activa
│   ├── header.php              # Sidebar, topbar y apertura HTML
│   └── footer.php              # Cierre HTML y script del sidebar
│
├── modules/
│   ├── herramientas/           # Inventario: registro, edición y baja lógica
│   ├── trabajadores/           # Catálogo de personal: registro, edición y activación
│   ├── prestamos/              # Registro de préstamos y devoluciones
│   ├── historial/              # Consulta de movimientos por herramienta o trabajador
│   ├── categorias/             # Gestión de categorías de herramientas
│   └── reportes/               # Generación de reportes PDF con mPDF
│
├── assets/
│   ├── css/style.css           # Estilos del sistema (tema oscuro)
│   └── js/main.js              # Validaciones de formulario y búsqueda en tiempo real
│
├── database/
│   └── schema.sql              # Script SQL para crear la base de datos y tablas
│
├── vendor/                     # Dependencias instaladas por Composer (no incluidas en el repo)
├── composer.json               # Definición de dependencias PHP
├── login.php                   # Pantalla de inicio de sesión
├── logout.php                  # Cierre de sesión
└── dashboard.php               # Pantalla principal con resumen y accesos rápidos
```

---

## Funcionalidades

- **Inventario de herramientas** — registro, edición y baja lógica con filtros por estado y categoría
- **Catálogo de trabajadores** — registro, edición y activación/desactivación del personal
- **Préstamos** — registro del ciclo completo: préstamo → devolución con actualización automática del estado de la herramienta
- **Historial** — consulta de todos los movimientos filtrados por herramienta o por trabajador
- **Reportes PDF** — generación de reporte de inventario con filtros, descargable directamente desde el navegador
- **Dashboard** — resumen en tiempo real con contadores por estado y accesos rápidos a las operaciones principales
- **Autenticación** — sesión protegida con usuario y contraseña mediante `password_hash` / `password_verify`

---

## Notas técnicas

- El sistema corre íntegramente en red local. No requiere conexión a internet.
- El estado de las herramientas (`disponible`, `prestada`, `mantenimiento`) es gestionado automáticamente por el módulo de préstamos y no puede modificarse de forma manual desde el formulario de edición.
- Al registrar una devolución con estado "Requiere mantenimiento", la herramienta queda en ese estado y no estará disponible para nuevos préstamos hasta que se actualice manualmente.
- Las bajas de herramientas y la desactivación de trabajadores son lógicas: los registros se conservan en la base de datos para mantener el historial completo.
- No es posible dar de baja una herramienta ni desactivar un trabajador que tenga un préstamo activo abierto.
- El registro de préstamos usa transacciones con bloqueo a nivel de fila (`FOR UPDATE`) para evitar condiciones de carrera en entornos con acceso concurrente.