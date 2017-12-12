<!--<?php
require_once template('min/config');
if($nofollow)$nofollow = "<meta name=\"robots\" content=\"noindex,nofllow\" />";
echo <<<EOT
--><!DOCTYPE HTML>
<html>
<head>
<title>{$met_title}</title>
<meta name="renderer" content="webkit">
<meta charset="utf-8" />{$nofollow}
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="generator" content="MetInfo {$_M[config][metcms_v]}"  data-variable="{$_M[config][met_weburl]},{$_M[lang]},{$classnow},{$id},{$class_list[$classnow][module]},{$_M[config][met_skin_user]}" />
<meta name="description" content="{$show['description']}" />
<meta name="keywords" content="{$show['keywords']}" />
<link href="{$_M[url][site]}favicon.ico" rel="shortcut icon" type="image/x-icon" />
{$resui['css']}{$resui['js_ie9_compatible']}{$_M['html_plugin']['head_script']}{$appscriptcss}{$iehack}{$met_js_access}{$_M[config][met_headstat]}{$closure}
</head><!--
EOT;
?>