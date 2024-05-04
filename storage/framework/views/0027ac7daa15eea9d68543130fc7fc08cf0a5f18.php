

<?php $__env->startSection('body_class', 'body__interface'); ?>

<?php $__env->startSection('dashboard-content'); ?>
<div class="home-dashboard-content">

  <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
  <div class="row headline-title">
    <div class="col-xs-12">
      <h2><?php echo e(trans('home.listUsers')); ?></h2>
    </div>
  </div>
  <?php endif; ?>

  <div class="row">
    <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
    <div id="search-users" class="col-xs-12 employees box jplist">
      <div class="row">
        <!-- top panel -->
        <div class="panel panel-top top-filters">
          <div
              class="drop-down form-control"
              data-control-type="drop-down"
              data-control-name="paging"
              data-control-action="paging"
          >
            <ul class="dropdown-menu" role="menu">
              <li>
                <span data-number="5"><?php echo e(trans('home.5perPage')); ?></span>
              </li>
              <li>
                <span data-number="10" data-default="true"> <?php echo e(trans('home.10perPage')); ?></span>
              </li>
              <li>
                <span data-number="all"><?php echo e(trans('home.viewAll')); ?></span>
              </li>
            </ul>
          </div>

          <div
              class="drop-down form-control"
              data-control-type="drop-down"
              data-control-name="sort"
              data-control-action="sort"
          >
            <ul class="dropdown-menu" role="menu">
              <li>
                <span data-path="default"><?php echo e(trans('home.viewAll')); ?></span>
              </li>
              <li>
                <span data-path=".title" data-order="asc" data-type="text"><?php echo e(trans('home.titleAZ')); ?></span>
              </li>
              <li>
                <span data-path=".title" data-order="desc" data-type="text"><?php echo e(trans('home.titleZA')); ?></span>
              </li>
              
            </ul>
          </div>

          <div class="jplist-group">
            <input
                data-control-type="radio-buttons-filters"
                data-control-action="filter"
                data-control-name="default"
                data-path="default"
                id="default-radio"
                type="radio"
                name="jplist"
                checked="checked"
            />
            <label for="default-radio"><?php echo e(trans('home.all')); ?></label>
            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <input
                data-control-type="radio-buttons-filters"
                data-control-action="filter"
                data-control-name="<?php echo e($slug); ?>"
                data-path=".<?php echo e($slug); ?>"
                id="<?php echo e($slug); ?>"
                type="radio"
                name="jplist"
            />
            <label for="<?php echo e($slug); ?>"><?php echo e(trans("home.{$slug}")); ?></label>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>

          <!-- filter -->
          <div class="filter drop-down">
            <!--[if IE]>
            <div class="search-title left">Filter by title:</div><![endif]-->
            <input
              class="form-control"
              data-path=".title"
              type="text"
              value=""
              placeholder="<?php echo e(trans('home.filterByTitle')); ?>"
              data-control-type="textbox"
              data-control-name="title-filter"
              data-control-action="filter"
            />
          </div>
          <!-- filter -->
          <div class="filter drop-down">
            <!--[if IE]>
            <div class="search-title left">Filter by title:</div><![endif]-->
            <input
              class="form-control"
              data-path=".filter-company"
              type="text"
              value=""
              placeholder="<?php echo e(trans('home.filterByCompany')); ?>"
              data-control-type="textbox"
              data-control-name="filter-company-filter"
              data-control-action="filter"
            />
          </div>
          <div class="">
            <input
              type="button"
              class="reset-btn"
              value="<?php echo e(trans('home.reset')); ?>"
              data-control-type="reset"
              data-control-name="reset"
              data-control-action="reset"
            />
          </div>
        </div>
      </div>

      <?php if(Session::has('message')): ?>
      <div class="alert alert-danger" role="alert">
        <?php echo e(Session::get('message')); ?>

      </div>
      <?php endif; ?>

      <div class="row default-div-table">
        <div class="row default-div-table-header">
          <div class="col-xs-3 text-center">
            <strong><?php echo e(trans('user.userName')); ?></strong>
          </div>
          <div class="col-xs-3 text-center">
            <strong><?php echo e(trans('user.userEmail')); ?></strong>
          </div>
          <div class="col-xs-2 text-center">
            <strong><?php echo e(trans('user.userCompany')); ?></strong>
          </div>
          <div class="col-xs-2 text-center">
            <strong><?php echo e(trans('default.role')); ?></strong>
          </div>
          <div class="col-xs-2 text-center">
            <strong><?php echo e(trans('default.action')); ?></strong>
          </div>
        </div>

        <div class="list">
          <?php $__currentLoopData = $other_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="row default-div-table-rows list-item">
            <div class="col-xs-3">
              <span class="vertical-align-center title"><?php echo e($user->name); ?></span>
            </div>
            <div class="col-xs-3 text-center">
              <span class="vertical-align-center"><?php echo e($user->email); ?></span>
            </div>
            <div class="col-xs-2 text-center">
              <span class="vertical-align-center filter-company"><?php echo e($user->company); ?></span>
            </div>
            <div class="col-xs-2 text-center theme">
              <span style="text-transform: uppercase;" class="<?php echo e($user->getRoles()->first()->slug); ?> vertical-align-center <?php if($user->hasRole('legal')): ?> green-span <?php else: ?> red-span <?php endif; ?>">
                <?php if($user->getRoles()->first()->slug == 'legal'): ?>
                <?php echo e(trans('home.legal')); ?>

                <?php elseif($user->getRoles()->first()->slug == 'private'): ?>
                <?php echo e(trans('home.private')); ?>

                <?php elseif($user->getRoles()->first()->slug == 'employee'): ?>
                <?php echo e(trans('home.employee')); ?>

                <?php elseif($user->getRoles()->first()->slug == 'admin'): ?>
                <?php echo e(trans('home.admin')); ?>

                <?php endif; ?>
              </span>
            </div>

            <div class="col-xs-2 text-center">
              <a title="<?php echo e(trans('default.edit')); ?> <?php echo e($user->name); ?>"
                 href="<?php echo e(route('user.details.edit', ['id' => $user->id] )); ?>" class="edit-button">
                <span class="glyphicon glyphicon-edit"></span>
              </a>
              <form method="POST" action="<?php echo e(route('delete.user', ['id' => $user->id])); ?>">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('DELETE')); ?>

                <button title="<?php echo e(trans('default.removeEmployee')); ?> <?php echo e($user->name); ?>" type="submit" class="remove-button">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
              </form>
            </div>
          </div>
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
                data-type="<?php echo e(trans('home.page')); ?> {current} <?php echo e(trans('home.of')); ?> {pages}"
                data-control-type="label"
                data-control-name="paging"
                data-control-action="paging"
            >
            </div>
            <div
                class="paging left"
                data-control-type="placeholder"
                data-control-name="paging"
                data-control-action="paging"
            >
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <?php if (Auth::check() && Auth::user()->hasRole('private|legal|employee')): ?>
    <div class="row">
      <div class="col-xs-12 col-sm-6 vehicles col-md-6 col-lg-3">
        <div class="row">
          <h4 class=""><?php echo e(trans('home.myVehicles')); ?></h4>
          <a id="insert-vehicle" href="<?php echo e(route('vehicles.index')); ?>">
            <img src=" <?php echo e(asset('img/interface/wheel-icon.svg')); ?> ">
          </a>
          <?php if (Auth::check() && Auth::user()->hasRole('legal')): ?>
          <div id="vehicle-thumbnail-container" class="row box jplist">
            <div class="row">
              <!-- top panel -->
              <div class="panel panel-top top-filters">
                <div style="display: none"
                     class="drop-down form-control"
                     data-control-type="drop-down"
                     data-control-name="paging"
                     data-control-action="paging">
                  <ul class="dropdown-menu" role="menu">
                    <li><span data-number="6"></li>
                  </ul>
                </div>
                <div class="row">
                  <!-- filter -->
                  <div class="filter col-xs-12 col-sm-12 padding0">
                    <!--[if IE]>
                    <div class="search-title left">Filter by title:</div><![endif]-->
                    <input
                      style="display: none;" id="filter-vehicles-list2"
                      class="form-control clearable"
                      data-path=".title"
                      type="text"
                      value=""
                      placeholder="<?php echo e(trans('home.filterByTitleVehicle')); ?>"
                      data-control-type="textbox"
                      data-control-name="title-filter"
                      data-control-action="filter"
                    />
                    <select id="vehicles-list2" style="width: 100%" class="form-control" name="vl">
                      <option></option>
                    </select>
                  </div>
                  
                </div>

                
              </div>
            </div>
            <div class="row vehicle-thumbnail-list list">
              <?php $__currentLoopData = $vehicles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div
                style="
                <?php if(!empty($vehicle->image)): ?>
                background-image: url('<?php echo e(asset("img/vehiclesImage/{$vehicle->image}")); ?>');background-size: 100%;
                <?php else: ?>
                background-image: url('<?php echo e(asset('img/interface/car-icon.svg')); ?>');background-size: 100% auto;
                <?php endif; ?> "
               class="theme col-xs-4 list-item "
              >
                <a href="<?php echo e(route('vehicles.details', ['id' => $vehicle->id])); ?>">
                  <div class="row text-center vehicle-thumbnail-license-plate">
                    <span class="title">
                      <?php echo e($vehicle->name_and_license_plate); ?>

                    </span>
                  </div>
                </a>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- no results found -->
            <div class="jplist-no-results row default-div-table-rows">
              <div class="col-xs-12 padding0">
                <p><?php echo e(trans('home.noResultsFound')); ?></p>
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
                      data-control-action="paging">
                  </div>
                  <div
                      class="paging left"
                      data-control-type="placeholder"
                      data-control-name="paging"
                      data-control-action="paging">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>

          <?php if (Auth::check() && Auth::user()->hasRole('private')): ?>
          <?php if(!empty($vehicles_list)): ?>
          <div class="row vehicle-thumbnail-list list">
            <div
              style="
              <?php if(!empty($vehicles_list->image)): ?>
              background-image: url('<?php echo e(asset("img/vehiclesImage/{$vehicle->image}")); ?>');background-size: 100%;
              <?php else: ?> background-image: url('<?php echo e(asset('img/interface/car-icon.svg')); ?>');background-size: 100% auto;
              <?php endif; ?>"
              class="theme col-xs-4 list-item"
            >
              <a href="<?php echo e(route('vehicles.details', ['id' => $vehicles_list->id])); ?>">
                <div class="row text-center vehicle-thumbnail-license-plate">
                  <span class="title">
                    <?php echo e($vehicles_list->name_and_license_plate); ?>

                  </span>
                </div>
              </a>
            </div>
          </div>
          <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-6 monitoring">
        <div class="dashboard-fixed-container">
          <h4><?php echo e(trans('home.monitoring')); ?></h4>
          <a title="" class="draggable-button" href="javascript:void(0)">
            <img src="<?php echo e(asset('img/interface/wheel-icon.svg')); ?>">
          </a>

          
          <div style="display: none;" class="row monitoring-configuration-edit">
            <div class="choose-item-row">
              <div class="col-xs-12 col-sm-8 padding0">
                <select name="choose-item" class="form-control choose-item">
                  <option value="reminder"><?php echo e(trans('reminder.title')); ?></option>
                  <option value="malfunction"><?php echo e(trans('malfunction.title')); ?></option>
                  
                </select>
              </div>
              <button class="add-sort-item default-button"><?php echo e(trans('default.add')); ?></button>
            </div>
            <div class="choose-item-row">
              <button class="save-monitoring default-button"><?php echo e(trans('default.save')); ?></button>
            </div>
          </div>
          <div class="row sortable-container">
            <div class="column">
              <div class="padding0">
                <?php $__currentLoopData = $uc_area1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $num_failed = collect();
                  $num_pending = collect();

                  if($item->type == 'reminder'){
                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->reminders as $r) {
                            if(!$r->isCompleted() && ($r->end_date_reminder != null && $r->end_date_reminder->lt(Carbon\Carbon::now()))){
                                $num_failed->push($r);
                            }
                        }
                    }

                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->reminders as $r) {
                            if(!$r->isCompleted() && ($r->end_date_reminder != null && $r->end_date_reminder->gte(Carbon\Carbon::now()))) {
                                $num_pending->push($r);
                            }
                        }
                    }
                  }else if($item->type == 'malfunction'){
                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->malfunctions as $vm) {
                            if(!$vm->isCompleted() && ($vm->end_date_reminder != null && $vm->end_date_reminder->lt(Carbon\Carbon::now()))) {
                                $num_failed->push($vm);
                            }
                        }
                    }

                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->malfunctions as $vm) {
                            if(!$vm->isCompleted() && ($vm->end_date_reminder != null && $vm->end_date_reminder->gte(Carbon\Carbon::now()))){
                                $num_pending->push($vm);
                            }
                        }
                    }
                  }
                ?>
                <div data-pos="<?php echo e($item->type); ?>" class="row new-item">
                  <label style="display: none;" class="remove-new-item">
                    <img src="img/interface/remove-icon.svg">
                  </label>
                  <div class="col-xs-12 col-sm-12 padding0">
                    <h5><?php echo e(trans('home.'.$item->type)); ?></h5>
                    <div class="col-xs-6 text-center padding0">
                      <div class="row">
                        <span class="monitoring-number"><?php echo e($num_failed->count()); ?></span>
                      </div>
                      <div class="row">
                        <span class="bubble red-b"><?php echo e(trans("malfunction.malfunctionFailed")); ?></span>
                      </div>
                    </div>
                    <div class="col-xs-6 text-center padding0">
                      <div class="row">
                        <span class="monitoring-number"><?php echo e($num_pending->count()); ?></span>
                      </div>
                      <div class="row">
                        <span class="bubble orange-b"><?php echo e(trans("malfunction.malfunctionPending")); ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>

            <div class="column">
              <div class="padding0">
                <?php $__currentLoopData = $uc_area2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $num_failed = collect();
                  $num_pending = collect();

                  if($item->type == 'reminder'){
                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->reminders as $r) {
                            if(!$r->isCompleted() && ($r->end_date_reminder != null && $r->end_date_reminder->lt(Carbon\Carbon::now()))){
                                $num_failed->push($r);
                            }
                        }
                    }

                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->reminders as $r) {
                            if(!$r->isCompleted() && ($r->end_date_reminder != null && $r->end_date_reminder->gte(Carbon\Carbon::now()))){
                                $num_pending->push($r);
                            }
                        }
                    }
                  }else if($item->type == 'malfunction'){
                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->malfunctions as $vm) {
                            if(!$vm->isCompleted() && ($vm->end_date_reminder != null && $vm->end_date_reminder->lt(Carbon\Carbon::now()))){
                                $num_failed->push($vm);
                            }
                        }
                    }

                    foreach (Auth::user()->vehiclesOwned as $v) {
                        foreach ($v->malfunctions as $vm) {
                            if(!$vm->isCompleted() && ($vm->end_date_reminder != null && $vm->end_date_reminder->gte(Carbon\Carbon::now()))){
                                $num_pending->push($vm);
                            }
                        }
                    }
                  }
                ?>
                <div data-pos="malfunction" class="row new-item">
                  <label style="display: none;" class="remove-new-item">
                    <img src="img/interface/remove-icon.svg">
                  </label>
                  <div class="col-xs-12 col-sm-12 padding0">
                    <h5><?php echo e(trans("home.{$item->type}")); ?></h5>
                    <div class="col-xs-6 text-center padding0">
                      <div class="row">
                        <span class="monitoring-number"><?php echo e($num_failed->count()); ?></span>
                      </div>
                      <div class="row">
                        <span class="bubble red-b"><?php echo e(trans("malfunction.malfunctionFailed")); ?></span>
                      </div>
                    </div>
                    <div class="col-xs-6 text-center padding0">
                      <div class="row">
                        <span class="monitoring-number"><?php echo e($num_pending->count()); ?></span>
                      </div>
                      <div class="row">
                        <span class="bubble orange-b"><?php echo e(trans("malfunction.malfunctionPending")); ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3 comment-column">
        <span id="comment-bubble" class="bubble">
          <a href="<?php echo e(route('comments.index')); ?>"><?php echo e(trans('home.comments')); ?></a>
        </span>
        <label id="add-comment">
          <img src="<?php echo e(asset('/img/interface/add-icon.svg')); ?>">
        </label>

        
        <div class="modal" id="add-comment-modal">
          <div class="modal-dialog">
            <div class="modal-content model-content-update">
              <div class="modal-header modal-header-update">
                <h4 class="modal-title model-title-update"><?php echo e(trans('comments.addComment')); ?></h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <form id="add-comment-form" method="POST" action="<?php echo e(route('comments.add.new')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="col-xs-12 col-sm-6">
                      <div class="form-group">
                        <label><?php echo e(trans('home.commentTitle')); ?></label>
                      </div>
                      <div class="form-group">
                        <input class="form-control text-left" type="text" name="comment_title">
                      </div>
                    </div>

                    

                    <div class="col-xs-12 col-sm-12">
                      <div class="form-group">
                        <label><?php echo e(trans('home.commentText')); ?></label>
                      </div>
                      <div class="form-group">
                        <textarea name="comment_details" class="form-control text-left"></textarea>
                      </div>
                    </div>

                    <div class="col-xs-12">
                      <div style="display: none;" class="alert alert-danger" role="alert">
                        <?php echo e(trans('malfunction.fieldRequired')); ?>

                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <button id="submit-add-comment" type="button" class="default-button"><?php echo e(trans('default.save')); ?></button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><?php echo e(trans('default.close')); ?></button>
              </div>
            </div>
          </div>
        </div>
        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row right-sidebar-comment-row">
          <?php if(empty($c->creator->image)): ?>
          <div class="user-image-circle">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          </div>
          <?php else: ?>
          <div style="background-image: url('<?php echo e(url('img/userImage')); ?>/<?php echo e($c->creator->image); ?>');" class="user-image-circle user-has-image"></div>
          <?php endif; ?>
          <div class="col-xs-12 comment-content">
            <div class="row">
              <span class="comment-content-user-name"><?php echo e($c->creator->name); ?></span>
              <?php echo e(trans('comments.isCommented')); ?>

            </div>
            <div class="row comment-content-title"><?php echo e($c->title); ?></div>
            <div class="row comment-content-body"><?php echo e($c->details); ?></div>
            <div class="row">
              <div class="col-xs-7 padding0 comment-content-date">
                <?php if($c->commenters()->exists()): ?>
                
                <?php echo e($c->commenters()->latest()->first()->pivot->created_at->diffForHumans()); ?>

                <?php else: ?>
                
                <?php echo e($c->created_at->diffForHumans()); ?>

                <?php endif; ?>
              </div>
              <div class="col-xs-5 padding0 comment-content-answer">
                <a href="<?php echo e(route('comments.details', ['id' => $c->id])); ?>"><?php echo e(trans('home.answers')); ?></a>
              </div>
            </div>
          </div>
        </div>
        <?php if($loop->iteration == 3) break; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="row right-sidebar-comment-row">
          <div class="col-xs-12 text-right comment-content-answer">
            <a href="<?php echo e(route('comments.index')); ?>"><?php echo e(trans('home.commentsArchive')); ?></a>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>

<script type="text/javascript">
//table filter
//Connect select2 and jplist plugins
$('#vehicles-list2').select2({
  cache: true,
  placeholder: "<?php echo e(trans('vehicles.chooseVehicle')); ?>",
  language: {
    "noResults": function () {
      return "<?php echo e(trans('vehicles.noResults')); ?>";
    }
  },
  ajax: {
    url: "<?php echo e(route('autocomplete.vehicles_list')); ?>",
    type: 'GET',
    dataType: 'json',
    data: function (params) {
      $('#filter-vehicles-list2').val(params.term);
      var press = jQuery.Event("keyup");
      press.ctrlKey = false;
      press.which = 46;
      $('#filter-vehicles-list2').trigger(press);

      return {vl: params.term, u: $('#u').val()}
    },
    processResults: function (data) {
      $('#select2-vehicles-list2-container').attr('title', '');
      $('#select2-vehicles-list2-container').html('<span class="select2-selection__placeholder">Odaberite vozilo</span>');
      return {results: data}
    }
  }
});

$('#vehicles-list2').on('change', function () {
  $('#filter-vehicles-list2').val('');
  var term = $.trim($('#select2-vehicles-list2-container').text());

  $('#filter-vehicles-list2').val(term);

  var press = jQuery.Event("keyup");
  press.ctrlKey = false;
  press.which = 46;
  $('#filter-vehicles-list2').trigger(press);
});

function tog(v) {
  return v ? 'addClass' : 'removeClass';
}
$(document).on('input', '.clearable', function () {
  $(this)[tog(this.value)]('x');
}).on('mousemove', '.x', function (e) {
  $(this)[tog(this.offsetWidth - 18 < e.clientX - this.getBoundingClientRect().left)]('onX');
}).on('touchstart click', '.onX', function (ev) {
  ev.preventDefault();
  $(this).removeClass('x onX').val('').change();

  var press = jQuery.Event("keyup");
  press.ctrlKey = false;
  press.which = 46;
  $(this).trigger(press);
});


$('.draggable-button').click(function () {
  $('.remove-new-item').show();

  $('.remove-new-item').click(function () {
      $(this).parent().remove();
  });

  $('.monitoring-configuration-edit').show();

  $('.sortable-container').addClass('edit');

  $('.sortable-container .column:first-child > div').addClass('connected-sortable droppable-area1');
  $('.sortable-container .column:last-child > div').addClass('connected-sortable droppable-area2');


  $('.sortable-container .droppable-area1').sortable({
      connectWith: '.sortable-container .connected-sortable',
      stack: '.sortable-container .connected-sortable div.droppable-area1'
  }).disableSelection();

  $('.sortable-container .droppable-area2').sortable({
      connectWith: '.sortable-container .connected-sortable',
      stack: '.sortable-container .connected-sortable div.droppable-area2'
  }).disableSelection();
});


$('.add-sort-item').click(function () {
  // Ajax request on base to get monitoring details depends of choose-item
  if ($('select[name=choose-item]').val() == 'malfunction') {
    $.ajax({
      type: 'GET',
      url: "<?php echo e(route('monitoring.malfunctions')); ?>",
      success: function (data) {
        $('.sortable-container .column:first-child div.droppable-area1').append('<div data-pos="malfunction" class="row new-item ui-sortable-handle"><label class="remove-new-item"><img src="img/interface/remove-icon.svg"></label><div class="col-xs-12 col-sm-12 padding0"><h5><?php echo e(trans("malfunction.title")); ?></h5><div class="col-xs-6 text-center padding0"><div class="row"><span class="monitoring-number">' + data['failed_count'] + '</span></div><div class="row"><span class="bubble red-b"><?php echo e(trans("malfunction.malfunctionFailed")); ?></span></div></div><div class="col-xs-6 text-center padding0"><div class="row"><span class="monitoring-number">' + data['pending_count'] + '</span></div><div class="row"><span class="bubble orange-b"><?php echo e(trans("malfunction.malfunctionPending")); ?></span></div></div></div></div>');

        $('.remove-new-item').click(function () {
            $(this).parent().remove();
        });
      }
    });
  } else if ($('select[name=choose-item]').val() == 'reminder') {
    $.ajax({
      type: 'GET',
      url: "<?php echo e(route('monitoring.reminders')); ?>",
      success: function (data) {
        $('.sortable-container .column:first-child div.droppable-area1').append('<div data-pos="reminder" class="row new-item ui-sortable-handle"><label class="remove-new-item"><img src="img/interface/remove-icon.svg"></label><div class="col-xs-12 col-sm-12 padding0"><h5><?php echo e(trans("reminder.title")); ?></h5><div class="col-xs-6 text-center padding0"><div class="row"><span class="monitoring-number">' + data['failed_count'] + '</span></div><div class="row"><span class="bubble red-b"><?php echo e(trans("reminder.remindersFailed")); ?></span></div></div><div class="col-xs-6 text-center padding0"><div class="row"><span class="monitoring-number">' + data['pending_count'] + '</span></div><div class="row"><span class="bubble orange-b"><?php echo e(trans("reminder.remindersFailed")); ?></span></div></div></div></div>');

        $('.remove-new-item').click(function () {
          $(this).parent().remove();
        });
      }
    });
  }
});

$('.save-monitoring').click(function () {
    //create the array that hold the positions...
  var order1 = [];
  $('.sortable-container .droppable-area1 .new-item').each(function (e) {
    var num = $(this).index() + 1;
    order1.push($(this).data('pos') + '=' + ('area1_' + num));
  });

  var order2 = [];
  $('.sortable-container .droppable-area2 .new-item').each(function (e) {
    var num = $(this).index() + 1;
    order2.push($(this).data('pos') + '=' + ('area2_' + num));
  });

  $.ajax({
    type: 'POST',
    url: "<?php echo e(route('monitoring.store')); ?>",
    data: {
      area_1: order1,
      area_2: order2,
      _token: "<?php echo e(csrf_token()); ?>"
    },
    success: function (data) {
        
      location.reload();
    }
  });
});


$(document).ready(function () {
  $('#dashboard-content').css('height', $('.home-dashboard-content').height() + 10);

  $(window).resize(function () {
    $('#dashboard-content').css('height', $('.home-dashboard-content').height() + 10);
  });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projekti\Wine360\resources\views/home.blade.php ENDPATH**/ ?>