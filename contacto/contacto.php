<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>LUSH - Contact us</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Raleway&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../includes/general.css">
    <link rel="stylesheet" href="css/contacto2.css">
   <script src="https://kit.fontawesome.com/34b9ea8fdc.js"></script>
  </head>
  <body>
  <?php include("../includes/header.php"); ?>
    <main id="main" class="container-fluid">
      <section class="container pt-5">
        <div class="row pt-5">
          <div class="col-md-12 text-center">
            <h1 class="title">let's chat</h1>
              <div class="feature_divider mt-4">
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-12 col-lg-6 pt-5">
            <div class="text p-5">
              <h1>Leave a message</h1>
              <p>We promise that we get every message sent through this form. We do our best to respond promptly, sometimes within the hour</p>
            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-6">
            <div class="form pt-5">
              <form class="contact-form" action="contacto.php" method="post">
                <div class="row">
                  <div class="col-sm-12 col-md-6 form-group">
                    <label for="name">Name</label>
                    <br>
                    <input type="text" name="name" id="name" placeholder="Name" value="">
                  </div>
                  <div class="col-sm-12 col-md-6 form-group">
                    <label for="email">Email</label>
                    <br>
                    <input type="email" name="email"id="email" placeholder="Email" value="">
                  </div>
                  <div class="col-sm-12 col-md-6 form-group">
                    <label for="subject">Subject</label>
                    <br>
                    <input type="text" name="subject"id="subject" placeholder="Subject" value="">
                  </div>
                  <div class="col-12 form-group">
                    <label for="message">Message</label>
                    <textarea name="message" rows="8" cols="60" id="message" placeholder="Message"></textarea>
                    <button class="contact-submit mt-2" type="submit" name="submit">Send</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <section class="map container-fluid mt-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d821.1588586500919!2d-58.42733617079159!3d-34.588090094708505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb587b49e0501%3A0x35f8478b0e0400fd!2sTemple%20Palermo!5e0!3m2!1sen!2sar!4v1574908017291!5m2!1sen!2sar" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        <div class="our_home">
          <h1>our home</h1>
          <p>Nuestra casa es en Temple Palermo</p>
          <p>Costa Rica 4667, Palermo</p>
          <p>CABA, Buenos Aires, Argentina</p>
          <p>Tel: xxx xxxx xxxx</p>
          <p>email: lush@lush.com</p>
        </div>
      </section>
    </main>


<?php include("../includes/footer.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
