<div class="col-sm-2 sidebar nopadding">
    <ul class="nav nav-sidebar">
        {foreach from=$modules key=key item=module}
                {if ($activeModule != false)}
                    {if ($activeModule.name == $key)}
                        <li class="active">
                    {else}
                        <li>
                    {/if}
                {/if}
                <a class="glyphicon glyphicon-{$module.config.icon}" href="/{$key}">
                    <label>{$module.config.label}</label>
                </a>
            </li>
        {/foreach}
    </ul>
</div>