function outsideClick(element, events, callback) {
  const html = document.documentElement;
  const outside = "data-outside";

  if (!element.hasAttribute(outside)) {
    events.forEach((userEvent) => {
      setTimeout(() => {
        html.addEventListener(userEvent, handleOutsideClick);
      });
    });
    element.setAttribute(outside, "");
  }

  function handleOutsideClick(event) {
    if (!element.contains(event.target)) {
      element.removeAttribute(outside);
      events.forEach((userEvent) => {
        html.removeEventListener(userEvent, handleOutsideClick);
      });
      callback();
    }
  }
}

function initDropdown() {
  const dropdownmenus = document.querySelectorAll(".menu-item-has-children");
  const menu_a = document.querySelector("#menu-item-24 > a");
  const menu_c = document.querySelector("#menu-item-23 > a");

  if (menu_a) {
    menu_a.addEventListener("click", (event) => {
      event.preventDefault();
    });
  }

  if (menu_c) {
    menu_c.addEventListener("click", (event) => {
      event.preventDefault();
    });
  }

  if (dropdownmenus) {
    dropdownmenus.forEach((menu) => {
      ["touchstart", "click"].forEach((userEvent) => {
        menu.addEventListener(userEvent, handleClick);
      });
    });

    function handleClick() {
      this.classList.add("ativo");
      outsideClick(this, ["touchstart", "click"], () => {
        this.classList.remove("ativo");
      });
    }
  }
}
initDropdown();

function initMenuMobile() {
  const menuButton = document.querySelector('[data-menu="button"]');
  const menuList = document.querySelector(".menu");

  if (menuButton && menuList) {
    const eventos = ["click"];

    function openMenu(e) {
      menuList.classList.add("active");
      menuButton.classList.add("active");

      outsideClick(menuList, eventos, () => {
        menuList.classList.remove("active");
        menuButton.classList.remove("active");
      });
    }
    eventos.forEach((userEvent) => {
      menuButton.addEventListener(userEvent, openMenu);
    });
  }
}
initMenuMobile();
