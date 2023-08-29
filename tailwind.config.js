import preset from './vendor/filament/support/tailwind.config.preset'
 
/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
          transparent: 'transparent',
          current: 'currentColor',
          black: colors.black,
          white: colors.white,
          gray: colors.gray,
          emerald: colors.emerald,
          indigo: colors.indigo,
          yellow: colors.yellow,
        },
    },
  safelist: [
    'bg-indigo-500',
  ],    plugins: [],
}
