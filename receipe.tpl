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

    <div class= "fh5co-parallax" id="report-container1">
      <div class="suggest-list-container"><h2>提案</h2></div>
      <div class="favorite-list-container"><h2>私のレシピノート</h2></div>
    </div>

    <div class="fh5co-parallax" id="report-container2">
        <div class="suggest-list-container">
            <div class="list">
                <div class="list-container">
                    <div class="info-container">
                      <div class="receipe-number">1</div>
                      <div class="receipe-name"><span>生姜焼き</span></div>
                      <div class="loginbtn"><a class="btn">作る</a></div>
                    </div>
                </div>
            </div>
        </div>
          <div class="favorite-list-container">
              <div class="list">
                  <div class="list-container">
                      <div class="info-container">
                        <div class="receipe-number">1</div>
                        <div class="receipe-name"><span>生姜焼き</span></div>
                      </div>
                  </div>
              </div>
            </div>
    </div>

{include file ='footer.tpl'}
