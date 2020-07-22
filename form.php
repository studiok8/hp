<?php
session_start();
$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // フォームの送信時にエラーをチェックする
    if ($post['name'] === '') {
        $error['name'] = 'blank';
    }
    if ($post['email'] === '') {
        $error['email'] = 'blank';
    } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'email';
    }
    if ($post['contact'] === '') {
        $error['contact'] = 'blank';
    }

    if (count($error) === 0) {
        // エラーがないので確認画面に移動
        $_SESSION['form'] = $post;
        header('Location: confirm.php');
        exit();
    }
} else {
    if (isset($_SESSION['form'])) {
        $post = $_SESSION['form'];
    }
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
　　<meta name="google-site-verification" content="NwDTv334wAwYmQ3N_sEYdYE9cP-oK5Jq3WNSN2sFEPk" />
    <meta name="google-site-verification" content="2jRZpumBzDPXJ1Ww0AheYW3245cx8fu7Bqkd91RZO4U" />
    <meta name＝"keywords" content＝"風俗,インスタ映え,綺麗,写真,加工,修正,安い,手軽,"/>
    <meta name="discription" contact="STUDIO-Kでは写真の修正・加工・レタッチをお手頃価格で気軽に利用できます。LINEでのやり取りなので個人情報も必要なくスピード仕上げです。">
    <title>お問合せフォーム 写真の修正・加工・レタッチ STUDIO-K</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV9JCWX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!-- お問合せフォーム画面 -->
        <form action="" id= "entry" method="POST" novalidate>
            <h1>お問い合わせ内容をご記入ください</h1>
            
                    <dl>
                        <dt>
                    
                        <label for="inputName">お名前</label>
                      <dd>
                        <input type="text" name="name" id="inputName" class="form-control" value="" required autofocus>
                     </dd>
                        <?php if (isset($error['name']) && $error['name'] == 'blank'): ?>
                            <p class="error_msg">※お名前をご記入下さい</p>
                        <?php endif; ?>
                        </dt>
                        <dt>
               

               
                        <label for="inputEmail">メールアドレス</label>
                        <dd>
                        <input type="email" name="email" id="inputEmail" class="form-control" value="" required>
                        </dd>
                        <?php if (isset($error['email']) && $error['email'] == 'blank'): ?>
                            <p class="error_msg">※メールアドレスを正しくご記入ください</p>
                        <?php endif; ?>
                        </dt>

                        <dt>
                        <label for="inputContent">お問い合わせ内容</label>
                        <dd>
                        <textarea name="contact" id="inputContent" rows="2" class="form-control" required></textarea>
                        </dd>
                        <?php if (isset($error['contact']) && $error['contact'] == 'blank'): ?>
                            <p class="error_msg">※お問い合わせ内容をご記入下さい</p>
                        <?php endif; ?>
                        </dt>
                        <div class="button_wrapper">
                    <button type="submit">確認画面へ</button>
                        </div>
                    </dl>
        </form>
</body>
</html>
