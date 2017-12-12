<?php
$classsearch = $class1;
if($class_list[$classnow]['releclass'])$classsearch = $classnow;
echo <<<EOT
-->
                        <form method='get' action="{$_M[url][site]}search/search.php">
                            <input type='hidden' name='lang' value='{$lang}' />
                            <input type='hidden' name='class1' value='{$classsearch}' />
                            <div class="form-group">
                                <div class="input-search">
                                    <button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
                                    <input type="text" class="form-control" name="searchword" placeholder="{$lang_bar_placeholder}">
                                </div>
                            </div>
                        </form>
<!--
EOT;
?>