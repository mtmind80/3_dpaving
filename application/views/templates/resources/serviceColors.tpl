


<div class="panel">
    <div class="panel-heading">

        <h2>Service Colors</h2>
        <a class="topbut btn btn-success" href="{$SITE_URL}resources/serviceList/"><span class="btn-label icon fa fa-shield"></span> View Services</a>

    </div>
    <div class="panel-body">

        <table width="300px;">
            <tr>
                <td>Service</td>
                <td>Color</td>
            </tr>
{foreach $data as $d}
    <tr>
        <td>{$d.catname}</td>
        <td bgcolor="{$d.catcolor}" align='center'><strong>Color</strong></td>
    </tr>

{/foreach}
        </table>

        </div>
        </div>




