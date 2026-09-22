document.addEventListener("DOMContentLoaded", () => {
    const toggle = document.getElementById("nav-toggle-btn");
    const nav = document.querySelector("header nav");

    if (toggle && nav) {
        toggle.addEventListener("click", () => {
            nav.classList.toggle("nav-open");
        });
    }

    const search = document.getElementById("search-input");
    if (search) {
        search.addEventListener("input", () => {
            const keyword = search.value.toLowerCase().trim();
            document.querySelectorAll("tbody tr").forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(keyword) ? "" : "none";
            });
        });
    }
});
