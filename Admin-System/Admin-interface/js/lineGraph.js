const ctx3 = document.getElementById('lineChart');

new Chart(ctx3, {
    type: 'line',
    data: {
        labels: ['Driver 1', 'Driver 2', 'Driver 3', 'Driver 4', 'Driver 5', 'Driver 6'],
        datasets: [{
            label: 'Daily Profit',
            data: [12, 19, 3, 5, 2, 3],
            fill: false,
            borderColor: '#f4bc1389',
            tension: 0.1
        }]
    },
    options: {
        responsive: true, // Allow the chart to be responsive
        maintainAspectRatio: false, // Override the aspect ratio to stretch
        scales: {
            y: {
                beginAtZero: true
            }   
        }
    }
});

