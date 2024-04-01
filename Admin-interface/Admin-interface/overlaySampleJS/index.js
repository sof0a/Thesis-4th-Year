document.getElementById('openOverlay').addEventListener('click', function() {
    document.getElementById('overlay').style.display = 'block';
});

document.getElementById('overlay').addEventListener('click', function(e) {
if (e.target === this) {
    this.style.display = 'none';
}
});
