{include file='head.tpl'}
{include file='header.tpl'}

<div id="fh5co-services-section">
 <div class="container">
    <div class="heading-section text-center">
      <h2>レシピ・作り方</h2>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-6">
        <div class="fh5co-services">
          <div class="fh5co-table2 fh5co-table2-color-4 text-center">
            <div class="fh5co-table-cell2">
              <i class="icon-mobile"></i>
            </div>
          </div>
          <div class="holder-section">
            <h3>{$receipe.receipe_name}</h3>

           <h4>材料</h4>
           <p>{$receipe.ingredient}</p>
           <h4>作り方</h4>
           <p>{$receipe.how_to_cook}</p>
        </div>
      </div>
    </div>
  </div>
</div>

	{include file ='footer.tpl'}
