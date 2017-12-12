<?php
echo <<<EOT
-->
<div class="modal fade modal-primary" id="met-job-cv" aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method='POST' class="met-form"  enctype="multipart/form-data" action='{$_M[url][site]}{$class_list[$classnow][foldername]}/save.php?action=add'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{$lang_cvtitle}</h4>
                </div>
                <div class="modal-body padding-bottom-0">
                </div>
                <div class="modal-footer text-left">
                    <button type="submit" class="btn btn-primary btn-squared">{$lang_submit}</button>
                    <button type="button" class="btn btn-default btn-squared" data-dismiss="modal">{$lang_cancel}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--
EOT;
?>