</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="<?= base_url('dist/script.js') ?>"></script>
<script src="<?= base_url('dist/event.js') ?>"></script>
<script>
    $(document).ready(function () {
        $('#example_pemasukan').DataTable();
    });
    $(document).ready(function () {
        $('#example_pengeluaran').DataTable();
    });
</script>
</body>

</html>