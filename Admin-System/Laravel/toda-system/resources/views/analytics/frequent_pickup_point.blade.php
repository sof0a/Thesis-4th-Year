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
        var colors = ['#c7bd63', '#bcb455', '#b1a946', '#a69f38', '#9b9431'];

        // Prepare data for Chart.js
        var pickupPoints = frequentPickupPoints.map(function(item) {
            return item.pickup_point;
        });

        var pickupCounts = frequentPickupPoints.map(function(item) {
            return item.pickup_count;
        });

        // Assign colors to pickup points based on frequency
        // var backgroundColor = pickupCounts.map(function(_, index) {
        //     return colors[index % colors.length]; // Cycle through colors if there are more pickup points than colors
        // });

        var backgroundColor = [];
        for (var i = 0; i < pickupPoints.length; i++) {
            var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16); // Generate a random hexadecimal color
            backgroundColor.push(randomColor);
        }

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
                    // borderColor: '#d2c972',
                    hoverOffset: 4
                }]
            },
            options: {

            }
        });
    </script>
</body>
</html>
