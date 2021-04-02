module.exports = {
  purge: ['public/**/*.html'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    themeVariants: ['dark'],
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/custom-forms'),
    require('tailwindcss-multi-theme'),
  ],
}
