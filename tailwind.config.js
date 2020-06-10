const defaultTheme = require('tailwindcss/defaultTheme')
const plugin = require('tailwindcss/plugin')
const Color = require('color')

module.exports = {
  purge: ['public/*.html'],
  theme: {
    themeVariants: ['dark'],
    extend: {
      fontFamily: {
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  variants: {
    backgroundColor: ['focus', 'dark', 'dark:focus'],
    textColor: ['focus-within', 'hover', 'dark', 'dark:focus-within', 'dark:hover'],
  },
  plugins: [
    require('tailwindcss-multi-theme'),
    require('@tailwindcss/custom-forms'),
    plugin(({ addUtilities, e, theme, variants }) => {
      const newUtilities = {}
      Object.entries(theme('colors')).map(([name, value]) => {
        if (name === 'transparent' || name === 'current') return
        const color = value[300] ? value[300] : value
        const hsla = Color(color).alpha(0.45).hsl().string()

        newUtilities[`.shadow-outline-${name}`] = {
          'box-shadow': `0 0 0 3px ${hsla}`,
        }
      })

      addUtilities(newUtilities, variants('boxShadow'))
    }),
  ],
}
