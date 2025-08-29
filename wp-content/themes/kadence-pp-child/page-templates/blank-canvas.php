<?php
/**
 * Template Name: Blank Canvas (No Header/Footer)
 * Description: Full-page template without theme header/footer. Great for custom HTML landing pages.
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class('blank-canvas'); ?>>
  <main id="main">
    <!-- ↓↓↓ PASTE YOUR FULL PAGE HTML BODY MARKUP HERE ↓↓↓ -->
    
    <!-- Example structure - replace with your actual HTML -->
    <section class="hero">
      <div class="container">
        <h1>Welcome to The Profit Platform</h1>
        <p>Your existing HTML goes here - zero rebuild required!</p>
        <a href="#" class="cta-button">Get Started</a>
      </div>
    </section>
    
    <section class="features">
      <div class="container">
        <h2>Features</h2>
        <div class="feature-grid">
          <div class="feature-item">
            <h3>Feature 1</h3>
            <p>Description of feature 1</p>
          </div>
          <div class="feature-item">
            <h3>Feature 2</h3>
            <p>Description of feature 2</p>
          </div>
          <div class="feature-item">
            <h3>Feature 3</h3>
            <p>Description of feature 3</p>
          </div>
        </div>
      </div>
    </section>
    
    <section class="contact">
      <div class="container">
        <h2>Contact Us</h2>
        <p>Ready to maximize your profits? Get in touch today.</p>
        <form class="contact-form">
          <input type="text" placeholder="Your Name" required>
          <input type="email" placeholder="Your Email" required>
          <textarea placeholder="Your Message" required></textarea>
          <button type="submit">Send Message</button>
        </form>
      </div>
    </section>
    
    <!-- ↑↑↑ REPLACE ABOVE WITH YOUR ACTUAL HTML ↑↑↑ -->
  </main>
  <?php wp_footer(); ?>
</body>
</html>