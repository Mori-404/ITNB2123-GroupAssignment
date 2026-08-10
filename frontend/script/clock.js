function updateClockAndStatus() {
    const now = new Date();

    // current local machine time
    const clockElement = document.getElementById('live-clock');
    if (clockElement) {
        clockElement.textContent = now.toLocaleTimeString([], { 
            hour: '2-digit', 
            minute: '2-digit', 
            second: '2-digit' 
        });
    }

    // shop status and condition
    const currentHour = now.getHours();
    const OPEN_HOUR = 8;   // 8:00 AM
    const CLOSE_HOUR = 22; // 10:00 PM
    const statusElement = document.getElementById('shop-status');

    if (statusElement) {
        if (currentHour >= OPEN_HOUR && currentHour < CLOSE_HOUR) {
            statusElement.textContent = "● OPEN NOW";
            statusElement.style.color = "#28a745";
        } else {
            statusElement.textContent = "● CLOSED";
            statusElement.style.color = "#dc3545";
        }
    }
}

// update every seconds
setInterval(updateClockAndStatus, 1000);

updateClockAndStatus();
