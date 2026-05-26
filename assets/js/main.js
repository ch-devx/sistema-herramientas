document.addEventListener('DOMContentLoaded', function () {

    // Confirmación antes de eliminar / dar de baja / desactivar
    document.querySelectorAll('.confirm-delete').forEach(function (el) {
        el.addEventListener('click', function (e) {
            if (!confirm('¿Estás seguro? Esta acción no se puede deshacer.')) {
                e.preventDefault();
            }
        });
    });

    // Validación de formularios antes de submit
    document.querySelectorAll('form[data-validate]').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            let valido = true;

            // Limpiar errores previos
            form.querySelectorAll('.field-error').forEach(el => el.remove());
            form.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));

            // Validar campos requeridos
            form.querySelectorAll('[required]').forEach(function (campo) {
                if (!campo.value.trim()) {
                    valido = false;
                    campo.classList.add('input-error');
                    const msg = document.createElement('small');
                    msg.className = 'field-error';
                    msg.textContent = 'Este campo es obligatorio.';
                    campo.parentNode.appendChild(msg);
                }
            });

            // Validar selects requeridos
            form.querySelectorAll('select[required]').forEach(function (sel) {
                if (!sel.value) {
                    valido = false;
                    sel.classList.add('input-error');
                    const msg = document.createElement('small');
                    msg.className = 'field-error';
                    msg.textContent = 'Debes seleccionar una opción.';
                    sel.parentNode.appendChild(msg);
                }
            });

            if (!valido) e.preventDefault();
        });
    });

    // Búsqueda en tiempo real en tablas
    const buscador = document.getElementById('buscador-tabla');
    if (buscador) {
        buscador.addEventListener('input', function () {
            const termino = this.value.toLowerCase().trim();
            const filas   = document.querySelectorAll('.tabla tbody tr');
            let visibles  = 0;

            filas.forEach(function (fila) {
                const texto = fila.textContent.toLowerCase();
                if (texto.includes(termino)) {
                    fila.style.display = '';
                    visibles++;
                } else {
                    fila.style.display = 'none';
                }
            });

            // Mostrar mensaje si no hay resultados
            const sinResultados = document.getElementById('sin-resultados');
            if (sinResultados) {
                sinResultados.style.display = visibles === 0 ? 'block' : 'none';
            }
        });
    }

    // Auto-dismiss de alertas después de 4 segundos
    document.querySelectorAll('.alert-success').forEach(function (alerta) {
        setTimeout(function () {
            alerta.style.transition = 'opacity 0.5s';
            alerta.style.opacity    = '0';
            setTimeout(() => alerta.remove(), 500);
        }, 4000);
    });

});