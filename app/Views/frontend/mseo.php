<?php
$model = new App\Models\Setting();
$mseo = $model->first();
?>

<link rel="canonical" href="<?= base_url(esc(uri_string())) ?>" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?= base_url(esc(uri_string())) ?>" />
<meta property="og:site_name" content="<?= esc($mseo->siteName) ?>" />
<meta property="og:image" content="<?= base_url(esc($mseo->siteCover)) ?>" />
<meta name="twitter:card" content="summary" />
<meta name="google-site-verification" content="<?= esc($mseo->siteGkey) ?>" />
<meta name="author" content="<?= esc($mseo->siteFName) ?>" />
<meta property="article:publisher" content="<?= esc($mseo->siteFB) ?>" />
<meta property="article:author" content="<?= esc($mseo->siteFB) ?>" />
<meta property="fb:admins" content="<?= esc($mseo->siteBkey) ?>" />
<meta property="fb:app_id" content="<?= esc($mseo->siteFkey) ?>" />