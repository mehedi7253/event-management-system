<script src="{{ asset('assets/template/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/template/js/bootstrap.min.js') }}"></script>
<script>
    CKEDITOR.replace('application',
        {
            height:200,
            resize_enabled:true,
            wordcount: {
                showParagraphs: false,
                showWordCount: true,
                showCharCount: true,
                countSpacesAsChars: true,
                countHTML: false,

                maxCharCount: 20}
        });
</script>