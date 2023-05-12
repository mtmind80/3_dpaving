<div id="workspace">
    <div class="svn-logs">
        <h3>svn response:</h3>
        <h6><b>Caution!</b> - Do not refresh this page to avoid update from repository again.</h6>
        {if !empty($LOGS)}
            {foreach $LOGS as $item}
                <p>{$item}</p>
            {/foreach}
        {else}
            <p>No action performed. Site is up-to-date.</p>
        {/if}
    </div>
</div>