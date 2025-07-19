<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Logo ESGI -->
            <?php if (!is_404()): ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo_white.svg" alt="ESGI logo" width=233 height=70>
            <?php endif; ?>

            <!-- Contact Info -->
            <div class="footer-contacts">
                <div class="contact-info">
                    <h4>Manager</h4>
                    <p>+33 1 53 31 25 23</p>
                    <p>info@esgi.com</p>
                </div>

                <div class="contact-info">
                    <h4>CEO</h4>
                    <p>+33 1 53 31 25 15</p>
                    <p>ceo@company.com</p>
                </div>
            </div>
        </div>

        <!-- Social Icons -->
        <div class="footer-bottom">
            <p>2022 Figma Template by ESGI</p>
            <div class="footer-socials">
                <a href="https://www.linkedin.com/" aria-label="LinkedIn" class="linkedin-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.svg" alt="LinkedIn" width="24" height="24">
                </a>
                <a href="https://www.facebook.com/" aria-label="Facebook" class="facebook-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg" alt="Facebook" width="24" height="24">
                </a>
            </div>
        </div>
    </div>
</footer>
</body>

</html>