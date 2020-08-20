{include file='head.tpl'}
{include file='header.tpl'}

    <div class="search-container">
      <div class="search">
          <input id="receipe-input" type="text" placeholder="料理名、食材、目的で探す">
          <i class="fas fa-search"></i>
      </div>
    </div>
    <div class="search-container">
      <div class="search">
          <input id="receipe-input" type="text" placeholder="地名、郵便番号で特売情報を探す">
          <i class="fas fa-search"></i>
      </div>
    </div>

<div class="fh5co-parallax" data-stellar-background-ratio="0.5">
    <div class= "report-container" id="report-container1">
      <div class="suggest-list-container"><a>提案</a></div>
      <div class="favorite-list-container"><a>私のお気に入りレシピ</a></div>
    </div>

    <div class="report-container" id="report-container2">
        <div class="suggest-list-container">
            <div class="list">
                <div class="list-container">
                    <div class="info-container">

                      <table style="width: 100%;">
                        {foreach $receipeName as $receipe}
                        <tr>
                          <td class="receipe-number">{$receipe@iteration}</td>
                          <td class="receipe-name">{$receipe.receipe_name}</td>
                          <td><div class="loginbtn"><a href="cook.php" class="btn" id="go">作る</a></div></td>
                        </tr>
                        {/foreach}
                      </table>

                    </div>
                </div>
            </div>
        </div>
          <div class="favorite-list-container">
              <div class="list">
                  <div class="list-container">
                      <div class="info-container">

                        {for $i=1 to 10}
                        <div class="receipe-number">
                            {$i}
                        </div>
                          {/for}
                        <div class="receipe-name">
                        {foreach $receipeName as $receipe}
                          <span>{$receipe.receipe_name}</span><br />
                          {/foreach}
                        </div>
                        <div class="loginbtn"><a class="star">★</a></div>

                      </div>
                  </div>
              </div>
            </div>
      </div>
</div>

{include file ='footer.tpl'}
