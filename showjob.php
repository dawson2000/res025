<?php
if(!$class_list[$classnow]['releclass'])$sidebarnone = 1;
require_once template('head');
echo <<<EOT
-->
<section class="met-job animsition">
    <div class="container">
        <div class="row">
            <div class="widget widget-article widget-shadow">
                <div class="widget-body">
                    <h3 class="widget-title">
                        {$job[position]}
                    </h3>
                    <p class="widget-metas">
                        <span>{$job[addtime]}</span>
                        <span><i class="icon wb-map margin-right-5" aria-hidden="true"></i>{$job[place]}</span>
                        <span><i class="icon wb-user margin-right-5" aria-hidden="true"></i>{$job[count]}</span>
                        <span><i class="icon wb-payment margin-right-5" aria-hidden="true"></i>{$job[deal]}</span>
                    </p>
                    <hr>
                    <div class="met-editor lazyload clearfix">{$job[content]}</div>
                    <hr>
                    <div class="widget-body-footer margin-top-0">
                        <a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" href="javascript:void(0)" data-jobid="{$job[id]}" data-cvurl="cv.php?lang={$met_langok[$lang][lang]}&selected">{$lang_cvtitle}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--
EOT;
//应聘表单
require_once template('modular/job/job_form');
require_once template('foot');
?>