const ctx2 = document.getElementById('pieChart');

new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ['Driver 1', 'Driver 2', 'Driver 3', 'Driver 4', 'Driver 5', 'Driver 6'],
        datasets: [{
            label: '# of Passenger per Day',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }   
        }
    }
});

