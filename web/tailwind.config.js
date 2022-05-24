const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
  darkMode: 'class',
  content: [
    `components/**/*.{vue,js}`,
    `layouts/**/*.vue`,
    `pages/**/*.vue`,
    `composables/**/*.{js,ts}`,
    `plugins/**/*.{js,ts}`,
    `App.{js,ts,vue}`,
    `app.{js,ts,vue}`
  ],
  theme: {
    extend: {
        fontSize: {},
        fontFamily: {
            sans: ['TitilliumWeb', ...defaultTheme.fontFamily.sans],
        },
        colors: {
            gray: colors.slate,
            'primary': colors.teal,
            'secondary': colors.cyan,
            'tertiary': colors.amber,
        }
    },
},
  plugins: [],
}
