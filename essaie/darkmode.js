const darkModeToggle = document.querySelector('.dark-mode-toggle');

darkModeToggle.addEventListener('click', () => {
  document.documentElement.classList.toggle('dark-mode');
});
