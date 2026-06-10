REPÚBLICA BOLIVARIANA DE VENEZUELA
MINISTERIO DEL PODER POPULAR PARA LA DEFENSA
UNIVERSIDAD NACIONAL EXPERIMENTAL POLITÉCNICA DE LA
FUERZA ARMADA
UNEFA
DESARROLLO DE UN SISTEMA DE INFORMACIÓN PARA EL
SEGUIMIENTO DE EQUIPOS Y HERRAMIENTAS EN
UNA ORGANIZACIÓN
AUTORES:
Carlos Heredia y Angel Medina
CI: 31.696.177 y 31.610.198
Prof. Luis Luna
U.C: Implantación de Sistemas
Ing. de Sistemas
D-1
Maracay, Mayo de 2026

ÍNDICE GENERAL
ÍNDICE DE CUADROS..............................................................................iv
INTRODUCCIÓN........................................................................................6
CAPITULO I................................................................................................8
EL PROBLEMA..........................................................................................8
PLANTEAMIENTO DEL PROBLEMA...................................................8
OBJETIVOS DE LA INVESTIGACIÓN................................................10
General................................................................................................10
Específicos..........................................................................................10
JUSTIFICACIÓN DE LA INVESTIGACIÓN..........................................11
IMPORTANCIA DE LA INVESTIGACIÓN............................................12
FACTIBILIDAD DE LA INVESTIGACIÓN............................................12
Factibilidad Técnica............................................................................12
Factibilidad Económica......................................................................13
Factibilidad Operacional....................................................................14
ALCANCES DE LA INVESTIGACIÓN.................................................15
CRONOGRAMA DE ACTIVIDADES....................................................17
CAPÍTULO II.............................................................................................18
COMPONENTE TEÓRICO.......................................................................18
ESTUDIOS PREVIOS SOBRE LA TEMÁTICA....................................18
TEORÍA RELACIONADA SOBRE EL TEMA.......................................20
Sistemas de Prestamo y Seguimiento de Herramientas y
Dispositivos........................................................................................20
Gestión de Herramientas y Equipos en Organizaciones................20
LEGALIDAD.........................................................................................21
GLOSARIO DE TÉRMINOS.................................................................24
CAPITULO III............................................................................................26
COMPONENTE METODOLÓGICO..........................................................26
DISEÑO DE LA INVESTIGACIÓN.......................................................26
TIPO DE INVESTIGACIÓN..................................................................26
ii

INFORMANTES CLAVE.......................................................................27
INSTRUMENTOS DE RECOLECCIÓN DE DATOS.............................28
METODOLOGÍA A USAR Y FASES....................................................29
CAPITULO IV...........................................................................................31
COMPRENSIÓN DEL SISTEMA ACTUAL..............................................31
DESCRIPCIÓN DEL SISTEMA ACTUAL............................................31
OBJETIVO GENERAL.........................................................................32
OBJETIVOS ESPECÍFICOS................................................................32
ENTIDADES QUE INTERVIENEN DIRECTAMENTE..........................33
DESCRIPCIÓN DE PROCESOS..........................................................33
DETERMINACIÓN DE REQUERIMIENTOS........................................35
DIAGRAMA DE FLUJO DE INFORMACIÓN.......................................36
CARTA ESTRUCTURADA...................................................................37
ANÁLISIS DOCUMENTAL...................................................................40
PLATAFORMA A USAR.......................................................................40
CAPITULO V............................................................................................42
COMPRENSIÓN DEL SISTEMA PROPUESTO.......................................42
DESCRIPCIÓN DEL SISTEMA PROPUESTO.....................................42
METODOLOGÍA A USAR....................................................................43
DESCRIPCIÓN DE LOS PROCESOS.................................................46
DIAGRAMA FUNCIONAL....................................................................52
CAPITULO VI...........................................................................................53
IMPLEMENTACIÓN..................................................................................53
BASES DE DATOS..............................................................................53
CÓDIGO DE PROGRAMACIÓN..........................................................55
REFERENCIAS........................................................................................56
iii

ÍNDICE DE CUADROS
Cuadro 1. Solicitud y Entrega de la Herramienta.................................29
Cuadro 2. Registro Manual del Préstamo.............................................29
Cuadro 3. Devolución y Verificación Básica.........................................30
Cuadro 4: Carta Estructurada del Registro de Herramientas.............31
Cuadro 5: Carta Estructurada del Préstamo de Herramientas...........32
Cuadro 6: Carta Estructurada de la Devolución de Herramientas.....33
Cuadro 7: Análisis documental del Libro de Registro de Herramientas
..................................................................................................................34
iv

ÍNDICE DE GRÁFICOS
Gráfico 1: Diagrama de Flujo de Información.......................................36
Gráfico 2: Paleta de Símbolos del Diagrama de Casos de Uso..........44
Gráfico 3: Paleta de Símbolos del Diagrama de Estados....................45
Gráfico 4: Paleta de Símbolos del Diagrama de Actividades..............46
Gráfico 5. Casos de Uso del Registro de Herramientas......................47
Gráfico 6. Diagrama de Estados del Registro de Herramientas.........47
Gráfico 7. Diagrama de Actividades del Registro de Herramientas...48
Gráfico 8. Casos de Uso del Préstamo de Herramientas....................49
Gráfico 9. Diagrama de Estado del Préstamo de Herramientas.........49
Gráfico 10. Diagrama de Actividades del Préstamo de Herramientas50
Gráfico 11. Casos de Uso de la Devolución de Herramientas............51
Gráfico 12. Diagrama de Estados de la Devolución de Herramientas51
Gráfico 13. Diagrama de Actividades de la Devolución de
Herramientas............................................................................................52
Gráfico 14: Diagrama Funcional.............................................................52
Gráfico 15: Modelo Entidad Relación.....................................................53
Gráfico 16: Modelo Jerárquico...............................................................54
Gráfico 17: moddasfsSGWEGGules/prestamos/crear.php..................55
Gráfico 18: modules/prestamos/devolver.php......................................55
Gráfico 19: modules/herramientas/index.php.......................................56
Gráfico 20: assets/js/main.js...................................................................56
Gráfico 21: login.php...............................................................................57
Gráfico 22: Interfaz de login.php............................................................57
v

INTRODUCCIÓN
En el contexto actual de las organizaciones, caracterizado por la
constante búsqueda de eficiencia y transparencia en la administración de
recursos, se ha vuelto imperativo contar con mecanismos efectivos para el
seguimiento y control de los equipos y herramientas utilizados por el
personal. Estos activos, fundamentales para el desarrollo de múltiples
actividades operativas, requieren de un sistema que permita su adecuada
gestión a fin de minimizar pérdidas materiales, retrasos en los procesos y
dificultades en la asignación de responsabilidades.
En numerosas instituciones, tanto públicas como privadas, la ausencia
de sistemas automatizados ha llevado a depender de métodos manuales
de registro, sustentados en planillas físicas o registros informales, los
cuales resultan poco confiables y altamente propensos a errores. Esta
situación incrementa el riesgo de extravíos, deterioros no controlados y
falta de trazabilidad sobre el uso y condición de los bienes, afectando
negativamente la eficiencia operativa de la organización y dificultando la
rendición de cuentas ante los entes de control correspondientes.
Ante este panorama, el presente trabajo de investigación tiene como
propósito desarrollar un sistema de información automatizado para el
registro y control de herramientas y equipos en préstamo dentro de una
organización. La propuesta pretende ofrecer una solución tecnológica
accesible que facilite el monitoreo en tiempo real de los movimientos de
dichos recursos, optimice los procesos administrativos relacionados y
reduzca la incidencia de pérdidas o inconsistencias en el manejo de los
activos. Con la implementación de este sistema se busca fortalecer la
eficiencia institucional, promover la transparencia en la gestión de
recursos y brindar soporte tecnológico a los encargados de logística y
mantenimiento.
El estudio está dirigido especialmente a los administradores de
recursos, personal encargado de mantenimiento y logística, así como a
6

desarrolladores de sistemas interesados en el diseño de soluciones
orientadas al control de activos en préstamo. Teóricamente, la
investigación se fundamenta en los principios de los sistemas de
información y la gestión de activos institucionales, haciendo uso de un
diseño metodológico de tipo descriptivo y no experimental, apoyado en
entrevistas como instrumento principal para la recolección de los datos.
Este documento se organiza en tres capítulos: el Capítulo I aborda el
planteamiento del problema, los objetivos que guían la investigación y su
justificación; el Capítulo II presenta el componente teórico, compuesto por
los antecedentes, teorías relacionadas, bases legales y un glosario de
términos vinculados a la temática; finalmente, el Capítulo III detalla el
enfoque metodológico empleado, incluyendo el diseño de la investigación,
tipo de investigación, informantes clave, los instrumentos aplicados, así
como la metodología utilizada y sus distintas fases.
7

CAPITULO I
EL PROBLEMA
PLANTEAMIENTO DEL PROBLEMA
La gestión organizativa moderna requiere de una administración
adecuada de los recursos y herramientas de trabajo para lograr la
eficiencia operativa y la correcta ejecución de las actividades. Los
equipos especializados junto con las herramientas de trabajo requieren
un control adecuado para garantizar su disponibilidad y los estándares
de rendimiento y protección de la integridad, independientemente del
tamaño y el sector de la empresa. La falta de sistemas de control
eficaces provoca pérdidas económicas junto con retrasos en las
operaciones y una reducción de la productividad.
En este sentido, la correcta gestión de los equipos junto con las
herramientas es esencial para un funcionamiento continuo. Las
organizaciones pueden mejorar su capacidad de toma de decisiones y
reducir los riesgos operativos conociendo qué herramientas existen, cuál
es su estado operativo y quién y cuándo las utilizan. Gestionar el uso de
los equipos garantiza un buen seguimiento y un uso responsable de los
mismos.
Sin embargo, la mayoría de las empresas en Venezuela,
especialmente las pequeñas y medianas, operan sin sistemas
establecidos de seguimiento y control de sus herramientas. La
administración de las herramientas se realiza a través de las
tradicionales anotaciones en cuadernos u hojas de cálculo, así como a
través del seguimiento personal y apalabreado de los responsables. La
ausencia de sistemas de registro adecuados provoca incoherencias en la
información, al tiempo que crea dificultades para delimitar
8

responsabilidades y ocasiona la posible pérdida de activos que deberían
ser imputables.
De hecho, el estado de Aragua muestra idénticos problemas de
gestión. Las distintas organizaciones se esfuerzan por hacer un
seguimiento eficaz de los préstamos de equipos, junto con su ubicación y
estado físico, así como de la devolución de los activos. La ausencia de
un enfoque sistemático del trabajo de gestión da lugar a necesidades
administrativas adicionales basadas en el tiempo y los recursos humanos
que podrían automatizarse. La ausencia de sistemas organizativos
adecuados provoca la pérdida de equipos, así como una mala gestión de
las herramientas entre los miembros del personal.
En estas organizaciones surgen varios problemas generalizados
debido a un mantenimiento inadecuado de los registros:
 Pérdidas de herramientas: Ocurren frecuentemente debido a la falta
de un seguimiento sistemático de su ubicación y préstamo, lo que
hace difícil rastrear su paradero una vez que salen de un control
centralizado.
 Desconocimiento del estado de las herramientas: La ausencia de
registros actualizados sobre su uso, mantenimiento y revisiones
impide saber si una herramienta está operativa, necesita reparación o
ha llegado al fin de su vida útil.
 Atribución de responsabilidades poco clara respecto a las
herramientas: La inexistencia de un historial de quién utilizó o se hizo
cargo de una herramienta en un momento dado genera conflictos y
dificulta asignar responsabilidades en caso de daño o extravío.
 Duplicación de registros manuales: Se presenta a menudo porque
diferentes personas o departamentos llevan sus propios controles
aislados, sin un sistema centralizado que consolide la información, lo
que lleva a redundancias y errores.
 Retrasos operativos por falta de disponibilidad: Surgen cuando no se
tiene información precisa sobre la ubicación o el estado de las
9

herramientas necesarias, obligando a buscar manualmente o a
esperar su devolución, impactando directamente la eficiencia de las
operaciones.
La ausencia de un sistema automatizado de seguimiento del inventario
de herramientas y equipos es una de las causas fundamentales de
dichos problemas de inventario de la organización. Las organizaciones
se enfrentan a un aumento de los errores humanos porque mantienen
sus registros en diferentes sistemas físicos y digitales sin procedimientos
de formación estandarizados. La capacidad de la organización para
llevar a cabo una supervisión en tiempo real se ve restringida al no
disponer de una función de información automática.
Ante esta situación, se propone desarrollar un sistema de información
para realizar un seguimiento de los equipos y herramientas en toda una
organización. El sistema permitirá llevar un control eficaz de los
préstamos junto con las devoluciones y el seguimiento del estado,
ubicación y disponibilidad de los equipos para optimizar el uso de los
mismos y reducir las pérdidas. La implementación de esta solución
tecnológica permitirá mejorar la gestión interna de la organización,
además de impulsar la transparencia de la gestión de activos,
representando una mejora significativa para las operaciones de la
organización.
OBJETIVOS DE LA INVESTIGACIÓN
GENERAL
• Desarrollar un sistema de información que permita el seguimiento de
los equipos y herramientas en una organización.
ESPECÍFICOS
 Determinar los requerimientos funcionales y no funcionales del
sistema de información propuesto.
10

 Analizar los procesos involucrados en el registro y seguimiento de
equipos y herramientas.
 Diseñar la arquitectura y diagramación del sistema de información
para la gestión de equipos y herramientas.
 Implementar el sistema en el entorno organizacional para optimizar la
gestión de dichos recursos.
JUSTIFICACIÓN DE LA INVESTIGACIÓN
En la actualidad, muchas organizaciones, especialmente pequeñas y
medianas empresas en Venezuela, enfrentan dificultades significativas
en el control y seguimiento de sus herramientas y equipos de trabajo.
Esta problemática se manifiesta en pérdidas de activos, retrasos en las
operaciones, registros inconsistentes y una distribución inadecuada de
responsabilidades. Estas fallas, comunes en organizaciones del estado
Aragua, impactan directamente en la productividad y eficiencia operativa,
además de aumentar los riesgos financieros.
La presente investigación surge de la necesidad de atender esta
situación, proponiendo el desarrollo de un sistema de información que
permita a las organizaciones registrar y hacer seguimiento a sus equipos
y herramientas de forma automatizada, precisa y confiable. El sistema
busca optimizar el uso de los recursos, evitar pérdidas, mejorar la toma
de decisiones y garantizar mayor transparencia en la gestión de activos.
Este proyecto es relevante porque responde a una necesidad real en
el entorno organizacional actual, donde muchas empresas carecen de
soluciones tecnológicas accesibles para este tipo de control. Su
implementación puede reducir errores humanos derivados de métodos
tradicionales como registros en cuadernos o archivos digitales dispersos.
Desde el punto de vista social, el sistema propuesto mejorará la
eficiencia operativa y fomentará una cultura de responsabilidad dentro de
los equipos de trabajo.
11

IMPORTANCIA DE LA INVESTIGACIÓN
La presente investigación reviste una importancia significativa tanto
para el ámbito tecnológico como para el organizacional, puesto que
aborda una problemática concreta que afecta directamente la eficiencia
operativa de numerosas instituciones en Venezuela. El desarrollo de un
sistema de información para el seguimiento de equipos y herramientas
representa un aporte tangible a la modernización de los procesos
administrativos internos, contribuyendo a reducir las deficiencias
generadas por los métodos manuales que aún predominan en muchas
organizaciones del estado Aragua y del país en general.
Desde el punto de vista académico, este proyecto permite a los
estudiantes investigadores aplicar los conocimientos adquiridos en el
área de Diseño de Sistemas e Ingeniería de Sistemas, consolidando
competencias en el análisis, diseño e implementación de soluciones
informáticas reales. La investigación fortalece la formación profesional de
los estudiantes al enfrentarlos a un problema genuino del entorno
laboral, donde deben integrar metodologías de desarrollo, herramientas
tecnológicas y habilidades de levantamiento de requerimientos.
A nivel institucional, el proyecto cobra relevancia al alinearse con los
principios establecidos en la Ley de Infogobierno y demás marcos
jurídicos venezolanos que promueven el uso de tecnologías de
información para mejorar la gestión pública y privada. Su implementación
demuestra que es posible desarrollar soluciones tecnológicas
funcionales con recursos limitados, utilizando plataformas de desarrollo
web estándar como PHP, HTML, CSS, JavaScript y MySQL, lo que lo
convierte en un modelo replicable para otras organizaciones con
necesidades similares.
FACTIBILIDAD DE LA INVESTIGACIÓN
FACTIBILIDAD TÉCNICA
Desde el punto de vista técnico, el desarrollo del sistema de
12

información propuesto es completamente viable, dado que las
tecnologías seleccionadas para su implementación son ampliamente
conocidas, de acceso libre y compatibles con los recursos disponibles en
el entorno organizacional. El uso de PHP, HTML, CSS, JavaScript y
MySQL representa un conjunto de herramientas estándar en el
desarrollo web, sobre las cuales los investigadores poseen
conocimientos suficientes para llevar a cabo el proyecto de manera
satisfactoria.
El sistema será desplegado en un ordenador de escritorio del taller que
actuará como servidor local, el cual deberá contar con al menos dos
núcleos de procesamiento, 4 GB de memoria RAM y almacenamiento
suficiente para gestionar los registros históricos generados. Estas
especificaciones son modestas y corresponden a equipos de uso común
en las organizaciones actuales, por lo que no representan una barrera
técnica para la implementación. El entorno de desarrollo XAMPP o
WAMP permitirá integrar de forma sencilla el servidor Apache, el
intérprete PHP y el gestor de base de datos MySQL en un mismo equipo
durante la fase de pruebas.
Adicionalmente, el acceso al sistema a través de navegadores web
modernos elimina la necesidad de instalar software adicional en los
equipos de los usuarios, lo que simplifica su despliegue y mantenimiento.
La arquitectura cliente-servidor adoptada garantiza que el sistema pueda
ser utilizado desde múltiples dispositivos conectados a la red interna sin
requerir configuraciones complejas. En síntesis, los recursos técnicos
necesarios están disponibles y son suficientes para el desarrollo e
implementación del sistema dentro de los plazos establecidos.
FACTIBILIDAD ECONÓMICA
El proyecto es económicamente factible debido a que su desarrollo se
sustenta en el uso exclusivo de tecnologías de código abierto y
distribución gratuita, lo que elimina los costos asociados a la adquisición
13

de licencias de software. PHP, MySQL, Apache, HTML, CSS y JavaScript
son herramientas de libre acceso que no generan ningún gasto adicional
para la organización ni para los investigadores, permitiendo enfocar los
recursos disponibles en el desarrollo mismo del sistema.
Los costos del proyecto se limitan fundamentalmente a los gastos
operativos propios de la investigación, tales como el uso de equipos de
computación ya existentes, el consumo de servicios de internet para la
consulta de fuentes y la comunicación entre los involucrados, así como
los materiales necesarios para la documentación y presentación del
trabajo. Ninguno de estos costos representa una inversión significativa
que comprometa la viabilidad del proyecto.
Desde la perspectiva de la organización beneficiada, la
implementación del sistema no requiere la adquisición de hardware
especializado ni la contratación de servicios externos, ya que el sistema
operará sobre equipos preexistentes. A largo plazo, los beneficios
económicos derivados de la reducción de pérdidas de herramientas, la
optimización del tiempo del personal y la disminución de errores
administrativos superarán ampliamente cualquier inversión inicial,
consolidando la rentabilidad del proyecto en términos organizacionales.
FACTIBILIDAD OPERACIONAL
Operacionalmente, el sistema propuesto es factible debido a que será
diseñado con una interfaz minimalista y de fácil uso, pensada para
personal que no necesariamente posee conocimientos técnicos
avanzados en informática. La simplicidad del flujo de trabajo del sistema,
que replicará y mejorará los procesos ya conocidos por el personal
(registro de préstamos, devoluciones y consulta de disponibilidad),
facilitará la adopción de la herramienta sin necesidad de capacitaciones
extensas o costosas.
14

El personal encargado del control de herramientas en la organización
podrá adaptarse rápidamente al uso del sistema una vez que este sea
implementado, dado que las operaciones que automatizará son las
mismas que actualmente realiza de forma manual. La transición del
registro en libro físico al registro digital no alterará significativamente la
dinámica de trabajo existente, sino que la optimizará al eliminar los pasos
redundantes, reducir los errores de anotación y centralizar la información
en una sola plataforma accesible desde cualquier equipo conectado a la
red interna del taller.
Finalmente, la presente investigación constituye el soporte documental
que respalda y justifica el desarrollo del sistema propuesto, sentando las
bases necesarias para que su posterior programación e implementación
se lleve a cabo de manera organizada y estructurada. La documentación
generada a lo largo de este proyecto recoge los requerimientos, procesos
y decisiones de diseño que guiarán la fase de desarrollo, garantizando
que el sistema resultante responda de forma precisa a las necesidades
operativas identificadas en la organización.
ALCANCES DE LA INVESTIGACIÓN
La presente investigación tiene como alcance el análisis, diseño e
implementación de un sistema de información web orientado al registro y
seguimiento de equipos y herramientas dentro de una organización. El
sistema abarcará los procesos fundamentales de registro de
herramientas, gestión de préstamos, control de devoluciones y consulta
del estado actual de cada activo, cubriendo así el ciclo completo de uso
de los recursos dentro del taller u organización donde será
implementado.
En cuanto al alcance funcional, el sistema contempla el desarrollo de
módulos para el registro de herramientas con sus datos básicos
(nombre, código, categoría y estado), el registro de préstamos con
identificación del solicitante y fecha, el registro de devoluciones con
15

verificación del estado del equipo, y la consulta del historial de
movimientos de cada herramienta. Estas funcionalidades responden
directamente a los requerimientos identificados durante la fase de
análisis con los informantes clave de la organización.
Desde el punto de vista tecnológico, el sistema será desarrollado con
tecnologías web estándar: PHP para la lógica del servidor, HTML, CSS y
JavaScript para la interfaz de usuario, y MySQL como sistema gestor de
base de datos. El entorno de desarrollo y pruebas utilizará XAMPP sobre
sistema operativo Windows, y el despliegue final se realizará en un
equipo de escritorio del taller que funcionará como servidor local,
accesible desde cualquier dispositivo conectado a la red interna.
En lo que respecta a las limitaciones, el presente proyecto no
contempla el desarrollo de módulos de facturación, gestión de personal.
Asimismo, no se incluirá el desarrollo de una aplicación móvil nativa,
quedando el acceso móvil restringido al uso del navegador web desde
dispositivos conectados a la red. El alcance de la investigación se
circunscribe al diseño y desarrollo del sistema, sin incluir una fase de
mantenimiento post-implementación formal.
16

CRONOGRAMA DE ACTIVIDADES
Actividades Semanas
1 2 3 4 5 6 7 8 9 10 11 12 13 14 15
Determinación de requerimientos
Diseño de la base de datos
Diseño de interfaces
Definición de arquitectura del sistema
Primera revisión
Configuración del entorno de desarrollo
Implementación de la base de datos
Módulo de autenticación y sesiones
Módulo de herramientas y categorías
Módulo de trabajadores
Módulo de préstamos y devoluciones
Módulo de historial y dashboard
Segunda revisión
Tests funcionales y corrección de errores
Entrega del proyecto
Jornada de exposición
17

CAPÍTULO II
COMPONENTE TEÓRICO
ESTUDIOS PREVIOS SOBRE LA TEMÁTICA
Morillo y Nava (2017), en su Trabajo Especial de Grado, para optar al
título de Ingenieros en Ingeniería Industrial, titulado Mejoras en el
sistema de gestión y administración de herramientas, equipos y
misceláneos en el tool room del Consorcio de Cogestión Venequip,
desarrollado en la Universidad José Antonio Páez (UJAP), realizaron una
investigación aplicada con el propósito de optimizar los procesos de
control y seguimiento de herramientas dentro de una empresa del sector
de maquinaria pesada ubicada en Venezuela. La investigación se centró
en diagnosticar las debilidades del sistema de gestión de herramientas
del área técnica conocida como “tool room” y proponer mejoras
concretas que permitieran un manejo más eficiente de los activos. El
estudio identificó fallas relacionadas con el almacenamiento, el control de
salidas y devoluciones de herramientas, y la duplicidad de registros, lo
cual generaba pérdidas de recursos y dificultades para atribuir
responsabilidades. A partir del análisis situacional, se diseñaron
soluciones orientadas a sistematizar y modernizar el proceso de control,
demostrando la viabilidad técnica y económica de su implementación,
con un retorno de inversión proyectado en menos de un año.
De esta investigación se retoma la importancia de realizar un
diagnóstico inicial que permita identificar las principales fallas en los
procesos de gestión de herramientas, así como la necesidad de
establecer un control sistemático del almacenamiento, estandarizar los
procesos de préstamo y devolución, y mantener un registro unificado
para minimizar pérdidas y delimitar responsabilidades. Además, se
destaca el aporte de definir indicadores de gestión que faciliten medir el
18

impacto económico y operativo de las mejoras. Estos enfoques
metodológicos y prácticos enriquecen el presente proyecto, al orientar el
diseño de un sistema que permita optimizar la administración de equipos
y herramientas dentro de una organización.
Huang (2010), en su tesis de maestría para optar al grado de Master en
Tecnología Informática, titulada Fixed Asset Management System of
Colleges and Universities: Design and Implementation, elaborada en
la South China University of Technology, abordó la problemática del
control de activos fijos en instituciones de educación superior en China.
Huang diseñó e implementó un sistema web basado en JSP, JavaBeans y
SQL Server que permitía registrar, actualizar, consultar y auditar bienes
como equipamiento académico y de oficina. La investigación incluyó
módulos para alta de activos, cambios de estado, bajas, inventarios,
reportes y estadísticas, implementando también códigos de barras para
identificar cada ítem. El sistema fue probado en el entorno de una
universidad, donde se demostró una mejora significativa en la eficiencia
del inventario, la reducción de errores manuales y una mayor
transparencia en el manejo de bienes. La estandarización del proceso de
registro y consulta permitió un acceso más rápido a la información crítica
para la administración.
De esta tesis tomamos como aprendizaje clave que la implementación
de un sistema web para la gestión de activos, aun utilizando tecnologías
básicas, es realizable y altamente efectiva en entornos institucionales.
Además, reafirma que un enfoque modular web, con tecnologías como
HTML, CSS, JavaScript y PHP, puede cubrir los requerimientos de
registro, seguimiento, consulta y auditoría sin necesidad de soluciones
más complejas o costosas. Este enfoque respalda la viabilidad técnica y
práctica del sistema que proponemos desarrollar.
19

TEORÍA RELACIONADA SOBRE EL TEMA
SISTEMAS DE PRESTAMO Y SEGUIMIENTO DE HERRAMIENTAS Y
DISPOSITIVOS
Söderholm (2018), en su artículo Tool Lending Librarianship, publicado
en el Journal of Librarianship and Information Science, analiza cómo las
bibliotecas de préstamo de herramientas en Estados Unidos gestionan
sus colecciones mediante personal capacitado y proceses organizados.
La investigación, basada en entrevistas con especialistas y gestores en
tres municipios, destaca que el éxito de estas iniciativas depende de la
competencia del personal, la formalización de los procesos de préstamo y
la colaboración estrecha con los usuarios, lo que permite un control más
eficiente y una mejor satisfacción de necesidades locales.
Aunque el contexto es bibliotecario, sus conclusiones son
perfectamente aplicables a nuestra investigación: se demuestra que
contar con personal preparado y con procesos sistematizados permite
reducir pérdidas, fomentar el uso responsable de los recursos y facilitar la
trazabilidad de los préstamos. Así, se valida el enfoque de nuestro
proyecto: diseñar un sistema web que respalde estos procesos mediante
el registro automatizado de préstamos, devoluciones, seguimiento y
control de estado de los equipos y herramientas, contribuyendo a una
gestión más transparente y eficiente.
GESTIÓN DE HERRAMIENTAS Y EQUIPOS EN ORGANIZACIONES
La gestión adecuada de herramientas y equipos es crucial para
garantizar la eficiencia operativa en diversos sectores, desde
instituciones académicas hasta empresas industriales. De acuerdo con
Barcodes, Inc. (2023), una administración deficiente de estos recursos
puede acarrear consecuencias como pérdidas económicas, retrasos en
los procesos y riesgos en la seguridad del entorno de trabajo. Por tanto,
se hace indispensable contar con mecanismos de control que permitan
20

registrar el préstamo, devolución, localización y condición de cada bien.
Un sistema de registro digital facilita la asignación responsable de
herramientas, promueve el mantenimiento preventivo y permite identificar
patrones de uso que pueden influir en decisiones logísticas y
presupuestarias. Asimismo, permite establecer políticas claras de acceso
y control, lo cual contribuye al buen uso de los activos institucionales. En
este sentido, la presente investigación se inscribe dentro de un enfoque
que busca modernizar los procesos internos mediante el desarrollo de
una herramienta digital que sistematice la gestión y seguimiento de
equipos y herramientas, brindando soporte tanto a los responsables del
inventario como a los usuarios que hacen uso de dichos recursos.
LEGALIDAD
El desarrollo e implementación de sistemas informáticos en
organizaciones venezolanas debe enmarcarse dentro de las
disposiciones legales que rigen tanto el uso de tecnologías de la
información como la administración de bienes públicos o privados. En
este sentido, la presente investigación se fundamenta en los siguientes
marcos jurídicos:
Constitución de la República Bolivariana de Venezuela (CRBV, 1999)
Artículo 110: "El Estado fomentará la ciencia, la tecnología, el
conocimiento, la innovación y sus aplicaciones, así como los servicios de
información necesarios para el desarrollo económico, social y político del
país. Para ello, se propiciará un sistema nacional de ciencia y tecnología
de acuerdo con la ley."
Este artículo establece el compromiso del Estado venezolano en la
promoción y desarrollo de tecnologías y servicios de información
orientados a optimizar distintos ámbitos de la gestión pública y privada.
En este contexto, el sistema de información propuesto, orientado al
control y seguimiento de equipos y herramientas, se alinea con los
principios constitucionales al incorporar el uso de tecnología como
21

herramienta de apoyo a los procesos administrativos, promoviendo así la
modernización, eficiencia y transparencia en el manejo de los recursos
organizacionales.
Plan de la Patria (2025 - 2031)
Objetivo 1.6.1.4: "Democratizar el acceso físico, cultural y económico a
las tecnologías de información y comunicación, que contemplen los
procesos formativos, adecuación de la infraestructura y equipamiento…"
Este artículo impulsa el uso de herramientas tecnológicas para mejorar
la gestión institucional. El sistema propuesto, enfocado en el control y
seguimiento de herramientas, se alinea con este principio, ya que
automatiza procesos manuales, facilita el acceso a la información en
tiempo real, y promueve la eficiencia administrativa y la transparencia en
el manejo de recursos.
Ley de Infogobierno (Gaceta Oficial N.º 40.274, 2013)
Artículo 6: "Las instituciones del Poder Público deben utilizar las
tecnologías de información libres y desarrollar sistemas informáticos que
promuevan una gestión pública eficiente, transparente, interoperable y
participativa."
Este artículo impulsa el uso de herramientas tecnológicas para mejorar
la gestión institucional. El sistema propuesto, enfocado en el control y
seguimiento de herramientas, se alinea con este principio, ya que
automatiza procesos manuales, facilita el acceso a la información en
tiempo real, y promueve la eficiencia administrativa y la transparencia en
el manejo de recursos.
Ley Orgánica de la Administración Pública (Gaceta Oficial
Extraordinaria N.º 5.890, 2008)
Artículo 141: "La administración pública está al servicio de los
ciudadanos y ciudadanas, y se fundamenta en los principios de
eficiencia, eficacia y transparencia."
22

El artículo establece la obligación de gestionar los recursos públicos de
forma óptima. El desarrollo del sistema contribuye directamente al
cumplimiento de esta norma, ya que permite una gestión sistemática del
préstamo, uso y estado de las herramientas, reduciendo pérdidas,
omisiones y malas prácticas, y asegurando una trazabilidad clara de los
activos institucionales.
Ley Contra la Corrupción (Gaceta Oficial Extraordinaria N.º 6.155,
2014)
Artículo 70: "Los órganos y entes de la administración pública nacional,
estadal y municipal deberán ejercer un control adecuado de los bienes
muebles e inmuebles que les han sido asignados."
Esta disposición legal exige a los entes públicos mantener un control
estricto de sus bienes. La implementación del sistema propuesto
responde a esta exigencia al ofrecer un medio digital que registra el
historial completo de los equipos y herramientas, sus responsables,
ubicación y condiciones, lo cual fortalece los mecanismos de rendición
de cuentas y combate prácticas irregulares.
Normas Básicas sobre Bienes Públicos (Resolución N.º 032,
ONAPRE, 2014)
Artículo 9: "Todo bien nacional debe ser identificado, clasificado,
registrado y controlado en un sistema de información automatizado que
permita su seguimiento."
Este artículo plantea la obligatoriedad de llevar un control
automatizado de los bienes del Estado. El sistema propuesto cumple con
esta disposición al permitir el registro estructurado de cada herramienta o
equipo, incluyendo su estado, uso, responsable actual y movimientos, lo
cual garantiza una supervisión eficiente del inventario institucional y
facilita auditorías internas o externas.
23

GLOSARIO DE TÉRMINOS
Administración de bienes: Conjunto de actividades y procesos
orientados a la organización, registro, control y disposición de los
recursos materiales de una institución, con el fin de asegurar su uso
eficiente y transparente.
Análisis de sistemas: Proceso que consiste en estudiar los elementos y
procesos que forman parte de un sistema existente, con el objetivo de
identificar oportunidades de mejora, establecer requerimientos y
proponer soluciones informáticas.
Eficiencia operativa: Capacidad de una organización para cumplir sus
actividades utilizando adecuadamente sus recursos, minimizando
desperdicios y maximizando resultados. Un buen sistema de control de
herramientas contribuye a lograr esta eficiencia.
Equipos de trabajo: Recursos físicos utilizados en la ejecución de
tareas o proyectos, tales como computadoras, taladros, impresoras,
entre otros. Su adecuada gestión incide directamente en la eficiencia
operativa.
Gestión de inventario: Actividad que comprende el registro, control y
monitoreo de los bienes disponibles en una organización, permitiendo
conocer su cantidad, ubicación y estado.
Herramientas tecnológicas: Recursos informáticos, como software y
hardware, que permiten automatizar procesos, facilitar la comunicación o
mejorar la gestión de información dentro de una organización.
Infogobierno: Modelo de gestión pública que promueve el uso de
tecnologías de información y comunicación (TIC) para garantizar la
transparencia, eficiencia y participación ciudadana en la administración
del Estado.
Justificación: Apartado del trabajo de investigación que explica la
importancia, pertinencia y beneficios del estudio, en función de la
problemática abordada y sus implicaciones teóricas y prácticas.
Legalidad: Sección del proyecto donde se analizan las leyes, normas y
24

disposiciones legales que regulan o respaldan el desarrollo del sistema
propuesto.
Mantenimiento preventivo: Conjunto de acciones programadas que se
realizan sobre equipos o herramientas para prolongar su vida útil y evitar
fallas futuras.
Organización: Entidad formal que agrupa personas, recursos y
procesos con el propósito de alcanzar objetivos comunes. En este caso,
se refiere al contexto donde se gestiona el préstamo y control de
herramientas y equipos.
Planteamiento del problema: Parte del proyecto en la que se describe
la situación actual, las limitaciones o deficiencias detectadas, y se define
el problema que será abordado mediante la investigación.
Seguimiento de equipos: Proceso continuo mediante el cual se registra
y supervisa el uso, estado y ubicación de los equipos pertenecientes a
una organización.
Sistema automatizado: Conjunto de procesos que, mediante el uso de
software, se ejecutan de forma controlada y repetitiva sin intervención
manual, mejorando la rapidez y la precisión.
Sistema de información: Conjunto de elementos interrelacionados
(software, hardware, datos, procedimientos y personal) que permite
recolectar, procesar, almacenar y distribuir información útil para la toma
de decisiones y el control de operaciones.
Trazabilidad: Capacidad de un sistema para registrar y mostrar el
historial de movimientos, estados o cambios asociados a un objeto o
proceso. En el contexto del proyecto, se refiere a la posibilidad de
conocer el historial de uso de cada equipo o herramienta.
25

CAPITULO III
COMPONENTE METODOLÓGICO
DISEÑO DE LA INVESTIGACIÓN
El diseño de investigación adoptado para el presente estudio es no
experimental, ya que no se realizará manipulación deliberada de
variables. En este tipo de diseño, los fenómenos se observan tal como
se dan en su contexto natural, sin intervenir directamente sobre ellos.
Por tanto, el estudio se limitará a analizar la situación existente en cuanto
al registro y seguimiento de equipos y herramientas dentro de la
organización objeto de estudio.
Según Hernández, Fernández y Baptista (2014), una investigación no
experimental es aquella en la que “no se manipulan intencionalmente las
variables independientes. Lo que se hace es observar fenómenos tal
como se dan en su contexto natural, para después analizarlos”. En este
caso, se pretende comprender el problema que representa la falta de un
sistema adecuado de control, con el fin de proponer una solución
tecnológica pertinente, sin alterar las condiciones existentes durante el
proceso de investigación. Este diseño permite describir el fenómeno de
forma objetiva y constituye un enfoque adecuado para el logro de los
objetivos planteados en el estudio, garantizando la validez de los
resultados sin intervenir directamente en la dinámica operacional de la
organización.
TIPO DE INVESTIGACIÓN
El tipo de investigación que se empleará en este estudio es de campo,
ya que se recopilará información directamente del entorno donde ocurre
el problema objeto de análisis. La investigación de campo se caracteriza
por recolectar datos en el lugar donde los hechos suceden, lo cual
26

permite obtener información de primera mano, real y contextualizada. En
este caso, el estudio se llevará a cabo dentro de la organización que
requiere un sistema de registro y seguimiento de equipos y herramientas,
a través de observaciones, entrevistas y/o cuestionarios dirigidos al
personal involucrado en los procesos de préstamo y control de dichos
recursos.
Según Arias (2012), la investigación de campo "consiste en la
recolección de datos directamente de la realidad donde ocurren los
hechos, sin manipular o controlar variable alguna". Por tanto, esta
metodología resulta idónea para diagnosticar la situación actual,
identificar las necesidades reales de la institución y proponer una
solución basada en el desarrollo de un sistema informático pertinente. La
elección de este tipo de investigación se justifica por la necesidad de
comprender a profundidad la problemática desde la perspectiva de
quienes la experimentan, permitiendo así construir una solución ajustada
a sus requerimientos específicos.
INFORMANTES CLAVE
Según Sandoval (1996), los informantes clave son aquellas personas
que, por su experiencia, conocimiento o posición dentro de un grupo u
organización, poseen información valiosa y profunda sobre el fenómeno
que se investiga. Esta técnica se emplea comúnmente en estudios
cualitativos para obtener datos relevantes desde la perspectiva de los
actores directamente involucrados en la problemática.
En el desarrollo de la presente investigación, se decidió utilizar la
técnica de informantes clave como fuente primaria para la recolección de
información. Esta decisión responde a la necesidad de comprender, con
mayor precisión, los procesos actuales relacionados con el préstamo, uso,
control y devolución de herramientas dentro de una organización. A través
de esta técnica se espera obtener datos cualitativos que permitan
identificar las debilidades operativas del sistema actual (si lo hubiese), así
27

como requerimientos específicos para el diseño del sistema informático
propuesto.
Dado que al momento de elaborar esta fase del proyecto no se ha
determinado aún el lugar exacto donde se implementará el sistema, ni se
ha establecido contacto formal con una organización, los informantes
clave serán seleccionados en etapas posteriores del estudio, una vez
definida la institución colaboradora. No obstante, se prevé que dichos
informantes incluyan encargados del área de mantenimiento, personal
responsable del resguardo de herramientas y posibles usuarios del
sistema. La información aportada por estos actores permitirá enriquecer el
análisis contextual y contribuirá significativamente al desarrollo de una
solución adaptada a las necesidades reales de la organización.
INSTRUMENTOS DE RECOLECCIÓN DE DATOS
Para la presente investigación, se ha seleccionado como instrumento
principal de recolección de datos la entrevista. De acuerdo con Sampieri,
Collado y Lucio (2014), la entrevista es una técnica que permite obtener
información a través del contacto directo entre el investigador y los
informantes, utilizando preguntas previamente formuladas para explorar
opiniones, experiencias y percepciones sobre un fenómeno determinado.
Este instrumento se aplicará a los informantes clave, con el propósito
de indagar sobre los procesos actuales de registro y control de
herramientas en la organización, identificar los principales problemas que
enfrentan, y conocer sus expectativas frente al posible desarrollo de un
sistema automatizado. Las preguntas estarán orientadas a recabar
información sobre procedimientos de préstamo y devolución, mecanismos
de control existentes, deficiencias percibidas y sugerencias de mejora por
parte de los usuarios.
La elección de este instrumento se fundamenta en su capacidad para
proporcionar datos ricos y contextualizados, adaptados a la realidad
específica del entorno de estudio. Además, su aplicación flexible, ya sea
28

de forma presencial o remota, permite ajustarse a las condiciones
logísticas del trabajo de campo en función de la disponibilidad y ubicación
de los participantes.
METODOLOGÍA A USAR Y FASES
La presente investigación se enmarca dentro del enfoque de desarrollo
de sistemas de información, utilizando el paradigma de programación
orientado a objetos. Este enfoque resulta adecuado para representar
elementos del mundo real mediante clases, objetos, atributos y métodos,
facilitando así la organización, escalabilidad, mantenimiento y reutilización
del código en el sistema. Según Pressman (2014), el desarrollo orientado
a objetos permite construir sistemas modulares que responden mejor a los
cambios y necesidades del entorno, al modelar de manera directa los
procesos y entidades involucradas.
Como metodología de desarrollo, se adoptará un modelo estructurado
por fases, basado en el ciclo de vida del software y adaptado al contexto
académico del proyecto. Esta estrategia metodológica permitirá abordar
de forma ordenada las diferentes etapas del diseño del sistema, desde la
comprensión del problema hasta la entrega del producto final. Las fases
contempladas son las siguientes:
Fase de Análisis
En esta etapa se recopila información detallada sobre el problema a
resolver. A través de entrevistas a los informantes clave y observación del
entorno organizacional, se identifican los requerimientos funcionales y no
funcionales del sistema. También se definen los procesos actuales de
préstamo y control de herramientas, y se elaboran diagramas de casos de
uso para representar el comportamiento del sistema desde la perspectiva
del usuario.
29

Fase de Diseño
Con base en los requerimientos recolectados, se procede a estructurar
el sistema utilizando principios del paradigma orientado a objetos. Se
especifican las clases, atributos, métodos y relaciones entre los
componentes del sistema. Durante esta fase se elaboran diagramas de
clases, secuencia y actividades, los cuales permiten visualizar la lógica y
estructura del sistema antes de su codificación.
Fase de Implementación
En esta fase se lleva a cabo la codificación del sistema utilizando
tecnologías web compatibles con el alcance del proyecto, como HTML,
CSS, JavaScript y PHP. Se traduce el diseño conceptual en una
aplicación funcional, integrando la lógica del negocio con una interfaz
amigable, en la cual usuario no tenga complicaciones para aprender su
uso.
Fase de Pruebas
Se someterá el sistema a pruebas unitarias y funcionales para verificar
el cumplimiento de los requerimientos planteados. También se incluirán
pruebas con usuarios, a fin de detectar errores, validar su usabilidad y
realizar los ajustes necesarios antes de su implementación definitiva.
Fase de Documentación y Entrega
Finalmente, se elabora la documentación técnica del sistema y el
manual de usuario, con el propósito de facilitar su uso, mantenimiento y
futuras actualizaciones. Esta fase concluye con la presentación formal del
producto ante los responsables del proyecto o la institución interesada.
Cada una de estas fases sigue un enfoque incremental y adaptable,
permitiendo realizar mejoras continuas a medida que se avanza en el
desarrollo, en correspondencia con las condiciones reales del entorno
organizacional.
30

CAPITULO IV
COMPRENSIÓN DEL SISTEMA ACTUAL
DESCRIPCIÓN DEL SISTEMA ACTUAL
En la organización considerada como referencia para el estudio, la
gestión de los equipos y herramientas se lleva a cabo mediante un control
manual basado en registros escritos y procedimientos informales. El taller
donde opera el sistema actual maneja herramientas e implementos de uso
técnico y operativo, los cuales son solicitados por el personal según las
actividades diarias asignadas. A pesar de que estas herramientas son
indispensables para garantizar el correcto desarrollo de las tareas, la
administración de su uso carece de mecanismos sistemáticos que
permitan un seguimiento confiable de su disponibilidad, estado o historial
de uso.
El proceso de registro se realiza utilizando un libro físico en el que se
anotan los datos básicos de cada préstamo. Cuando un trabajador
requiere una herramienta, comunica su solicitud de manera directa al
encargado del momento y este procede a registrar en el libro el nombre
del solicitante, el tipo de herramienta entregada, el serial correspondiente
en caso de que lo posea, y la fecha en la que se realiza el préstamo. Este
cuaderno constituye el único medio de control existente, ya que no se
dispone de formatos estructurados, sistemas digitales ni reglas formales
que garanticen la uniformidad del registro.
El sistema actual tampoco establece un procedimiento documentado
para la devolución de las herramientas ni para la verificación de su
estado físico. En muchos casos, la confirmación del retorno se realiza de
palabra o mediante simples anotaciones adicionales en el mismo libro, lo
31

que contribuye a que la información almacenada sea incompleta y
susceptible a errores u omisiones. Esto deriva en la pérdida de
trazabilidad, dificulta la delimitación de responsabilidades y limita la
capacidad del taller para conocer con precisión qué herramientas se
encuentran disponibles o requieren mantenimiento.
En conjunto, el método actual funciona como un mecanismo básico de
control operativo que depende completamente de la disciplina y memoria
del personal encargado. Aunque permite registrar información mínima
sobre los préstamos, no ofrece garantías de consistencia ni soporte para
la toma de decisiones, lo cual evidencia la necesidad de un sistema de
información más robusto que permita gestionar eficientemente los
recursos del taller.
OBJETIVO GENERAL
Gestionar de manera básica el préstamo y devolución de las
herramientas del taller mediante un registro manual que permita dejar
constancia mínima de su uso por parte del personal operativo.
OBJETIVOS ESPECÍFICOS
• Registrar en un libro físico los datos elementales asociados al préstamo
de herramientas, incluyendo el nombre del solicitante, el tipo de
herramienta y la fecha de entrega.
• Identificar las herramientas entregadas a través de su serial cuando este
se encuentre disponible.
• Establecer un control operativo básico que permita conocer, de forma
general, qué trabajador tiene asignada una herramienta en un momento
determinado.
• Mantener un historial manual que sirva como referencia para verificar de
manera informal la devolución de las herramientas utilizadas.
32

• Facilitar al encargado del taller un mecanismo mínimo de supervisión
basado en anotaciones simples que apoye la continuidad de las
actividades diarias.
ENTIDADES QUE INTERVIENEN DIRECTAMENTE
• Personal solicitante: Trabajadores del taller que requieren herramientas
para ejecutar actividades operativas.
• Encargado del control manual: Persona responsable de administrar el
uso de las herramientas durante la jornada.
DESCRIPCIÓN DE PROCESOS
Solicitud y Entrega de la Herramienta
Este proceso inicia cuando el trabajador necesita una herramienta para
realizar una tarea asignada. La solicitud se realiza verbalmente
directamente al encargado de turno, sin formularios ni protocolos
formales. El trabajador indica el nombre de la herramienta requerida y, en
caso de ser necesario, especifica el tipo o características generales para
facilitar la identificación.
El encargado, basándose en su conocimiento del taller, verifica
físicamente si la herramienta está disponible. Este paso se realiza de
manera completamente manual, ya que no existe inventario actualizado ni
indicadores previos que señalen disponibilidad. La confirmación depende
exclusivamente de la inspección visual y del registro previo en el
cuaderno, si lo hubiese.
Una vez localizada la herramienta, el encargado procede a entregarla
al trabajador. Esta secuencia ocurre de forma rápida y rutinaria, producto
de la dinámica operativa del taller. La razón por la cual la solicitud y la
entrega forman un único proceso es porque ambos pasos siempre se
ejecutan de manera consecutiva, sin interrupciones formales y sin
33

instancias intermedias que ameriten una separación.
Registro Manual del Préstamo
Tras entregar la herramienta, el encargado documenta la operación en
el libro de registro. Este cuaderno constituye el único soporte
administrativo existente y contiene anotaciones escritas a mano. El
encargado registra el nombre del solicitante, el tipo de herramienta
entregada, el serial si este existe y la fecha del préstamo. Debido a la
falta de un formato estandarizado, la información se consigna de manera
variable según la persona que realice el registro y su familiaridad con el
proceso. El registro se centra únicamente en datos básicos porque la
organización no cuenta con un sistema digital ni con lineamientos
normativos que exijan mayor nivel de detalle. La finalidad del proceso es
dejar una constancia mínima que permita, al menos parcialmente,
recordar quién solicitó qué herramienta y cuándo lo hizo. Este proceso
ocurre inmediatamente después de la entrega porque forma parte directa
del control mínimo que la organización intenta mantener. No existe
supervisión posterior ni validación de la información registrada, y el libro
cumple la función de único repositorio operativo.
Devolución y Verificación Básica
Cuando el trabajador finaliza la actividad para la cual solicitó la
herramienta, procede a devolverla al encargado de turno. La devolución
también se realiza de forma verbal y sin procedimientos establecidos. El
encargado recibe la herramienta y lleva a cabo una verificación visual
sencilla para asegurarse de que no presente daños evidentes. No
existen listas de chequeo ni formatos de inspección, por lo que este paso
depende únicamente del criterio del encargado.
En algunos casos, el encargado anota en el libro la fecha de
devolución o algún comentario, aunque esto no ocurre de manera
sistemática. La confirmación verbal muchas veces sustituye la anotación
escrita, dejando registros incompletos sobre el ciclo de uso de la
34

herramienta. Este proceso constituye el cierre del flujo operativo,
permitiendo que la herramienta vuelva a estar disponible para otros
trabajadores. Su carácter informal y la ausencia de registro estructurado
explican por qué frecuentemente surgen inconsistencias respecto a
responsabilidad, estado y disponibilidad.
DETERMINACIÓN DE REQUERIMIENTOS
Cuadro 1. Solicitud y Entrega de la Herramienta
Entrada Proceso Salida
Nombre del solicitante Solicitud y entrega de Herramienta entregada
Nombre o tipo de la herramienta al solicitante
herramienta solicitada
Identificación o
descripción adicional
de la herramienta, si es
pertinente
Cuadro 2. Registro Manual del Préstamo
Entrada Proceso Salida
Nombre del solicitante Registro manual del Préstamo registrado en
Nombre o tipo de préstamo el libro
herramienta prestada
Serial de la
herramienta (si existe)
Fecha del préstamo
35

Cuadro 3. Devolución y Verificación Básica
|                      | Entrada | Proceso             |     |                         | Salida |
| -------------------- | ------- | ------------------- | --- | ----------------------- | ------ |
| Fecha de entrega     |         | Devolución y        |     | Herramienta             |        |
| Estado de la         |         | verificación de la  |     | reincorporada al taller |        |
| herramienta          |         | herramienta         |     | Registro manual de      |        |
| Tiempo de uso de la  |         |                     |     | devolución (cuando      |        |
| herramienta prestada |         |                     |     | aplica)                 |        |
DIAGRAMA DE FLUJO DE INFORMACIÓN
|     | Personal solicitante |     |     | Encargado |     |
| --- | -------------------- | --- | --- | --------- | --- |
Inicio
Usar herramienta
|     |     |     | Disponible | Verificar si  | No disponible |
| --- | --- | --- | ---------- | ------------- | ------------- |
está
disponible
|     | Usar herramienta |     | Entregar    | Informar que no esta  |            |
| --- | ---------------- | --- | ----------- | --------------------- | ---------- |
|     |                  |     | herramienta |                       | disponible |
|     | Devolver         |     |             |                       | Fin        |
Verificar estado
herramienta
Registrar
devolución
Fin
Gráfico 1: Diagrama de Flujo de Información
36

CARTA ESTRUCTURADA
Cuadro 4: Carta Estructurada del Registro de Herramientas
| Nombre del  |             |              | Entidad     |
| ----------- | ----------- | ------------ | ----------- |
|             | Descripción | Tipo/Formato |             |
| dato        |             |              | responsable |
Nombre de la  Nombre con el que se  Texto (máx. 50  Encargado
| herramienta | identifica la herramienta | caracteres) | de turno |
| ----------- | ------------------------- | ----------- | -------- |
Clasificación o
| Tipo de  |     | Texto (máx. 30  | Encargado  |
| -------- | --- | --------------- | ---------- |
categoría de la
| herramienta |     | caracteres) | de turno |
| ----------- | --- | ----------- | -------- |
herramienta
|             | Código identificador de  | Texto / Numérico  |            |
| ----------- | ------------------------ | ----------------- | ---------- |
| Serial de   |                          |                   | Encargado  |
|             | la herramienta (si lo    | (máx. 20          |            |
| herramienta |                          |                   | de turno   |
|             | tiene)                   | caracteres)       |            |
|             | Condición inicial de la  | Texto (máx. 20    | Encargado  |
Estado inicial
|           | herramienta             | caracteres)  | de turno   |
| --------- | ----------------------- | ------------ | ---------- |
| Fecha de  | Fecha en que se         | Fecha        | Encargado  |
| registro  | registra la herramienta | (DD/MM/AAAA) | de turno   |
Comentarios
|               |                       | Texto (máx. 100  | Encargado  |
| ------------- | --------------------- | ---------------- | ---------- |
| Observaciones | adicionales sobre la  |                  |            |
|               |                       | caracteres)      | de turno   |
herramienta
37

Cuadro 5: Carta Estructurada del Préstamo de Herramientas
| Nombre del  |             |              | Entidad     |
| ----------- | ----------- | ------------ | ----------- |
|             | Descripción | Tipo/Formato |             |
| dato        |             |              | responsable |
Nombre completo de la
| Nombre del  |     | Texto (máx. 50  | Personal  |
| ----------- | --- | --------------- | --------- |
persona que solicita la
| solicitante |     | caracteres) | solicitante |
| ----------- | --- | ----------- | ----------- |
herramienta
| Tipo de     | Especifica la              | Texto (máx. 30    | Personal      |
| ----------- | -------------------------- | ----------------- | ------------- |
| herramienta | herramienta solicitada     | caracteres)       | solicitante   |
|             | Código identificador de    | Texto / Numérico  |               |
| Serial de   |                            |                   | Encargado de  |
|             | la herramienta (si lo      | (máx. 20          |               |
| herramienta |                            |                   | turno         |
|             | tiene)                     | caracteres)       |               |
| Fecha de    | Día en que se solicita la  | Fecha             | Encargado de  |
| solicitud   | herramienta                | (DD/MM/AAAA)      | turno         |
Firma o registro Confirmación de entrega Texto (máx. 50  Personal
| de recepción | de la herramienta | caracteres) | solicitante |
| ------------ | ----------------- | ----------- | ----------- |
Estado de  Indica si la herramienta  Texto (máx. 20  Encargado de
| devolución | fue devuelta o pendiente | caracteres) | turno |
| ---------- | ------------------------ | ----------- | ----- |
38

Cuadro 6: Carta Estructurada de la Devolución de Herramientas
| Nombre del  |             |              | Entidad     |
| ----------- | ----------- | ------------ | ----------- |
|             | Descripción | Tipo/Formato |             |
| dato        |             |              | responsable |
Nombre completo de la
| Nombre del  |     | Texto (máx. 50  | Personal  |
| ----------- | --- | --------------- | --------- |
persona que devuelve
| solicitante |     | caracteres) | solicitante |
| ----------- | --- | ----------- | ----------- |
la herramienta
| Tipo de     | Herramienta que esta     | Texto (máx. 30    | Personal      |
| ----------- | ------------------------ | ----------------- | ------------- |
| herramienta | siendo devuelta          | caracteres)       | solicitante   |
|             | Código identificador de  | Texto / Numérico  |               |
| Serial de   |                          |                   | Encargado de  |
|             | la herramienta (si lo    | (máx. 20          |               |
| herramienta |                          |                   | turno         |
|             | tiene)                   | caracteres)       |               |
| Fecha de    | Día en que se devuelve   | Fecha             | Encargado de  |
| devolucion  | la herramienta           | (DD/MM/AAAA)      | turno         |
Estado de la  Condicion en la que se  Texto (máx. 50  Encargado de
| herramienta | devuelve herramienta | caracteres) | turno |
| ----------- | -------------------- | ----------- | ----- |
Registro que valida la
| Confirmacion  |     | Texto (máx. 20  | Encargado de  |
| ------------- | --- | --------------- | ------------- |
devolución de la
| de devolución |     | caracteres) | turno |
| ------------- | --- | ----------- | ----- |
herramienta
39

ANÁLISIS DOCUMENTAL
Cuadro 7: Análisis documental del Libro de Registro de Herramientas
Elemento Descripción
Nombre del documento Libro de registro de herramientas
¿Quien lo genera? Encargado de turno
El documento sirve para llevar un registro escrito
¿Hacia donde va?
del estado de las herramientas
Nombre del solicitante
Tipo de herramienta
Serial (si aplica)
Campos involucrados
Fecha de solicitud
Firma o registro de recepción
Estado de devolución.
Personal solicitante
Entidades que intervienen
Encargado de turno
Un trabajador solicita una herramienta prestada
Breve descripción del y el encargado de turno registra en el libro los
proceso que lo genera datos del personal solicitante y de la
herramienta.
PLATAFORMA A USAR
El sistema de registro y seguimiento de equipos y herramientas será
desarrollado bajo una plataforma web, lo que permitirá su acceso a través
de navegadores desde cualquier dispositivo con conexión a internet. Esta
decisión facilita la gestión centralizada de la información, evita
instalaciones locales y hace posible que el sistema pueda mantenerse y
actualizarse de forma más sencilla.
40

El sistema estará alojado y ejecutado en un ordenador de escritorio del
taller, el cual funcionará como servidor local o punto de acceso principal.
Dicho equipo contará con los recursos básicos necesarios para la
ejecución de un servidor web y una base de datos, tales como
procesador de al menos dos núcleos, 4 GB de memoria RAM y
almacenamiento suficiente para los registros históricos del sistema. Los
usuarios podrán acceder al sistema a través de un navegador web
moderno, desde cualquier computadora conectada a la red, garantizando
una experiencia fluida y accesible.
Para el desarrollo del sistema se emplearán tecnologías de desarrollo
web estándar, sin uso de frameworks externos, conforme a los
lineamientos del proyecto. El lenguaje de programación principal será
PHP, encargado de la lógica del servidor y la interacción con la base de
datos. El frontend se desarrollará con HTML, CSS y JavaScript,
permitiendo una interfaz gráfica funcional y dinámica. Como sistema
gestor de base de datos se utilizará MySQL, dada su compatibilidad con
PHP, facilidad de implementación y soporte en entornos Windows.
El desarrollo se realizará principalmente en equipos con sistema
operativo Windows, empleando un entorno de servidor local como XAMPP
o WAMP para integrar Apache, PHP y MySQL durante la fase de pruebas.
Una vez completado, el sistema podrá ser desplegado en un servidor web
o mantenerse de forma local, siempre que el entorno cuente con soporte
para los componentes mencionados.
41

CAPITULO V
COMPRENSIÓN DEL SISTEMA PROPUESTO
DESCRIPCIÓN DEL SISTEMA PROPUESTO
El sistema de información propuesto es una aplicación web destinada
a facilitar el control básico y organizado del uso de herramientas y
equipos dentro de una organización. Su función principal es permitir que
el personal encargado tenga un registro claro y actualizado de qué
herramientas existen, quién las utiliza y cuándo son prestadas y
devueltas, reemplazando los métodos manuales que actualmente
generan inconsistencias e incluso pérdidas de activos.
El sistema permitirá registrar cada herramienta en una base de datos
mediante un formulario simple que incluirá información básica como
nombre, código identificador, categoría y estado. Una vez registradas, las
herramientas podrán ser consultadas por los encargados del área en
cualquier momento,lo que facilitará la verificación de la disponibilidad
antes de autorizar un préstamo.
La funcionalidad central del sistema será el módulo de préstamos,
mediante el cual se registrará cada solicitud de herramienta realizada por
los trabajadores. Para ello, el encargado seleccionará la herramienta,
registrará el nombre del usuario que la solicita y la fecha del préstamo. Al
realizar este registro, el sistema actualizará automáticamente el estado
de la herramienta a "Prestada", evitando duplicaciones o confusiones en
el control.
Asimismo, el sistema contará con un módulo de devoluciones que
permitirá registrar el retorno de cada herramienta. El encargado deberá
seleccionar la herramienta prestada, registrar la fecha de devolución y
confirmar su estado al regresar. Esto permitirá llevar un control sencillo
42

pero completo del movimiento de cada herramienta, evitando pérdidas y
mejorando la trazabilidad.
El diseño del sistema será minimalista y práctico, pensado para facilitar
la implementación y el uso por parte de personal sin conocimientos
técnicos avanzados. Se desarrollará con tecnologías web accesibles
como HTML, CSS, JavaScript, PHP y MySQL, lo que permitirá su
funcionamiento en cualquier navegador sin necesidad de software
adicional. Este sistema, permitirá mejorar considerablemente la
organización del inventario de herramientas, garantizar un registro
confiable del préstamo y devolución de los equipos, y reducir errores
asociados a los métodos manuales utilizados en la actualidad.
METODOLOGÍA A USAR
La presente investigación se fundamenta en el enfoque de desarrollo
de sistemas de información mediante el paradigma de programación
orientado a objetos. Este paradigma permite representar las entidades
del sistema mediante clases y objetos, facilitando la organización del
código, su reutilización y su mantenimiento. De acuerdo con Pressman
(2014), el desarrollo orientado a objetos contribuye a la creación de
sistemas más flexibles y adaptables a las necesidades del entorno.
Como metodología de desarrollo, se aplica un modelo estructurado por
fases, basado en el ciclo de vida del software. Este enfoque organiza el
trabajo en etapas secuenciales que permiten comprender el problema,
diseñar una solución adecuada y construir un sistema funcional. Durante
la fase de diseño se utilizan herramientas del Lenguaje Unificado de
Modelado (UML) para representar gráficamente la estructura y
comportamiento del sistema. Los diagramas empleados son los
siguientes:
Diagrama de Casos de Uso
Es un diagrama que muestra las interacciones entre los usuarios
(actores) y las funciones principales del sistema. Permite identificar qué
43

operaciones podrá realizar cada tipo de usuario y delimita claramente los
servicios que ofrecerá el sistema. En este proyecto, se utilizará para
representar acciones como registrar herramientas, registrar un préstamo
y registrar una devolución.
Actor Asociación
Límites del sistema Caso de uso
Gráfico 2: Paleta de Símbolos del Diagrama de Casos de Uso
Diagrama de Estados
Este diagrama modela los diferentes estados por los que puede
transitar un objeto del sistema y las condiciones que producen dichos
cambios. En el contexto del sistema propuesto, se utilizará para
representar los estados de una herramienta, tales como: Disponible →
Prestada → Devuelta. Esto permite comprender claramente el ciclo de
vida de cada herramienta según las operaciones registradas.
44

Inicio Estado
Acción Fin
Gráfico 3: Paleta de Símbolos del Diagrama de Estados
Diagrama de Actividades
Representa el flujo de trabajo de un sistema, mostrando los pasos
secuenciales, las decisiones y los procesos paralelos que ocurren desde
un punto de inicio hasta un punto final. Es una herramienta fundamental
para visualizar la secuencia lógica de acciones que ocurren en
procedimientos operativos, como el préstamo o la devolución de
herramientas. Su uso permite identificar con precisión cada actividad, las
decisiones clave, y el orden exacto en que se ejecuta cada operación.
En el sistema propuesto, se utiliza para representar el flujo que ocurre
durante el registro, préstamo, y devolución de los equipos y
herramientas.
45

Inicio Flujo de secuencia
Condicional Actividad
Fin
Gráfico 4: Paleta de Símbolos del Diagrama de Actividades
DESCRIPCIÓN DE LOS PROCESOS
Proceso de Registro de Herramientas
Este proceso consiste en ingresar al sistema la información básica de
cada herramienta disponible en la organización. El encargado utilizará un
formulario en el cual registrará datos como nombre, código o serial, tipo o
categoría y estado. Una vez almacenada la información, la herramienta
quedará registrada en la base de datos y su información podrá ser
consultada para futuros préstamos o revisiones. Este proceso reemplaza
el uso de cuadernos o listas dispersas, garantizando un inventario inicial
claro y organizado.
46

Registrar equipos y
herramientas en el
sistema
Encargado
Gráfico 5. Casos de Uso del Registro de Herramientas
Herramienta Registrar herramienta Herramienta
sin registar registrada
Gráfico 6. Diagrama de Estados del Registro de Herramientas
47

Encargado registra
la herramienta
Fin
Gráfico 7. Diagrama de Actividades del Registro de Herramientas
Proceso de Préstamo de Herramientas
Cuando un trabajador necesite utilizar una herramienta, deberá
notificárselo al encargado de turno, quien verificará la disponibilidad de la
herramienta en el sistema, en caso de estar disponible entregará la
herramienta al personal y registrará el préstamo en el sistema. Para ello,
identificará la herramienta correspondiente, así como al usuario que
solicita el equipo y registrará la fecha del préstamo. Al completarse el
registro, el sistema actualizará automáticamente el estado de dicha
herramienta a “Prestada”, evitando que otro usuario pueda solicitarla
mientras ésta esté en uso.
48

Solicita
herramienta
Entregar
herramienta
Registrar préstamo
Personal Encargado
solicitante Marcar herramienta
como “Prestada”
Gráfico 8. Casos de Uso del Préstamo de Herramientas
Registrar préstamo
Equipo Equipo
disponible prestado
Gráfico 9. Diagrama de Estado del Préstamo de Herramientas
49

Personal solicita
préstamo
Verificar estado
del equipo
Si No
Disponible
Registrar datos Informar que no
del préstamo está disponible
Entregar el
equipo Fin
Marcar equipo
como prestado
Fin
Gráfico 10. Diagrama de Actividades del Préstamo de Herramientas
Proceso de Devolución de Herramientas
Una vez que el trabajador culmina el uso de la herramienta, debe
devolverla al encargado, quien procederá a registrar la devolución en el
módulo correspondiente del sistema. El encargado seleccionará la
herramienta prestada, registrará la fecha de devolución y confirmará su
estado. Después de este procedimiento, el sistema actualizará el estado
de la herramienta a “Disponible”, quedando lista para ser solicitada
nuevamente por otro usuario.
50

51

Devuelve equipo
Registra
devolución
Actualiza equipo a
Personal “Disponible” Encargado
solicitante
Gráfico 11. Casos de Uso de la Devolución de Herramientas
Equipo no Registrar devolución Equipo
disponible disponible
Gráfico 12. Diagrama de Estados de la Devolución de Herramientas
52

Personal regresa la
herramienta
Registrar devolución
Marcar herramienta
como disponible
Fin
Gráfico 13. Diagrama de Actividades de la Devolución de Herramientas
DIAGRAMA FUNCIONAL
Gráfico 14: Diagrama Funcional
53

CAPITULO VI
IMPLEMENTACIÓN
BASES DE DATOS
Modelo Entidad Relación
herramientas
1
|            |          | id             | INT          |     |
| ---------- | -------- | -------------- | ------------ | --- |
|            |          | nombre         | VARCHAR(100) |     |
| categorias |          | codigo         | VARCHAR(50)  |     |
| id         | INT 0..1 | * categoria_id | INT          |     |
trabajadores
| nombre | VARCHAR(50) | estado herramientas_estado_enum |     | 1   |
| ------ | ----------- | ------------------------------- | --- | --- |
id INT
|     |     | observaciones | TEXT |     |
| --- | --- | ------------- | ---- | --- |
VARCHAR(100)
nombre
|     |     | registrado_en | DATETIME |     |
| --- | --- | ------------- | -------- | --- |
cedula VARCHAR(20)
|     |     | activo | TINYINT(1) |     |
| --- | --- | ------ | ---------- | --- |
cargo VARCHAR(80)
activo TINYINT(1)
prestamos
|     |     | id  | INT |     |
| --- | --- | --- | --- | --- |
*
|     |     | herramienta_id | INT |     |
| --- | --- | -------------- | --- | --- |
*
|     |     | trabajador_id | INT |     |
| --- | --- | ------------- | --- | --- |
DATETIME
fecha_prestamo
|     |     | fecha_devolucion         | DATETIME     |     |
| --- | --- | ------------------------ | ------------ | --- |
|     |     | estado_devolucion        | VARCHAR(100) |     |
|     |     | observaciones_devolucion | TEXT         |     |
|     |     | cerrado                  | TINYINT(1)   |     |
Gráfico 15: Modelo Entidad Relación
54

Modelo Jerárquico
Gráfico 16: Modelo Jerárquico
55

CÓDIGO DE PROGRAMACIÓN
Fragmento 1:
Registro de préstamo con transacción atómica y bloqueo de fila
Gráfico 17: Código de modules/prestamos/crear.php
Fragmento 2:
Registro de devolución con actualización condicional de estado
Gráfico 18: Código de modules/prestamos/devolver.php
56

Fragmento 3:
Consulta dinámica con filtros variables y JOIN entre tablas
Gráfico 19: Código de modules/herramientas/index.php
Fragmento 4:
Búsqueda en tiempo real sobre filas de tabla con JavaScript
Gráfico 20: Código de assets/js/main.js
57

Fragmento 5:
Autenticación de usuario con sesión y verificación de contraseña
Gráfico 21: Código de login.php
INTERFAZ
Pantalla 1 - Inicio de sesión:
Presenta un formulario centrado con dos campos: usuario y
contraseña, junto con el botón "Entrar". El acceso está restringido
exclusivamente a usuarios registrados en la base de datos; cualquier
intento con credenciales incorrectas muestra un mensaje de error.
Gráfico 22: Pantalla de login.php
58

Pantalla 2 - Dashboard:
Es la pantalla principal del sistema tras iniciar sesión. Muestra cuatro
contadores en tiempo real con el estado del inventario: total de
herramientas, disponibles, prestadas y en mantenimiento. Debajo se
presentan seis accesos rápidos a las operaciones más frecuentes y, al
final, una tabla con los préstamos activos más recientes.
Gráfico 23: Intefaz de dashboard.php
Pantalla 3 - Inventario de herramientas:
Presenta el catálogo completo de herramientas registradas en el
sistema. Incluye un buscador en tiempo real y filtros por estado y
categoría. Cada fila muestra el nombre, código, categoría, estado
mediante colores (verde para disponible, amarillo para prestada) y las
acciones de editar o dar de baja. Desde esta pantalla también se accede
al registro de nuevas herramientas.
59

Gráfico 24: Interfaz de modules/herramientas/index.php
Pantalla 4 (Registrar préstamo):
Permite registrar la salida de una herramienta del inventario. El
formulario consta de dos selectores: uno para elegir la herramienta
(mostrando únicamente las disponibles) y otro para seleccionar al
trabajador solicitante (solo personal activo). Al confirmar, el sistema
actualiza automáticamente el estado de la herramienta a "Prestada" y
registra la fecha y hora del préstamo.
Gráfico 25: Interfaz de modules/prestamos/crear.php
60

Pantalla 5 (Registrar devolución):
Gestiona el retorno de una herramienta al inventario. Muestra un
resumen del préstamo activo con el nombre de la herramienta, el
trabajador y la fecha de préstamo. El operador debe indicar el estado en
que se devuelve el equipo: bueno, con desgaste o requiere
mantenimiento. Si se selecciona esta última opción, la herramienta
queda automáticamente marcada como no disponible hasta que sea
atendida. También permite agregar observaciones adicionales.
Gráfico 26: Interfaz de modules/prestamos/devolver.php
PRUEBAS REALIZADAS
61

REFERENCIAS
Albornoz, M. & Cedeño, R. (2018). Sistema de control y seguimiento de
herramientas y equipos en la Unidad de Mantenimiento Mecánico de
PDVSA Gas Distrito Centro. Trabajo Especial de Grado para optar al
título de Ingeniero en Informática. Universidad Politécnica Territorial de
los Llanos “Juana Ramírez”. Venezuela.
Arrieta, R., & Espinoza, Y. (2017). Sistema de control de inventario de
equipos y herramientas para el departamento de mantenimiento de la
empresa Prosein C.A. Trabajo Especial de Grado. Universidad
Nacional Experimental “Francisco de Miranda”. Venezuela.
Cruz, M., & López, C. (2020). Sistema de control de préstamo y devolu
ción de equipos para el laboratorio de computación de la Facultad de
Ingeniería Electrónica. Revista Colombiana de Computación, 21(2), 33-
45.
Hernández, R., Fernández, C. y Baptista, P. (2014). Metodología de la
investigación (6.ª ed.). McGraw-Hill.
Laudon, K. C. & Laudon, J. P. (2016). Sistemas de información gerencial
(13.ª ed.). Pearson Educación.
Ley de Infogobierno. (2013). Gaceta Oficial de la República Bolivariana
de Venezuela Nº 40.274.
Morales, A. (2022). Cómo hacer una introducción. TodaMateria.
Recuperado de https://www.todamateria.com/como-hacer-una-
introduccion/
62

ONAPRE. (2014). Normas Básicas sobre Bienes Públicos. Resolución N.º
032.
O'Brien, J. & Marakas, G. (2006). Sistemas de información gerencial.
McGraw-Hill.
Plan de la Patria 2025–2031. Objetivo 1.6.1.4 del Segundo Plan Socialista
de Desarrollo Económico y Social de la Nación. Gobierno Bolivariano
de Venezuela.
Pressman, R. S. (2014). Ingeniería del software: Un enfoque práctico (7.ª
ed.). McGraw-Hill.
República Bolivariana de Venezuela. (1999). Constitución de la
República Bolivariana de Venezuela. Gaceta Oficial Extraordinaria N.º
5.453 de fecha 24 de marzo de 2000.
República Bolivariana de Venezuela. (2008). Ley Orgánica de la
Administración Pública. Gaceta Oficial Extraordinaria N.º 5.890.
República Bolivariana de Venezuela. (2014). Ley Contra la Corrupción.
Gaceta Oficial Extraordinaria N.º 6.155.
Rojas, A. & Díaz, M. (2021). Sistema de préstamo y control de
herramientas en el departamento de mantenimiento de la empresa
XYZ Ltda. Revista de Ingeniería Aplicada, 17(1), 22–35.
Sampieri, R. H., Collado, C. F. y Lucio, M. P. B. (2014). Metodología de la
investigación (5.ª ed.). McGraw-Hill.
Sandoval, C. (1996). Investigación cualitativa. Editorial SÍNTESIS.
63

Söderholm, J. (2018). Tool Lending Librarianship. Journal of Librarianship
and Information Science, 50(4), 374–385. https://doi.org/10.1177/
64