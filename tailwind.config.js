const plugin = require('tailwindcss/plugin');

module.exports = {
	content: ['./**/*.php', './node_modules/flowbite/**/*.js'],
	safelist: [
		{
			pattern: /(sm:|md:|lg:|)justify-*/,
		},
		{
			pattern: /text-(xs|sm|lg|xl)/,
		},
		{
			pattern: /(text|bg)-(black|white|primary|gray|gray-700|primary-50|primary-600|red|red-50|green-50|green-700|neon|neon-800)$/,
		},
	],
	theme: {
		// Helper pixel to rem calc: https://nekocalc.com/de/px-zu-rem-umrechner
		fontSize: {
			xs: '0.75rem', // 12px
			sm: '0.875rem', // 14px
			base: '1rem', // 16px
			lg: '1.125rem', // 18px -> h6
			xl: '1.25rem', // 20px -> p, h5
			'2xl': '1.5rem', // 24px -> h4
			'3xl': '2rem', // 32px -> h3
			'4xl': '2.5rem', // 40px -> h2
			'5xl': '3rem', // 56px -> h1
			'6xl': '9.375rem', // 150px
			'3vw': '10vw',
		},
		fontFamily: {
			alt: ['Montserrat', 'sans-serif'],
			sans: ['Roboto', 'sans-serif'],
		},
		fontWeight: {
			normal: 300,
			robotonormal: 340,
			medium: 400,
			semibold: 500,
			bold: 700,
		},
		extend: {
			boxShadow: {
				'navbar-dropdown': '0px 20px 25px -5px rgba(0, 0, 0, 0.1), 0px -10px 10px rgba(0, 0, 0, 0.04)',
			},
			boxShadow: {
				xl: '0 0px 60px -15px rgba(0, 0, 0, 0.3)',
			},
			maxWidth: {
				32: '8rem',
			},
			minHeight: {
				32: '8rem',
			},
			maxHeight: {
				'screen-80': '80vh',
			},
			scale: {
				cards: '1.01',
			},
		},
	},
	corePlugins: {
		aspectRatio: false,
	},
	plugins: [
		require('@tailwindcss/aspect-ratio'),
		require('flowbite/plugin'),
		require('@tailwindcss/forms'),
		require('@tailwindcss/container-queries'),
		require('tailwindcss-themer')({
			defaultTheme: {
				// put the default values of any config you want themed
				// just as if you were to extend tailwind's theme like normal https://tailwindcss.com/docs/theme#extending-the-default-theme
				extend: {
					// colors is used here for demonstration purposes <--- ????
					// Create color schemes here: https://uicolors.app/create
					colors: {
						primary: {
							50: '#fef9ec',
							100: '#faefcb',
							200: '#f5dc92',
							300: '#eec04b',
							DEFAULT: '#eec04b',
							400: '#ebaf34',
							500: '#e4901c',
							600: '#ca6d15',
							700: '#a84e15',
							800: '#883d18',
							900: '#703317',
							950: '#86681B',
						},
						secondary: {
							50: '#f7f7f7',
							DEFAULT: '#f7f7f7',
							100: '#e3e3e3',
							200: '#c8c8c8',
							300: '#a4a4a4',
							400: '#818181',
							500: '#666666',
							600: '#515151',
							700: '#434343',
							800: '#383838',
							900: '#000000',
						},
						focus: {
							50: '#fff7ed',
							100: '#feedd6',
							200: '#fcd6ac',
							300: '#fab977',
							400: '#f79140',
							500: '#f46e14',
							600: '#e55711',
							700: '#be4210',
							800: '#973415',
							900: '#6C3014',
							950: '#421508',
							DEFAULT: '#F46E14',
						},
						error: {
							50: '#fff0f2',
							100: '#ffe2e6',
							200: '#ffc9d4',
							300: '#ff9db1',
							400: '#ff6688',
							500: '#ff3164',
							600: '#f21b5a',
							650: '#f21b5a',
							700: '#cb0544',
							DEFAULT: '#B0003E',
							900: '#910a3d',
						},
						gray: {
							50: '#f7f7f7',
							100: '#f3f3f3',
							200: '#c8c8c8',
							300: '#a4a4a4',
							400: '#797979',
							DEFAULT: '#F6F6F6',
							500: '#666666',
							600: '#515151',
							700: '#434343',
							800: '#383838',
							900: '#313131',
						},
						success: {
							50: '#edfcf4',
							100: '#d2f9e2',
							200: '#a9f1cb',
							300: '#72e3ae',
							400: '#39ce8e',
							500: '#15b474',
							600: '#0a915e',
							DEFAULT: '#087951',
							800: '#095c3f',
							900: '#084c35',
						},
						warning: {
							50: '#fffbec',
							100: '#fff5d3',
							200: '#ffe8a5',
							300: '#ffd66d',
							400: '#ffb832',
							500: '#ffa00a',
							600: '#ff8800',
							DEFAULT: '#ff8800',
							700: '#cc6402',
							800: '#a14d0b',
							900: '#82410c',
							950: '#461f04',
						},
						highlight: {
							50: '#fcffe5',
							100: '#f5ffc8',
							DEFAULT: '#ebff9a',
							300: '#d8fb5b',
							400: '#c4f229',
							500: '#a5d80a',
							600: '#80ad03',
							700: '#608308',
							800: '#4d670d',
							900: '#415710',
						},
					},
				},
			},
			themes: [
				{
					name: 'wmde-scheme',
					extend: {
						colors: {
							primary: {
								50: '#e5eeff',
								100: '#cfe0ff',
								200: '#a9c3ff',
								300: '#7599ff',
								400: '#3f5dff',
								500: '#1423ff',
								600: '#0008ff',
								700: '#0009ff',
								800: '#0008e3',
								900: '#000094',
								DEFAULT: '#000068',
							},
						},
					},
				},
			],
		}),
	],
};
