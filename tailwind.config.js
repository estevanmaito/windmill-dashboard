const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
	purge: [
		'./public/**/*.html',
		'./public/**/*.{js,jsx}'
	],
	darkMode: 'class', // or 'media' or 'class'
	theme: {
		customForms: (theme) => ({
			default: {
				'input, textarea': {
					'&::placeholder': {
						color: theme('colors.gray.400'),
					},
				},
			},
		}),
		extend: {
			colors: {
				teal: colors.teal,
				orange: colors.orange,
				coolGray: colors.coolGray
			},
			maxHeight: {
				xl: '36rem',
			},
			fontFamily: {
				sans: [ 'Inter', ...defaultTheme.fontFamily.sans ],
			},
		},
	},
	variants: {
		extend: {},
	},
	plugins: [
		require('@tailwindcss/forms'),
	],
}
