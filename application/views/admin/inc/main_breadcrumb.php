					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							
							<?php $arr = _get_breadcrumb_url();
							if(!empty($arr)):?>
								<li>
									<i class="ace-icon fa fa-home home-icon"></i>
									<a href="/admin">首页</a>
								</li>
							<?php foreach ($arr as $a):?>
								<li<?php $a['active']==1?' class="active"':'';?>>
									<?php if($a['active']==1):?>
										<?=$a['title']?>
									<?php else:?>
										<a href="<?=$a['page']?>"><?=$a['title']?></a>
									<?php endif;?>
								</li>
								<?php endforeach;
							endif;?>

						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->

						<!-- /section:basics/content.searchbox -->
					</div>