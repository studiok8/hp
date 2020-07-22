<?php
session_start();

// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
    header('Location: index.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // メールを送信する
    $to = 'shoka09040713@gmail.com';
    $from = $post['email'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
名前： {$post['name']}
メールアドレス： {$post['email']}
内容：
{$post['contact']}
EOT;
    // var_dump($body);
    // exit();
mb_send_mail($to, $subject, $body, "From: {$from}");

    // セッションを消してお礼画面へ
    unset($_SESSION['form']);
    header('Location: thanks.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ELMVDM97JJ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ELMVDM97JJ');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WV9JCWX');</script>
<!-- End Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168824097-6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-168824097-6');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name＝"keywords" content＝"風俗,インスタ映え,綺麗,写真,加工,修正,安い,手軽,"/>
    <meta name="discription" contact="STUDIO-Kでは写真の修正・加工・レタッチをお手頃価格で気軽に利用できます。LINEでのやり取りなので個人情報も必要なくスピード仕上げです。">
    <title>写真をさらに美しくするSTUDIO-K・修正・加工・レタッチ・バナー作成</title>
    <title>お問合せフォーム</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV9JCWX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!-- お問合せフォーム画面 -->
    <div class="container">
        <form action="" method="POST">
            <h1>お問い合わせ内容に間違いなければ送信ボタンを押してください</h1>

                        <label for="inputName">お名前&#x1f447;</label>

                        <p class="display_item"><?php echo htmlspecialchars($post['name']); ?>&nbsp;様</p>
 
                        <label for="inputEmail">メールアドレス&#x1f447;</label>

                        <p class="display_item"><?php echo htmlspecialchars($post['email']); ?></p>

                        <label for="inputContent">お問い合わせ内容&#x1f447;</label>

                        <p class="display_item"><?php echo nl2br(htmlspecialchars($post['contact'])); ?></p>


                    <div class="button_wrapper">
                    <a href="index.php">戻る</a><br>
                    <button type="submit">送信する</button>
                        </div>


        </form>
    </div>
</body>
</html>