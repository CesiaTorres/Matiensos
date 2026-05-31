
<script>
    //Que no se cierre el modal si es un error de ingreso de datos
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>


<script>
    // Reseteo de modal al 'cancelar' o presionar X
    var allModals = document.querySelectorAll('.modal');
    allModals.forEach(function(modal) {
        modal.addEventListener('hidden.bs.modal', function () {
            var form = this.querySelector('form');
            if(form) {
                form.classList.remove('was-validated');
                if(this.id === 'createProductModal') {
                    form.reset();
                }
            }
        });
    });
</script>