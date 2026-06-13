{{-- Chart--}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('categoriasChart').getContext('2d');
        
        // datos
        const labels = @json($chartLabels);
        const data = @json($chartData);
        
        const dynamicColors = [];        
        for (let i = 0; i < labels.length; i++) {
            let h, s, l;
        
            if (i % 3 === 0) {
                // Verdes Matiensos
                h = 150 + (i % 10);      
                s = 40 + (i % 20);        
                l = 30 + ((i * 7) % 40); 
            } else if (i % 3 === 1) {
                // Grises
                h = 0;
                s = 0; 
                l = 40 + ((i * 11) % 40);
            } else {
                // Negros / Oscuros profundos
                h = 156;
                s = 15;
                l = 10 + ((i * 5) % 15);
            }
            
            dynamicColors.push(`hsl(${h}, ${s}%, ${l}%)`);
        }

        //gráfico
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: dynamicColors,
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