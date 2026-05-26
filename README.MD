# Sistema de Seguimiento de Equipos y Herramientas

Aplicación web para el registro y control de préstamos y devoluciones de herramientas y equipos en una organización. Desarrollada con PHP, MySQL, HTML, CSS y JavaScript vanilla. No requiere frameworks externos.

---

## Requisitos

- Windows 10 u 11
- [XAMPP](https://www.apachefriends.org) con PHP 8.x y MariaDB/MySQL (versión estable más reciente)
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

### 3. Crear la base de datos

1. Abre el **XAMPP Control Panel** y haz clic en **Start** en Apache y MySQL.
2. Abre tu navegador y entra a: `http://localhost/phpmyadmin`
3. Haz clic en la pestaña **SQL** en el menú superior.
4. Copia y pega el contenido del archivo `database/schema.sql` que está en este repositorio.
5. Haz clic en **Continuar** para ejecutarlo.

Esto creará la base de datos `sistema_herramientas` con todas las tablas necesarias y el usuario administrador por defecto.

### 4. Verificar la conexión

El archivo de configuración de la base de datos está en `config/db.php`. Los valores por defecto de XAMPP no requieren cambios:

```
Host:     127.0.0.1
Base de datos: sistema_herramientas
Usuario:  root
Contraseña: (vacía)
```

Si tu instalación de XAMPP usa una contraseña para el usuario `root`, edita ese archivo y agrégala en `DB_PASS`.

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
│   ├── header.php              # Navbar y apertura HTML
│   └── footer.php              # Cierre HTML
│
├── modules/
│   ├── herramientas/           # Inventario: registro, edición, baja
│   ├── trabajadores/           # Catálogo de personal
│   ├── prestamos/              # Registro de préstamos y devoluciones
│   ├── historial/              # Consulta de movimientos por herramienta o trabajador
│   └── categorias/             # Gestión de categorías de herramientas
│
├── assets/
│   ├── css/style.css           # Estilos del sistema
│   └── js/main.js              # Validaciones y búsqueda en tiempo real
│
├── database/
│   └── schema.sql              # Script SQL para crear la base de datos
│
├── login.php                   # Pantalla de inicio de sesión
├── logout.php                  # Cierre de sesión
├── dashboard.php               # Pantalla principal con resumen y accesos rápidos
└── README.md                   # Este archivo
```

---

## Funcionalidades

- **Inventario de herramientas** — registro, edición y baja lógica con filtros por estado y categoría
- **Catálogo de trabajadores** — registro y gestión del personal que solicita herramientas
- **Préstamos** — registro del ciclo completo: préstamo → devolución con actualización automática de estado
- **Historial** — consulta de movimientos por herramienta o por trabajador
- **Dashboard** — resumen en tiempo real con contadores y accesos rápidos
- **Autenticación** — sesión protegida con usuario y contraseña

---

## Notas técnicas

- El sistema corre íntegramente en red local. No requiere conexión a internet.
- El estado de las herramientas (`disponible`, `prestada`, `mantenimiento`) es gestionado automáticamente por el módulo de préstamos y no puede modificarse manualmente.
- Las bajas de herramientas y la desactivación de trabajadores son lógicas: los registros se conservan en la base de datos para mantener el historial completo.
- No es posible dar de baja una herramienta ni desactivar un trabajador que tenga un préstamo activo abierto.