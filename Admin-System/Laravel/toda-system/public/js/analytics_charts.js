const ctx = document.getElementById('barChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Driver 1', 'Driver 2', 'Driver 3', 'Driver 4', 'Driver 5', 'Driver 6'],
        datasets: [{
            label: 'Passenger',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [ '#f4bc1389' ],
            borderColor: [
                '#f4bc13'
            ],
            borderWidth: 1,
            borderRadius: 50,
            barPercentage: 0.5
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


const ctx1 = document.getElementById('barChart2');

new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['User 1', 'User 2', 'User 3', 'User 4', 'User 5', 'User 6'],
        datasets: [{
            label: '# of Passenger per Day',
            data: [22, 30, 8, 1, 12, 19],
            backgroundColor: [ '#f4bc1389' ],
            borderColor: [
                '#f4bc13'
            ],
            borderWidth: 1,
            borderRadius: 50,
            barPercentage: 0.5
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



const ctx2 = document.getElementById('barChart3');

// Sample data of driver ratings
const driverRatings = [
    { name: 'Driver 1', ratings: [3, 4, 5] }, // Sample ratings for Driver 1
    { name: 'Driver 2', ratings: [4, 3, 5] }, // Sample ratings for Driver 2
    { name: 'Driver 3', ratings: [1, 4, 4] }, // Sample ratings for Driver 3
    { name: 'Driver 4', ratings: [5, 5, 5] }, // Sample ratings for Driver 3
    // Add more driver ratings as needed
];

// Calculate the average rating for each driver
const averageRatings = driverRatings.map(driver => {
    const sum = driver.ratings.reduce((acc, rating) => acc + rating, 0);
    return sum / driver.ratings.length;
});

// Prepare data for Chart.js
const data = {
    labels: driverRatings.map(driver => driver.name),
    datasets: [{
        label: 'Driver Ratings (Average)',
        data: averageRatings,
        backgroundColor: '#f4bc1389',
        borderColor: '#f4bc13',
        borderWidth: 1,
        borderRadius: 50,
        barPercentage: 0.5
    }]
};

// Create the chart
new Chart(ctx2, {
    type: 'bar',
    data: data,
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
