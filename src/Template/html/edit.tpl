<div class="col-sm-10 col-sm-offset-2 main">
    <div class="header col-sm-12">
        <div class="col-sm-3 nopadding">
            <h1 class="page-header">
                <a href="/{$activeModule.name}">{$activeModule.config.label}</a>
                {if isset($ID)}
                    / {$ID}
                {/if}
            </h1>
        </div>
    </div>
    <div class="col-sm-12 content nopadding">
        <div class="table-responsive">
            <form method="POST">
                <table class="table form-table">
                    <tbody>
                        {foreach from=$data key=columnKey item=column}
                            {if isset($invalidFields) && count($invalidFields) > 0 && $invalidFields[$column.name]}
                                <tr class="invalid">
                            {else}
                                <tr>
                            {/if}
                                <td class="col-sm-2">
                                    {$column.label}
                                    {if $column.required > 0}
                                        <sup class="required">*</sup>
                                    {/if}
                                </td>
                                <td>
                                    {$column.html}
                                    {if !empty($column.description)}
                                       <label class="description">
                                           ({$column.description})
                                       </label>
                                    {/if}
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
                <div class="form-buttons">
                    <button type="submit" name="delete" value="1" class="btn btn-danger">Verwijderen</button>
                    <input type="submit" value="Opslaan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>