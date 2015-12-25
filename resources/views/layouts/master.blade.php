<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="robots" content="index">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="/icon/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="/icon/favicon.png">
    <link rel="stylesheet" type="text/css" href="/css/vendor.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<header>
    <nav class="navbar navbar-default navbar-fixed-top sb-slide">
        <div class="container-fluid">
            <div class="sb-toggle-left navbar-left"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></div>
            <div class="navbar-header">
                <a class="navbar-brand" href="/"><img src="/img/logo.png" alt="I Love 浜松まつり" /></a>
            </div>
        </div>
    </nav>
</header>
<div class="container-fluid" id="sb-site">

    @yield('content')

    <div class="fb-widget">
        <div class="fb-page" data-href="https://www.facebook.com/ILoveHamamatsuMatsuri/" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/ILoveHamamatsuMatsuri/"><a href="https://www.facebook.com/ILoveHamamatsuMatsuri/">燃えよ！「 I Love 浜松まつり」</a></blockquote></div></div>
    </div>

    <footer id="footer">
        <aside>(C) I Love 浜松まつり</aside>
    </footer>

</div>

<div class="sb-slidebar sb-left">
    <nav>
        <ul class="list-unstyled sb-nav">
            <li class="title"><h2 class="sb-slidebar-title">Menu</h2></li>
            <li><a href="/"><span class="glyphicon glyphicon glyphicon-home"></span> トップページ</a></li>
            <li><a href="/about/"><span class="fa fa-info-circle"></span> このサイトについて</a></li>
            <li><a href="https://www.facebook.com/ILoveHamamatsuMatsuri" fb-link="fb://profile/312560315540130" class="fb-link"><span class="fa fa-facebook-square"></span> 燃えよ！「 I Love 浜松まつり」</a></li>
            <li class="title"><h2 class="sb-slidebar-title">Link</h2></li>
            <li><a href="http://hamamatsu-daisuki.net/matsuri/" target="_blank"><span class="glyphicon glyphicon glyphicon-link"></span> 浜松まつり公式サイト</a></li>
            <li><a href="https://www.facebook.com/BangSongJiriYouYuLianZhengYanggeHui" fb-link="fb://profile/376170329093964" class="fb-link"><span class="fa fa-facebook-square"></span> 有玉連凧揚げ会</a></li>
            <li><a href="https://www.facebook.com/tako.matsuri" fb-link="fb://profile/674619572571346" class="fb-link"><span class="fa fa-facebook-square"></span>	池組 五色会</a></li>
            <li><a href="https://www.facebook.com/kagumi.takoagekai" fb-link="fb://profile/625331070841376" class="fb-link"><span class="fa fa-facebook-square"></span> 鴨江町凧揚會</a></li>
            <li><a href="https://www.facebook.com/sumiyoshirenn" fb-link="fb://profile/535651049814463" class="fb-link"><span class="fa fa-facebook-square"></span> 住吉凧揚會　ス組</a></li>
            <li><a href="https://www.facebook.com/takabayashi.tako" fb-link="fb://profile/374610986019531" class="fb-link"><span class="fa fa-facebook-square"></span>	髙林組/髙林町凧揚會</a></li>
            <li><a href="https://www.facebook.com/tomitsukakitakiteclub" fb-link="fb://profile/461289190570809" class="fb-link"><span class="fa fa-facebook-square"></span> 富塚北凧揚会</a></li>
            <li><a href="https://www.facebook.com/nishikami" fb-link="fb://profile/200975646672372" class="fb-link"><span class="fa fa-facebook-square"></span> 西上池川 さくら組 凧揚げ会</a></li>
            <li><a href="https://www.facebook.com/higashiibatakoagekai" fb-link="fb://profile/1377380195867027" class="fb-link"><span class="fa fa-facebook-square"></span>	東伊場凧揚会</a></li>
            <li><a href="https://www.facebook.com/hikumaamidagumi" fb-link="fb://profile/1375383492675440" class="fb-link"><span class="fa fa-facebook-square"></span> 曳馬阿弥陀組</a></li>
            <li><a href="https://www.facebook.com/momiji.mikumi" fb-link="fb://profile/244699168921867" class="fb-link"><span class="fa fa-facebook-square"></span> 三組町</a></li>
        </ul>
    </nav>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5&appId=233195223381481";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script src="/js/vendor.js"></script>
<script src="/js/all.js"></script>
</body>
</html>