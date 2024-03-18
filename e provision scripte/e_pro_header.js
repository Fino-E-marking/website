const menu = document.querySelector('.dropdown-holder');
    const dropdown = document.querySelector('.dropdown');
    menu.addEventListener('click', () => {
      if (dropdown.classList.contains('hide-dropdown')) {
        dropdown.classList.remove('hide-dropdown');
      }else{
        dropdown.classList.add('hide-dropdown');
      }
    }) 