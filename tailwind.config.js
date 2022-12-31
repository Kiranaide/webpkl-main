/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.{html,php}','node_modules/flowbite/**/*.{html,js,jsx}'],
  theme: {
    extend: {
      container: {
        center: true
      },
      footer: {
        center: true
      },
      fontFamily: {
        montserrat: ["Montserrat", "sans-serif"],
      },
      colors: {
        "almost-white" : "hsl(0, 0%, 98%)",
        "medium-gray" : "hsl(0, 0%, 41%)",
        "almost-black" : "hsl(0, 0%, 8%)",
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
