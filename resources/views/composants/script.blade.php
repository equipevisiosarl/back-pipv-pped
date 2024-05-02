<script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{'assets/js/main.js'}}"></script>





@if(isset($quill) && $quill == true)
<script>
    // Initialisez Quill sur votre éditeur
    var quill = new Quill('#editor', {
        theme: 'snow',
    });

    // Écoutez l'événement de soumission du formulaire
    document.getElementById('myForm').addEventListener('submit', function (e) {
        // Obtenez le contenu de Quill au format HTML
        var quillContent = quill.root.innerHTML;
        // Mettez à jour la valeur du champ caché
        document.getElementById('quillContent').value = quillContent;
    });

</script>

@endif