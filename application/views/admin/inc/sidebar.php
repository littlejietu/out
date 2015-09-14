			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<?php $arrNav=_get_config('nav_list');?>
					<?php foreach ($arrNav as $key => $a):?>
					<li class="<?=$a['open']?> <?php if(_get_nav_isactive($a)) echo 'active'; ?>">
						<a href="<?=$a['page']?>" class="dropdown-toggle">
							<i class="menu-icon fa <?=$a['icon']?>"></i>
							<span class="menu-text"> <?=$a['title']?> </span>

							<?php if(!empty($a['submenu'])):?><b class="arrow fa fa-angle-down"></b><?php endif?>
						</a>

						<b class="arrow"></b>
						<?php if(!empty($a['submenu'])):?>
							<ul class="submenu">
								<?php foreach ($a['submenu'] as $aa):?>
								<li class="<?php if(_get_nav_isactive($aa)) echo 'active'; ?>">
									<a href="<?=$aa['page']?>">
										<i class="menu-icon fa <?=$aa['icon']?>"></i>
										<?=$aa['title']?>
									</a>

									<b class="arrow"></b>
								</li>
								<?php endforeach;?>
							</ul>
						<?php endif?>
					</li>
					<?php endforeach;?>


					
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>