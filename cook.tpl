{include file='head.tpl'}
{include file='header.tpl'}

<div id="fh5co-services-section">
 <div class="container">
    <div class="heading-section text-center">
      <h2>献立レシピ・作り方</h2>
    </div>

        <div class="fh5co-services">
            <div class="fh5co-table2 fh5co-table2-color-4 text-center">
              <div class="fh5co-table-cell2">
                <i class="icon-mobile"></i>
              </div>
            </div>
            <div class="holder-section">
              <h3>料理名：{$receipeInfo.receipe_name}</h3>
            </div>
        </div>


    <div class="row">
        <div class="holder-section">
           <h4>材料</h4>
           <p>{$receipeInfo.ingredient}</p>
           <h4>作り方</h4>
           <p>{$receipeInfo.how_to_cook}</p>
        </div>
      </div>

  </div>
</div>

	{include file ='footer.tpl'}
