document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector(".slider");
    let count = 0;

    function nextSlide() {
        count++;
        if (count >= slider.children.length) {
            count = 0;
        }
        updateSlider();
    }

    function updateSlider() {
        const translateValue = -count * 100 + "%";
        slider.style.transform = "translateX(" + translateValue + ")";
    }

    // Change slide every 3 seconds (adjust as needed)
    setInterval(nextSlide, 3000);
});
