document.addEventListener("DOMContentLoaded", function() {
    loadNews();
    loadAdvertisements();
});

function loadNews() {
    fetch("php/ai_handler.php?action=get_news")
        .then(response => response.json())
        .then(data => {
            const newsContainer = document.getElementById("news-container");
            newsContainer.innerHTML = data.news;
        })
        .catch(error => console.error("Error fetching news:", error));
}

function loadAdvertisements() {
    // Example code to load advertisements
    const adsContainer = document.getElementById("advertisement");
    adsContainer.innerHTML = "<p>Ad space available!</p>"; // Replace with actual ad integration
}
// Accordion effektini qo'shish
const accordions = document.getElementsByClassName("accordion");

for (let i = 0; i < accordions.length; i++) {
    accordions[i].addEventListener("click", function() {
        this.classList.toggle("active");
        const panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
