<footer class="site-footer">
    <div class="container-fluid">
        <div class="footer-content">
            <!-- Logo ESGI -->
            <div class="footer-logo">
                <h1>ESGI.</h1>
            </div>
            
            <!-- Copyright -->
            <div class="footer-copyright">
                <p>2022 Modèle Figma par ESGI</p>
            </div>
            
            <!-- Contact Info -->
            <div class="footer-contacts">
                <div class="contact-manager">
                    <h4>Manager</h4>
                    <p>+33 1 53 31 25 23</p>
                    <p>info@esgi.com</p>
                </div>
                
                <div class="contact-ceo">
                    <h4>CEO</h4>
                    <p>+33 1 53 31 25 15</p>
                    <p>ceo@company.com</p>
                </div>
            </div>
            
            <!-- Social Icons -->
            <div class="footer-social">
                <a href="#" aria-label="LinkedIn" class="linkedin-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.svg" alt="LinkedIn" width="24" height="24">
                </a>
                <a href="#" aria-label="Facebook" class="facebook-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg" alt="Facebook" width="24" height="24">
                </a>
            </div>
        </div>
    </div>
</footer>
<?php
// déclenchement du hook 
wp_footer();
?>
</body>

</html>