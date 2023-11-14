
<script>
document.addEventListener("DOMContentLoaded", function () {
    const countValue = document.getElementById("countValue");
    const maxCount = parseInt(countValue.getAttribute("data-max"));
    let currentValue = 0;

    function updateCounter() {
        if (currentValue < maxCount) {
            currentValue++;
            countValue.textContent = currentValue;
        } else {
            clearInterval(interval);
            countValue.style.color = '#2196f3';
            countValue.style.fontSize = '';
            countValue.style.fontWeight = 'Bold';
        }
    }

    const interval = setInterval(updateCounter, 60);
});


</script>
