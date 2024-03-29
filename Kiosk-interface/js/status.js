var redirectTimeout;

// Dynamically update the status
function updateStatus(isOnline) {
    var statusDiv = document.getElementById('status');
    var statusColor = document.getElementById('status-indicator');
    var toggleButton = document.getElementById('toggleStatus');

    if (isOnline) {
        statusColor.style.backgroundColor = 'green';
        statusDiv.querySelector('.status-text').textContent = 'Online';
        toggleButton.textContent = 'Turn off';
        toggleButton.classList.remove('btn-success'); // Remove danger class
        toggleButton.classList.add('btn-danger'); // Add primary class

        // Redirect after 5 seconds
        redirectTimeout = setTimeout(function() {
            window.location.href = '../html/searching.html';
        }, 5000); // 5000 milliseconds = 5 seconds
    } else {
        statusColor.style.backgroundColor = 'red';
        statusDiv.querySelector('.status-text').textContent = 'Offline';
        toggleButton.textContent = 'Turn on';
        toggleButton.classList.remove('btn-danger'); // Remove primary class
        toggleButton.classList.add('btn-success'); // Add danger class

        // Cancel redirection if button is turned off
        clearTimeout(redirectTimeout);
    }
}

// Example: Update status to online
var isOnline = false;

updateStatus(isOnline);

// Toggle button
document.getElementById('toggleStatus').addEventListener('click', function() {
    isOnline = !isOnline; // Toggle the status
    updateStatus(isOnline);
});