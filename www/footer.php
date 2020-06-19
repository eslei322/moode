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
 * 2020-05-03 TC moOde 6.5.2
 *
 */
-->
<div id="about-modal" class="modal modal-sm hide" tabindex="-1" role="dialog" aria-labelledby="about-modal-label" aria-hidden="true"><div class="modal-body"> <button aria-label="Close" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><p style="text-align:center;font-size:40px;font-weight:500;letter-spacing:-2px;margin-top:2px">m<span style="color:#d35400;line-height:12px">oO</span>de<span style="font-size:12px;position:relative;top:-15px;left:-3px;">™</span></p><p>Moode 数播是一个出色的客户端连结 MPD， （ Music Player Daemon ） 音乐回放守护进程，人机网页界面衍生产品。开始由 Andrea Coiutti 和 Simone De Gregori设计和编码，稍后建于早期 RaspyFi / Volumio 项目成就的基础上再加以增强。</p><h4>版本讯息</h4><ul><li>版本: 6.5.2 发布日期: 2020-05-03</li><li>编码: Tim Curtis &copy; 2014</li><li>资料文献: <a class="moode-about-link" href="./relnotes.txt" target="_blank">阅读发布说明,</a>&nbsp<a class="moode-about-link" href="./setup.txt" target="_blank">阅读设定指南</a></li><li>贡献者: <a class="moode-about-link" href="./CONTRIBS.html" target="_blank">查阅贡献者名单</a></li><li>许可证: <a class="moode-about-link" href="./COPYING.html" target="_blank">阅读 GPLv3</a></li></ul><span style="color:#33ff33;line-height:12px">汉化版作者： Eslei，&emsp; 请参见以下连接:<br></span><span style="color:#0033ff;line-height:12px">http://bbs.hifidiy.net/forum.php?mod=viewthread&tid=1438563&extra=<br></span><span style="color:#ff3300;line-height:12px">本汉化版开放免费使用，任何将此版本用于商业用途，均视作不良行为。</span><p><h4>操作平台讯息</h4><ul><li>Raspbian: <span id="sys-raspbian-ver"></span></li><li>Linux 内核: <span id="sys-kernel-ver"></span></li><li>硬件平台: <span id="sys-hardware-rev"></span></li><li>硬件平台架构: <span id="sys-processor-arch"></span></li><li>MPD 版本: <span id="sys-mpd-ver"></span></li></ul></p></div><div class="modal-footer"> <button aria-label="Close" class="btn singleton" data-dismiss="modal" aria-hidden="true">关闭</button></div></div><div id="configure-modal" class="modal modal-sm hide" tabindex="-1" role="dialog" aria-labelledby="configure-modal-label" aria-hidden="true"><div class="modal-header"> <button aria-label="Close" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 id="configure-modal-label">选项</h3></div><div class="modal-body"><div id="configure"><ul><li><a href="lib-config.php" class="btn btn-large"><i class="fas fa-database"></i><br>曲库配置</a></li><li><a href="snd-config.php" class="btn btn-large"><i class="fas fa-volume-up"></i><br>音频配置</a></li><li><a href="net-config.php" class="btn btn-large"><i class="fas fa-sitemap"></i><br>网络配置</a></li><li><a href="sys-config.php" class="btn btn-large"><i class="fas fa-desktop-alt"></i><br>系统配置</a></li></ul> <br><ul><li><a href="mpd-config.php" class="btn btn-small row2-btns">MPD 选项</a></li><li><a href="eqp-config.php" class="btn btn-small row2-btns">参数均衡器</a></li><li><a href="eqg-config.php" class="btn btn-small row2-btns">图形均衡器</a></li><li class="context-menu"><a href="#notarget" class="btn btn-small row2-btns" data-cmd="setforclockradio-m">网络电台时钟</a></li> <?php if ($_SESSION['feat_bitmask'] & $FEAT_INPSOURCE) { ?><li><a href="inp-config.php" class="btn btn-small row2-btns">输入设备选择</a></li> <?php } ?></ul></div></div><div class="modal-footer"> <button aria-label="Close" class="btn singleton" data-dismiss="modal" aria-hidden="true">关闭</button></div></div><div id="players-modal" class="modal modal-sm hide" tabindex="-1" role="dialog" aria-labelledby="players-modal-label" aria-hidden="true"><div class="modal-header"> <button aria-label="Close" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 id="players-modal-label">其他播放器</h3></div><div class="modal-body"></div><div class="modal-footer"> <button aria-label="Close" class="btn singleton" data-dismiss="modal" aria-hidden="true">关闭</button></div></div><div id="audioinfo-modal" class="modal modal-sm hide" tabindex="-1" role="dialog" aria-labelledby="audioinfo-modal-label" aria-hidden="true"><div class="modal-header"> <button aria-label="Close" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 id="audioinfo-modal-label">音频信息</h3></div>
<div class="modal-body"></div><div class="modal-footer"> <button aria-label="Close" class="btn singleton" data-dismiss="modal" aria-hidden="true">关闭</button></div></div><div id="sysinfo-modal" class="modal modal-sm hide" tabindex="-1" role="dialog" aria-labelledby="sysinfo-modal-label" aria-hidden="true"><div class="modal-header"> <button aria-label="Close" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 id="sysinfo-modal-label">系统信息</h3></div><div class="modal-body"></div><div class="modal-footer"> <button aria-label="Close" class="btn singleton" data-dismiss="modal" aria-hidden="true">关闭</button></div></div><div id="quickhelp-modal" class="modal modal-sm hide" tabindex="-1" role="dialog" aria-labelledby="help-modal-label" aria-hidden="true"><div class="modal-header"> <button aria-label="Close" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 id="help-modal-label">快速帮助</h3></div><div class="modal-body"><div id="quickhelp"></div></div><div class="modal-footer"> <button aria-label="Close" class="btn singleton" data-dismiss="modal" aria-hidden="true">关闭</button></div></div><div id="power-modal" class="modal modal-sm2 hide" tabindex="-1" role="dialog" aria-labelledby="power-modal-label" aria-hidden="true"><div class="modal-header"> <button aria-label="Close" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h3 id="power-modal-label">系统控制</h3></div><div class="modal-body"> <button aria-label="Shutdown" id="system-shutdown" data-dismiss="modal" class="btn btn-primary btn-large btn-block">结束系统</button> <button aria-label="Restart" id="system-restart" data-dismiss="modal" class="btn btn-primary btn-large btn-block" style="margin-bottom:15px;">重启系统</button></div><div class="modal-footer"> <button aria-label="Cancel" class="btn singleton" data-dismiss="modal" aria-hidden="true">取消</button></div></div><div id="reconnect" class="hide"><div class="reconnectbg"></div><div class="reconnectbtn"> <a href="javascript:location.reload(true); void 0" class="btn btn-primary btn-large">重新连接</a></div></div><div id="restart" class="hide"><div class="reconnectbg"></div><div class="reconnectbtn"> <a href="javascript:location.reload(true); void 0" class="btn btn-primary btn-large">重新连接</a> <br>Moode 正在重启 <br><h4 style="color:Red;">原系统为 Moode 所有，汉化版开放免费使用，任何将此版本用于商业用途，均视作不良行为。</h4></div></div><div id="shutdown" class="hide"><div class="reconnectbg"></div><div class="reconnectbtn"> <a href="javascript:location.reload(true); void 0" class="btn btn-primary btn-large">重新连接</a> <br>Moode 已经关闭 <br><h4 style="color:Red;">原系统为 Moode 所有，汉化版开放免费使用，任何将此版本用于商业用途，均视作不良行为。</h4></div></div> <script src="js/jquery-1.8.2.min.js"></script> <script src="js/jquery-ui-1.10.0.custom.min.js"></script> <?php if (isset($_SESSION['notify']['title']) && $_SESSION['notify']['title'] != '') { ui_notify($_SESSION['notify']); $_SESSION['notify']['title'] = ''; $_SESSION['notify']['msg'] = ''; $_SESSION['notify']['duration'] = '3'; }//workerLog('-- footer.php'); $return = session_write_close(); //workerLog('session_write_close=' . (($return) ? 'TRUE' : 'FALSE')); ?></body></html>
