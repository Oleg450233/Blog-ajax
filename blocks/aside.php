<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<aside>
    <div class="info">
        <h2>Очень интересные факты</h2>
        <p>В подмосковной Лобне вместе с матерью живёт двадцатилетний Илья Горюнов. Илья — студент филологического факультета МГУ; мать Ильи, воспитавшая сына одна, учительница русского языка и литературы. Отмечая окончание сессии, действуя наперекор матери, Илья отправляется со своей девушкой Верой в московский клуб «Рай». Неожиданно в клуб врывается наркополиция ФСКН с рейдом: у Ильи и Веры наркотиков не было, но Веру всё равно задерживает сотрудник в штатском Пётр Хазин. Илья пытается воспрепятствовать задержанию Веры и оскорбляет задержавшего её Хазина: в отместку молодой офицер подбрасывает ему кокаин. В итоге Илью сажают в колонию на семь лет по ложному обвинению в сбыте наркотиков. </p>
    </div>
    <img src="https://klike.net/uploads/posts/2019-06/1560329641_2.jpg">
     <?php
    require_once "lib/mysql.php";
       $sql='SELECT*FROM chat ORDER BY `id` DESC';
    $query=$pdo->query ($sql);

     $article=$query->fetchAll(PDO::FETCH_OBJ);
     foreach ($article as $el) {
         echo "<div class='comment'><h6>".$el->message."</h6></div>";
    }

    ?>
    <form>
        <input type="text" name="message" id="message" placeholder="сообщение"><br><br>

        <button onclick="button()" id="add_message">Отправить</button>
        <div class="error-mess" id="error-block"> </div>
    </form>

</aside>
<script>
function button() {
        let message = $('#message').val();
           $.ajax({
            url: 'http://m5/ajax/add_message.php',
            type: 'POST',
            cache: false,
            data: {'message': message},
            dataType: 'html',
            success: function (data) {
                if (data === 'Done') {
                    $(".comment").prepend(`<div class ='comment'><h6>${message}</h6></div>`);
                    $("#add_message").text("Все готово");
                    $("#message").val("");
                    $('#error-block').hide("");
                    // document.location.reload(true);
                }
                else {
                    $("#error-block").show();
                    $("#error-block").text(data);
                }
            }
        })
    }

setInterval(function() {
    $.ajax({

        url: 'http://m5/ajax/add_message.php',
        type: 'POST',
        cache: false,
            dataType: 'html',
        success: function(data) {
            $(".сomment").html(data);
            }
    });
},2000
);
</script>
