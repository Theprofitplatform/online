(function () {
  const burger = document.querySelector('.pp-burger');
  const panel  = document.getElementById('pp-mobile');
  
  if (!burger || !panel) return;

  burger.addEventListener('click', () => {
    const open = burger.getAttribute('aria-expanded') === 'true';
    burger.setAttribute('aria-expanded', String(!open));
    panel.hidden = open;
    document.documentElement.classList.toggle('pp-nav-open', !open);
  });

  // Close mobile menu when clicking outside
  document.addEventListener('click', (e) => {
    if (!burger.contains(e.target) && !panel.contains(e.target)) {
      if (burger.getAttribute('aria-expanded') === 'true') {
        burger.setAttribute('aria-expanded', 'false');
        panel.hidden = true;
        document.documentElement.classList.remove('pp-nav-open');
      }
    }
  });

  // Close mobile menu on escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && burger.getAttribute('aria-expanded') === 'true') {
      burger.setAttribute('aria-expanded', 'false');
      panel.hidden = true;
      document.documentElement.classList.remove('pp-nav-open');
      burger.focus(); // Return focus to burger button
    }
  });

  // Optional: add class when scrolled for enhanced styling
  const header = document.getElementById('pp-header');
  let ticking = false;
  
  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        header.classList.toggle('is-scrolled', window.scrollY > 8);
        ticking = false;
      });
      ticking = true;
    }
  });

  // Smooth scroll for anchor links in mobile menu
  const mobileLinks = panel.querySelectorAll('a[href^="#"]');
  mobileLinks.forEach(link => {
    link.addEventListener('click', () => {
      // Close mobile menu when clicking anchor links
      burger.setAttribute('aria-expanded', 'false');
      panel.hidden = true;
      document.documentElement.classList.remove('pp-nav-open');
    });
  });
})();