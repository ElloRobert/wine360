

<div class="modal fade" id="addMessageModal" role="dialog" aria-labelledby="addVehicleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-custom" role="document">
        <div class="modal-content">
            <!-- Sadržaj modala -->
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo e(asset('img/interface/close.svg')); ?>"></button>
                <h2 class="modal-title modal-naslov" id="addVehicleModalLabel">Pregledaj upit</h2>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 60px">
                    <form method="POST" action="<?php echo e(route('wines.store')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input class="form-control1 text-center" type="text" name="message_id" id="message_id" value="<?php echo e(old('id')); ?>" hidden/>
                            <div id="identifikacijskiPodaciInputi" class="" style="padding-bottom: 15px">
                                <div class="col-xs-12 col-sm-4 padding0">
                                </div>
                                <div class="col-xs-12 col-sm-6 padding0">
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="marginTop">
                                                <div class="col-xs-10 col-sm-10">
                                                    <label class="control-label" for="message-name">Ime</label>
                                                </div>
                                                <div class="col-xs-10 col-sm-10">
                                                    <input class="form-control1 text-center" type="text" name="name" id="message-name" value="<?php echo e(old('name')); ?>" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="message-email">Email</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <input class="form-control1 text-center" type="email" name="email" id="message-email" value="<?php echo e(old('email')); ?>" disabled/>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="marginTop">
                                            <div class="col-xs-10 col-sm-10">
                                                <label class="control-label" for="message-message">Poruka</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10">
                                                <textarea class="form-control1 text-center" name="message" id="message-message" disabled><?php echo e(old('message')); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 padding0">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
<?php /**PATH C:\Projekti\wine360\resources\views/messages/addModal.blade.php ENDPATH**/ ?>