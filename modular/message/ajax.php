<?php
foreach($message_list as $key=>$val){
$vname1 = $db->get_one("select * from {$met_mlist} where listid='{$val[id]}' and paraid='{$met_message_fd_class}' and lang='{$lang}'");
$vname2 = $db->get_one("select * from {$met_mlist} where listid='{$val[id]}' and paraid='{$met_message_fd_content}' and lang='{$lang}'");
echo <<<EOT
-->
					<li class="list-group-item">
						<div class="media">
							<div class="media-left">
								<i class="icon wb-user-circle" aria-hidden="true"></i>
							</div>
							<div class="media-body">
								<h4 class="media-heading">
									<small class="pull-right">{$val[addtime]}</small>
									{$vname1[info]}
								</h4>
								<p>{$vname2[info]}</p>
<!--
EOT;
if($val['useinfo']){
echo <<<EOT
-->
								<div class="content well margin-bottom-0">
									{$val[useinfo]}
								</div>
<!--
EOT;
}
echo <<<EOT
-->
							</div>
						</div>
					</li>
<!--
EOT;
}
?>