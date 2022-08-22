//* DOMContentLoaded -> luego de cargar html, img, y css
document.addEventListener("DOMContentLoaded", () => {
  eventListeners();
  darkMode();
});

const darkMode = () => {
  //* Revisar las preferencias de tema del SO del usuario
  const prefiereDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

  if (prefiereDarkMode.matches) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }
  //* Detectar un cambio de tema del usuario en su SO
  prefiereDarkMode.addEventListener("change", () => {
    if (prefiereDarkMode.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  });

  const botonDarkMode = document.querySelector(".dark-mode-boton");
  botonDarkMode.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");

    //*Establcecer en el local Storage para cambiar de paginas
    const isDarkModeActive = document.body.classList.contains("dark-mode");

    if (isDarkModeActive) {
      localStorage.setItem("dark-mode", "true");
      document.body.classList.add("dark-mode");
    } else {
      localStorage.setItem("dark-mode", "false");
      document.body.classList.remove("dark-mode");
    }
  });
  //* Recuperar preferncias del usuario
  if (localStorage.getItem('dark-mode') === 'true') {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }
};

const eventListeners = () => {
  const mobileMenu = document.querySelector(".mobile-menu");

  mobileMenu.addEventListener("click", navegacionResponsive);
};

const navegacionResponsive = () => {
  const navegacion = document.querySelector(".navegacion");

  navegacion.classList.toggle("mostrar");
};
