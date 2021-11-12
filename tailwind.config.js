module.exports = {
  purge: {
      content: [
          './resources/js/components/*.vue',
          './resources/views/*.blade.php',
          './resources/views/**/*.blade.php',
      ],
      safelist: [
          'text-yellow-300',
          'text-gray-700',
          'text-white'
      ]
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
