<?php $this->load->view('admin/inc/page_block_header');?>
<title>广告位管理 - <?=_get_config('site_name');?>后台管理平台</title>

						<div class="page-header">
							<h1>
								广告位管理
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									管理列表
								</small>
							</h1>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<form class="form-inline" role="form">
									<div class="form-group">
										<label class="control-label" for="receiveType">消息接收类型:</label>
										<select id="receiveType" class="form-control">
											<option value="">请选择</option>
											<option value="1">全部会员</option>
											<option value="2">行业专家</option>
											<option value="3">普通会员</option>
										</select>
									</div>
									<div class="form-group">
										<label class="control-label" for="messageTitle">消息名称:</label>
										<input type="text" id="messageTitle" placeholder="请输入关键字" class="form-control">
									</div>
									<button type="button" class="btn btn-primary" id="search-btn"><i class="icon-search"></i>搜索</button>
									<button type="button" class="btn btn-primary" id="add-btn" style="float:right;" onclick=""><i class="icon-plus"></i>新增</button>
								</form>
								<table id="simple-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												<label class="pos-rel">
													<input type="checkbox" class="ace">
													<span class="lbl"></span>
												</label>
											</th>
											<th>Domain</th>
											<th>Price</th>
											<th class="hidden-480">Clicks</th>

											<th>
												<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
												Update
											</th>
											<th class="hidden-480">Status</th>

											<th></th>
										</tr>
									</thead>

									<tbody>
										<tr class="">
											<td class="center">
												<label class="pos-rel">
													<input type="checkbox" class="ace">
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="#">ace.com</a>
											</td>
											<td>$45</td>
											<td class="hidden-480">3,330</td>
											<td>Feb 12</td>

											<td class="hidden-480">
												<span class="label label-sm label-warning">Expiring</span>
											</td>

											<td>
												<!-- <div class="hidden-sm hidden-xs btn-group">
													<button class="btn btn-xs btn-success">
														<i class="ace-icon fa fa-check bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-info">
														<i class="ace-icon fa fa-pencil bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-danger">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-warning">
														<i class="ace-icon fa fa-flag bigger-120"></i>
													</button>
												</div>

												<div class="hidden-md hidden-lg">
													<div class="inline pos-rel">
														<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
															<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
															<li>
																<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																	<span class="blue">
																		<i class="ace-icon fa fa-search-plus bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																	<span class="green">
																		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																	<span class="red">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</div> -->

												<a href="">查看</a> <a href="">编辑</a>
											</td>
										</tr>

										<tr class="">
											<td class="center">
												<label class="pos-rel">
													<input type="checkbox" class="ace">
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="#">base.com</a>
											</td>
											<td>$35</td>
											<td class="hidden-480">2,595</td>
											<td>Feb 18</td>

											<td class="hidden-480">
												<span class="label label-sm label-success">Registered</span>
											</td>

											<td>
												<div class="hidden-sm hidden-xs btn-group">
													<button class="btn btn-xs btn-success">
														<i class="ace-icon fa fa-check bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-info">
														<i class="ace-icon fa fa-pencil bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-danger">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-warning">
														<i class="ace-icon fa fa-flag bigger-120"></i>
													</button>
												</div>

												<div class="hidden-md hidden-lg">
													<div class="inline pos-rel">
														<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
															<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
															<li>
																<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																	<span class="blue">
																		<i class="ace-icon fa fa-search-plus bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																	<span class="green">
																		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																	<span class="red">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</td>
										</tr>

										<tr class="">
											<td class="center">
												<label class="pos-rel">
													<input type="checkbox" class="ace">
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="#">max.com</a>
											</td>
											<td>$60</td>
											<td class="hidden-480">4,400</td>
											<td>Mar 11</td>

											<td class="hidden-480">
												<span class="label label-sm label-warning">Expiring</span>
											</td>

											<td>
												<div class="hidden-sm hidden-xs btn-group">
													<button class="btn btn-xs btn-success">
														<i class="ace-icon fa fa-check bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-info">
														<i class="ace-icon fa fa-pencil bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-danger">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-warning">
														<i class="ace-icon fa fa-flag bigger-120"></i>
													</button>
												</div>

												<div class="hidden-md hidden-lg">
													<div class="inline pos-rel">
														<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
															<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
															<li>
																<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																	<span class="blue">
																		<i class="ace-icon fa fa-search-plus bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																	<span class="green">
																		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																	<span class="red">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</td>
										</tr>

										<tr class="">
											<td class="center">
												<label class="pos-rel">
													<input type="checkbox" class="ace">
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="#">best.com</a>
											</td>
											<td>$75</td>
											<td class="hidden-480">6,500</td>
											<td>Apr 03</td>

											<td class="hidden-480">
												<span class="label label-sm label-inverse arrowed-in">Flagged</span>
											</td>

											<td>
												<div class="hidden-sm hidden-xs btn-group">
													<button class="btn btn-xs btn-success">
														<i class="ace-icon fa fa-check bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-info">
														<i class="ace-icon fa fa-pencil bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-danger">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-warning">
														<i class="ace-icon fa fa-flag bigger-120"></i>
													</button>
												</div>

												<div class="hidden-md hidden-lg">
													<div class="inline pos-rel">
														<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
															<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
															<li>
																<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																	<span class="blue">
																		<i class="ace-icon fa fa-search-plus bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																	<span classssss="green">
																		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																	<span class="red">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</td>
										</tr>

										<tr class="">
											<td class="center">
												<label class="pos-rel">
													<input type="checkbox" class="ace">
													<span class="lbl"></span>
												</label>
											</td>

											<td>
												<a href="#">pro.com</a>
											</td>
											<td>$55</td>
											<td class="hidden-480">4,250</td>
											<td>Jan 21</td>

											<td class="hidden-480">
												<span class="label label-sm label-success">Registered</span>
											</td>

											<td>
												<div class="hidden-sm hidden-xs btn-group">
													<button class="btn btn-xs btn-success">
														<i class="ace-icon fa fa-check bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-info">
														<i class="ace-icon fa fa-pencil bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-danger">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</button>

													<button class="btn btn-xs btn-warning">
														<i class="ace-icon fa fa-flag bigger-120"></i>
													</button>
												</div>

												<div >
													<div class="inline pos-rel">
														<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
															<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
															<li>
																<a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
																	<span class="blue">
																		<i class="ace-icon fa fa-search-plus bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
																	<span class="green">
																		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
																	<span class="red">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
<?php $this->load->view('admin/inc/page_block_footer');?>

<?php echo _get_html_cssjs('admin_js','dataTables/jquery.dataTables.js,dataTables/jquery.dataTables.bootstrap.js,dataTables/extensions/TableTools/js/dataTables.tableTools.js,dataTables/extensions/ColVis/js/dataTables.colVis.js,common/table_list.js','js');?>







sssss










