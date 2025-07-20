    <div class="contact-form">
        <h2>Write us Here</h2>
        <p>Go! Don't be shy.</p>
        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
            <input type="text" id="subject" name="subject" placeholder="Subject">
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="tel" id="phone" name="phone" placeholder="Phone no.">
            <textarea type="message" id="message" name="message" placeholder="Message" required ></textarea>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>