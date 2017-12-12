<?php
echo <<<EOT
-->
<div class="shoppro-discount clearfix" hidden>
    <span>{$_M['word']['app_shop_discount']}</span>
    <div class='shoppro-discount-body'>
        <div class='shoppro-discount-list inline-block' data-state='0'></div>
        <div class='shoppro-discount-list inline-block' data-state='1'></div>
        <a href="{$_M['url']['shop_discount']}#state_1" target='_blank' class="btn btn-default btn-outline btn-xs margin-top-5">{$_M['word']['app_shop_morediscount']}</a>
    </div>
</div>
<div class="modal modal-fade-in-scale-up modal-danger" id="discount-received-modal" aria-hidden="true" aria-labelledby="discount-received-modal" role="dialog" tabindex="-1">
    <button type="button" class="close font-size-40" style='position:fixed;top: 0;right: 20px;' data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <div class="modal-dialog modal-center modal-sm">
        <div class="modal-content">
            <div class="pricing-list text-left margin-bottom-0" style='border:none;'>
                <div class="pricing-header">
                    <div class="pricing-title padding-horizontal-30 padding-top-30 padding-bottom-0 font-size-20 font-weight-300"></div>
                    <div class="pricing-price padding-vertical-10 padding-horizontal-30 font-size-50 font-weight-300">
                        <span class="pricing-currency font-size-30">{$_M['config']['shopv2_price_str_prefix']}</span>
                        <span class="pricing-amount"></span>
                    </div>
                    <div class="pricing-tips padding-horizontal-30 padding-bottom-30">
                        <p class="margin-bottom-0 pricing-par">{$_M['word']['app_shop_order']}{$_M['word']['app_shop_order_achieve']} <strong></strong> {$_M['word']['app_shop_canuser']}</p>
                        <p class="margin-bottom-0 pricing-time">{$_M['word']['app_shop_period_validity']}：<span></span></p>
                        <p class="margin-bottom-0 pricing-inst">{$_M['word']['app_shop_instructions']}：<span></span></p>
                    </div>
                </div>
                <div class="pricing-footer padding-30 text-center bg-blue-grey-100">
                    <a class="btn btn-lg btn-squared" href='javascript:;' data-id="">
                        <span class="ladda-label"><i class="icon wb-arrow-right" aria-hidden="true"></i><font class='btn-text'></font></span>
                    </a>
                </div>
            </div>
            <div class='discount-received-success padding-horizontal-20 padding-vertical-30 bg-white' style='display:none;'>
                <div class="row margin-0">
                    <i class="icon pe-cash pull-left font-size-60" aria-hidden="true"></i>
                    <div class='row pull-left margin-left-20 margin-right-50'>
                        <h4 class="media-heading font-size-16"></h4>
                        <p class="font-size-20 green-800 margin-bottom-0">{$_M['word']['app_shop_receiveok']}</p>
                    </div>
                </div>
                <div class="margin-top-20 discount-received-success-btn">
                    <a class="btn btn-default btn-squared font-size-16" href="{$_M['url']['shop_discount']}#state_1">{$_M['word']['app_shop_morediscount']}</a>
                    <a class="btn btn-danger btn-squared margin-left-10 font-size-16 btn-use" href='javascript:;'>{$_M['word']['app_shop_immediate_use']}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var discount_json_url = '{$_M['url']['shop_discount_my']}',
        discount_listjson_url = '{$_M['url']['shop_discount']}&a=dodiscount_list',
        discount_receive_url = '{$_M['url']['shop_discount_receive']}';
</script>
<!--
EOT;
?>