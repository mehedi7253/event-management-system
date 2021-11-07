<script src="{{ asset('assets/template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/template/js/ruang-admin.min.js') }}"></script>
<script src="{{ asset('assets/template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    CKEDITOR.replace('application',
        {
            height:300,
            resize_enabled:true,
            wordcount: {
                showParagraphs: false,
                showWordCount: true,
                showCharCount: true,
                countSpacesAsChars: true,
                countHTML: false,

                maxCharCount: 20}
        });
    
    $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
</script>