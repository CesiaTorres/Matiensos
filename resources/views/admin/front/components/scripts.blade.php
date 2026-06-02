
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
                //Borra los bordes rojos/verdes de validación
                form.classList.remove('was-validated');                
                //Restaura los inputs a su estado original (vacío en Crear, con datos reales en Editar)
                form.reset();
            }
        });
    });
</script>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('categoriasChart').getContext('2d');
        
        // 1. Recibimos los datos de Laravel
        const labels = @json($chartLabels);
        const data = @json($chartData);
        
        // 2. GENERADOR DINÁMICO DE COLORES CORPORATIVOS
        const dynamicColors = [];
        
        for (let i = 0; i < labels.length; i++) {
            let h, s, l;
            
            // Alternamos matemáticamente entre 3 estilos usando el resto de la división (módulo)
            if (i % 3 === 0) {
                // Verdes Matiensos (Hue ~150)
                h = 150 + (i % 10);        // Variamos levemente el tono
                s = 40 + (i % 20);         // Saturación entre 40% y 60%
                l = 30 + ((i * 7) % 40);   // Luminosidad entre 30% y 70%
            } else if (i % 3 === 1) {
                // Grises (Saturación en 0)
                h = 0;
                s = 0; 
                l = 40 + ((i * 11) % 40);  // Luminosidad variable (grises claros a medios)
            } else {
                // Negros / Oscuros profundos
                h = 156;
                s = 15;
                l = 10 + ((i * 5) % 15);   // Luminosidad muy baja (10% a 25%)
            }
            
            dynamicColors.push(`hsl(${h}, ${s}%, ${l}%)`);
        }

        // 3. Dibujamos el gráfico con la paleta auto-generada
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: dynamicColors, // Pasamos el array infinito
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { 
                            font: { size: 12 },
                            padding: 15,
                            usePointStyle: true
                        }
                    }
                }
            }
        });
    });
</script>