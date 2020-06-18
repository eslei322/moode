<?php
/**
 * moOde audio player (C) 2014 Tim Curtis
 * http://moodeaudio.org
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

require_once dirname(__FILE__).'/inc/playerlib.php';playerSession('open','','');if(isset($_POST['update_audioin'])&&$_POST['audioin']!=$_SESSION['audioin']){if($_POST['update_audioin']!='Local'&&$_SESSION['mpdmixer']=='software'){$_SESSION['notify']['title']='MPD 音量控制必须首先设置为硬件或禁用 （ 0dB ）。';$_SESSION['notify']['duration']=6;}else{playerSession('write','audioin',$_POST['audioin']);submitJob('audioin',$_POST['audioin'],'Input set to '.$_POST['audioin'],'');}}if(isset($_POST['update_rsmafterinp'])&&$_POST['rsmafterinp']!=$_SESSION['rsmafterinp']){playerSession('write','rsmafterinp',$_POST['rsmafterinp']);$_SESSION['notify']['title']='设置已更新。';}if(isset($_POST['update_audioout'])&&$_POST['audioout']!=$_SESSION['audioout']){playerSession('write','audioout',$_POST['audioout']);submitJob('audioout',$_POST['audioout'],'Output set to '.$_POST['audioout'],'');}session_write_close();$_select['audioin'].="<option value=\"Local\" ".(($_SESSION['audioin']=='Local')?"selected":"").">本地 （ MPD ）</option>\n";if($_SESSION['i2sdevice']=='HiFiBerry DAC+ ADC'){$_select['audioin'].="<option value=\"Analog\" ".(($_SESSION['audioin']=='Analog')?"selected":"").">模拟音频输入</option>\n";}elseif($_SESSION['i2sdevice']=='Audiophonics ES9028/9038 DAC'||$_SESSION['i2sdevice']=='Audiophonics ES9028/9038 DAC (Pre 2019)'){$_select['audioin'].="<option value=\"S/PDIF\" ".(($_SESSION['audioin']=='S/PDIF')?"selected":"").">S/PDIF 输入</option>\n";}$_select['rsmafterinp'].="<option value=\"Yes\" ".(($_SESSION['rsmafterinp']=='Yes')?"selected":"").">是</option>\n";$_select['rsmafterinp'].="<option value=\"No\" ".(($_SESSION['rsmafterinp']=='No')?"selected":"").">不</option>\n";$_select['audioout'].="<option value=\"Local\" ".(($_SESSION['audioout']=='Local')?"selected":"").">本地设备</option>\n";waitWorker(1,'inp-config');$tpl="inp-config.html";$section=basename(__FILE__,'.php');storeBackLink($section,$tpl);include('/var/local/www/header.php');eval("echoTemplate(\"".getTemplate("templates/$tpl")."\");");include('footer.php');
