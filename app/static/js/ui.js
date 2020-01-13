;(function() {
  window.addEventListener('DOMContentLoaded', () => {
    window.svg4everybody()
  })

  document.documentElement.addEventListener(
    'touchstart',
    function(event) {
      if (event.touches.length > 1) {
        event.preventDefault()
      }
    },
    false,
  )
})()
