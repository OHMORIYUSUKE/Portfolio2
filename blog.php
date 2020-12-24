<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Works</title>

    <link rel="icon" type="image/png" href="images/favicon.png">

    <!--facebook & その他SNSの設定-->
    <meta property="og:title" content="ポートフォリオ">
    <meta property="og:type" content="article">
    <meta property="og:description" content="大森裕介のポートフォリオサイトです。今まで制作してきた様々なものを載せているので、ぜひご覧ください。">
    <meta property="og:url" content="https://yusuke-ohmori.firebaseapp.com/">
    <meta property="og:image" content="https://github.com/OHMORIYUSUKE/Portfolio/blob/main/images/face.png?raw=true">
    <!-- <meta property="og:site_name" content="ポートフォリオ"> -->

    <!--twitterの設定-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="https://yusuke-ohmori.firebaseapp.com/">
    <meta name="twitter:image" content="https://github.com/OHMORIYUSUKE/Portfolio/blob/main/images/face.png?raw=true" />
    <meta name="twitter:title" content="ポートフォリオ">
    <meta name="twitter:description" content="大森裕介のポートフォリオサイトです。今まで制作してきた様々なものを載せているので、ぜひご覧ください。">


    <script type="text/javascript" src="js/prof.js"></script>
    

     <!-- CSS -->
     <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
     <link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
     <link href="css/blog.css" rel="stylesheet">

     <meta name="viewport" content="width=device-width">
</head>
<body>
<header>
        <div class="container">
          <h1 class="head-title">Portfolio</h1>
          <nav id="Header-Nav" class="header-nav">
            <a href="index.html" class="nav-list">Top</a>
            <a href="profile.html" class="nav-list">About</a>
            <a href="works.html" class="nav-list">Works</a>
			<a href="contact.html" class="nav-list">Contact</a>
			<a href="blog.php" class="nav-list">Blog</a>
          </nav>
          <div id="Hamburger" class="hamburger">
            <div></div>
            <div></div>
            <div></div>
            <p>MENU</p>
          </div>
        </div>
      </header>
      

	<h1 class="title">Blog</h1>
	
	<div class="balloon2">
  		<p>最新のブログ</p>
	</div>

	
<ul class="itemlist cf">

<?php 
require_once "./Feed.php" ; //rss-phpライブラリを読み込みます
$feed = new Feed ;
$url = "https://uu-tan.hatenablog.jp/rss"; //RSSのURLを入力する
$rss = $feed->loadRss( $url ) ;
$num = 9;//表示させたい件数
$i=0;
$desW = 60;//詳細の文字数を制限します。制限しないときは0にします。
if ( $desW != 0){
	$desW = ($desW*2)+2;
}
foreach( $rss->item as $item )
{
	if($i>=$num){
	}
	else{
		$title = $item->title ;	// タイトル
		$link = $item->link ; // リンク
		$timestamp = strtotime( $item->pubDate ) ; // 更新日時
		$description = $item->description ; // 詳細
		$description = str_replace("▼続きを読む","",$description);
		//↑ 続きを読むなど、決まった文章が詳細にはいっている場合に、それを除外する
		$description = strip_tags($description);
		if ( $desW != 0){
			$description = mb_strimwidth($description, 0, $desW, "…",'utf-8');
        }
		
		$thumbnail=$item->enclosure->attributes()->url;
		//アイキャッチがデフォルトのときは。
		if ($thumbnail=='https://cdn.blog.st-hatena.com/images/theme/og-image-1500.png') {
			$thumbnail="images/noimage.jpg";
		}
		?>


        <li class="card">
            <p><a href="<?php echo $link; ?>" data-lity="data-lity"><img src="<?php print $thumbnail; ?>"></a></p>
            <dl>
                <dt id="name"><?php echo $title; ?></dt>
                <dd class="txt"><?php echo $description; ?></dd>
                <dt id="time"><?php echo date( "Y/m/d", $timestamp); ?></dt>
            </dl>
        </li>
        

	<?php
	$i++;
	}
}
?>
</ul>

<p class="foot-a"><a href="https://uu-tan.hatenablog.jp/archive">もっと見る(はてなブログ)</a></p>

<footer>Copyright &#169; 2020-2020 Ohmori Yusuke Portfolio  All Rights Reserved.</footer>

<script type="text/javascript" src="js/prof.js"></script>
</body>
</html>
