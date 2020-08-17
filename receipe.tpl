{include file='head.tpl'}
{include file='header.tpl'}
{$receipeName|default:'&nbsp;'}

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

                      {for $i=1 to 10}
                      <div class="receipe-number">
                          {$i}
                      </div>
                        {/for}

                      {foreach from =$receipeName item='receipeName'}
                      <div class="receipe-name">
                        {foreach from =$receipeName item='row'}
                        <span> - {$row.receipe_name} - <br /></span>
                        {/foreach}
                      </div>
                      {/foreach}

                      {section name=counter loop=10}
                      <div class="loginbtn"><a class="btn" id="go">作る</a></div>
                      {/section}

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

                        {foreach from =$receipeName item='receipeName'}
                        <div class="receipe-name">
                          {foreach from =$receipeName item='row'}
                          <span> - {$row.receipe_name} - <br /></span>
                          {/foreach}
                        </div>
                        {/foreach}

                        <div class="loginbtn"><a class="star">★</a></div>
                      </div>
                  </div>
              </div>
            </div>
      </div>
</div>

{include file ='footer.tpl'}
