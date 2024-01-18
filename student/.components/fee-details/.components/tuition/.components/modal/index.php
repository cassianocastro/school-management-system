<div class="modal fade" id="paynow-popup" tabindex="-1" role="dialog" aria-labelledby="paynow-popupLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="paynow-popupLabel">Paynow</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="" method="post">
          <input type="hidden" name="amount" value="500" readonly>

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Full Name</label>

                <input type="text" name="firstname" value="<?= $student->name ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Email Address</label>

                <input type="email" name="email" value="<?= $student->email ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Phone</label>

                <input type="text" name="phone" value="1234567890" class="form-control" readonly>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="">Months</label>

                <input type="text" name="month" id="month" value="<?= $student->name ?>" class="form-control" readonly>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <h3>
                  <i class="fa fa-rupee-sign"></i>

                  500.00
                </h3>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <button type="submit" name="form_submitted" class="btn btn-success">
                  Confirm & Pay
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>