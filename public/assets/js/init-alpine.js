function data() {
  function getThemeFromLocalStorage() {
    // if user already changed the theme, use it
    if (window.localStorage.getItem('dark')) {
      return JSON.parse(window.localStorage.getItem('dark'))
    }

    // else return their preferences
    return (
      !!window.matchMedia &&
      window.matchMedia('(prefers-color-scheme: dark)').matches
    )
  }

  function setThemeToLocalStorage(value) {
    window.localStorage.setItem('dark', value)
  }

  return {
    dark: getThemeFromLocalStorage(),
    toggleTheme() {
      this.dark = !this.dark
      setThemeToLocalStorage(this.dark)
    },

    // Menus
    menus: {
      sideMenu: false,
      notificationsMenu: false,
      profileMenu: false,
      pagesMenu: false
    },
    toggleMenu(menuName){
      this.menus[menuName] = !this.menus[menuName]
    },
    closeMenu(menuName){
      this.menus[menuName] = false
    },

    // Modals
    modals: {
      modal: false
    },
    trapCleanup: null,
    openModal(modalName) {
      this.modals[modalName] = true
      this.trapCleanup = focusTrap(document.querySelector('#' + modalName))
    },
    closeModal(modalName) {
      this.modals[modalName] = false
      this.trapCleanup()
    },
  }
}
