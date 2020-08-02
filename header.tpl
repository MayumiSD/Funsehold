<body>
<header>
  <div class="container text-center">
    <div class="fh5co-navbar-brand">
      <div class="fh5co-login">
        {if $smarty.session.email == ''}
          <div class="loginbtn"><a href="/register.php" class="btn hanten free_submit">ユーザー登録</a></div>
          <div class="loginbtn"><a href="/login.php" class="btn">ログイン</a></div>
        {else}
        <!-- ログインした時 -->
          <a>ようこそ{$_SESSION["NAME"]}さん</a>
        {/if}

      </div>
      <a class="fh5co-logo" href="index.php">Funsehold</a>
      <p>面倒くさがりな私のための家事ノート</p>
    </div>
    <nav id="fh5co-main-nav" role="navigation">
      <ul>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="work.php">献立レシピ</a></li>
        <li><a href="services.php">在庫管理</a></li>
        <li><a href="about.php">買い物</a></li>
        <li><a href="contact.php">家計簿</a></li>
      </ul>
    </nav>
  </div>
</header>
