<!DOCTYPE html>
<html>
<head>
    <title>Passengers Per Day</title>
    <!-- Include Chart.js library -->
    <script src="{{ asset('../node_modules/chart.js/dist/chart.umd.js')}}"></script>
</head>
<body>
    <canvas id="frequentPickPoints"></canvas>

    <script>
        // Retrieve data passed from the controller
        var frequentPickupPoints = {!! json_encode($frequentPickupPoints) !!};

        // Sort pickup points based on frequency (descending order)
        frequentPickupPoints.sort((a, b) => b.pickup_count - a.pickup_count);

        // Define an array of shades of yellow
        // var colors = ['#fff176', '#ffee58', '#ffeb3b', '#fdd835', '#fbc02d']; // Brightest to darkest
        var colors = ['#fbc02d', '#fdd835', '#ffeb3b', '#ffee58', '#fff176'];

        // Prepare data for Chart.js
        var pickupPoints = frequentPickupPoints.map(function(item) {
            return item.pickup_point;
        });

        var pickupCounts = frequentPickupPoints.map(function(item) {
            return item.pickup_count;
        });

        // Assign colors to pickup points based on frequency
        var backgroundColor = pickupCounts.map(function(_, index) {
            return colors[index % colors.length]; // Cycle through colors if there are more pickup points than colors
        });

        // Create pie chart
        var ctx = document.getElementById('frequentPickPoints').getContext('2d');
        var frequentPickPointsChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: pickupPoints,
                datasets: [{
                    label: 'Number of Occurrences',
                    data: pickupCounts,
                    backgroundColor: backgroundColor,
                    borderColor: '#f4bc13',
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });












        // // Retrieve data passed from the controller
        // var frequentPickupPoints = {!! json_encode($frequentPickupPoints) !!};

        // // Prepare data for Chart.js
        // var pickupPoints = frequentPickupPoints.map(function(item) {
        //     return item.pickup_point;
        // });

        // var pickupCounts = frequentPickupPoints.map(function(item) {
        //     return item.pickup_count;
        // });

        // // Create bar chart
        // var ctx = document.getElementById('frequentPickPoints').getContext('2d');
        // var frequentPickPoints = new Chart(ctx, {
        //     type: 'pie',
        //     data: {
        //         labels: pickupPoints,
        //         datasets: [{
        //             label: 'Number of Occurrences',
        //             data: pickupCounts,
        //             backgroundColor: ['#f4bc1389', '#ffe08289', '#ffd54f89', '#ffca2889', '#ffb30089'],
        //             borderColor: '#f4bc13',
        //             hoverOffset: 4
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });
    </script>
</body>
</html>
