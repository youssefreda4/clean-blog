<?php require_once BASE_PATH . "views/inc/header.php" ?>

<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                <div class="my-5">

                    <form id="contactForm" method="POST" action="<?= url("index.php?page=send-message"); ?>">

                        <?php if (getsession("errors")) : ?>
                            <?php foreach (flashsession("errors") as $error) : ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    <?= $error; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if (getsession("success")) : ?>
                            <div class="alert alert-success text-center">
                                <?= flashsession("success") ?>
                            </div>
                            <?php unset($_SESSION["success"]); ?>
                        <?php endif; ?>

                        <div class="form-floating">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." />
                            <label for="name">Name</label>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" id="message" name="subject" placeholder="Enter your subject here..." style="height: 12rem"></textarea>
                            <label for="message">Subject</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" name="email" placeholder="Enter your email..." />
                            <label for="email">Email address</label>
                        </div>


                        <div class="form-floating">
                            <textarea class="form-control" id="message" name="content" placeholder="Enter your message here..." style="height: 12rem"></textarea>
                            <label for="message">Message</label>
                        </div>
                        <br />

                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php unset($_SESSION["errors"]); ?>
<?php require_once BASE_PATH . "views/inc/footer.php" ?>