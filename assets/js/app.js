document.addEventListener("DOMContentLoaded", () => {
  const searchForm = document.querySelector("form");
  const searchInput = searchForm ? searchForm.querySelector("input[type='search']") : null;
  const catalogContainer = document.querySelector("#alat .grid");

  if (!searchForm || !searchInput || !catalogContainer) return;

  const articles = catalogContainer.querySelectorAll("article");

  // Handler Event Pencarian Form Submit
  searchForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const keyword = searchInput.value.toLowerCase().trim();
    filterAlat(keyword);
  });

  // Live Search (Setiap karakter diketik)
  searchInput.addEventListener("input", () => {
    const keyword = searchInput.value.toLowerCase().trim();
    filterAlat(keyword);
  });

  function filterAlat(keyword) {
    let count = 0;

    articles.forEach((article) => {
      const title = article.querySelector("h3").textContent.toLowerCase();
      const description = article.querySelector("p").textContent.toLowerCase();

      if (title.includes(keyword) || description.includes(keyword)) {
        article.style.display = "block";
        count++;
      } else {
        article.style.display = "none";
      }
    });

    // Menampilkan Pesan saat Alat Tidak Ditemukan
    let noResultMsg = document.querySelector("#no-result-msg");
    if (count === 0) {
      if (!noResultMsg) {
        noResultMsg = document.createElement("p");
        noResultMsg.id = "no-result-msg";
        noResultMsg.className = "text-center text-gray-500 col-span-full py-12 font-semibold text-lg";
        noResultMsg.textContent = "Alat yang Anda cari tidak ditemukan.";
        catalogContainer.appendChild(noResultMsg);
      }
    } else if (noResultMsg) {
      noResultMsg.remove();
    }
  }
});