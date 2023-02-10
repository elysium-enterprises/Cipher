/** @type {import('tailwindcss').Config} */


module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'primary' : '#000103',
        'secondary' : '#C6BCB4',
        'logo-primary' : '#DC3545',
        'tinted' : '#F0F0F0'
      },
    },
    fontFamily: {
      'sans': ['Open Sans', 'twemoji'],
      'serif': ['Roboto Slab', 'twemoji'],
      'mono': ['Red Hat Mono', 'twemoji'],
      // 'display': [],
      'body': ['Open Sans', 'twemoji']
    }
  },
  
  plugins: [],
}