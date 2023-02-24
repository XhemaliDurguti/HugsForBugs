/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{php,html,js}"],
  theme: {
    extend: {
      colors: {
        "pumpkin-skin": {
          50: "#fbf7f2",
          100: "#f6efe6",
          200: "#e9d7c0",
          300: "#dbbe9a",
          400: "#c18e4f",
          500: "#a65d03",
          600: "#955403",
          700: "#7d4602",
          800: "#643802",
          900: "#512e01",
        },
      },
    },
  },
  plugins: [],
};