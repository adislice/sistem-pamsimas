const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    // "./node_modules/flowbite/**/*.js"
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  darkMode: 'selector',
  theme: {
    extend: {
      colors: {
        primary: colors.blue,
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

