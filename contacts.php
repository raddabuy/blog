<!DOCTYPE html>
<html lang="ru">
<head>
  <?php
  $website_title = 'Контактная информация';
  require 'blocks/head.php'; ?>
</head>
<body>

    <?php require 'blocks/header.php'; ?>
    <main class="container mt-5">
      <div class="row">
          <div class="col-md-8 mb-5">
             <h4>Обратная связь</h4>
             <form action="" method="post">
               <label for="username">Ваше имя</label>
               <input type="text" name="username" id="username" class="form-control">
               <label for="email">Email</label>
               <input type="text" name="email" id="email" class="form-control">
               <label for="mess">Сообщение</label>
               <textarea name="mess" id="mess" class="form-control"></textarea>

               <div class="alert alert-danger mt-2" id="errorBlock"></div>
               <button type="button" id="mail_send" class="btn btn-success mt-3">Отправить сообщение</button>

             </form>
          </div>
          <?php require 'blocks/aside.php'; ?>
      </div>
    </main>
    <?php require 'blocks/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $('#mail_send').click(function () {
          var name = $('#username').val();
          var email = $('#email').val();
          var mess = $('#mess').val();


          $.ajax({
            url: 'ajax/mail.php',
            type: 'POST',
            cashe:false,
            data: {'username':name,'email':email, 'mess':mess},
            dataType: 'html',
            success: function (data) {
              if(data == 'Готово'){
                $('#mail_send').text('Все готово');
                $('#errorBlock').hide();
                $('#username').val("");
                $('#email').val("");
                $('#mess').val("");
              }

              else{
                  $('#errorBlock').show();
                  $('#errorBlock').text(data);
              }

                }

          });
      });

    </script>

</body>
</html>
