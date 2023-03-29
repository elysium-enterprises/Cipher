/** @type {import('tailwindcss').Config} */


module.exports = {
  plugins: [
    require('flowbite/plugin')
  ],
  content: [
    "./node_modules/flowbite/**/*.js",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      height: {
        screen: ['100vh /* fallback for Opera, IE and etc. */', '100svh'],
      },
      colors: {
        'brand': '#DC3545',
        'brand-secondary': '#5A1C1C',
        'brand-pastel' : '#FF6961'
      },
    },
    fontFamily: {
      'sans': ['"Montserrat"', '"twemoji"'],
      'serif': ['"Roboto Slab"', '"twemoji"'],
      'mono': ['"Red Hat Mono"', '"twemoji"'],
      'display': ['"Inter"'],
      'body': ['"Montserrat"', '"twemoji"']
    }
  },

  plugins: [],
}