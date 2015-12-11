<div class="col-sm-10 col-sm-offset-2 main">
    <div class="header col-sm-12">
        <div class="col-sm-3 nopadding">
            <h1 class="page-header">{$activeModule.config.label}</h1>
        </div>
        <div class="col-sm-1 col-sm-offset-8 nopadding list-buttons">
            <a href="/{$activeModule.name}/new" class="pull-right btn btn-success">
                Nieuw
            </a>
        </div>
    </div>
    <div class="col-sm-12 content nopadding">
        <div class="table-responsive">
            <div class="col-lg-12">
                <table class="table list-table">
                    <thead>
                        <tr>
                            {foreach from=$data['columns'] item=col}
                                <th>{$col.label}</th>
                            {/foreach}
                        </tr>
                    </thead>
                    <tbody>
                        {foreach from=$data['rows'] key=columnKey item=column}
                            <tr>
                                {foreach from=$column key=key item=element}
                                    <td>
                                        {if ($data['columns'][$key]['isLink'])}
                                            <a href="/{$activeModule.name}/{$nextMethod}/{$column[key($column)]}">
                                        {/if}

                                            {$element}

                                        {if ($data['columns'][$key]['isLink'])}
                                            </a>
                                        {/if}
                                    </td>
                                {/foreach}
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>