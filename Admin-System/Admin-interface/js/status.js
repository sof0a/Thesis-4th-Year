// JavaScript to dynamically update the status
function updateStatus(isOnline) {
var statusDiv = document.getElementById('status');
var statusColor = document.getElementById('status-indicator');

if (isOnline) {
    statusColor.style.backgroundColor = 'green';
    statusDiv.querySelector('.status-text').textContent = 'Online';
} else {
    statusColor.style.backgroundColor = 'red';
    statusDiv.querySelector('.status-text').textContent = 'Offline';
}
}

// Example: Update status to online
var isOnline = true;
updateStatus(true);

updateStatus(isOnline);

// Toggle button
document.getElementById('toggleStatus').addEventListener('click', function() {
    isOnline = !isOnline; // Toggle the status
    updateStatus(isOnline);
});