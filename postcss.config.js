module.exports = {
  plugins: [
    require('@tailwindcss/jit'),
    require('autoprefixer'),
    require('cssnano')({
      preset: 'default',
    }),
  ],
}
