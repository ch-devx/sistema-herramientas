</main>
    <footer class="footer">
        Sistema de Seguimiento de Equipos y Herramientas &copy; <?= date('Y') ?>
    </footer>
</div><!-- /.main-content -->
</div><!-- /.app-layout -->

<script>
function toggleSidebar() {
    const sb   = document.getElementById('sidebar');
    const main = document.getElementById('main-content');
    sb.classList.toggle('collapsed');
    main.classList.toggle('expanded');
    localStorage.setItem('sb_collapsed', sb.classList.contains('collapsed') ? '1' : '0');
}
window.addEventListener('DOMContentLoaded', function () {
    if (localStorage.getItem('sb_collapsed') === '1') {
        document.getElementById('sidebar').classList.add('collapsed');
        document.getElementById('main-content').classList.add('expanded');
    }
});
</script>
</body>
</html>