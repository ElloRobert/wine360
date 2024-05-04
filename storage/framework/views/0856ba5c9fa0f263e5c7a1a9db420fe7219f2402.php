

<?php $__env->startSection('body_class', 'body__interface'); ?>

<?php $__env->startSection('dashboard-content'); ?>

<div class="home-dashboard-content reports-home">
	<div class="row headline-title">
		<div class="col-xs-12">
			<h2><?php echo e(trans('workOrder.title')); ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-12">
				<div class="col-xs-12 nav-tabs-container padding0">
					
					<ul id="work-order-tabs" class="nav nav-tabs" role="tablist">
						<li role="presentation" class=""><span><?php echo e(trans('workOrder.tabTitle')); ?>:</span></li>
						<li role="presentation" class="active"><a href="#day" aria-controls="home" role="tab" data-toggle="tab"><?php echo e(trans('workOrder.tabDay')); ?></a></li>
						<li role="presentation"><a style="background-color: rgba(24,183,160,1); color: #fff;border-color: rgba(24,183,160,1);" href="#new-order" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(trans('workOrder.tabNewOrder')); ?></a></li>
					</ul>
					
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="day">
							
							<div id="fuel-fill-list" class="row">
								<div class="col-xs-12 padding0">
									<div class="row">
										<div class="col-xs-12">
											<h3>
												<?php echo e(trans('workOrder.workOrderList')); ?>

											</h3>
										</div>
									</div>
									<div id="work-order-list-container" class="row work-order-list-container">
										<div class="col-xs-12 col-sm-7 col-md-9 work-order-message">
											<div class="row">
												<?php if(Session::has('message-success')): ?>
												<div class="alert alert-info" role="alert">
													<span aria-hidden="true" class="message-glyphicon glyphicon glyphicon-ok"></span>
														<?php echo e(Session::get('message-success')); ?>

												</div>
												<?php endif; ?>
												<?php if(Session::has('message-delete')): ?>
												<div class="alert alert-danger" role="alert">
													<span aria-hidden="true" class="message-glyphicon glyphicon glyphicon-remove"></span>
														<?php echo e(Session::get('message-delete')); ?>

												</div>
												<?php endif; ?>
											</div>
										</div>

										<div class="col-xs-12">
											<div class="row text-right">
												<button id="generatePDF" class="default-button">PDF Table</button>
											</div>
										</div>

										<div class="col-xs-12">
											<div class="row">
												
												<div class="panel">
													<div
														style="display: none"
														class="drop-down form-control"
														data-control-type="drop-down"
														data-control-name="paging"
														data-control-action="paging"
													>
														<ul class="dropdown-menu" role="menu">
															<li>
																<span data-number="2"></span>
															</li>
														</ul>
													</div>
												</div>
												<div class="jplist-panel panel panel-top top-filters">
													<div
														data-control-type="date-picker-range-filter"
													 data-control-name="date-picker-range-filter"
													 data-control-action="filter"
													 data-path=".order-date"
													 data-datetime-format="{day}.{month}.{year}."
													 data-datepicker-func="datepicker"
													 class="jplist-date-picker-range"
													>
														<div class="form-group input-group date">
															<input
																type="text"
																class="form-control date-picker work-order-dateFrom"
																placeholder="<?php echo e(trans('report.dateFrom')); ?>"
																data-type="prev"
															/>
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
														<div class="form-group">
															<i class="fa fa-minus gap" aria-hidden="true"></i>
														</div>
														<div class="form-group input-group date">
															<input
																type="text"
																class="form-control date-picker work-order-dateTo"
																placeholder="<?php echo e(trans('report.dateTo')); ?>"
																data-type="next"
															/>
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>

													<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
													<div class="col-xs-12 col-sm-5 col-lg-2 filter">
														<input
															style="display: none;"
															id="filter-vehicles-list2-tab-1"
															title="<?php echo e(trans('fuel.filterByTitle')); ?>"
															class="form-control form-control-tab1 clearable"
															data-path=".order-vehicle"
															type="text"
															value=""
															placeholder="<?php echo e(trans('fuel.filterByTitle')); ?>"
															data-control-type="textbox"
															data-control-name="title-filter-vehicle-name"
															data-control-action="filter"
														/>
														<select id="vehicles-list2-tab-1" style="width: 100%" class="form-control" name="vl">
															<option></option>
														</select>
													</div>
													<?php endif; ?>

													<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
													<input type="hidden" name="vl" value="<?php if(Auth::user()->ownsAnyVehicle()): ?> <?php echo e(Auth::user()->vehiclesOwned()->first()->id); ?> <?php endif; ?>">
													<?php if(Auth::user()->ownsAnyVehicle()): ?>
													<script type="text/javascript">
														$.ajax({
															type: "GET",
															url: '<?php echo e(url("vehicles/kilometers")); ?>/'+'<?php echo e(Auth::user()->vehiclesOwned()->first()->id); ?>',
															success: function(data) {
																$('input[name=order_kilometers_before]').val(data);
															}
													});
													</script>
													<?php else: ?>
													<a id="add-vehicle" class="default-button" href="<?php echo e(route('vehicles.index')); ?>"><?php echo e(trans('vehicles.addVehicle')); ?></a>
													<?php endif; ?>
													<?php endif; ?>

													<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
													<div class="col-xs-12 col-sm-5 col-lg-2 filter">
														<input
															style="display: none;"
															id="creator-list-filter"
															title="<?php echo e(trans('fuel.filterByTitle')); ?>"
															class="form-control form-control-tab1 clearable"
															data-path=".order-creator"
															type="text"
															value=""
															placeholder="<?php echo e(trans('fuel.filterByTitle')); ?>"
															data-control-type="textbox"
															data-control-name="title-filter-creator-name"
															data-control-action="filter"
														/>
														<select id="creator-list" style="width: 100%" class="form-control" name="cr">
															<option></option>
															<?php $__currentLoopData = $user_list_creator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($cr->id); ?>"><?php echo e($cr->name); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
													</div>
													<?php endif; ?>

													<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
													<input type="hidden" name="cr" value="<?php echo e(Auth::user()->id); ?>">
													<?php endif; ?>

													<div class="reset-button-div">
														<input
															type="button"
															class="reset-btn"
															value="<?php echo e(trans('home.reset')); ?>"
															data-control-type="reset"
															data-control-name="reset"
															data-control-action="reset" onclick="removeActiveClassTab()"
														/>
													</div>
												</div>
											</div>

											<div class="col-xs-12 custom-table-overflow padding0">
												<div class="row default-div-table">
													<div class="row default-div-table-header">
														<div class="col-xs-2 text-center">
															<div class="panel current-sort">
																<div
																	class=""
																	data-control-type="sort-drop-down" 
													   				data-order="asc" 
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('workOrder.date')); ?></strong>
																	<li>
																		<span data-path=".order-date-hidden" data-order="desc" data-type="datetime" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".order-date-hidden" data-order="asc" data-type="datetime" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
														<div class="col-xs-2 text-center">
															<div class="panel">
																<div
																	class=""
																	data-control-type="sort-drop-down"
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('workOrder.vehicle')); ?></strong>
																	<li>
																		<span data-path=".order-vehicle" data-order="asc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".order-vehicle" data-order="desc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
														<div class="col-xs-2 text-center">
															<div class="panel">
																<div
																	class=""
																	data-control-type="sort-drop-down"
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('workOrder.creator')); ?></strong>
																	<li>
																		<span data-path=".order-creator" data-order="asc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".order-creator" data-order="desc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
														<div class="col-xs-2 text-center">
															<div class="panel">
																<div
																	class=""
																	data-control-type="sort-drop-down"
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('workOrder.relation')); ?></strong>
																	<li>
																		<span data-path=".order-relation" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".order-relation" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
														<div class="col-xs-2 text-center">
															<div class="panel">
																<div
																	class=""
																	data-control-type="sort-drop-down"
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('workOrder.kilometers_before')); ?></strong>
																	<li>
																		<span data-path=".order-kilometers-before" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".order-kilometers-before" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
														<div class="col-xs-2 text-center">
															<div class="panel">
																<div
																	class=""
																	data-control-type="sort-drop-down"
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('workOrder.kilometers_after')); ?></strong>
																	<li>
																		<span data-path=".order-kilometers-after" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".order-kilometers-after" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
														<div class="col-xs-2 text-center">
															<div class="panel">
																<div
																	class=""
																	data-control-type="sort-drop-down"
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('workOrder.visit_time')); ?></strong>
																	<li>
																		<span data-path=".order-visit-time" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".order-visit-time" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
														<div class="col-xs-2 text-center">
															<div class="panel">
																<div
																	class=""
																	data-control-type="sort-drop-down"
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong
																	><?php echo e(trans('workOrder.kilometers_traveled')); ?></strong>
																	<li>
																		<span data-path=".order-kilometers-traveled" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".order-kilometers-traveled" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
														<div class="col-xs-2 text-center">
															<div class="panel">
																<div
																	class=""
																	data-control-type="sort-drop-down"
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('workOrder.remark')); ?></strong>
																	<li>
																		<span data-path=".order-remark" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".order-remark" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
														<div class="col-xs-2 text-center">
															<div class="panel">
																<div
																	class=""
																	data-control-type="sort-drop-down"
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('default.edit')); ?></strong>
																</div>
															</div>
														</div>
													</div>

													<div class="list list-date">
														<?php $__currentLoopData = $order_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="row default-div-table-rows list-item list-item-date">
															<?php
															$style = '';
															if($workorder->date_to != null){
																$style = 'display: block';
															}
															?>
															<div style='<?php echo e($style); ?>' class="col-xs-2 text-center">
																<span style="visibility: hidden;position: absolute;" class="vertical-align-center order-date-hidden"><?php echo e($workorder->date->format('m/d/Y')); ?></span>
																<span style="width: 100%;" class="vertical-align-center order-date"><?php echo e($workorder->date->format('d.m.Y.')); ?></span>
																<?php if($workorder->date_to != null): ?>
																	<span style="display: block;width: 100%;" class="vertical-align-center order-date-to"> - <span><?php echo e($workorder->date_to->format('d.m.Y.')); ?></span></span>
																<?php endif; ?>
															</div>
															<div class="col-xs-2 text-center">
																<span data-vid="<?php echo e($workorder->vehicle->id); ?>" class="vertical-align-center order-vehicle"><?php echo e($workorder->vehicle->name_and_license_plate); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span data-cid="<?php echo e($workorder->creator->id); ?>" class="vertical-align-center order-creator"><?php echo e($workorder->creator->name); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center order-relation"><?php echo e($workorder->relation); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center order-kilometers-before"><?php echo e($workorder->kilometers_before); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center order-kilometers-after"><?php echo e($workorder->kilometers_after); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center order-visit-time"><?php echo e($workorder->visit_time); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center order-kilometers-traveled"><?php echo e(number_format($workorder->kilometers_traveled, 2, '.', ',')); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center order-remark"><?php echo e($workorder->remark); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center order-remark">
																	<a data-woid="<?php echo e($workorder->id); ?>" title="<?php echo e(trans('default.edit')); ?>" class="edit-order" href="javascript:void(0)">
																		<img src="<?php echo e(asset('img/interface/wheel-icon.svg')); ?>">
																	</a>
																</span>
															</div>
														</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</div>

													
													<div class="jplist-no-results row default-div-table-rows">
														<div class="col-xs-12">
															<p><?php echo e(trans('home.noResultsFound')); ?></p>
														</div>
													</div>
												</div>
											</div>

											
											<div class="row">
												<div class="panel panel-top panel-pagination">
													<div>
														<div class="paging-results left" data-type="<?php echo e(trans('home.page')); ?>" data-control-type="label" data-control-name="paging" data-control-action="paging">
														</div>
														<div class="paging left" data-control-type="placeholder" data-control-name="paging" data-control-action="paging">
														</div>
													</div>
												</div>
											</div>

											
											<div class="modal" id="edit">
												<div class="modal-dialog">
													<div class="modal-content model-content-update">
														<div class="modal-header modal-header-update">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h4 class="modal-title model-title-update"><?php echo e(trans('workOrder.editWorkOrder')); ?></h4>
														</div>

														<div class="modal-body">
															<div class="row text-right">
																<form id="work-order-delete-form" method="POST" action="<?php echo e(route('workOrder.index')); ?>">
																	<?php echo e(csrf_field()); ?>

																	<?php echo e(method_field('DELETE')); ?>

																	<input id="delete-work-order" type="submit" class="default-button default-button-delete" value="<?php echo e(trans('default.delete')); ?>">
																</form>
															</div>
														</div>

														<form id="work-order-update-form" method="POST" action="<?php echo e(route('workOrder.index')); ?>/">
															<?php echo e(csrf_field()); ?>

															<div style="padding: 0;" class="modal-body">
																<div class="row">
																	<?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
																	<div class="col-xs-12 col-sm-6 col-sm-offset-3 padding0">
																		<div class="col-xs-12 padding0">
																			<div class="col-xs-12 padding0">
																				<label for="order-date"><?php echo e(trans('workOrder.creator')); ?></label>
																			</div>
																			<div class="col-xs-12 padding0">
																				<div class="form-group">
																					<select id="user-list-creator-update" style="width: 100%" class="form-control" name="order_creator_id_update">
																						<?php $__currentLoopData = $user_list_creator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																						<option value="<?php echo e($u->id); ?>" <?php if(old('order_creator_id')): ?> <?php if(old('order_creator_id') == $u->id): ?> selected <?php endif; ?> <?php elseif(Auth::user()->id == $u->id): ?> selected <?php endif; ?>><?php echo e($u->name); ?></option>
																						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																					</select>
																				</div>
																				<div class="form-group">
																					<?php if($errors->has('order_creator_id')): ?>
																					<span class="help-block text-left">
																						<strong><?php echo e($errors->first('order_creator_id')); ?></strong>
																					</span>
																					<?php endif; ?>
																				</div>
																			</div>
																		</div>
																	</div>
																	<?php endif; ?>

																	<?php if (Auth::check() && Auth::user()->hasRole('private|employee')): ?>
																	<input type="hidden" name="order_creator_id_update" value="<?php echo e(Auth::user()->id); ?>">
																	<?php endif; ?>

																	<div class="col-xs-12 col-sm-6 col-sm-offset-3 padding0">
																		<div class="col-xs-12 col-sm-4 padding0">
																			<label for="order-date-update"><?php echo e(trans('workOrder.date')); ?></label>
																		</div>
																		<div class="col-xs-12 col-sm-4 col-sm-offset-3 padding0">
																			<label for="order-date-update"><?php echo e(trans('workOrder.date_to')); ?></label>
																		</div>

																		<div class="row">
																			<div class="col-xs-12 col-sm-4 padding0">
																				<div class="form-group input-group date">
																					<input id="order-date-update" class="form-control date-input" type="text" name="order_date_update" value=""/>
																					<span class="input-group-addon">
																						<span class="glyphicon glyphicon-calendar"></span>
																					</span>
																				</div>
																				<div class="form-group"></div>
																			</div>
																			<div class="col-xs-12 col-sm-4 col-sm-offset-3 padding0">
																				<div class="form-group input-group date">
																					<input id="order-date-to-update" class="form-control date-input" type="text" name="order_date_to_update" value=""/>
																					<span class="input-group-addon">
																						<span class="glyphicon glyphicon-calendar"></span>
																					</span>
																				</div>
																				<div class="form-group"></div>
																			</div>
																		</div>
																	</div>

																	<div class="col-xs-12 col-sm-6 col-sm-offset-3 padding0">
																		<div class="col-xs-12 padding0">
																			<label for="order-relation-update"><?php echo e(trans('workOrder.relation')); ?></label>
																		</div>

																		<div class="col-xs-12 padding0">
																			<div class="form-group">
																				<input id="order-relation-update" class="form-control" type="text" name="order_relation_update" value="<?php echo e(old('order_relation')); ?>"/>
																			</div>
																			<div class="form-group"></div>
																		</div>
																	</div>

																	<div class="col-xs-12 col-sm-6 col-sm-offset-3 padding0">
																		<div class="col-xs-12 padding0">
																			<label for="vehicles-list-update"><?php echo e(trans('workOrder.vehicle')); ?></label>
																		</div>

																		<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
																		<div class="col-xs-12 padding0">
																			<div class="form-group">
																				<select id="vehicles-list-update" style="width: 100%" class="form-control" name="vl_update">
																				</select>
																			</div>
																			<div class="form-group"></div>
																		</div>
																		<?php endif; ?>

																		<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
																		<?php if(Auth::user()->ownsAnyVehicle()): ?>
                                    <?php ($vehicle = Auth::user()->vehiclesOwned()->first()); ?>
																		<div class="col-xs-12 padding0">
																			<div class="form-group">
																				<input class="form-control" type="text" name="vlName_update" value="<?php echo e($vehicle->name_and_license_plate); ?>" disabled />
																				<input type="hidden" name="vl_update" value="<?php echo e($vehicle->id); ?>" />
																			</div>
																			<div class="form-group"></div>
																		</div>
																		<?php else: ?>
																		<a style="margin-bottom: 30px;" id="add-vehicle" class="default-button" href="<?php echo e(route('vehicles.index')); ?>"><?php echo e(trans('vehicles.addVehicle')); ?></a>
																		<?php endif; ?>
																		<?php endif; ?>
																	</div>

																	<div class="col-xs-12 col-sm-6 col-sm-offset-3 padding0">
																		<div class="col-xs-12 padding0">
																			<label for="order-kilometers-before-update"><?php echo e(trans('workOrder.kilometers_before')); ?></label>
																		</div>

																		<div class="col-xs-12 padding0">
																			<div class="form-group">
																				<input id="order-kilometers-before-update" class="form-control" type="number" min="0" step=0.1 name="order_kilometers_before_update" value=""/>
																			</div>
																			<div class="form-group"></div>
																		</div>
																	</div>

																	<div class="col-xs-12 col-sm-6 col-sm-offset-3 padding0">
																		<div class="col-xs-12 padding0">
																			<label for="order-kilometers-after-update"><?php echo e(trans('workOrder.kilometers_after')); ?></label>
																		</div>

																		<div class="col-xs-12 padding0">
																			<div class="form-group">
																				<input id="order-kilometers-after-update" class="form-control" type="number" min="0" step=0.1 name="order_kilometers_after_update" value=""/>
																			</div>
																			<div class="form-group"></div>
																		</div>
																	</div>

																	<div class="col-xs-12 col-sm-6 col-sm-offset-3 padding0">
																		<div class="col-xs-12 padding0">
																			<label for="order-visit-time-update"><?php echo e(trans('workOrder.visit_time')); ?></label>
																		</div>

																		<div class="col-xs-12 padding0">
																			<div class="form-group">
																				<input id="order-visit-time-update" class="form-control" type="text" name="order_visit_time_update" value=""/>
																			</div>
																			<div class="form-group"></div>
																		</div>
																	</div>

																	<div class="col-xs-12 col-sm-6 col-sm-offset-3 padding0">
																		<div class="col-xs-12 padding0">
																			<label for="order-kilometers-traveled-update"><?php echo e(trans('workOrder.kilometers_traveled')); ?></label>
																		</div>

																		<div class="col-xs-12 padding0">
																			<div class="form-group">
																				<input id="order-kilometers-traveled-update" class="form-control" type="number" name="order_kilometers_traveled_update" value="" min="0">
																			</div>
																			<div class="form-group"></div>
																		</div>
																	</div>

																	<div class="col-xs-12 col-sm-6 col-sm-offset-3 padding0">
																		<div class="col-xs-12 padding0">
																			<label for="order-remark-update"><?php echo e(trans('workOrder.remark')); ?></label>
																		</div>

																		<div class="col-xs-12 padding0">
																			<div class="form-group">
																				<textarea rows="5" id="order-remark-update" class="form-control" type="text" name="order_remark_update"></textarea>
																			</div>
																			<div class="form-group"></div>
																		</div>
																	</div>

																	<div class="col-xs-12 col-sm-6 col-sm-offset-3 padding0">
																		<div style="display: none;" class="alert alert-danger" role="alert">
																			<?php echo e(trans('workOrder.fieldRequired')); ?>

																		</div>
																	</div>
																</div>
															</div>

															<div class="modal-footer">
																<button id="submit-update-order" type="button" class="default-button"><?php echo e(trans('default.save')); ?></button>
																	<button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo e(trans('default.close')); ?></button>
															</div>
														</form>
													</div>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
						</div>

						<div role="tabpanel" class="tab-pane fade" id="new-order">
							
							<div id="fuel-fill-list-tab3" class="row">
								<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
									<div class="row">
										<div class="col-xs-12 padding0">
											<h3><?php echo e(trans('workOrder.addOrder')); ?></h3>
										</div>
									</div>

									<div class="row insert-order">
										<form id="reminder-store-form" method="POST" action="<?php echo e(route('workOrder.insert')); ?>">
											<?php echo e(csrf_field()); ?>

											<?php if (Auth::check() && Auth::user()->hasRole('admin|legal')): ?>
											<div class="col-xs-12 padding0">
												<div class="col-xs-12 padding0">
													<label for="order-date"><?php echo e(trans('workOrder.creator')); ?></label>
												</div>
												<div class="col-xs-12 padding0">
													<div class="form-group">
														<select id="user-list-creator" style="width: 100%" class="form-control" name="order_creator_id">
															<?php $__currentLoopData = $user_list_creator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($u->id); ?>" <?php if(old('order_creator_id')): ?> <?php if(old('order_creator_id') == $u->id): ?> selected <?php endif; ?> <?php elseif(Auth::user()->id == $u->id): ?> selected <?php endif; ?>><?php echo e($u->name); ?></option>
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
														</select>
													</div>
													<div class="form-group">
														<?php if($errors->has('order_creator_id')): ?>
														<span class="help-block text-left">
															<strong><?php echo e($errors->first('order_creator_id')); ?></strong>
														</span>
														<?php endif; ?>
													</div>
												</div>
											</div>
											<?php endif; ?>

											<?php if (Auth::check() && Auth::user()->hasRole('private|employee')): ?>
											<input type="hidden" name="order_creator_id" value="<?php echo e(Auth::user()->id); ?>">
											<?php endif; ?>

											<div class="col-xs-12 padding0">
												<div class="col-xs-12 col-sm-4 padding0">
													<label for="order-date"><?php echo e(trans('workOrder.date')); ?></label>
												</div>
												<div class="col-xs-12 col-sm-4 col-sm-offset-3 padding0">
													<label for="order-date"><?php echo e(trans('workOrder.date_to')); ?></label>
												</div>
												<div class="row">
													<div class="col-xs-12 col-sm-4 padding0">
														<div class="form-group input-group date">
															<input id="order-date" class="form-control date-input" type="text" name="order_date" value="<?php echo e(old('order_date', Carbon\Carbon::now()->format('d.m.Y.'))); ?>"/>
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
														<div class="form-group">
															<?php if($errors->has('order_date')): ?>
															<span class="help-block text-left">
																<strong><?php echo e($errors->first('order_date')); ?></strong>
															</span>
															<?php endif; ?>
														</div>
													</div>
													<div class="col-xs-12 col-sm-4 col-sm-offset-3 padding0">
														<div class="form-group input-group date">
															<input id="order-date_to" class="form-control date-input" type="text" name="order_date_to" value="<?php echo e(old('order_date_to')); ?>"/>
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
														<div class="form-group">
															<?php if($errors->has('order_date_to')): ?>
															<span class="help-block text-left">
																<strong><?php echo e($errors->first('order_date_to')); ?></strong>
															</span>
															<?php endif; ?>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xs-12 padding0">
												<div class="col-xs-12 padding0">
													<label for="order-relation"><?php echo e(trans('workOrder.relation')); ?></label>
												</div>
												<div class="col-xs-12 padding0">
													<div class="form-group">
														<input id="order-relation" class="form-control" type="text" name="order_relation" value="<?php echo e(old('order_relation')); ?>"/>
													</div>
													<div class="form-group">
														<?php if($errors->has('order_relation')): ?>
														<span class="help-block text-left">
															<strong><?php echo e($errors->first('order_relation')); ?></strong>
														</span>
														<?php endif; ?>
													</div>
												</div>
											</div>
											<div class="col-xs-12 padding0">
												<div class="col-xs-12 padding0">
													<label for="vehicles-list"><?php echo e(trans('workOrder.vehicle')); ?></label>
												</div>
												<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
												<div class="col-xs-12 padding0">
													<div class="form-group">
														<select id="vehicles-list" style="width: 100%" class="form-control" name="vl">
															<?php if(old('vl')): ?>
															<option value="<?php echo e(old('vl')); ?>" selected="selected">
																<?php ($vehicle = App\Vehicle::find(old('vl'))); ?>
																<?php echo e($vehicle->name_and_license_plate); ?>

															</option>
															<?php endif; ?>
														</select>
													</div>
													<div class="form-group">
														<?php if($errors->has('vl')): ?>
														<span class="help-block text-left">
															<strong><?php echo e($errors->first('vl')); ?></strong>
														</span>
														<?php endif; ?>
													</div>
												</div>
												<?php endif; ?>

												<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
												<?php if(Auth::user()->ownsAnyVehicle()): ?>
												<?php ($vehicle = Auth::user()->vehiclesOwned()->first()); ?>
												<div class="col-xs-12 padding0">
													<div class="form-group">
														<input class="form-control" type="text" name="vlName" value="<?php echo e($vehicle->name_and_license_plate); ?>" disabled />
														<input type="hidden" name="vl" value="<?php echo e($vehicle->id); ?>" />
													</div>
												</div>
												<?php else: ?>
												<a style="margin-bottom: 30px;" id="add-vehicle" class="default-button" href="<?php echo e(route('vehicles.index')); ?>"><?php echo e(trans('vehicles.addVehicle')); ?></a>
												<?php endif; ?>
												<?php endif; ?>
											</div>
											<div class="col-xs-12 padding0">
												<div class="col-xs-12 padding0">
													<label for="order-kilometers-before"><?php echo e(trans('workOrder.kilometers_before')); ?></label>
												</div>
												<div class="col-xs-12 padding0">
													<div class="form-group">
														<input id="order-kilometers-before" class="form-control" type="number" min="0" step=0.1 name="order_kilometers_before" value="<?php echo e(old('order_kilometers_before')); ?>"/>
													</div>
													<div class="form-group">
														<?php if($errors->has('order_kilometers_before')): ?>
														<span class="help-block text-left">
															<strong><?php echo e($errors->first('order_kilometers_before')); ?></strong>
														</span>
														<?php endif; ?>
													</div>
												</div>
											</div>
											<div class="col-xs-12 padding0">
												<div class="col-xs-12 padding0">
													<label for="order-kilometers-after"><?php echo e(trans('workOrder.kilometers_after')); ?></label>
												</div>
												<div class="col-xs-12 padding0">
													<div class="form-group">
														<input id="order-kilometers-after" class="form-control" type="number" min="0" step=0.1 name="order_kilometers_after" value="<?php echo e(old('order_kilometers_after')); ?>"/>
													</div>
													<div class="form-group">
														<?php if($errors->has('order_kilometers_after')): ?>
														<span class="help-block text-left">
															<strong><?php echo e($errors->first('order_kilometers_after')); ?></strong>
														</span>
														<?php endif; ?>
													</div>
												</div>
											</div>
											<div class="col-xs-12 padding0">
												<div class="col-xs-12 padding0">
													<label for="order-visit-time"><?php echo e(trans('workOrder.visit_time')); ?></label>
												</div>
												<div class="col-xs-12 padding0">
													<div class="form-group">
														<input id="order-visit-time" class="form-control" type="text" name="order_visit_time" value="<?php echo e(old('order_visit_time')); ?>"/>
													</div>
													<div class="form-group">
														<?php if($errors->has('order_visit_time')): ?>
														<span class="help-block text-left">
															<strong><?php echo e($errors->first('order_visit_time')); ?></strong>
														</span>
														<?php endif; ?>
													</div>
												</div>
											</div>

											<div class="col-xs-12 padding0">
												<div class="col-xs-12 padding0">
													<label for="order-kilometers-traveled"><?php echo e(trans('workOrder.kilometers_traveled')); ?></label>
												</div>
												<div class="col-xs-12 padding0">
													<div class="form-group">
														<input id="order-kilometers-traveled" class="form-control" type="number" name="order_kilometers_traveled" value="<?php echo e(old('order_kilometers_traveled')); ?>" min="0"/>
													</div>
													<div class="form-group">
														<?php if($errors->has('order_kilometers_traveled')): ?>
														<span class="help-block text-left">
															<strong><?php echo e($errors->first('order_kilometers_traveled')); ?></strong>
														</span>
														<?php endif; ?>
													</div>
												</div>
											</div>
											<div class="col-xs-12 padding0">
												<div class="col-xs-12 padding0">
													<label for="order-remark"><?php echo e(trans('workOrder.remark')); ?></label>
												</div>
												<div class="col-xs-12 padding0">
													<div class="form-group">
														<textarea rows="5" id="order-remark" class="form-control" type="text" name="order_remark"><?php echo e(old('order_remark')); ?></textarea>
													</div>
													<div class="form-group">
														<?php if($errors->has('order_remark')): ?>
														<span class="help-block text-left">
															<strong><?php echo e($errors->first('order_remark')); ?></strong>
														</span>
														<?php endif; ?>
													</div>
												</div>
											</div>

											<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
											<?php if(Auth::user()->ownsAnyVehicle()): ?>
											<div class="col-xs-12 padding0 text-right">
												<button type="submit" class="default-button"><?php echo e(trans('default.save')); ?></button>
											</div>
											<?php endif; ?>
											<?php endif; ?>

											<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
											<div class="col-xs-12 padding0 text-right">
												<button type="submit" class="default-button"><?php echo e(trans('default.save')); ?></button>
											</div>
											<?php endif; ?>
										</form>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<link rel="stylesheet" href="<?php echo e(asset('css/scripts/jquery-ui.css')); ?>" />
<script src="<?php echo e(asset('js/scripts/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jplist.core.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/jplist.textbox-filter.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/jplist.sort-bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/jplist.jquery-ui-bundle.min.js')); ?>"></script>
<script type="text/javascript">
	$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*4.1);

	//table filter 
	//----- TAB 1 -----
	//Connect select2 and jplist plugins
	$('#vehicles-list2-tab-1').select2({
		cache: true,
		allowClear: true,
		placeholder: "<?php echo e(trans('vehicles.chooseVehicle')); ?>",
		language: {
			"noResults": function(){
				return "<?php echo e(trans('vehicles.noResults')); ?>";
			}
		},
		ajax: {
			url: "<?php echo e(route('autocomplete.vehicles_list')); ?>",
			type: 'GET',
			dataType: 'json',
			data: function (params) {
				$('#filter-vehicles-list2-tab-1').val(params.term);
				var press = jQuery.Event("keyup");
				press.ctrlKey = false;
				press.which = 46;
				$('#filter-vehicles-list2-tab-1').trigger(press);
				return {
						vl: params.term,
						u: $('#u').val()
				}
			},
			processResults: function (data) {
				$('#select2-vehicles-list2-tab-1-container').attr('title', '');
				$('#select2-vehicles-list2-tab-1-container').html('<span class="select2-selection__placeholder">Odaberite vozilo</span>');
				return { results: data }
			}
		}
	});

	$('#vehicles-list2-tab-1').on('change', function(e) {
		$('#filter-vehicles-list2-tab-1').val('');

		var term = '';
		term = $.trim($('#select2-vehicles-list2-tab-1-container').text()).substring(1);

		$('#filter-vehicles-list2-tab-1').val(term);

		var press = jQuery.Event("keyup");
		press.ctrlKey = false;
		press.which = 46;
		$('#filter-vehicles-list2-tab-1').trigger(press);
	});

	//new order 
	//----- TAB 2 -----
	//Connect select2 and jplist plugins
	$('#vehicles-list2-tab-3').select2({
		cache: true,
		allowClear: true,
		placeholder: "<?php echo e(trans('vehicles.chooseVehicle')); ?>",
		language: {
			"noResults": function() {
				return "<?php echo e(trans('vehicles.noResults')); ?>";
			}
		},
		ajax: {
			url: "<?php echo e(route('autocomplete.vehicles_list')); ?>",
			type: 'GET',
			dataType: 'json',
			data: function (params) {
				$('#filter-vehicles-list2-tab-3').val(params.term);
				var press = jQuery.Event("keyup");
				press.ctrlKey = false;
				press.which = 46;
				$('#filter-vehicles-list2-tab-3').trigger(press);
				return {
						vl: params.term,
						u: $('#u').val()
				}
			},
			processResults: function (data) {
				$('#select2-vehicles-list2-container').attr('title', '');
				$('#select2-vehicles-list2-container').html('<span class="select2-selection__placeholder">Odaberite vozilo</span>');
				return { results: data }
			}
		}
	});

	$('#vehicles-list2-tab-3').on('change', function (e) {
		$('#filter-vehicles-list2-tab-3').val('');

		var term = '';
		term = $.trim($('#select2-vehicles-list2-tab-3-container').text()).substring(1);

		$('#filter-vehicles-list2-tab-3').val(term);

		var press = jQuery.Event("keyup");
		press.ctrlKey = false;
		press.which = 46;
		$('#filter-vehicles-list2-tab-3').trigger(press);
	});

	function tog(v) {
		return v ? 'addClass' : 'removeClass';
	}

	$(document).on('input', '.clearable', function() {
		$(this)[tog(this.value)]('x');
	}).on('mousemove', '.x', function( e ){
		$(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');
	}).on('touchstart click', '.onX', function( ev ){
		ev.preventDefault();
		$(this).removeClass('x onX').val('').change();

		if ($(this).hasClass('form-control-tab1')) {
			var press = jQuery.Event("keyup");
			press.ctrlKey = false;
			press.which = 46;
			$(this).trigger(press);
		} else if ($(this).hasClass('form-control-tab2')) {
			var press = jQuery.Event("keyup");
			press.ctrlKey = false;
			press.which = 46;
			$('.form-control-tab2').trigger(press);
		}
	});

	function removeActiveClassTab() {
		location.reload();
	}

	function removeActiveClassTab2() {
		$('.form-control-tab2').val('');

		var press = jQuery.Event("keyup");
		press.ctrlKey = false;
		press.which = 46;
		$('.form-control-tab2').trigger(press);
	}

	function removeActiveClassTab3() {
		$('.form-control-tab3').val('');

		var press = jQuery.Event("keyup");
		press.ctrlKey = false;
		press.which = 46;
		$('.form-control-tab3').trigger(press);
	}

	function make_children_same_height(element_parent, child_elements) {
	  for (i = 0; i < child_elements.length; i++) {
	    var tallest = 0;
	    var an_element = child_elements[i];
	    $(element_parent).children(an_element).each(function() {
	      // using outer height since that includes the border and padding
	      if(tallest < $(this).outerHeight() ){
	        tallest = $(this).outerHeight();
	      }
	    });
	    
	    tallest = tallest+1; // some weird shit going on with half a pixel or something in FF
	    $(element_parent).children(an_element).each(function() {
	      $(this).css('min-height',tallest+'px');
	    });
	  }
	}

	make_children_same_height('.default-div-table > div.default-div-table-header',[' .default-div-table > div.default-div-table-header > div']);

	$(document).ready(function() {
		/* Tab open after refresh */
		$('#work-order-tabs a').click(function(e) {
		  e.preventDefault();
		  $(this).tab('show');
		});

		$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
		  var id = $(e.target).attr("href");
		  localStorage.setItem('selectedTab', id);
		});

		var hash = window.location.hash;
		$('#work-order-tabs a[href="' + localStorage.getItem('selectedTab') + '"]').tab('show');

		$('#work-order-list-container').jplist({
		    items_box: '.list', item_path: '.list-item', panel_path: '.panel'
		});

		$('#work-order-list-container-tab2').jplist({
		    items_box: '.list', item_path: '.list-item', panel_path: '.panel'
		});

		$('.nav-tabs a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});

		make_children_same_height('.default-div-table > div.default-div-table-header',['.default-div-table > div.default-div-table-header > div']);

		//Default table sort function - change color for filter
		$('#work-order-list-container .sort-arrow').click(function(){
			$('#work-order-list-container .panel').removeClass('current-sort');
			$(this).closest('#work-order-list-container .panel').addClass('current-sort');
		});
		$('#work-order-list-container-tab2 .sort-arrow').click(function(){
			$('#work-order-list-container-tab2 .panel').removeClass('current-sort');
			$(this).closest('#work-order-list-container-tab2 .panel').addClass('current-sort');
		});

		$('.jplist-group label').click(function() {
			$('.jplist-group label').removeClass('active');
			$(this).addClass('active');
		});

		$('#user-list-creator').select2({
			cache: true,
			allowClear: true,
			placeholder: "<?php echo e(trans('workOrder.chooseCreator')); ?>",
			language: {
				"noResults": function(){
					return "<?php echo e(trans('vehicles.noResults')); ?>";
				}
			}
		});

		$('#vehicles-list').select2({
			cache: true,
			allowClear: true,
			placeholder: "<?php echo e(trans('vehicles.chooseVehicle')); ?>",
			language: {
				"noResults": function(){
					return "<?php echo e(trans('vehicles.noResults')); ?>";
				}
			},
			ajax: {
				url: "<?php echo e(route('autocomplete.vehicles_list')); ?>",
				type: 'GET',
				dataType: 'json',
				data: function (params) {
					return { vl: params.term, u: $('#u').val() }
				},
				processResults: function (data) {
					return { results: data }
				}
			}
		});

		$('#vehicles-list-update').select2({
			cache: true,
			allowClear: true,
			placeholder: "<?php echo e(trans('vehicles.chooseVehicle')); ?>",
			language: {
				"noResults": function(){
					return "<?php echo e(trans('vehicles.noResults')); ?>";
				}
			},
			ajax: {
				url: "<?php echo e(route('autocomplete.vehicles_list')); ?>",
				type: 'GET',
				dataType: 'json',
				data: function (params) {
					return { vl: params.term, u: $('#u').val() }
				},
				processResults: function (data) {
					return { results: data }
				}
			}
		});

		$('#vehicles-list').on('change', function(e) {
			$.ajax({
				type: "GET",
				url: '<?php echo e(url("vehicles/kilometers")); ?>/'+$('#vehicles-list').val(),
				success: function(data) {
					$('input[name=order_kilometers_before]').val(data);
				}
			});
		});

		$('#creator-list').select2({
			cache: true,
			allowClear: true,
			placeholder: "<?php echo e(trans('workOrder.chooseCreator')); ?>",
			language: {
				"noResults": function(){
					return "<?php echo e(trans('vehicles.noResults')); ?>";
				}
			}
		});

		$('#creator-list').on('select2:open', function (evt) {
			$('#select2-creator-list-container').attr('title', '');
			$('#select2-creator-list-container').html('<span class="select2-selection__placeholder">Odaberite vozača</span>');
			$('#creator-list-filter').val('');

			var press = jQuery.Event("keyup");
			press.ctrlKey = false;
			press.which = 46;
			$('#creator-list-filter').trigger(press);
		});

		$('#creator-list').on('change', function(e) {
			$('#creator-list-filter').val('');

			var term = '';
			term = $.trim($('#select2-creator-list-container').text()).substring(1);

			$('#creator-list-filter').val(term);

			var press = jQuery.Event("keyup");
			press.ctrlKey = false;
			press.which = 46;
			$('#creator-list-filter').trigger(press);
		});

		//On change order-kilometers-before and order-kilometers-after calculate order-kilometers-traveled
		$('#order-kilometers-before').on('change keyup keydown input', function(){
			if ($('#order-kilometers-before').val() != '' && $('#order-kilometers-after').val() != '') {
				var total_km = $('#order-kilometers-after').val() - $('#order-kilometers-before').val();
				if(total_km < 0){
					total_km = 0;
				}
				$('#order-kilometers-traveled').val(total_km.toFixed(2));
			}
		});
		$('#order-kilometers-after').on('change keyup keydown input', function(){
			if ($('#order-kilometers-before').val() != '' && $('#order-kilometers-after').val() != '') {
				var total_km = $('#order-kilometers-after').val() - $('#order-kilometers-before').val();
				if(total_km < 0){
					total_km = 0;
				}
				$('#order-kilometers-traveled').val(total_km.toFixed(2));
			}
		});

		//Edit modal
		//On change order-kilometers-before and order-kilometers-after calculate order-kilometers-traveled
		$('#order-kilometers-before-update').on('change keyup keydown input', function(){
			if ($('#order-kilometers-before-update').val() != '' && $('#order-kilometers-after-update').val() != '') {
				var total_km = $('#order-kilometers-after-update').val() - $('#order-kilometers-before-update').val();
				$('#order-kilometers-traveled-update').val(total_km.toFixed(2));
			}
		});
		$('#order-kilometers-after-update').on('change keyup keydown input', function(){
			if ($('#order-kilometers-before-update').val() != '' && $('#order-kilometers-after-update').val() != '') {
				var total_km = $('#order-kilometers-after-update').val() - $('#order-kilometers-before-update').val();
				$('#order-kilometers-traveled-update').val(total_km.toFixed(2));
			}
		});

		//Generate PDF
		$('#generatePDF').click(function(){
			var vl = '';
			var cr = '';

			if($('input[name=cr]').length > 0){
				cr = $('input[name=cr]').val();
			}else{
				cr = $('select[name=cr]').val();
				if(cr == '')
					cr=null;
			}

			if($('input[name=vl]').length > 0){
				vl = $('input[name=vl]').val();
			}else{
				vl = $('select[name=vl]').val();
				if(vl == '')
					vl=null;
			}

			var win = window.open('<?php echo e(route("workOrder.pdf")); ?>?dp_from='+$('.jplist-date-picker-range .work-order-dateFrom').val()+'&dp_to='+$('.jplist-date-picker-range .work-order-dateTo').val()+'&v='+vl+'&c='+cr, '_blank');
			win.focus();
		});

		//Update form
		$('.edit-order').on('click', function(e) {
			e.preventDefault();

			//Set values inside model:
			//values for link
			$('#work-order-update-form').attr('action', '<?php echo e(route("workOrder.index")); ?>/update/'+$(this).data('woid'));
			$('#work-order-delete-form').attr('action', '<?php echo e(route("workOrder.index")); ?>/delete/'+$(this).data('woid'));

			//creator
			var creator_id = $(this).closest('.list-item').find('.order-creator').data('cid');
			$('#user-list-creator-update').val(creator_id);

			//date
			$('#order-date-update').val($(this).closest('.list-item').find('.order-date').text());

			$('#order-date-to-update').val($(this).closest('.list-item').find('.order-date-to span').text());

			//relation
			$('#order-relation-update').val($(this).closest('.list-item').find('.order-relation').text());

			//vehicle
			$('#vehicles-list-update').append('<option value="'+$(this).closest('.list-item').find('.order-vehicle').data('vid')+'" selected>'+$(this).closest('.list-item').find('.order-vehicle').text()+'</option>');

			//order-kilometers-before
			$('#order-kilometers-before-update').val($(this).closest('.list-item').find('.order-kilometers-before').text());

			//order kilometers after
			$('#order-kilometers-after-update').val($(this).closest('.list-item').find('.order-kilometers-after').text());

			//order visit time
			$('#order-visit-time-update').val($(this).closest('.list-item').find('.order-visit-time').text());

			//order kilometers traveled
			$('#order-kilometers-traveled-update').val($(this).closest('.list-item').find('.order-kilometers-traveled').text());

			//order kilometers traveled
			$('#order-remark-update').val($.trim($(this).closest('.list-item').find('.order-remark').text()));

			//Submit form if valid
			$('#edit').modal({ backdrop: 'static', keyboard: false }).on('click', '#submit-update-order', function(){
				var formInvalid = false;
				$('#work-order-update-form input:not(#order-date-to-update)').each(function() {
					if ($(this).val() === '') {
						formInvalid = true;
					}
				});
				if ($('#work-order-update-form select').val() === '') {
					formInvalid = true;
				}

				if (formInvalid) {
					$('#work-order-update-form .alert-danger').show();
				} else {
					$('#work-order-update-form').submit();
				}
			});
		});

		$(window).resize(function(){
			$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*4.1);
		});

		var lang = "<?php echo e(data_get(Auth::user(), 'appLanguage', 'en')); ?>";
		/** Language Datepicker DE **/
		if(lang == 'de'){
		    ( function( factory ) {
		        if ( typeof define === "function" && define.amd ) {

		            // AMD. Register as an anonymous module.
		            define( [ "../widgets/datepicker" ], factory );
		        } else {

		            // Browser globals
		            factory( jQuery.datepicker );
		        }
		    }( function( datepicker ) {

		    datepicker.regional.de = {
		        closeText:"Schließen",
		        prevText:"&#x3C;Zurück",
		        nextText:"Vor&#x3E;",
		        currentText:"Heute",
		        monthNames:["Januar","Februar","März","April","Mai","Juni","Juli","August","September","Oktober","November","Dezember"],
		        monthNamesShort:["Jan","Feb","Mär","Apr","Mai","Jun","Jul","Aug","Sep","Okt","Nov","Dez"],
		        dayNames:["Sonntag","Montag","Dienstag","Mittwoch","Donnerstag","Freitag","Samstag"],
		        dayNamesShort:["So","Mo","Di","Mi","Do","Fr","Sa"],
		        dayNamesMin:["So","Mo","Di","Mi","Do","Fr","Sa"],
		        weekHeader:"KW",
		        dateFormat:"dd.mm.yy",
		        firstDay:1,
		        isRTL:!1,
		        showMonthAfterYear:!1,
		        yearSuffix:"" };
		    datepicker.setDefaults( datepicker.regional.de );

		    return datepicker.regional.de;

		    } ) );
		}
		/** Language Datepicker HR **/
		else if(lang == 'hr'){
		    ( function( factory ) {
		        if ( typeof define === "function" && define.amd ) {

		            // AMD. Register as an anonymous module.
		            define( [ "../widgets/datepicker" ], factory );
		        } else {

		            // Browser globals
		            factory( jQuery.datepicker );
		        }
		    }( function( datepicker ) {

		    datepicker.regional.hr = {
		        closeText:"Zatvori",
		        prevText:"&#x3C;",
		        nextText:"&#x3E;",
		        currentText:"Danas",
		        monthNames:["Siječanj","Veljača","Ožujak","Travanj","Svibanj","Lipanj","Srpanj","Kolovoz","Rujan","Listopad","Studeni","Prosinac"],
		        monthNamesShort:["Sij","Velj","Ožu","Tra","Svi","Lip","Srp","Kol","Ruj","Lis","Stu","Pro"],
		        dayNames:["Nedjelja","Ponedjeljak","Utorak","Srijeda","Četvrtak","Petak","Subota"],
		        dayNamesShort:["Ned","Pon","Uto","Sri","Čet","Pet","Sub"],
		        dayNamesMin:["Ne","Po","Ut","Sr","Če","Pe","Su"],
		        weekHeader:"Tje",
		        dateFormat:"dd.mm.yy.",
		        firstDay:1,
		        isRTL:!1,
		        showMonthAfterYear:!1,
		        yearSuffix:"" };
		    datepicker.setDefaults( datepicker.regional.hr );

		    return datepicker.regional.hr;

		    } ) );
		}
		$(function() {
			$( ".date-input" ).datepicker( $.datepicker.regional[ lang ] );
		});
	});
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\Wine360\resources\views/workOrder/index.blade.php ENDPATH**/ ?>