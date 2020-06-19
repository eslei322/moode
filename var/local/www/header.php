<!--
/**
 * moOde audio player (C) 2014 Tim Curtis
 * http://moodeaudio.org
 *
 * tsunamp player ui (C) 2013 Andrea Coiutti & Simone De Gregori
 * http://www.tsunamp.com
 *
 * This Program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3, or (at your option)
 * any later version.
 *
 * This Program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * 2020-04-24 TC moOde 6.5.0
 *
 */
-->
<?php
    //workerLog('-- header.php');
    $return = session_start();
    //workerLog('session_start=' . (($return) ? 'TRUE' : 'FALSE'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>moOde Player</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, user-scalable=no">

	<!-- VERSIONED RESOURCES -->
	<?php
		// Common css
		versioned_resource('css/bootstrap.min.css');
		versioned_resource('css/bootstrap-select.min.css');
		versioned_resource('css/flat-ui.min.css');
		versioned_resource('css/jquery.pnotify.default.min.css');
		versioned_resource('css/fontawesome-moode.min.css');
		versioned_resource('css/panels.min.css');
		versioned_resource('css/moode.min.css');

		// Common js
		versioned_script('js/bootstrap.min.js');
		versioned_script('js/bootstrap-select.min.js');
		versioned_script('js/jquery.pnotify.min.js');
        versioned_script('js/notify.min.js');
        versioned_script('js/playerlib-nomin.js');
        versioned_script('js/playerlib.min.js');
		versioned_script('js/links.min.js');

		// Playback / Library
		if ($section == 'index') {
			versioned_resource('css/jquery.countdown.min.css');
			versioned_script('js/jquery.countdown.min.js');
			versioned_script('js/jquery.scrollTo.min.js');
			versioned_script('js/jquery.touchSwipe.min.js');
			versioned_script('js/jquery.lazyload.min.js');
			versioned_script('js/jquery.md5.min.js');
			versioned_script('js/jquery.adaptive-backgrounds.min.js');
			versioned_script('js/jquery.knob.min.js');
			versioned_script('js/bootstrap-contextmenu.min.js');
            versioned_script('js/scripts-library.min.js');
            versioned_script('js/scripts-panels.min.js');
		}
		// Configs
		else {
			versioned_script('js/custom_checkbox_and_radio.min.js');
			versioned_script('js/custom_radio.js');
			versioned_script('js/jquery.tagsinput.min.js');
			versioned_script('js/jquery.placeholder.min.js');
			versioned_script('js/i18n/_messages.en.js', 'text/javascript');
			versioned_script('js/application.min.js');
			versioned_script('js/scripts-configs.min.js');
		}
	?>

	<!-- MOBILE APP ICONS -->
	<!-- Apple -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<link rel="apple-touch-icon" sizes="180x180" href="/v5-apple-touch-icon.png">
	<link rel="mask-icon" href="/v5-safari-pinned-tab.svg" color="#5bbad5">
	<!-- Android/Chrome -->
	<link rel="icon" type="image/png" sizes="32x32" href="/v5-favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/v5-favicon-16x16.png">
	<!--link rel="manifest" href="/site.webmanifest"-->
	<meta name="theme-color" content="#ffffff">
	<!-- Microsoft -->
	<meta name="msapplication-TileColor" content="#da532c">
</head>

<body onorientationchange="javascript:location.reload(true); void 0;">

<div id="cover-backdrop"aria-label="Album Cover Backdrop"></div><div id="context-backdrop"></div><div id="splash"><div>moOde</div></div><div id="inpsrc-indicator"class="inpsrc"><div id="inpsrc-msg"></div></div><div id="menu-top"class="slidedown ui-bar-f ui-header ui-header-fixed"data-position="fixed"data-role="header"role="banner"><div id="playback-switch"aria-label="Switch to Playbar"></div><div id="config-back"><a href="<?php echo $_SESSION['http_config_back'] ?>"aria-label="Back"><i class="far fa-arrow-left"></i></a></div><div id="config-tabs"class="hide viewswitch-cfgs"><a href="lib-config.php"class="btn"id="lib-config-btn">曲库配置</a> <a href="snd-config.php"class="btn"id="snd-config-btn">音频配置</a> <a href="net-config.php"class="btn"id="net-config-btn">网络配置</a> <a href="sys-config.php"class="btn"id="sys-config-btn">系统配置</a></div><div class="busy-spinner"aria-label="Busy"></div><div id="menu-header"></div><div class="busy-spinner"aria-label="Busy"><svg height="42"stroke="#fff"viewBox="0 0 42 42"width="42"xmlns="http://www.w3.org/2000/svg"><g fill="none"fill-rule="evenodd"><g stroke-width="4"transform="translate(3 3)"><circle cx="18"cy="18"r="18"stroke-opacity=".35"/><path d="M36 18c0-9.94-8.06-18-18-18"><animateTransform attributeName="transform"dur="1s"from="0 18 18"repeatCount="indefinite"to="360 18 18"type="rotate"/></path></g></g></svg></div><div class="dropdown"><a href="#notarget"class="btn dropdown-toggle"id="menu-settings"aria-label="Menu"data-target="#"data-toggle="dropdown"role="button"><div id="mblur">mm</div><div id="mbrand">m</div></a><ul class="dropdown-menu"aria-labelledby="menu-settings"role="menu"><?php if ($section == 'index') { ?><li><a href="#configure-modal"data-toggle="modal"><i class="fas sx fa-cog"></i> 配置</a></li><li class="context-menu menu-separator"><a href="#notarget"data-cmd="appearance"><i class="fas sx fa-eye"></i> 外观</a></li><li class="context-menu"><a href="#notarget"data-cmd="update_library"><i class="fas sx fa-sync"></i> 曲库更新</a></li><li><a href="blu-config.php"><i class="fas sx fa-wifi"></i> BlueZ设置</a></li><li><a href="javascript:$('#players-modal .modal-body').load('players.php',function(e){$('#players-modal').modal('show');}); void 0"><i class="fas sx fa-forward"></i> 其他播放器</a></li><li><a href="javascript:$('#audioinfo-modal .modal-body').load('audioinfo.php',function(e){$('#audioinfo-modal').modal('show');}); void 0"><i class="fas sx fa-music"></i> 音频信息</a></li><li class="context-menu"id="playhistory-hide"><a href="#notarget"data-cmd="viewplayhistory"><i class="fas sx fa-book"></i> 播放历史</a></li><li class="context-menu"><a href="#notarget"data-cmd="quickhelp"><i class="fas sx fa-info"></i> 快速帮助</a></li><li class="context-menu menu-separator"><a href="javascript:location.reload(true); void 0"><i class="fas sx fa-redo"></i> 刷新</a></li><li><a href="#power-modal"data-toggle="modal"><i class="fas sx fa-power-off"></i> 系统控制</a></li><?php } else { ?><li class="context-menu menu-separator"><a href="index.php"><i class="fas fa-play"></i> 返回播放</a></li><li><a href="javascript:$('#audioinfo-modal .modal-body').load('audioinfo.php',function(e){$('#audioinfo-modal').modal('show');}); void 0"><i class="fas sx fa-music"></i> 音频信息</a></li><li><a href="javascript:$('#sysinfo-modal .modal-body').load('sysinfo.php',function(e){$('#sysinfo-modal').modal('show');}); void 0"><i class="fas sx fa-file-alt"></i> 系统信息</a></li><li class="context-menu menu-separator"><a href="#notarget"data-cmd="aboutmoode"><i class="fas sx fa-info"></i> moOde 版本</a></li><li><a href="javascript:location.reload(true); void 0"><i class="fas sx fa-redo"></i> 刷新</a></li><li><a href="#power-modal"data-toggle="modal"><i class="fas sx fa-power-off"></i> 系统控制</a></li><?php } ?></ul></div><div class="menu-top"><span id="clockradio-icon"aria-label="Clock Radio"class="clockradio-off">•</span></div></div><div id="menu-bottom"class="slidedown ui-bar-f btn-group btn-list ui-footer ui-footer-fixed"data-position="fixed"data-role="footer"role="banner"><div id="playbar"><div id="playbar-cover"aria-label="Cover"></div><div id="playbar-switch"aria-label="Switch to Playback"><div></div></div><div id="playbar-controls"><button class="btn btn-cmd prev"aria-label="Previous"><i class="fas fa-step-backward"></i></button> <button class="btn btn-cmd play"aria-label="Play / Pause"><i class="fas fa-play"></i></button> <button class="btn btn-cmd next"aria-label="Next"><i class="fas fa-step-forward"></i></button></div><div id="playbar-title"><div id="playbar-currentsong"></div><div id="playbar-currentalbum"></div><div id="playbar-mtime"><div id="playbar-mcount"></div><div id="playbar-mtotal"></div></div></div><div id="playbar-timeline"><div class="timeline-bg"></div><div class="timeline-progress"><div class="inner-progress"></div></div><div class="timeline-thm"><input aria-label="Timeline"id="playbar-timetrack"max="1000"min="0"step="1"type="range"value="0"></div><div id="playbar-time"><div id="playbar-countdown"></div><span id="playbar-div"> / </span><div id="playbar-total"></div></div></div><div id="playbar-radio"></div><div id="playbar-toggles"><button class="btn playback-context-menu"class="btn btn-cmd"aria-label="Context Menu"data-toggle="context"data-target="#context-menu-playback"><i class="far fa-ellipsis-h"></i></button> <button class="btn btn-cmd btn-toggle hide"aria-label="Playlist"id="cv-playlist-btn"><i class="fal fa-list"></i></button> <button class="btn btn-cmd btn-toggle random"aria-label="Random"data-cmd="random"><i class="fal fa-random"></i></button> <button class="btn btn-cmd hide ralbum"aria-label="Random Album"><i class="fal fa-dot-circle"></i></button> <button class="btn btn-cmd coverview"aria-label="Cover View"><i class="fal fa-tv"></i></button> <button class="btn volume-popup-btn"aria-label="Volume"data-toggle="modal"><i class="fal fa-volume-up"></i></button> <button class="btn btn-cmd btn-toggle hide consume"aria-label="Consume"data-cmd="consume"id="playbar-consume"><i class="fal fa-arrow-down"></i></button> <button class="btn btn-cmd addfav"aria-label="Add To Favourites"><i class="fal fa-heart"></i></button></div></div></div><div id="cv-playlist"><ul class="cv-playlist"></ul></div>
