jQuery(document).ready(function ($) {
    Dropzone.options = {
        uploadMultiple: true,
        maxFilesize: 5,
        acceptedFiles: 'image/*',
        url: '../upload.php',
        autoProcessQueue: false,

        init: function init() {
            this.on('error', function () {
                alert("Error al subir archivo");
            })
        }
    }
});