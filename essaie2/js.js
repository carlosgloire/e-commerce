function toggleDarkMode() {
  document.querySelector("html").classList.toggle("dark");
}

document.querySelector("#mode-sombre").addEventListener("click", toggleDarkMode);
