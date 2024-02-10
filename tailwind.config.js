const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    // "./node_modules/flowbite/**/*.js"
  ],
  darkMode: 'selector',
  theme: {
    extend: {
      colors: {
        primary: colors.sky,
        secondary: colors.yellow,
        neutral: colors.gray,
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms')({
      strategy: 'class'
    }),
    // require('flowbite/plugin')
  ],
}

