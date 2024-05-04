

<?php $__env->startSection('body_class', 'body__interface'); ?>

<?php $__env->startSection('dashboard-content'); ?>

<div class="home-dashboard-content reports-home">
	<div class="row headline-title">
		<div class="col-xs-12">
			<h2><?php echo e(trans('report.title')); ?></h2>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-12">
				<div class="col-xs-12 nav-tabs-container padding0">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="">
							<span><?php echo e(trans('report.tabTitle')); ?>:</span>
						</li>
						<li role="presentation" class="active">
							<a href="#day" aria-controls="home" role="tab" data-toggle="tab"><?php echo e(trans('report.dayTab')); ?></a>
						</li>
						<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
						<li role="presentation">
							<a href="#user" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(trans('report.userTab')); ?></a>
						</li>
						<li role="presentation">
							<a href="#vehicle" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(trans('report.vehicleTab')); ?></a>
						</li>
						<?php endif; ?>
						<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
						<li role="presentation">
							<a class="more-functions" href="javascript:void(0)" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(trans('report.userTab')); ?></a>
						</li>
						<li role="presentation">
							<a class="more-functions" href="javascript:void(0)" aria-controls="profile" role="tab" data-toggle="tab"><?php echo e(trans('report.vehicleTab')); ?></a>
						</li>
						<?php endif; ?>
					</ul>

					
					<?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
					<div class="modal" id="more-functions">
						<div class="modal-dialog">
							<div class="modal-content model-content-update">
								<div class="modal-header modal-header-update">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title model-title-update"><?php echo e(trans('default.more-functions')); ?></h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<p><?php echo e(trans('default.more-functions-text')); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
					

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="day">

							
							<div id="fuel-fill-list" class="row">
								<div class="col-xs-12 padding0">
									<div class="row">
										<div class="col-xs-12">
											<h3>
												<?php echo e(trans('fuel.fillList')); ?>

											</h3>
										</div>
									</div>

									<div class="row">
										<div class="col-xs-12">
											<div class="row text-right">
												<button id="generatePDF-day" class="default-button">PDF Table</button>
											</div>
										</div>
									</div>

									<div id="report-fuel-fill-list-container" class="row report-fuel-fill-list-container">
										<div class="col-xs-12">
											<div class="row">
												
												<div class="panel">
													<div style="display: none"
													class="drop-down form-control"
													data-control-type="drop-down"
													data-control-name="paging"
													data-control-action="paging">
														<ul class="dropdown-menu" role="menu">
															<li><span data-number="2"></span></li>
														</ul>
													</div>
												</div>
												<div class="jplist-panel panel panel-top top-filters">
													<!-- date picker range filter -->
													<!-- data-datepicker-func is a user function defined in jQuery.fn.jplist.settings -->
													<div
														data-control-type="date-picker-range-filter"
														data-control-name="date-picker-range-filter"
														data-control-action="filter"
														data-path=".vehicle-date"
														data-datetime-format="{day}.{month}.{year}."
														data-datepicker-func="datepicker"
														class="jplist-date-picker-range"
													>

														<div class="form-group input-group date">
															<input
																type="text"
																class="form-control date-picker"
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
																class="form-control date-picker"
																placeholder="<?php echo e(trans('report.dateTo')); ?>"
																data-type="next"
															/>
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</div>
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
												<div class="row row-table-filters">
													<div class="panel panel-top top-filters">
														<div class="col-xs-2 filter">
															<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
															<input
																style="display: none;"
																id="filter-vehicles-list2-tab-1"
																title="<?php echo e(trans('fuel.filterByTitle')); ?>"
																class="form-control form-control-tab1"
																data-path=".vehicle-name"
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
															<?php endif; ?>
														</div>

														<div class="col-xs-2 filter">
															<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
															<input
																style="display: none;"
																id="creator-list-filter"
																title="<?php echo e(trans('fuel.filterByTitle')); ?>"
																class="form-control form-control-tab1"
																data-path=".vehicle-filler"
																type="text"
																value=""
																placeholder="<?php echo e(trans('fuel.filterByFiller')); ?>"
																data-control-type="textbox"
																data-control-name="title-filter-vehicle-filler"
																data-control-action="filter"
															/>
															<select id="creator-list" style="width: 100%" class="form-control" name="cr">
																<option></option>
																<?php $__currentLoopData = $user_list_creator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($cr->id); ?>"><?php echo e($cr->name); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</select>
															<?php endif; ?>
														</div>

														<div class="col-xs-2 filter">
															<input
																title="<?php echo e(trans('fuel.filterByKM')); ?>"
																class="form-control form-control-tab1 clearable"
																data-path=".vehicle-current-kilometers"
																type="text"
																value=""
																placeholder="<?php echo e(trans('fuel.filterByKM')); ?>"
																data-control-type="textbox"
																data-control-name="title-filter-vehicle-kilometers"
																data-control-action="filter"
															/>
														</div>

														<div class="col-xs-2 filter">
															<input
																title="<?php echo e(trans('fuel.filterByLiters')); ?>"
																class="form-control form-control-tab1 clearable"
																data-path=".vehicle-liters"
																type="text"
																value=""
																placeholder="<?php echo e(trans('fuel.filterByLiters')); ?>"
																data-control-type="textbox"
																data-control-name="title-filter-vehicle-liters"
																data-control-action="filter"
															/>
														</div>

														<div class="col-xs-2 filter">
															<input
																title="<?php echo e(trans('fuel.filterByPrice')); ?>"
																class="form-control form-control-tab1 clearable"
																data-path=".vehicle-price"
																type="text"
																value=""
																placeholder="<?php echo e(trans('fuel.filterByPrice')); ?>"
																data-control-type="textbox"
																data-control-name="title-filter-vehicle-price"
																data-control-action="filter"
															/>
														</div>

														<div class="col-xs-2 filter">
															<input
																title="<?php echo e(trans('fuel.filterByPricePerLiter')); ?>"
																class="form-control form-control-tab1 clearable"
																data-path=".vehicle-pricePerLiter"
																type="text"
																value=""
																placeholder="<?php echo e(trans('fuel.filterByPricePerLiter')); ?>"
																data-control-type="textbox"
																data-control-name="title-filter-vehicle-pricePerLiter"
																data-control-action="filter"
															/>
														</div>

														<div class="col-xs-2 filter">
															<input
																title="<?php echo e(trans('fuel.filterByPriceKMLast')); ?>"
																class="form-control form-control-tab1 clearable"
																data-path=".vehicle-lastKM"
																type="text"
																value=""
																placeholder="<?php echo e(trans('fuel.filterByPriceKMLast')); ?>"
																data-control-type="textbox"
																data-control-name="title-filter-vehicle-lastKM"
																data-control-action="filter"
															/>
														</div>
													</div>
												</div>

												<div class="row default-div-table">
													<div class="row default-div-table-header">
														<div class="col-xs-2 text-center">
															<div class="panel current-sort">
																<div
																	class=""
																	data-control-type="sort-drop-down"
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('fuel.vehicle')); ?></strong>
																	<li>
																		<span data-path=".vehicle-name" data-order="asc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-name" data-order="desc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.filler')); ?></strong>
																	<li>
																		<span data-path=".vehicle-filler" data-order="asc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-filler" data-order="desc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.currentKilometers')); ?></strong>
																	<li>
																		<span data-path=".vehicle-current-kilometers" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-current-kilometers" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.liters')); ?></strong>
																	<li>
																		<span data-path=".vehicle-liters" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-liters" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.price')); ?></strong>
																	<li>
																		<span data-path=".vehicle-price" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-price" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.pricePerLiter')); ?></strong>
																	<li>
																		<span data-path=".vehicle-pricePerLiter" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-pricePerLiter" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong title="<?php echo e(trans('fuel.lastKMtitle')); ?>"><?php echo e(trans('fuel.lastKM')); ?></strong>
																	<li>
																		<span data-path=".vehicle-lastKM" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-lastKM" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.date')); ?></strong>
																	<li>
																		<span data-path=".vehicle-date-hidden" data-order="asc" data-type="datetime" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-date-hidden" data-order="desc" data-type="datetime" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
													</div>
													<div class="list list-date">
													<?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php $__currentLoopData = $v->vehiclesFuel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="row default-div-table-rows list-item list-item-date">
															<div class="col-xs-2">
																<span data-vid="<?php echo e($vf->vehicle->id); ?>" class="vertical-align-center vehicle-name"><?php echo e($vf->vehicle->name_and_license_plate); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-filler"><?php echo e($vf->filler->name); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-current-kilometers"><?php echo e($vf->current_kilometers); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-liters"><?php echo e($vf->liters); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-price"><?php echo e($vf->price); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-pricePerLiter"><?php echo number_format($vf->price / $vf->liters, 4); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-lastKM">
																<?php
																	if($key-1 == -1){
																		echo $vf->current_kilometers;
																	}else{
																		echo $vf->current_kilometers - $v->vehiclesFuel[$key-1]->current_kilometers;
																	}
																?>
																</span>
															</div>
															<div class="col-xs-2 text-center theme">
																<div class="col-xs-11 padding0">
																	<span style="visibility: hidden;position: absolute;" class="vertical-align-center vehicle-date-hidden"><?php echo e($vf->created_at->format('m/d/Y H:i:s')); ?></span>

																	<span class="vertical-align-center vehicle-date"><?php echo e($vf->created_at->format('d.m.Y.')); ?></span>
																	<span class="vertical-align-center vehicle-hour"><?php echo e($vf->created_at->format('H:i:s')); ?></span>
																	<!-- <span class="vertical-align-center vehicle-date"><?php echo e($vf->created_at->format('d.m.Y H:i:s')); ?></span> -->
																</div>
															</div>
														</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</div>

													<!-- no results found -->
													<div class="jplist-no-results row default-div-table-rows">
														<div class="col-xs-12">
															<p><?php echo e(trans('home.noResultsFound')); ?></p>
														</div>
													</div>
												</div>

												<!-- Pagination -->
												<div class="row">
													<div class="panel panel-top panel-pagination">
														<div>
															<div
																class="paging-results left"
																data-type="<?php echo e(trans('home.page')); ?>"
																data-control-type="label"
																data-control-name="paging"
																data-control-action="paging"
															></div>

															<div
																class="paging left"
																data-control-type="placeholder"
																data-control-name="paging"
																data-control-action="paging"
															></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						
						</div>

						<?php if (Auth::check() && Auth::user()->hasRole('admin|legal|employee')): ?>
						<div role="tabpanel" class="tab-pane fade" id="user">
							
							
							<div id="fuel-fill-list-tab2" class="row">
								<div class="col-xs-12">
									<div class="row">
										<div class="col-xs-12">
											<h3>
												<?php echo e(trans('fuel.fillList')); ?>

											</h3>
										</div>
									</div>
									<div id="report-fuel-fill-list-container-tab2" class="row report-fuel-fill-list-container">
										<div class="col-xs-12">
											<div class="row">
												<div class="panel panel-top top-filters">
													<div class="filter">
														<input
															class="form-control form-control-tab2 clearable"
															data-path=".vehicle-filler"
															type="text"
															value=""
															placeholder="<?php echo e(trans('fuel.filterByFiller')); ?>"
															data-control-type="textbox"
															data-control-name="title-filter"
															data-control-action="filter"
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
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('fuel.vehicle')); ?></strong>
																	<li>
																		<span data-path=".vehicle-name" data-order="asc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-name" data-order="desc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.filler')); ?></strong>
																	<li>
																		<span data-path=".vehicle-filler" data-order="asc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-filler" data-order="desc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.currentKilometers')); ?></strong>
																	<li>
																		<span data-path=".vehicle-current-kilometers" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-current-kilometers" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.liters')); ?></strong>
																	<li>
																		<span data-path=".vehicle-liters" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-liters" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.price')); ?></strong>
																	<li>
																		<span data-path=".vehicle-price" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-price" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.pricePerLiter')); ?></strong>
																	<li>
																		<span data-path=".vehicle-pricePerLiter" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-pricePerLiter" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong title="<?php echo e(trans('fuel.lastKMtitle')); ?>"><?php echo e(trans('fuel.lastKM')); ?></strong>
																	<li>
																		<span data-path=".vehicle-lastKM" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-lastKM" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.date')); ?></strong>
																	<li>
																		<span data-path=".vehicle-date-hidden" data-order="asc" data-type="datetime" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-date-hidden" data-order="desc" data-type="datetime" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
													</div>
													<div class="list list-date">
													<?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php $__currentLoopData = $v->vehiclesFuel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="row default-div-table-rows list-item list-item-date">
															<div class="col-xs-2">
																<span data-vid="<?php echo e($vf->vehicle->id); ?>" class="vertical-align-center vehicle-name"><?php echo e($vf->vehicle->name_and_license_plate); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-filler"><?php echo e($vf->filler->name); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-current-kilometers"><?php echo e($vf->current_kilometers); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-liters"><?php echo e($vf->liters); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-price"><?php echo e($vf->price); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-pricePerLiter"><?php echo number_format($vf->price/$vf->liters, 4); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-lastKM">
																<?php
																	if($key-1 == -1){
																		echo $vf->current_kilometers;
																	}else{
																		echo $vf->current_kilometers - $v->vehiclesFuel[$key-1]->current_kilometers;
																	}
																?>
																</span>
															</div>
															<div class="col-xs-2 text-center theme">
																<div class="col-xs-11 padding0">
																	<span style="visibility: hidden;position: absolute;" class="vertical-align-center vehicle-date-hidden"><?php echo e($vf->created_at->format('m/d/Y H:i:s')); ?></span>

																	<span class="vertical-align-center vehicle-date"><?php echo e($vf->created_at->format('d.m.Y.')); ?></span>
																	<span class="vertical-align-center vehicle-hour"><?php echo e($vf->created_at->format('H:i:s')); ?></span>
																</div>
															</div>
														</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</div>

													<!-- no results found -->
													<div class="jplist-no-results row default-div-table-rows">
														<div class="col-xs-12">
															<p><?php echo e(trans('home.noResultsFound')); ?></p>
														</div>
													</div>
												</div>
												<!-- Pagination -->
												<div class="row">
													<div class="panel panel-top panel-pagination">
														<div>
															<div
																class="paging-results left"
																data-type="<?php echo e(trans('home.page')); ?>"
																data-control-type="label"
																data-control-name="paging"
																data-control-action="paging"
															></div>
															<div
																class="paging left"
																data-control-type="placeholder"
																data-control-name="paging"
																data-control-action="paging"
															></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<div role="tabpanel" class="tab-pane fade" id="vehicle">
							
							<div id="fuel-fill-list-tab3" class="row">
								<div class="col-xs-12">

									<div class="row">
										<div class="col-xs-12">
											<h3>
												<?php echo e(trans('fuel.fillList')); ?>

											</h3>
										</div>
									</div>

									<div id="report-fuel-fill-list-container-tab3" class="row report-fuel-fill-list-container">
										<div class="col-xs-12">
											<div class="row">
												<div class="panel panel-top top-filters">
													<div class="filter">
														<input
															style="display: none;" id="filter-vehicles-list2-tab-3"
															class="form-control form-control-tab3 clearable"
															data-path=".vehicle-name"
															type="text"
															value=""
															placeholder="<?php echo e(trans('fuel.filterByTitle')); ?>"
															data-control-type="textbox"
															data-control-name="title-filter"
															data-control-action="filter"
														/>
														<select id="vehicles-list2-tab-3" style="width: 100%" class="form-control" name="vl">
															<option></option>
														</select>
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
																	data-control-name="sort"
																	data-control-action="sort"
																>
																	<strong><?php echo e(trans('fuel.vehicle')); ?></strong>
																	<li>
																		<span data-path=".vehicle-name" data-order="asc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-name" data-order="desc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.filler')); ?></strong>
																	<li>
																		<span data-path=".vehicle-filler" data-order="asc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-filler" data-order="desc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.currentKilometers')); ?></strong>
																	<li>
																		<span data-path=".vehicle-current-kilometers" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-current-kilometers" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.liters')); ?></strong>
																	<li>
																		<span data-path=".vehicle-liters" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-liters" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.price')); ?></strong>
																	<li>
																		<span data-path=".vehicle-price" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-price" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.pricePerLiter')); ?></strong>
																	<li>
																		<span data-path=".vehicle-pricePerLiter" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-pricePerLiter" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong title="<?php echo e(trans('fuel.lastKMtitle')); ?>"><?php echo e(trans('fuel.lastKM')); ?></strong>
																	<li>
																		<span data-path=".vehicle-lastKM" data-order="asc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-lastKM" data-order="desc" data-type="number" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
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
																	<strong><?php echo e(trans('fuel.date')); ?></strong>
																	<li>
																		<span data-path=".vehicle-date" data-order="asc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
																	</li>
																	<li>
																		<span data-path=".vehicle-date" data-order="desc" data-type="text" class="sort-arrow glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
																	</li>
																</div>
															</div>
														</div>
													</div>
													<div class="list list-date">
													<?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php $__currentLoopData = $v->vehiclesFuel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class="row default-div-table-rows list-item list-item-date">
															<div class="col-xs-2">
																<span data-vid="<?php echo e($vf->vehicle->id); ?>" class="vertical-align-center vehicle-name"><?php echo e($vf->vehicle->name_and_license_plate); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-filler"><?php echo e($vf->filler->name); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-current-kilometers"><?php echo e($vf->current_kilometers); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-liters"><?php echo e($vf->liters); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-price"><?php echo e($vf->price); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-pricePerLiter"><?php echo number_format($vf->price/$vf->liters, 4); ?></span>
															</div>
															<div class="col-xs-2 text-center">
																<span class="vertical-align-center vehicle-lastKM">
																<?php
																	if($key-1 == -1){
																		echo $vf->current_kilometers;
																	}else{
																		echo $vf->current_kilometers - $v->vehiclesFuel[$key-1]->current_kilometers;
																	}
																?>
																</span>
															</div>
															<div class="col-xs-2 text-center theme">
																<div class="col-xs-11 padding0">
																	<span class="vertical-align-center vehicle-date"><?php echo e($vf->created_at->format('d.m.Y.')); ?></span>
																	<span class="vertical-align-center vehicle-hour"><?php echo e($vf->created_at->format('H:i:s')); ?></span>
																</div>
															</div>
														</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</div>
													<!-- no results found -->
													<div class="jplist-no-results row default-div-table-rows">
														<div class="col-xs-12">
															<p><?php echo e(trans('home.noResultsFound')); ?></p>
														</div>
													</div>
												</div>
												<!-- Pagination -->
												<div class="row">
													<div class="panel panel-top panel-pagination">
														<div>
															<div
																class="paging-results left"
																data-type="<?php echo e(trans('home.page')); ?>"
																data-control-type="label"
																data-control-name="paging"
																data-control-action="paging"
															></div>
															<div
																class="paging left"
																data-control-type="placeholder"
																data-control-name="paging"
																data-control-action="paging"
															></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						
						</div>
						<?php endif; ?>
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


	//table filter 
	//----- TAB 1 -----
	//Connect select2 and jplist plugins
	$('#vehicles-list2-tab-1').select2({
        cache: true,
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

                return { vl: params.term, u: $('#u').val() }
            },
            processResults: function (data) {
            	$('#select2-vehicles-list2-container').attr('title', '');
                $('#select2-vehicles-list2-container').html('<span class="select2-selection__placeholder"><?php echo e(trans("vehicles.chooseVehicle")); ?></span>');
                return { results: data }
            }
        }
    });


    $('#vehicles-list2-tab-1').on('select2:open', function (evt) {
		$('#select2-vehicles-list2-tab-1-container').attr('title', '');
        $('#select2-vehicles-list2-tab-1-container').html('<span class="select2-selection__placeholder"><?php echo e(trans("vehicles.chooseVehicle")); ?></span>');

		$('#filter-vehicles-list2-tab-1').val('');

		var press = jQuery.Event("keyup");
		press.ctrlKey = false;
		press.which = 46;
		$('#filter-vehicles-list2-tab-1').trigger(press);
	});


	$('#vehicles-list2-tab-1').on('select2:close', function (evt) {
		if($('#select2-vehicles-list2-tab-1-container').attr('title') == ""){
    		$('#vehicles-list2-tab-1').val('');
    	}
	});


    $('#vehicles-list2-tab-1').on('change', function(e) {
    	$('#filter-vehicles-list2-tab-1').val('');

    	var term = '';
    	term = $.trim($('#select2-vehicles-list2-tab-1-container').text());

    	$('#filter-vehicles-list2-tab-1').val(term);
    	
    	var press = jQuery.Event("keyup");
	    press.ctrlKey = false;
	    press.which = 46;
	    $('#filter-vehicles-list2-tab-1').trigger(press);	    
	});


	//table filter 
	//----- TAB 3 -----
	//Connect select2 and jplist plugins
	$('#vehicles-list2-tab-3').select2({
        cache: true,
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

            	$('#filter-vehicles-list2-tab-3').val(params.term);
            	var press = jQuery.Event("keyup");
			    press.ctrlKey = false;
			    press.which = 46;
			    $('#filter-vehicles-list2-tab-3').trigger(press);

                return { vl: params.term, u: $('#u').val() }
            },
            processResults: function (data) {
            	$('#select2-vehicles-list2-container').attr('title', '');
                $('#select2-vehicles-list2-container').html('<span class="select2-selection__placeholder"><?php echo e(trans("vehicles.chooseVehicle")); ?></span>');
                return { results: data }
            }
        }
    });

    $('#vehicles-list2-tab-3').on('change', function(e) {
    	$('#filter-vehicles-list2-tab-3').val('');

    	var term = '';
    	term = $.trim($('#select2-vehicles-list2-tab-3-container').text());
    	
    	$('#filter-vehicles-list2-tab-3').val(term);
    	
    	var press = jQuery.Event("keyup");
	    press.ctrlKey = false;
	    press.which = 46;
	    $('#filter-vehicles-list2-tab-3').trigger(press);
	});




	function tog(v){
		return v?'addClass':'removeClass';
	} 
	$(document).on('input', '.clearable', function(){
			$(this)[tog(this.value)]('x');
		}).on('mousemove', '.x', function( e ){
			$(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');
		}).on('touchstart click', '.onX', function( ev ){
			ev.preventDefault();
			$(this).removeClass('x onX').val('').change();

			if($(this).hasClass('form-control-tab1')){

				var press = jQuery.Event("keyup");
			    press.ctrlKey = false;
			    press.which = 46;
			    $(this).trigger(press);

			}else if($(this).hasClass('form-control-tab2')){

				var press = jQuery.Event("keyup");
			    press.ctrlKey = false;
			    press.which = 46;
			    $('.form-control-tab2').trigger(press);

			}else if($(this).hasClass('form-control-tab3')){

				var press = jQuery.Event("keyup");
			    press.ctrlKey = false;
			    press.which = 46;
			    $('.form-control-tab3').trigger(press);

			}
	});


	function removeActiveClassTab(){
		location.reload();
	}



	function removeActiveClassTab2(){
		$('.form-control-tab2').val('');

		var press = jQuery.Event("keyup");
	    press.ctrlKey = false;
	    press.which = 46;
	    $('.form-control-tab2').trigger(press); 
	}



	function removeActiveClassTab3(){
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



	$(document).ready(function(){

		$('#report-fuel-fill-list-container').jplist({   
		    items_box: '.list' 
		    ,item_path: '.list-item'
		    ,panel_path: '.panel'
		});
		


		$('#report-fuel-fill-list-container-tab2').jplist({   
		    items_box: '.list' 
		    ,item_path: '.list-item'
		    ,panel_path: '.panel'
		});
		


		$('#report-fuel-fill-list-container-tab3').jplist({   
		    items_box: '.list' 
		    ,item_path: '.list-item'
		    ,panel_path: '.panel'
		});



		$('.nav-tabs a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});



		make_children_same_height('.default-div-table > div.default-div-table-header',['.default-div-table > div.default-div-table-header > div']);



		//Default table sort function - change color for filter
		$('#report-fuel-fill-list-container .sort-arrow').click(function(){
			$('#report-fuel-fill-list-container .panel').removeClass('current-sort');
			$(this).closest('#report-fuel-fill-list-container .panel').addClass('current-sort');
		});
		$('#report-fuel-fill-list-container-tab2 .sort-arrow').click(function(){
			$('#report-fuel-fill-list-container-tab2 .panel').removeClass('current-sort');
			$(this).closest('#report-fuel-fill-list-container-tab2 .panel').addClass('current-sort');
		});
		$('#report-fuel-fill-list-container-tab3 .sort-arrow').click(function(){
			$('#report-fuel-fill-list-container-tab3 .panel').removeClass('current-sort');
			$(this).closest('#report-fuel-fill-list-container-tab3 .panel').addClass('current-sort');
		});



		$('.jplist-group label').click(function() {
            $('.jplist-group label').removeClass('active');
            $(this).addClass('active');
        });



		$('#creator-list').select2({
	        cache: true,
	        allowClear: true,
	        placeholder: "<?php echo e(trans('vehicles.chooseDriver')); ?>",
			language: {
				"noResults": function(){
				return "<?php echo e(trans('vehicles.noResults')); ?>";
				}
			}
	    });


		$('#creator-list').on('select2:open', function (evt) {
			$('#select2-creator-list-container').attr('title', '');
            $('#select2-creator-list-container').html('<span class="select2-selection__placeholder"><?php echo e(trans("vehicles.chooseDriver")); ?></span>');

			$('#creator-list-filter').val('');

			var press = jQuery.Event("keyup");
			press.ctrlKey = false;
			press.which = 46;
			$('#creator-list-filter').trigger(press);
		});


		$('#creator-list').on('select2:close', function (evt) {
			if($('#select2-creator-list-container').attr('title') == ""){
				$('#creator-list').val('');
			}
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



		$('#vehicles-list').select2({
	        cache: true,
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




		$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*2.1);



		$(window).resize(function(){

			$('#dashboard-content').css('height', $('#dashboard-content .content').height()+$('#dashboard-content .content .headline-title').height()*2.1);
		});




		//Generate PDF
	    $('#generatePDF-day').click(function(){

	    	var date_from = $('.jplist-date-picker-range .input-group:first-child input').val();
	    	var date_to = $('.jplist-date-picker-range .input-group:last-child input').val();

	    	if($('.row-table-filters .top-filters input').length == 5){
		    	var current_kilometers = $('.row-table-filters .top-filters input')[0].value;
		    	var liters = $('.row-table-filters .top-filters input')[1].value;
		    	var price = $('.row-table-filters .top-filters input')[2].value;
		    	var pricePerLiter = $('.row-table-filters .top-filters input')[3].value;
		    	var kzt = $('.row-table-filters .top-filters input')[4].value;

		    	var win = window.open('<?php echo e(route("reports.pdf")); ?>?current_kilometers='+current_kilometers+'&liters='+liters+'&price='+price+'&pricePerLiter='+pricePerLiter+'&kzt='+kzt+'&date_from='+date_from+'&date_to='+date_to, '_blank');
	  			win.focus();
	  		}else{
		    	var vehicle = $('.row-table-filters .top-filters select')[0].value;
		    	var filler = $('.row-table-filters .top-filters select')[1].value;
	  			var current_kilometers = $('.row-table-filters .top-filters input')[2].value;
		    	var liters = $('.row-table-filters .top-filters input')[3].value;
		    	var price = $('.row-table-filters .top-filters input')[4].value;
		    	var pricePerLiter = $('.row-table-filters .top-filters input')[5].value;
		    	var kzt = $('.row-table-filters .top-filters input')[6].value;

		    	var win = window.open('<?php echo e(route("reports.pdf")); ?>?vehicle='+vehicle+'&filler='+filler+'&current_kilometers='+current_kilometers+'&liters='+liters+'&price='+price+'&pricePerLiter='+pricePerLiter+'&kzt='+kzt+'&date_from='+date_from+'&date_to='+date_to, '_blank');
	  			win.focus();
	  		}
	    });




	    $('.more-functions').on('click', function(e){
			e.preventDefault();
			//Submit form if valid
			$('#more-functions').modal({ backdrop: 'static', keyboard: false });
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

		    console.log(datepicker);

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

        $( function() {
            $( ".date-input" ).datepicker( $.datepicker.regional[ lang ] );
        } );


	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\Wine360\resources\views/report/index.blade.php ENDPATH**/ ?>