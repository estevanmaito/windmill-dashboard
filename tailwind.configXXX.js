const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
	darkMode: 'class',
	purge: [ 'public/**/*.html' ],
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
			maxHeight: {
				'0': '0',
				xl: '36rem',
			},
			fontFamily: {
				sans: [ 'Inter', ...defaultTheme.fontFamily.sans ],
			},
		},
	},
	variants: {},
	plugins: [
		require('@tailwindcss/forms'),
	],
}
