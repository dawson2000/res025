<?php
$nofollow = 1;
require_once template('modular/meta');
echo <<<EOT
-->
<style>
.page-error .error-mark {
  margin-bottom: 33px;
}
.page-error header h1 {
  font-size: 10em;
  font-weight: 400;
}
.page-error header p {
  margin-bottom: 30px;
  font-size: 30px;
  text-transform: uppercase;
}
.page-error h2 {
  margin-bottom: 30px;
}
.page-error .error-advise {
  margin-bottom: 25px;
  color: #a9afb5;
}
</style>
<body class="page-error page-error-404 layout-full">
  <!-- Page -->
  <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
  data-animsition-out="fade-out">
    <div class="page-content vertical-align-middle">
      <header>
        <h1 class="animation-slide-top">404</h1>
        <p class="blue-grey-500 font-weight-300">未找到页面 !</p>
      </header>
      <a class="btn btn-primary btn-round" href="{$_M[config][met_weburl]}">返回首页</a>
    </div>
  </div>
  <!-- End Page -->
<!--
EOT;
require_once template('modular/footer');
?>