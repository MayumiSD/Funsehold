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
                          <td><div class="loginbtn"><a href="cook.php?receipeid={$receipe.receipe_id}" class="btn" id="go">作る</a></div></td>
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

                        <table style="width: 100%;">
                          {foreach $favoriteInfo as $row}
                          <tr>
                            <td class="receipe-number">{$row@iteration}</td>
                            <td class="receipe-name">{$row.receipe_name}</td>
                            <td>{$row.star}</td>
                            <td><div class="loginbtn"><a href="cook.php?receipeid={$row.receipe_id}" class="btn" id="go">作る</a></div></td>
                          </tr>
                          {/foreach}
                        </table>

                      </div>
                  </div>
              </div>
            </div>
      </div>
</div>

{include file ='footer.tpl'}
