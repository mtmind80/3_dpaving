<script src="{$SITE_URL}assets/javascripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">


    //when document ready add totals
    $(document).ready(function(){



        tinyMCE.init({
            // General options
            //  mode : "textareas",
            mode : "specific_textareas",
            editor_selector : "myTextEditor",

            theme : "advanced",

            // Theme options
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontsizeselect",
            theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,cleanup,forecolor,backcolor",

            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",

            theme_advanced_statusbar_location : "none",
            forced_root_block: false,

            theme_advanced_resizing : true,
            'width' : 400,
            'height': 340
        });



    });


        function CHECKIT(form)
    {
        if(!test(form)){ return;
        }

        form.submit();
        HideControls();

    }

    function test(form)
    {


        var q = tinyMCE.get('jordProposalText').getContent();
        tinyMCE.triggerSave();

        return true;

    }
</script>


<div class="panel">
    <div class="panel-heading">

        <h2>Edit Proposal Text</h2>
    </div>
    <div class="body">

        <form action="{$SITE_URL}workorders/savePOText/{$id}"  name="dataform" id="dataform"  method="POST">


            <!-- begin row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">Proposal Text</label>
                        <textarea rows="3" id="jordProposalText" name="jordProposalText" class="myTextEditor">{$proposal['jordProposalText']}</textarea>
                    </div>
                </div>
            </div>
            <!-- row -->


            <!-- buton row -->
            <div class="row">
                <div class="col-sm-6">
                    <a href="Javascript:CHECKIT(this.dataform);" class="btn btn-primary btn-labeled">Save and Continue</a>
                </div>
                <div class="col-sm-6">
                    <a href="Javascript:HideControls();" class="btn btn-primary btn-labeled">Cancel</a>
                </div>
            </div>
        </form>
        </div>
        </div>




