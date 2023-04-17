const links = document.querySelectorAll('nav a.smooth-scroll');

links.forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault();
    const targetId = link.getAttribute('href');
    smoothScroll(targetId);
  });
});

function smoothScroll(targetId) {
  const target = document.querySelector(targetId);
  const startPosition = window.pageYOffset;
  const targetPosition = target.getBoundingClientRect().top + startPosition;
  const distance = targetPosition - startPosition;
  const duration = 500;
  let start = null;

  function step(timestamp) {
    if (!start) start = timestamp;
    const progress = timestamp - start;
    const ease = easeInOutQuad(progress, startPosition, distance, duration);
    window.scrollTo(0, ease);
    if (progress < duration) requestAnimationFrame(step);
  }

  function easeInOutQuad(t, b, c, d) {
    t /= d / 2;
    if (t < 1) return c / 2 * t * t + b;
    t--;
    return -c / 2 * (t * (t - 2) - 1) + b;
  }

  requestAnimationFrame(step);
}
